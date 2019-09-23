<?php
	include "inicializacao.php";

	$raiz = "";

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	//setando o xml dos documentos (na raiz)
	$xml_documentos = simplexml_load_file($local_url . $local_site . "documento/xml/");
?>

                <!-- migalha -->
                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a class="bold">Documentos</a>
                </span>

                <hr>

                <div class="title">
                    <h1>Documentos</h1>
                </div>

                <p>Veja abaixo os documentos disponíveis para você baixar.</p>
<?
	$verifica = $xml_documentos->item[0];
	if ($verifica) {
?>
                <ul id="listagem">
<?
		foreach ( $xml_documentos->item as $link ) {
			//dados das categorias/documentos
			$id = $link->id;
			$titulo_link = $link->titulo;
			$arquivo = $link->linkArquivo;
?>
                    <li>

<?
			if ($arquivo == 'null' || $arquivo == NULL) {
?>
						<a title="<?=$titulo_link?>" href="documento.php?id=<?=$id?>"><?=$titulo_link?></a>
<?
			} else {
?>
                        <a title="<?=$titulo_link?>" href="<?=$arquivo?>" target="_blank"><?=$titulo_link?></a>
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
                <p><strong>Nenhum documento foi encontrado no momento.</strong></p>
<?php
	}

	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>