<?php
/**
 * Created by PhpStorm.
 * User: Notebook
 * Date: 26/02/2017
 * Time: 00:00
 */
namespace clinic\agenda;
use clinic\date\dates\DateDMY;
use clinic\Model;

class Agenda extends Model{

    public $nome;
    public $contato;
    public $data;
    public $vectDate = [];


    /**
     * carrega todos os objetos do arquivo para memoria
     * @return bool true para carregado, false para arquivo vazio
     */
    public function carregaArquivoArray($arquivo){
        $contents = @file_get_contents("../../files/$arquivo.txt");
        if(!$contents){
            echo "arquivo nao carregado";
            return false;
        }
        $objetos = explode(PHP_EOL, $contents);
        foreach ($objetos as $obj) {
            array_push($this->vectDate, unserialize($obj));
        }
        array_pop($this->vectDate);
        echo "arquivo carregado";
        return true;
    }

    public function __construct($nome,$contato,$data)
    {
        $this->contato = $contato;
       // $data = new DateDMY($data);
        $this->data = $data;
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getDate(){
        return $this->data;
    }
    public function getContato(){
        return $this->contato;
    }

    static public function getIdAttribute(){
        return 'data';

    }
    static public function getClassName(){
        return 'Agenda';

    }
    static public function pK(){
        return 'data';
    }


}