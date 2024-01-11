<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function limpar($string){
	$table = array(
        '/'=>'', '('=>'', ')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
	$string= preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8','ASCII//TRANSLIT',$string));
	$string= strtolower($string);
	$string= str_replace(" ", "-", $string);
	$string= str_replace("---", "-", $string);
	return $string;
}

function dataNascimento($string){

	$mes_num = date('m', strtotime($string));
 	if($mes_num == 1){
    $mes= "Janeiro";
    }elseif($mes_num == 2){
    $mes = "Fevereiro";
    }elseif($mes_num == 3){
    $mes = "Março";
    }elseif($mes_num == 4){
    $mes = "Abril";
    }elseif($mes_num == 5){
    $mes = "Maio";
    }elseif($mes_num == 6){
    $mes = "Junho";
    }elseif($mes_num == 7){
    $mes = "Julho";
    }elseif($mes_num == 8){
    $mes = "Agosto";
    }elseif($mes_num == 9){
    $mes = "Setembro";
    }elseif($mes_num == 10){
    $mes = "Outubro";
    }elseif($mes_num == 11){
    $mes = "Novembro";
    }else{
    $mes = "Dezembro";
    }

    $ano = date('Y', strtotime($string));

    return $mes.'/'.$ano;
}