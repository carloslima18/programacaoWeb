<?php
require_once __DIR__ . '../../../../vendor/autoload.php';
use clinic\view\Calendar;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>indexDentist</title>
    <link rel="stylesheet" type="text/css" href=  "http://localhost/clinica/css2/iframe.css"/>
</head>
<body>
<?php
$resp = new Calendar();

//$ol = $resp->carregaArquivoArray();
//var_dump($ol);
//$aray = $resp->retiraData();
//echo "<h1>$aray<h1>";

?>
<section>
    <!-- local aonde chama o iframe da agenda e coloca as opções para chamar o mes -->
    <nav class="b1">
        <h2>Cadastramento</h2>

        <li><a href="/clinica/front.php/Iframe#-1" target="janela" id="01">janeiro</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#1" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#2" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#3" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#4" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#5" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#6" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#7" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#8" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#9" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#10" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#11" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#12" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#13" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#14" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#15" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#16" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#17" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#18" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#19" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#20" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#21" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#22" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#23" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#24" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#25" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#26" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#27" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#28" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#29" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#30" target="janela">30</a>
                <a href="/clinica/front.php/Iframe#31" target="janela">31</a></li>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-2" target="janela">fevereiro</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#32" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#33" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#34" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#35" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#36" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#37" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#38" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#39" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#40" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#41" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#42" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#43" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#44" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#45" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#46" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#47" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#48" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#49" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#50" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#51" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#52" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#53" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#54" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#55" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#56" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#57" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#58" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#59" target="janela">28</a></li>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-3" target="janela">março</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#60" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#61" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#62" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#63" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#64" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#65" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#66" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#67" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#68" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#69" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#70" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#71" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#72" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#73" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#74" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#75" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#76" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#77" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#78" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#79" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#80" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#81" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#82" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#83" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#84" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#85" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#86" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#87" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#88" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#89" target="janela">30</a>
                <a href="/clinica/front.php/Iframe#90" target="janela">31</a></li>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-4" target="janela">abril</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#91" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#92" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#93" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#94" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#95" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#96" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#97" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#98" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#99" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#100" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#101" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#102" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#103" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#104" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#105" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#106" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#107" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#108" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#109" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#110" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#111" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#112" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#113" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#114" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#115" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#116" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#117" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#118" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#119" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#120" target="janela">30</a>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-5" target="janela">maio</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#121" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#122" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#123" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#124" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#125" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#126" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#127" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#128" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#129" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#130" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#131" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#132" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#133" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#134" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#135" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#136" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#137" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#138" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#139" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#140" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#141" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#142" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#143" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#144" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#145" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#146" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#147" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#148" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#149" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#150" target="janela">30</a>
                <a href="/clinica/front.php/Iframe#151" target="janela">31</a></li>
        </ul>
        <li><a href=".php#-6" target="janela">junho</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#152" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#153" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#154" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#155" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#156" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#157" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#158" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#159" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#160" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#161" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#162" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#163" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#164" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#165" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#166" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#167" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#168" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#169" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#170" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#171" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#172" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#173" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#174" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#175" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#176" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#177" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#178" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#179" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#180" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#181" target="janela">30</a>
            </li>
        </ul>
    </nav>
    <nav class="b2">

        <li><a href="/clinica/front.php/Iframe#-7" target="janela">julho</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#182" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#183" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#184" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#185" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#186" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#187" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#188" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#189" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#190" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#191" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#192" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#193" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#194" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#195" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#196" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#197" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#198" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#199" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#200" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#201" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#202" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#203" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#204" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#205" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#206" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#207" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#208" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#209" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#210" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#211" target="janela">30</a>
                <a href="/clinica/front.php/Iframe#212" target="janela">31</a>
            </li>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-8" target="janela">agosto</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#213" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#214" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#215" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#216" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#217" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#218" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#219" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#220" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#221" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#222" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#223" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#224" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#225" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#226" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#227" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#228" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#229" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#230" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#231" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#232" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#233" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#234" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#235" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#236" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#237" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#238" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#239" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#240" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#241" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#242" target="janela">30</a>
                <a href="/clinica/front.php/Iframe#243" target="janela">31</a></li>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-9" target="janela">setembro</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#244" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#245" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#246" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#247" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#248" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#249" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#250" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#251" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#252" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#253" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#254" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#255" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#256" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#257" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#258" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#259" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#260" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#261" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#262" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#263" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#264" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#265" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#266" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#267" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#268" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#269" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#270" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#271" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#272" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#273" target="janela">30</a>
            </li>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-10" target="janela">outubro</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#274" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#275" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#276" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#277" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#278" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#279" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#280" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#281" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#282" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#283" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#284" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#285" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#286" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#286" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#288" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#289" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#290" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#291" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#292" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#293" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#294" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#295" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#296" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#297" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#298" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#299" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#300" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#301" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#302" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#303" target="janela">30</a>
                <a href="/clinica/front.php/Iframe#304" target="janela">31</a></li>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-11" target="janela">novembro</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#305" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#306" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#307" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#308" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#309" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#310" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#311" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#312" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#313" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#314" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#315" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#316" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#317" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#318" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#319" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#320" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#321" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#322" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#323" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#324" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#325" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#326" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#327" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#328" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#329" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#330" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#331" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#332" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#333" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#334" target="janela">30</a>
            </li>
        </ul>
        <li><a href="/clinica/front.php/Iframe#-12" target="janela">dezembro</a></li>
        <ul class="h">
            <li><a href="/clinica/front.php/Iframe#335" target="janela">01</a>
                <a href="/clinica/front.php/Iframe#336" target="janela">02</a>
                <a href="/clinica/front.php/Iframe#337" target="janela">03</a>
                <a href="/clinica/front.php/Iframe#338" target="janela">04</a>
                <a href="/clinica/front.php/Iframe#339" target="janela">05</a>
                <a href="/clinica/front.php/Iframe#340" target="janela">06</a>
                <a href="/clinica/front.php/Iframe#341" target="janela">07</a>
                <a href="/clinica/front.php/Iframe#342" target="janela">08</a>
                <a href="/clinica/front.php/Iframe#343" target="janela">09</a>
                <a href="/clinica/front.php/Iframe#344" target="janela">10</a>
                <a href="/clinica/front.php/Iframe#345" target="janela">11</a>
                <a href="/clinica/front.php/Iframe#346" target="janela">12</a>
                <a href="/clinica/front.php/Iframe#347" target="janela">13</a>
                <a href="/clinica/front.php/Iframe#348" target="janela">14</a>
                <a href="/clinica/front.php/Iframe#349" target="janela">15</a>
                <a href="/clinica/front.php/Iframe#350" target="janela">16</a>
                <a href="/clinica/front.php/Iframe#351" target="janela">17</a>
                <a href="/clinica/front.php/Iframe#352" target="janela">18</a>
                <a href="/clinica/front.php/Iframe#353" target="janela">19</a>
                <a href="/clinica/front.php/Iframe#354" target="janela">20</a>
                <a href="/clinica/front.php/Iframe#355" target="janela">21</a>
                <a href="/clinica/front.php/Iframe#356" target="janela">22</a>
                <a href="/clinica/front.php/Iframe#357" target="janela">23</a>
                <a href="/clinica/front.php/Iframe#358" target="janela">24</a>
                <a href="/clinica/front.php/Iframe#359" target="janela">25</a>
                <a href="/clinica/front.php/Iframe#360" target="janela">26</a>
                <a href="/clinica/front.php/Iframe#361" target="janela">27</a>
                <a href="/clinica/front.php/Iframe#362" target="janela">28</a>
                <a href="/clinica/front.php/Iframe#363" target="janela">29</a>
                <a href="/clinica/front.php/Iframe#364" target="janela">30</a>
                <a href="/clinica/front.php/Iframe#365" target="janela">31</a></li>
        </ul>

        <a href="home.php" target="_self">voltar ao menu</a>
    </nav>
    <iframe src="/clinica/front.php/Iframe" name="janela" id="frame-spec"></iframe>
</section>
</body>
</html>
