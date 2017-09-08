<?php
/**
 * Created by PhpStorm.
 * User: genim
 * Date: 21/10/2016
 * Time: 20:59
 */
declare (strict_types=1);
namespace clinic\person\patient;
use clinic\Model;
use clinic\person\Person;
use clinic\validators\date\dates\DateDMY;
use clinic\errors\InvalidArgument;
use clinic\person\PatientInterface;
use clinic\person\PersistenceInterface;

class Consult extends Model //implements PatientInterface, PersistenceInterface
{
    public $pcpf;
    public $cdata;
    public $hora;
    //  public $day=null;*/
    public function __construct(string $pcpf, string $cdata, string $hora)
    {
        $this->pcpf = $pcpf;
        $this->cdata = $cdata;
        $this->hora = $hora;
    }

    public function getHora():string
    {
        return $this->hora;
    }
    public function getData():string
    {
        return $this->cdata;
    }
    public function getPcpf():string
    {
        return $this->pcpf;
    }


    public function arrayobj(){
        return get_object_vars($this);
    }
    public static function  getIdAttribute()
    {
        return 'cpf';
    }
    public static function  getClassName()
    {
        return 'consult';
    }


}
