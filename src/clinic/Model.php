<?php
/**
 * Created by PhpStorm.
 * User: Genivaldo
 * Date: 17/02/2017
 * Time: 20:12
 */
declare (strict_types=1);
namespace clinic;
abstract class Model{

    private function conecao(){
        $link = pg_connect("host=localhost port=5432 dbname=Clinica user=postgres password=1234") or die('connection failed');
        if(!$link){
            return false;
        }
        else{
            return $link;
        }
    }
    public function save()
    {   $link = $this->conecao();
        $nomeTab = $this->getClassName();//pegando nome da tabela.
        $info = $this->arrayobj();
        $textSql = NULL;
        $res = pg_insert($link,$nomeTab,$info) or die("erro de banco");
        if ($res) {
            echo "Dados guardados com sucesso\n";
        }
        else {
            echo "O usuário deve ter inserido entradas inválidas\n";
        }
    }


    public function delete()
    {
        $link = $this->conecao();
        $nomeTab = $this->getClassName();//pegando nome da tabela.
        $info = $this->arrayobj();
        $textSql = NULL;
        $res = pg_delete($link,$nomeTab,$info) or die("erro de banco");
        if ($res) {
            echo "Dados apagados com sucesso\n";
        }
        else {
            echo "O usuário deve ter inserido entradas inválidas\n";
        }
    }

    public function load(array $info)
    {
        $link = $this->conecao();
        $nomeTab = $this->getClassName();//pegando nome da tabela.
        //$info = $this->arrayobj();
        $textSql = NULL;
        $res = pg_select($link,$nomeTab,$info) or die("erro de banco");
        if ($res) {
            return $res;
        }
        else {
            return false;
        }
    }

    public function update(array $substituto){
        $link = $this->conecao();
        $nomeTab = 'patient'; //$this->getClassName();//pegando nome da tabela.
        $info = $this->arrayobj();
        $textSql = NULL;
        $res = pg_update($link,$nomeTab,$substituto,$info) or die("erro de banco");
        if ($res) {
            echo "Dados atualizados\n";
            return true;
        }
        else {
            return false;
        }
    }

    abstract public static function getClassName();
    abstract public static function getIdAttribute();
    abstract public function arrayobj();

}