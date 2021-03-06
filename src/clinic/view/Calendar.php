<?php
/**
 * Created by PhpStorm.
 * User: Notebook
 * Date: 13/01/2017
 * Time: 22:51
 */
declare (strict_types=1);
namespace clinic\view;
use clinic\agenda\Agenda;

class Calendar{

    public $vectDate = [];
    /**
     * @return array
     * retorna um array de 12 posições cada uma refente a a quantidade de meses que cada mes possui
     */
    function diasMeses()
    {
        $retorno = array();
        for ($i = 1; $i <= 12; $i++) {
            /*funçao cal_days_in_month, sabe-se 87uantos dias tem determinado mes
             * .. recebe 3 parametro
             * 1°->qual o tipo de calendar = cal_gregoriam
             * 1°-> o mes que vc quer saber quantos dias tem
             * 3°-> o ano que esta o mes
             */
            $retorno[$i] = cal_days_in_month(CAL_GREGORIAN, $i, intval(date("Y")));
        }
        return $retorno;
    }

    /**
     * @return array
     */
    function diaSemana()
    {
        /**
         * função retorna o numero do dia da semana
         */
        $arrayRetorno = array();
        for ($i = 1; $i <= 12; $i++) {
            $arrayRetorno[$i] = array();
            $Mes = $this->diasMeses();
            for ($n = 1; $n <= $Mes[$i]; $n++) {
                /*greforiantojd -> retorna o n° do dia da semana na data pelo parametro
                 *parametros(mes,dia,ano)
                 * ex segundafeira da 2° semanaDoMes vai retorna 1(int);
                 */
                $diaMes = gregoriantojd($i, $n, intval(date("Y")));
                /* retorna o dia da semana em ingles (string)
                 * parametros
                 * 1° o dia (int) da semana do mes 'diaMes'
                 * 2° 0,1 ou 2*/
                $semanaMes = jddayofweek($diaMes, 2);
                // para trocar a escrita pq vem diferente
                if ($semanaMes == 'Mun') {
                    $semanaMes = 'Mon';
                }
                //recebe no mes i no dia n e armazenado o nome do dia 'seg, ter, quar'(ingles);
                $arrayRetorno[$i][$n] = $semanaMes;
            }
        }
        return $arrayRetorno;
    }

    /**
     * @param $mes
     * @return int
     */
    function primeiroDiaDoMes($mes)
    { // fala que dia da semana o mes começa
        $dia = (int)date("w", strtotime($mes . "/01/" . date('Y')));
        return $dia;
    }

    /*
     * funcao para gravar os arquivos
     * @param $nome
     * @param $celular
     * @param $data
     *
    public function WriteFile($nome,$celular,$data)
    {
        $conteudo = $nome . "-" . $celular . "-" . $data. ";" . "\n";
        $arquivo = fopen("agendados.txt", "a");
        fwrite($arquivo, $conteudo);
        echo "dados gravados com sucesso: $conteudo";
        fclose($arquivo);
    }*/



    public function carregaArquivoArray(){
        $contents = @file_get_contents("../files/Agenda.txt");
        if(!$contents){
            echo "arquivo nao carregado";
            return false;
        }
        $objetos = explode(PHP_EOL, $contents);
        foreach ($objetos as $obj) {
            //var_dump($obj);
            array_push($this->vectDate, unserialize($obj));
        }
        //var_dump($this->vectDate);
        //array_pop($this->vectDate);
        return $this->vectDate;
    }


    public function searchObject(string $date){
        $patient = $this->carregaArquivoArray();
        foreach ($patient as $obj){
            if (strcmp($obj->getDate(), $date) === 0){
                return $obj;
            }
        }
        return null;
    }

