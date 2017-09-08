<?php
/**
 * Created by PhpStorm.
 * User: genim
 * Date: 21/10/2016
 * Time: 20:59
 */
declare (strict_types=1);
namespace clinic\person\patient;
use clinic\person\Person;
use clinic\validators\date\dates\DateDMY;
use clinic\errors\InvalidArgument;
use clinic\person\PatientInterface;
use clinic\person\PersistenceInterface;

class Patient extends Person //implements PatientInterface, PersistenceInterface
{
   /* public $consultsDate=[];
   // public $consultsHour = [];
   // public $consultsMinute = [];
   // public $consults = [];
   // public $dentist=[];
   //  public $day=null;*/
    public function __construct(string $firstname, string $lastname, string $rg, string $rua, string $numero, string $complemento,
                                string $bairro, string $cidade, string $estado, string $cep, string $databirth, string $cpf,
                                string $phone, string $sex, string $email)
    {     parent::__construct($firstname, $lastname, $rg, $rua, $numero, $complemento, $bairro, $cidade, $estado, $cep,
            $databirth, $cpf, $phone, $sex, $email);
    }
    public function arrayobj(){
        return get_object_vars($this);
    }

    public static function  getClassName()
    {
        return 'patient';
    }

    /**
     * registra nome do dentista, data no formato dd/mm/aaaa, hora e minutos.
     * @param string $dentist
     * @param string $date
     * @param int $hour
     * @param int $minute
     * @throws InvalidArgument
     *
    public function registerConsult(string $dentist, string $date, int $hour, int $minute){
    if($this->searchConsult($date)){
    throw new InvalidArgument('Data já está marcada');
    }
    array_push($this->dentist, strtoupper($dentist)) ;
    $consults = new DateDMY($date);
    array_push($this->consultsDate, $consults->getFormattedDate());
    if($hour >= 24 OR $hour < 0){
    throw new InvalidArgument('Horario invalido');
    }
    array_push($this->consultsHour, $hour);
    if($minute >= 60 OR $minute < 0){
    throw new InvalidArgument('Minuto invalido');
    }
    array_push($this->consultsMinute, $minute);
    array_push($this->consults, 'Data: '.$consults->getFormattedDate().' Hora:'.$hour.':'.$minute.' Dentista:'.strtoupper($dentist));
    }
     *
    /**
     * @param string $date
     * @return bool true para consulta encontrada, false pra consulta não encontrada
     *
    public function searchConsult(string $date):bool{
    $date = $this->getDate($date);
    foreach($this->consultsDate as $position){
    if($date === $position){
    return true;
    }
    }
    return false;
    }

    /**
     * verifica a existencia da consulta, caso afirmativo, retorna os dados: dia e hora
     * @param string $date
     * @return mixed
     *
    public function getConsultDay(string $date){
    $date = $this->getDate($date);
    foreach($this->consultsDate as $key=>$position){
    if($date === $position){
    return $this->day = "Dia: $date Horário: ".(string)$this->consultsHour[$key].':'.(string)$this->consultsMinute[$key].
    ' Dentista: '.$this->dentist[$key];
    }
    }
    return null;
    }
    public function getDay(){
    return $this->day;
    }

    /**
     * @return array com todas as consultas
     *
    public function getAllConsults():array{
    return $this->consults;
    }

    /**
     * @param string $date
     * @return string data no formato dd/mm/aaaa.
     *
    public function getDate(string $date):string{
    $date = new DateDMY($date);
    return $date->getFormattedDate();
    }

    /**
     * deleta consulta especificada pelo dia.
     * @param string $date
     * @return bool true para consulta deletada, false para consulta não encontrada
     *
    public function deleteConsult(string $date):bool{
    $tmp = $this->getDate($date);
    if(!$this->searchConsult($date)){
    return false;
    }
    $j = 0;
    foreach($this->consultsDate as $key=>&$consult){
    if($consult === $tmp){
    $j = $key;
    }
    }
    $this->deletePositionVector($j, $this->consultsDate);
    $this->deletePositionVector($j, $this->consults);
    $this->deletePositionVector($j, $this->consultsHour);
    $this->deletePositionVector($j, $this->consultsMinute);
    $this->deletePositionVector($j, $this->dentist);
    return true;
    }

    /**
     * elimina posição especifica de um vetor
     * @param int $position
     * @param array $vector
     *
    public function deletePositionVector(int $position, array &$vector){
    $tmp = [];
    foreach($vector as $key=>&$pos){
    if(!($key === $position)){
    array_push($tmp, $pos);
    }
    }
    $vector = $tmp;
    }*/


}
