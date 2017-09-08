<?php
/**
 * Created by PhpStorm.
 * User: Genivaldo
 * Date: 17/02/2017
 * Time: 14:28
 */
namespace clinic\controller;
use clinic\errors\InvalidArgument;
use clinic\person\patient\Patient;
use clinic\validators\date\dates\DateDMY;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use clinic\validators\cpf\Cpf;
use clinic\person\patient\Consult;
use clinic\Model;

class ClinicController{
    protected $session;
    protected $patient;
    protected $consults = [];
    /**
     * mostrar todos os pacientes homens
     */
    public function allpatientsAction(){
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        $p = new Patient("","","","","","","","","","","","","","","");
        $vetor = array("sex" => "m");
       // $t = $p->load($vetor);
        $t1 = $this->consultar("select firstname, cpf from patient");
        $this->consults = $t1;
        if($this->consults == FALSE){
            $this->session->getFlashBag()->add('info','Nenhum paciente cadastrado');
            return $this->render_view('data');
        }
        $this->session->set('consults', $this->consults);
        return $this->render_view('allpatients');
    }


    /**
     * @return RedirectResponse|Response
     * auxilio para mostrar os pacientes
     */
    public function showpatientAction(){
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        return $this->render_view('showpatient');
    }


    /**
     * misterioso
     */
    public function showdatapatientAction(Request $request){
        $this->session= new Session();
        $error='';
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        if ( $request->getMethod()=='POST') {

            if(!$this->patient){
                try {
                    $cpf = $request->request->get('cpf');
                    $obj = $this->criaObj($cpf);
                    if($obj != false){
                        $this->consults = $obj;
                        $this->session->getFlashBag()->add('info','Paciente encontrado');
                        //$this->session->set('patient', $this->patient);
                        return $this->render_view('showdatapatient');
                    }
                }
                catch ( InvalidArgument $e){
                    $error=$e->getMessage();
                }
                catch ( \Throwable $e ){
                    $error= 'errorrrr !!!!';
                }
            }
        }
        $this->session->getFlashBag()->add('info','Paciente não encontrado');
        ob_start();
        include sprintf(__DIR__ . '/../view/showpatient.php');
        return new Response( ob_get_clean());
    }

    /**
     * apartir do cpf retorna o obj da classe com as dmais informações
     */
    public function criaObj(string $cpf){
        $test = $this->consultar("SELECT * FROM patient WHERE cpf = '$cpf';");
        $row = pg_fetch_array($test,null,PGSQL_ASSOC);
        $q = $row["cpf"];
        if ($q == $cpf) {
            $pac = new Patient($row["firstname"],$row["lastname"],$row["rg"],$row["rua"],$row["numero"],$row["complemento"],$row["bairro"],$row["cidade"],$row["estado"]
            ,$row["cep"],$row["databirth"],$row["cpf"],$row["phone"],$row["sex"],$row["email"]);
            return $pac;
        }
        else{
            return false;
        }
    }
    public function criaObjConsult(string $data, string $cpf){
        $test = $this->consultar("SELECT * FROM consult WHERE cdata = '$data' and pcpf = '$cpf';");
        $row = pg_fetch_array($test,null,PGSQL_ASSOC);
        $r = count($row);
        $pac = [];
        for($i = 0; $i < $r;$i++){
            $pac[$i] = new Consult($row["pcpf"],$row["cdata"],$row["hora"]);
        }
        return $pac;
  }