    /**
     * @param $nv
     * @param $dia
     * @param $mes
     * parametro $nv (serve como um contador para que não grave o cliente agendado mais de 1 vez no arquivo.
     * função para mostrar os horarios de cada dia do calendario e junto a ela, cadastrar agendamento nos horarios
     */
    function horariodia($nv,$dia,$mes)
    {
        $min = 20 * 60;                                            // configura apartir e tbm ate que horaas em quantos minutos vai possuir os horarios
        $hrinicial = 12 * 3600;
        $hrfinal = 13 * 3600;
        while ($hrfinal > $hrinicial) {
            $hrinicial = $hrinicial + $min;
            $horas = floor($hrinicial / 3600);
            $minutos = floor($hrinicial - ($horas * 3600)) / 60;
            $minutos = $minutos - 20;
            if ($minutos == 0) {
                $minutos = '00';
            }
            if (1 == strlen(strval($horas))) {
                $horas = "0" . $horas;
            }


            $tam = sizeof($this->vectDate);                                 //pega q quantidade de linhas existente no arquivo
            $reset = 0;                                                     // "contator" para que nao imprima dois horarios iguais
            $u = 0;
            $this->vectDate = $this->carregaArquivoArray();// contador para que seja percorrido todas as linhas do vetor
                                // para certificar que o arquivo foi carregado para o vetorDate
                while ($u < $tam) {
                    if($this->vectDate[$u] != NULL) { // para   $this->vectDate[$u]->getDate() nao retorna bool (false)
                        $data = $this->vectDate[$u]->getDate();
                        //echo "oiipppp $data kkkkkk $tam kkkkkk minuto $minutos"; // problema do minuto somando mais 15
                        if (strval($data) == strval($horas . "." . $minutos . "." . $dia . "." . $mes)) {   // compara se os horaios sao iguais
                            $cliente = $this->vectDate[$u]->getNome();                                      // pega o nome do cliente
                            $cell = $this->vectDate[$u]->getContato();                                      // pega o numero do cliente
                            echo "<table id='hr'><tr><td><form name=\"questbook\"  method=\"get\">" . $horas . ":" . $minutos . ":" . "00" . "<input type=\"text\" id=\"nome\" name=\"nome\"  value='$cliente'/><input type=\"text\" id=\"numero\" name=\"numero\" value='$cell'/> <input style=\"display:none\" type=\"text\" id=\"data\" name=\"data\"  value='$horas.$minutos.$dia.$mes'/><input type=\"submit\" value=\"Enviar\"><input type=\"reset\" value=\"delete\"></form></td></tr></table>"; //imprimi o horario agendado
                            // echo "reservado o horario de $horas : $minutos para ::: $cliente ::: cell: $cell";
                            $reset++;
                            break; // para caso tenha encontrado a data marcada,
                        }

                    }
                        $u++;
                }

            if($reset == 0) {                                   //imprimi caso o horario nao tenha nenhum cliente agendado
                echo "<table id='hr'><tr><td><form name=\"questbook\"  method=\"get\">" . $horas . ":" . $minutos . ":" . "00" . "<input type=\"text\" id=\"nome\" name=\"nome\"  placeholder=\"nome\"/><input type=\"text\" id=\"numero\" name=\"numero\" placeholder=\"contato\"/>    <input style=\"display:none\" type=\"text\" id=\"data\" name=\"data\"  value='$horas.$minutos.$dia.$mes'/>      <input type=\"submit\" value=\"Enviar\"><input type=\"reset\" value=\"delete\"></form></td></tr></table>";
            }




            /* grava o nome, celular, e data do agendamento.*/
            if($nv == NULL) {// para grava somente uma vez.
                    if (isset($_GET["nome"]) == TRUE) {
                        $data = $_GET["data"];
                        $nome = $_GET["nome"];
                        $numero = $_GET["numero"];
                        $agenda = new Agenda($nome,$numero,$data);
                        $agenda->save();
                        $nv = $nv + 1;
                        echo "<h1>agendamento do cliente $nome salvo com sucesso</h1>";
                }
            }
        }
        echo "<br/>";
    }

