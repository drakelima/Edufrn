<?php
	include "inicializacao.php";

	$raiz = "";

	if (isset($_GET['id']) and $_GET['id'] != '')
		$id = $_GET['id'];
	else {
		header("location: documentos.php");
		exit;
	}

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	//setando o xml os documentos da categoria selecionada
	$xml_documento = simplexml_load_file($local_url . $local_site . "documento/xml/".$id);

	$verifica = $xml_documento->item[0];
	if ($verifica)
		$categoria = $verifica->tituloPai;
	else
		$categoria = "Categoria vazia";
?>

                <!-- migalha -->

                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a href="documentos.php">Documentos</a>
                    >
                    <a class="bold"><?=$categoria?></a>
                </span>

                <hr>

                <div class="title">
                    <h1>Documentos</h1>
                </div>

                <p>Veja abaixo os documentos disponíveis para baixar, da categoria escolhida.</p>
<?
	if ($verifica) {
?>
				<div class="subcategoria">
                    <?=$categoria?>
                </div>

				<ul id="listagem">
<?
		foreach ( $xml_documento->item as $link ) {
			//dados das categorias/documentos
			$id_sub = $link->id;
			$titulo_sub = $link->titulo;
			$arquivo_sub = $link->linkArquivo;

			if ($arquivo_sub == 'null' || $arquivo_sub == NULL) {
?>
					<li class="folder">
                        <a title="<?=$titulo_sub?>" href="documento.php?id=<?=$id_sub?>"><?=$titulo_sub?></a>
					
<?
			} else {
?>
					<li class="file">
                    	<a title="<?=$titulo_sub?>" href="<?=$arquivo_sub?>" target="_blank"><?=$titulo_sub?></a>
<?
			}
?>
					</li>
<?
		}
?>	
                </ul>

<?
	} else {
?>
				<br />
				<p><strong>Nenhum documento foi encontrado nesta categoria.</strong></p>

<?php
	}

	include "inc/voltar.php";
	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>