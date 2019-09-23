<?php
	ob_start();

	global $raiz, $local_url, $local_site, $meses, $email_editora, $titulo_area;

	$local_url = "http://www.sistemas.ufrn.br/gerenciadorportais/public/";
	$local_site = "edufrn/";

	//meses escritos
	$meses = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');

	$email_editora = "contato@editora.ufrn.br"; //envio do formulario
?>