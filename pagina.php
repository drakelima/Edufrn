<?php
	include "inicializacao.php";

	$raiz = "";

	//verifica se GET do conteudo da pagina foi setado
	if (isset($_GET['a']) and $_GET['a'] != '') {
		$pagina = $_GET['a'];
		$sufixo = substr($pagina, 0, 2);
	} else {
		header("location: index.php");
		exit;
	}

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	//pegando o conteudo da pagina
	$url = $local_url . $local_site . "secao/xml/".$pagina;

	foreach (simplexml_load_file($url)->item as $item) {
		$titulo = $item->titulo;
		$texto = $item->descricao;
	}
?>

                <!-- migalha -->
                <span class="mapa-site">
                	<?
                    	if ($sufixo != "e_")
							include "inc/migalha.php";
						else
							include "inc/migalha_editora.php";
					?>
                </span>

                <hr>

                <div id="pagina-extra">
					<h1><?=$titulo?></h1>

                    <?=$texto?>
                </div>

<?php
	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>