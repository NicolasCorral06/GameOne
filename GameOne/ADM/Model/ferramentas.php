<?php

function validaEmail($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return 1; // e-mail válido
	}else {
		return 0; // e-mail inválido
	}
}

function hash256($string){
	$res = hash('sha256', $string); // devolve 64 caracteres
	return $res;
}

function antiInjection($param){ 
	// verifica se informações de formulário possui injection
	$strParam = strlen($param);
    $palavras = array("from","select","insert","delete","where","drop","table","show","update","declare","exec","set","alter","cst","union","column","*","%","\"","'","\\","--");
    $palavras2 = array("FROM","SELECT","INSERT","DELETE","WHERE","DROP","TABLE","SHOW","UPDATE","DECLARE","EXEC","SET","ALTER","CST","UNION","COLUMN","*","%","\"","'","\\","--");
    $paramL = strtolower($param);
    $paramU = strtoupper($param);
    $str = str_replace($palavras,"",$paramL);
    $strParams = strlen($str);
    if($strParam != $strParams){
		return 0;
	}else{
		$str = str_replace($palavras2,"",$paramU);
		$strParams = strlen($str);
		if($strParam != $strParams){
		return 0; // dados inválidos (tentativa de injection)
	}else{
		return 1; // dados válidos
	}
	}
}



function geradorStringRandom($length){
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $var_size = strlen($chars);
    $random_str = "";
    for( $x = 0; $x < $length; $x++ ) {  
        $random_str .= $chars[ rand( 0, $var_size - 1 ) ];  
    }
    return $random_str;
}

function geradorMicroTime(){
	$time = microtime(true);
	$valor = explode('.',$time);
	return $valor[0];
}

function pegaExtensao($arq){
	$ext = explode('.',$arq);
	return $ext[1];
}
?>