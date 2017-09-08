<?php
/**
 * Created by PhpStorm.
 * User: Genivaldo
 * Date: 18/10/2016
 * Time: 12:17
 */
declare (strict_types=1);
namespace clinic\person;
use clinic\address\Address;
use clinic\validators\cpf\Cpf;
use clinic\validators\date\dates\DateDMY;
use clinic\Model;
class Person extends Model{
    protected $firstname;
    protected $lastname;
    protected $rg;

    protected $rua;
    protected $numero;
    protected $complemento;
    protected $bairro;
    protected $cidade;
    protected $estado;
    protected $cep;

    protected $databirth;
    protected $cpf;
    protected $phone;
    protected $sex;
    protected $email;

    
    public function __construct(string $firstname, string $lastname, string $rg, string $rua, string $numero, string $complemento,
                                string $bairro, string $cidade, string $estado, string $cep, string $date, string $cpf,
                                string $phone, string $sex, string $email){
        $this->firstname = strtoupper($firstname);
        $this->lastname = strtoupper($lastname);
        //$this->address = new Address($rua, $numero, $complemento, $bairro, $cidade, $estado, $cep);
        //$this->dateBirth = new DateDMY($date);
        $this->databirth = $date;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        // $this->cpf = new Cpf($cpf);
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->phone = $phone;
        $this->sex = $sex;//strtoupper($sex);
        $this->email = $email;
    }

    public function getName():string
    {
        return $this->firstname.' '.$this->lastname;
    }
    public function getData():string
    {
        return $this->databirth;
    }
    public function getRg():string
    {
        return $this->rg;
    }
    public function getCpf():string
    {
        return $this->cpf;
    }
    public function getRua():string
    {
        return $this->rua;
    }
    public function getNumero():string
    {
        return $this->numero;
    }
    public function getComplemento():string
    {
        return $this->complemento;
    }
    public function getBairro():string
    {
        return $this->bairro;
    }
    public function getCidade():string
    {
        return $this->cidade;
    }
    public function getEstado():string
    {
        return $this->estado;
    }
    public function getCep():string
    {
        return $this->cep;
    }
    public function getPhone():string
    {
        return $this->phone;
    }
    public function getSex():string
    {
        return $this->sex;
    }
    public function getEmail():string
    {
        return $this->email;
    }

    public function arrayobj(){
      return get_object_vars($this);
    }
    public static function getIdAttribute()
    {
        return 'cpf';
    }
    public static function  getClassName()
    {
        return 'Person';
    }

    /*  public function getAddress():string
      {
          return $this->address->getAddress();
      }
      public function getCpf():string
      {
          return $this->cpf->getFormattedCpf();
      }

      /**
       * @param string $rua
       * @param string $numero
       * @param string $complemento
       * @param string $bairro
       * @param string $cidade
       * @param string $estado
       * @param string $cep
       *
      public function setAddress(string $rua, string $numero, string $complemento, string $bairro, string $cidade, string $estado, string $cep)
      {
          $this->address = new Address($rua, $numero, $complemento, $bairro, $cidade, $estado, $cep);
      }*/

}