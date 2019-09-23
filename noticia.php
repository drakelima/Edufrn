<?php
	include "inicializacao.php";

	$raiz = "";

	//verifica se existe o ID da noticia
	if (isset($_GET['id']) or $_GET['id'] != '')
		$id = $_GET['id'];
	else {
		header("location: noticias.php");
		exit;
	}

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	//pega os dados da notícia
	foreach (simplexml_load_file($local_url . $local_site . "noticia/xml/".$id)->item as $item) {
		$data = strftime("%d.%m.%Y", strtotime($item->data));
		$titulo = $item->titulo;
		$descricao = $item->descricao;
		$imagem = $item->imagem;
		$imagem_p = $item->imagemp;
		$legenda = $item->legenda;
		$fonte = $item->fonte;

		if ($imagem_p != 'null' and $imagem_p != NULL)
			$area_img = $imagem_p;
		else if ($imagem != 'null' and $imagem != NULL)
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
?>

                <!-- migalha -->
                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a href="noticias.php">Notícias</a>
                    >
				 	<a class="bold"><?=$titulo?></a>
                </span>

                <hr>

                <div class="title">
                    <h1><?=$titulo?></h1>
					<p>Publicado em 27.08.2012</p>
                </div>
			

                <div id="corpo-noticia">
                    
<?
	if ($area_img != '') {
?>
                    <div id="img-noticia">
                        <div class="aumenta">
                            <a href="<?=$imagem?>" title="<?=$temp_leg?>">
                                <img src="<?=$area_img?>" title="Clique aqui para ampliar a imagem!" />
                            </a>
                        </div>
<?
		if ($texto_legenda != '') {
?>
                        <div id="legenda">
                            <?=$texto_legenda?>
                        </div>
<?
		}
?>
                    </div>
<?
	}
?>
                    
                    <p><?=nl2br($descricao)?></p>

<?
	if ($texto_anexo != "") {
?>
                    <span id="anexo">Arquivo em anexo: <a href="<?=$anexo?>" title="Baixe aqui o arquivo!" target="_blank"><?=$texto_anexo?></a></span>
<?
	}
?>
				</div>

<?php
	include "inc/voltar.php";
	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>