    /**
     * monta o calendario, em varios whiles(ano(mes(diadomes)))
     */
    function montaCalendario()
    {
        $diasSemana = array(
            1 => 'domingo',
            2 => 'segunda',
            3 => 'Terça',
            4 => 'quarta',
            5 => 'quinta',
            6 => 'sexta',
            7 => 'sabado'
        );

        $arrayMes = array(
            1 => 'janeiro',
            2 => 'fevereiro',
            3 => 'março',
            4 => 'abril',
            5 => 'maio',
            6 => 'junho',
            7 => 'julho',
            8 => 'agosto',
            9 => 'setembro',
            10 => 'outubro',
            11 => 'novembro',
            12 => 'dezembro'
        );

        $contadiasdoano = 1;             // contador de dias totais do ano (365)
        $nv = NULL;                     // contador usado em horariodia para que nao mostre dois horarios iguais
        $anual = array(
            1 => -1,                  // -1 , -2, marcadores para usar para chamar o iframe na tela principal
            2 => -2,
            3 => -3,
            4 => -4,
            5 => -5,
            6 => -6,
            7 => -7,
            8 => -8,
            9 => -9,
            10 => -10,
            11 => -11,
            12 => -12
        );


        $diames = $this->diasMeses();                                          //diames => vetor de 12 posições refente a cada mes do ano, com sua quantidade de dias referente a cada mes
        for ($t = 1; $t <= 12; $t++) {
            echo "<article class='ano' id='$anual[$t]'>";                    // para q o iframe,quee cria os links para chamar os meses em IndexAgenda funcione
            echo "<table id='ano'><tr><td>" . $arrayMes[$t] . "</td></tr></table>" . "<br/>";  // escreve o meses,
            $y = 1;                                                       //y recebe 1 pois vai ser refencia para a contagem do decorrer do mes
            while ($y <= $diames[$t]) {                                  //vai repetir sobre o numero de dias que tem determinado mes
                $i = 1;$comeco = $this->primeiroDiaDoMes(strval($t));   // função que retorna a posicao do 1 dia do mes; EX: o mes começe no domingo, o valor ira ser 0, segunda = 1...
                while ($y <= $diames[$t]) {                            //vai repetir sobre a quantidades de dias que possui o mes determinado


                    // novo artigos para puxar os dias no iframe
                    echo "<article class='dia' id='$contadiasdoano'>";



                    if ($i > 7) {                               // caso o i fica maior que a quant de dias da semana, volta a ser 1
                        $i = 1;
                    }
                    if ($comeco + $i > 7) {                   // caso a o começo mais a var $i fique maior que a quant de dias da semana
                        $comeco = 0;                         //começo reinicia
                        $i = 1;                             // e o $i volta a ser 1 novamente
                    }
                    if($diasSemana[$comeco + $i] == "sabado" or $diasSemana[$comeco + $i] == "domingo"){                                                          // if para o domingo ou sabado nao ir acmpanhado com 0 "- FEIRA" iguais os dias da semana
                        echo "<table id='resto'><tr>" . "<td>" . $y . " / " . $diasSemana[$comeco + $i] . " / ". $arrayMes[$t] . "</td>" . "</tr></table><br/>"; //descreve o dia em numero, e o dia da semana em portugues
                        $this->horariodia($nv,$y,$t);
                        $y++;
                        $i++;
                        $nv = 1;
                    }
                    else {                             // else para o restantes de dias da semana tirando sab e dom
                        echo "<table id='resto'><tr>" . "<td>" . $y . " / " . $diasSemana[$comeco + $i] . "-feira" . " / ". $arrayMes[$t]. "</td>" . "</tr></table><br/>"; //descreve o dia em numero, e o dia da semana em portugues
                        $this->horariodia($nv,$y,$t);

                        $nv = 1;
                        $y++;
                        $i++;
                    }
                    //fim do artigo para puchar os dias no iframe
                    echo "<article/>";
                    $contadiasdoano++;
                }
            }
            echo "</article>";
        }
    }
}