    /**
     * @param Request $request
     * @return RedirectResponse|Response
     * deleta o paciente
     */
    public function deletepatientAction(Request $request){
        $error='';
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        if ( $request->getMethod()=='POST') {
            try{
                $cpf = new Cpf($request->request->get('cpf'));
                $cpf = $cpf->getFormattedCpf();
                $paci = $this->criaObj($cpf);
                $paci->delete();
                $this->session->getFlashBag()->add('info','Paciente apagado com sucesso!');
                return $this->render_view('deletepatient');
            }
            catch ( InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch ( \Throwable $e ){
                $error= 'errorrrr !!!!';
            }
            $this->session->getFlashBag()->add('info','Paciente não encontrado!');
        }
        ob_start();
        include sprintf(__DIR__.'/../view/deletepatient.php');
        return new Response(ob_get_clean());
    }

    /**
     * mostra todas as consultas referentes ao dia pesquisado // para testar
     */
    public function allconsultsAction(Request $request){
        $error='';
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        if ( $request->getMethod()=='POST') {
            try{
                $date = $request->request->get('date');
                //$date = $date->getFormattedDate();
                $p = new Consult("","","");
                $vect = array("cdata" => "$date");
                $resp = [];
                $resp = $p->load($vect);
                $this->consults = $resp;
                if(!$resp){
                    $this->session->getFlashBag()->add('info', 'erro de consulta');
                }
                if(count($this->consults) == 0){
                    $this->session->getFlashBag()->add('info', 'Data sem consultas marcadas');
                }
                else{
                    $this->session->getFlashBag()->add('info', "consultas encontradas na data $date");
                    $this->session->set('consults', $this->consults);
                    return $this->render_view("allconsults");
                }
                ob_start();
                include sprintf(__DIR__.'/../view/allconsults.php');
                return new Response( ob_get_clean());
            }
            catch ( InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch ( \Throwable $e ){
                $error= 'errorrrr !!!!';
            }
        }
        ob_start();
        include sprintf(__DIR__.'/../view/allconsults.php');
        return new Response( ob_get_clean());
    }


    /**
     * apresenta a consulta de certo paciente na data informada
     */
    public function showdayAction(Request $request){
        $error='';
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        if ( $request->getMethod()=='POST') {
            try{
                $cpf =$request->request->get('cpf');
                //$cpf = $cpf->getFormattedCpf();
                 //$date = new DateDMY($request->request->get('date'));
                $date = $request->request->get('date');
                //$date = $date->getFormattedDate();
                echo $cpf;
                $result = $this->consultar("select firstname, cdata, hora from patient as p join consult as c on p.cpf = c.pcpf 
                  WHERE c.pcpf = '$cpf' and c.cdata = '$date';");
                $result = pg_fetch_array($result);
                if  (!$result) {
                    $this->session->getFlashBag()->add('info', 'erro consulta');
                }
               /* if (pg_num_rows($result) == 0) {
                    $this->session->getFlashBag()->add('info', 'Nenhuma consulta para esse dia com o paciente');
                    return $this->render_view('showconsultday');
                }*/
                $this->consults = (array)$result;
                $this->session->set('patient', $this->consults);
                return $this->render_view('showday');
            }
            catch (InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch (\Throwable $e) {
                $error = '';
            }
            $this->session->getFlashBag()->add('info',"$error");
        }
        ob_start();
        include sprintf(__DIR__.'/../view/showconsultday.php');
        return new Response( ob_get_clean());
    }


    /**
     * apresenta todas as consultas referentes ao paciente pesquisado
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function showallAction(Request $request){
        $error='';
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        if ( $request->getMethod()=='POST'){
            try {
                $cpf = new Cpf($request->request->get('cpf'));
                $cpf = $cpf->getFormattedCpf();
                $result = $this->consultar("select firstname, cdata, hora from patient as p join consult as c on p.cpf = c.pcpf where p.cpf = '$cpf';");
                if  (!$result) {
                    $this->session->getFlashBag()->add('info', 'erro consulta');
                }
               /* if (pg_num_rows($result) == 0) {
                    $this->session->getFlashBag()->add('info', 'Nenhuma consulta para o dia com o paciente');
                    return $this->render_view('showconsultall');
                }*/
                $this->consults = pg_fetch_array($result);
                $this->session->set('patient', $this->consults);
                return $this->render_view("showall");
                ob_start();
                include sprintf(__DIR__ . '/../view/showall.php');
                return new Response( ob_get_clean());
                //return $this->render_view('showall');
            }
            catch ( InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch ( \Throwable $e ){
                $error= 'errorrrr !!!!';
            }

        }
        ob_start();
        include sprintf(__DIR__ . '/../view/showconsultall.php');
        return new Response( ob_get_clean());
        //return new RedirectResponse('/clinica/front.php/showconsultall');
    }


    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function showconsultallAction(Request $request){
        $error='';
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        $this->session->getFlashBag()->add('info','');
        //return $this->render_view('');
        ob_start();
        include sprintf(__DIR__.'/../view/showconsultall.php');
        return new Response( ob_get_clean());
    }

    /**
     * @param Request $request              fazer
     * @return RedirectResponse|Response
     */
    public function showconsultdayAction(Request $request){
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        $this->session->getFlashBag()->add('info','');
        return $this->render_view('showconsultday');
    }

    /**
     * troca o valor de login para anoymous
     * @return RedirectResponse
     */
    public function exitAction(){
        $this->session = new Session();
        $this->session->clear();
        $this->session->getFlashBag()->add('info','Deslogado com sucesso');
        return new RedirectResponse('/clinica/front.php/index');
    }

    /**
     * apaga consulta passada pela data e cpf
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function deleteAction(Request $request){
        $error='';
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        if ( $request->getMethod()=='POST'){
            try {
                $cpf = new Cpf($request->request->get('cpf'));
                $cpf = $cpf->getFormattedCpf();
                $date = $request->request->get('date');
                //$date = $date->getFormattedDate();
                $conf = $this->consultar("select cdata from consult where cdata = '$date'");
                if($conf != false) {
                    $clt = $this->criaObjConsult($date, $cpf);
                    $tam = count($clt);
                    for ($i = 0; $i < $tam; $i++) {
                        $clt[$i]->delete();
                        $this->session->getFlashBag()->add('info', 'Consulta apagada com sucesso');
                        $this->render_view("deleteconsult");
                    }
                }
            }
            catch (InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch (\Throwable $e){
                $error= '';
            }
            $this->session->getFlashBag()->add('info','data ou cpf não encontrada');
        }
        ob_start();
        include sprintf(__DIR__.'/../view/deleteconsult.php');
        return new Response( ob_get_clean());
    }

    /**
     * registra a consulta no objeto
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function consultAction(Request $request){
        $error='';
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        if ( $request->getMethod()=='POST')
        {
            try {
                $cpf =new Cpf($request->request->get('cpf'));
                $date = $request->request->get('date');
                $cpf = $cpf->getFormattedCpf();
                $hr = $request->request->get('hour');

               $resp = $this->searchObject("cpf","$cpf","patient");
               if(pg_num_rows($resp) == 0){
                   $this->session->getFlashBag()->add('info','Paciente não inscrito');
                   ob_start();
                   include sprintf(__DIR__.'/../view/consult.php');
                   return new Response( ob_get_clean());
               }
               $resp2 = $this->consultar("select * from consult where cdata = '$date' and hora = '$hr';");
               if(pg_num_rows($resp2) != 0){
                   $this->session->getFlashBag()->add('info','data ja marcada');
                   ob_start();
                   include sprintf(__DIR__.'/../view/consult.php');
                   return new Response( ob_get_clean());
               }
                $consulta = new Consult($cpf,$date,$hr);
                $consulta->save();
                $this->consults = (array)$consulta;
                $this->session->set('patient', $this->consults);
                $this->session->getFlashBag()->add('info','Consulta marcada com sucesso');

                ob_start();
                include sprintf(__DIR__.'/../view/showday.php');
                return new Response( ob_get_clean());
            }
            catch (InvalidArgument $e){
                $error=$e->getMessage();
            }
            /*catch (\Throwable $e){
                $error= 'error !!!!';
            }*/
        }
        ob_start();
        include sprintf(__DIR__.'/../view/consult.php');
        return new Response( ob_get_clean());
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function dataAction(Request $request){
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        $this->session->getFlashBag()->add('info','');
        return $this->render_view('data');
    }

    public function consultar(string $sql){
        $link = pg_connect("host=localhost port=5432 dbname=Clinica user=postgres password=1234") or die('connection failed');
        $query = pg_query($link,$sql) or die("error query." . pg_last_error());;
        if(!$query) {
            return false;
        }
        else {
            return $query;
        }
    }

    /**
     * registra novo paciente
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function  registerAction ( Request $request){
        $error='';
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
        if ( $request->getMethod()=='POST')
        {
            try {
                $cpf = new Cpf($request->request->get('cpf'));
                $cpf = $cpf->getFormattedCpf();
                $test = $this->consultar("SELECT cpf FROM patient WHERE cpf = '$cpf';");
                $row = pg_fetch_array($test,null,PGSQL_ASSOC);
                $q = $row["cpf"];
                if ($q == $cpf) {
                    $this->patient = $test;
                    $this->session->set('patient', $this->patient);
                    $this->session->getFlashBag()->add('info', 'Paciente ja inscrito');
                    return $this->render_view('registerinfo');
                }else {
                    $this->patient = new Patient($request->request->get('firstName'), $request->request->get('lastName'),
                        $request->request->get('rg'), $request->request->get('rua'), $request->request->get('numero'),
                        $request->request->get('complemento'), $request->request->get('bairro'), $request->request->get('cidade'),
                        $request->request->get('estado'), $request->request->get('cep'), $request->request->get('date'),
                        $request->request->get('cpf'), $request->request->get('phone'), $request->request->get('sex'),
                        $request->request->get('email'));

                    $this->patient->save();
                    $this->session->set('patient', $this->patient);
                    $this->session->getFlashBag()->add('info', 'Paciente cadastrado com sucesso');
                    return $this->render_view('registerinfo');
                }
            }
            catch ( InvalidArgument $e){
                $error=$e->getMessage();
            }
        }
        ob_start();
        include sprintf(__DIR__ . '/../view/register.php');
        return new Response( ob_get_clean());
    }

    public function registerinfoAction(){
        $this->session= new Session();
        if(!$this->access()){
            $this->session->getFlashBag()->add('info','Área restrita');
            return new RedirectResponse('/clinica/front.php/index');
        }
       return $this->render_view('registerinfo');
    }

    /**
     * contem todos logins autorizados na rota especifica
     * @return bool true para acesso liberado, false para acesso negado
     */
    public function access(){
        $permission = ['admin'];
        $this->session= new Session();
        $user = $this->session->get('user');
        if ( !in_array($user,$permission)){
            return false;
        }
        return true;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function  indexAction ( Request $request)
    {
        $this->session = new Session();
        $this->session->getFlashBag()->add('info','');
        return $this->render_view('index');
    }

    /**
     * verifica login e senha
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function  loginAction ( Request $request)
    {
        $this->session = new Session();
        if($request->getMethod()=='POST'){
            $user=['admin'=>'bfd98d1cce6e1aac1f0daa0bfaa7928653bfc3b9fbc950509c533c969dd6a9c8'];
            foreach($user as $login=>$pwd){
                if($request->request->get('uname')==$login &&
                hash("sha256",$request->request->get('psw').'5wh4xfz31')==$pwd){
                    $this->session->set('user',$login);
                    $this->session->getFlashBag()->add('info','Logado com sucesso');
                    return new RedirectResponse('/clinica/front.php/index');
                }
            }
            $this->session->getFlashBag()->add('info','Senha ou Usuário incorretos');
            return $this->render_view('login');
        }
        return $this->render_view('login');
    }

    /**
     * @param string $cpf
     * @return mixed|null verifica a existencia do objeto e caso encontre, retorna o mesmo
     */
    public function searchObject(string $campo, string $id, string $tab){
        $t = $this->consultar("select * from $tab WHERE $campo = '$id';");
        return $t;

    }

    /**
     * carrega todos os objetos no arquivo Patient.txt para um array
     * @return array
     */
    public function loadFilesObjects():array
    {
       return $this->consultar("select * from patient;");
    }

    public function IframeAction(Request $request)
    {
        return $this->render_view('Iframe');
    }

    public function render_view(string $route)
    {
        ob_start();
        include sprintf(__DIR__ . "/../view/$route.php");
        return new Response(ob_get_clean());
    }
}