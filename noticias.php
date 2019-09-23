<?php
	include "inicializacao.php";

	$raiz = "";

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	//pegando as noticias
	$xml_noticias = simplexml_load_file($local_url . $local_site . "antetitulo/xml/gerais");
?>

                <!-- migalha -->
                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a class="bold">Notícias</a>
                </span>

                <hr>

                <div class="title">
                    <h1>Notícias</h1>
                </div>

                <p>Veja todas as notícias relacionadas à EDUFRN.</p>

<?
	$verifica = $xml_noticias->item[0];
	if ($verifica) {
?>
                <ul id="listagem">
<?
		//lista as 30 primeiras
		$cont = 0;
		foreach ( $xml_noticias->item as $item ) {
			if ($cont < 30) {
				//dados das noticias
				$data = strftime("%d.%m.%Y", strtotime($item->data));
				$titulo = $item->titulo;
				$id = $item->id;
?>
                    <li>
                        <span class="data-noticia"><?=$data?></span>
                        <a href="noticia.php?id=<?=$id?>"><?=$titulo?></a>
                    </li>
<?
				$cont++;
			} else
				break;
		}
?>
				</ul>
<?
	} else {
?>
				<br />
                <p><strong>Nenhuma notícia foi encontrada no momento.</strong></p>
<?
	}
?>

<?php
	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>