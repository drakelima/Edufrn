<?php
	include "inicializacao.php";

	$raiz = "";

	//verifica se existe o ID da noticia
	if (isset($_GET['id']) or $_GET['id'] != '')
		$id = $_GET['id'];
	else {
		header("location: catalogos.php");
		exit;
	}

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	//pega os dados do catalogo
	foreach (@simplexml_load_file($local_url . $local_site . "noticia/xml/".$id)->item as $item) {
		$id = $item->id;
		$data = strftime("%d.%m.%Y", strtotime($item->data));
		$titulo = $item->titulo;
		$descricao = $item->descricao;
		$imagem = $item->imagem;
		$legenda = $item->legenda;
		$fonte = $item->fonte;

		if ($imagem != 'null' and $imagem != NULL)
			$area_img = $imagem;
		else
			$area_img = '';

		if ($legenda != 'null' and $legenda != NULL) {
			if ($fonte != 'null' and $fonte != NULL)
				$texto_legenda = $legenda . "<br>(Foto: " . $fonte . ")";
			else
				$texto_legenda = $legenda;

			$temp_leg = $texto_legenda;
		} else {
			$texto_legenda = '';
			$temp_leg = $titulo;
		}

		$titulo_a = $item->tituloAnexo;
		$anexo = $item->anexo;

		if ($anexo != 'null' and $anexo != NULL) {
			if ($titulo_a != 'null' and $titulo_a != NULL)
				$texto_anexo = $titulo_a;
			else
				$texto_anexo = 'Clique aqui para baixar!';
		} else
			$texto_anexo = '';
	}

	//pegando o conteudo da pagina - como comprar?
	$url_pag = $local_url . $local_site . "secao/xml/como_comprar";

	foreach (@simplexml_load_file($url_pag)->item as $item) {
		$titulo_pag = $item->titulo;
		$texto_pag = $item->descricao;
	}
?>

                <!-- migalha -->
                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a href="catalogos.php">Catálogos</a>
                    >
                    <a class="bold"><?=$titulo?></a>
                </span>

                <hr />

                <div class="title">
                    <h1><?=$titulo?></h1>				
                </div>

                <div id="corpo-noticia" class="altura">

                    <div id="cover" class="aumenta">
<?
	if ($area_img != '') {
?>
						<a href="<?=$imagem?>" title="<?=$temp_leg?>">
                            <img src="<?=$area_img?>" title="Clique aqui para ampliar a imagem!" />
						</a>
<?
				} else {
?>
						<img src="img/book-cover-padrao.png" alt="<?=$titulo?>">
<?
				}
?>
                    </div>

                    <p><?=nl2br($descricao)?></p>

<?
	if ($texto_anexo != "") {
?>
					<p>
                    	<strong>Arquivo em anexo:</strong> <a href="<?=$anexo?>" title="Baixe aqui o arquivo!" target="_blank"><?=$texto_anexo?></a>
                    </p>
<?
	}
?>
				</div>

                <div id="teste">
                    <a class="como_comprar" href="catalogo_comprar.php?id=<?=$id?>">Desejo comprar!</a>
                    <a class="como_comprar mostra_box"><?=$titulo_pag?></a>
                </div>

                <div id="box_como_comprar">
                    <?=$texto_pag?>
                </div>

                <hr>

                <div id="info-noticias">
                    <span id="compartilhar">
                        <? include "inc/compartilhar.php"; ?>
                    </span>
                </div>
                

<?php
	include "inc/voltar.php";
	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>