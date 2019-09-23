<?php
	include "inicializacao.php";

	$raiz = "";

	include "inc/cabecalho.php";
	include "inc/estilo_slider.php";
	include "inc/topo.php";
	include "inc/conteudo.php";

	//pegando as noticias
	$xml_noticias = @simplexml_load_file($local_url . $local_site . "antetitulo/xml/gerais");

	//pegando os catalogos
	$xml_catalogos = @simplexml_load_file($local_url . $local_site . "antetitulo/xml/catalogos");
?>

                <!-- Slideshow -->
                <div id="news">
                	<div id="slides">
                        <div id="prev">
                        	<a href="#" class="prev"><img src="img/arrow-prev.gif"  alt="Arrow Prev"></a>
                        </div>

                        <div class="slides_container">

<?
	//verifica se ha noticias cadastradas
	$verifica = $xml_noticias->item[0];
	if ($verifica) {

		//lista as 5 primeiras
		$cont = 0;
		foreach ( $xml_noticias->item as $item ) {
			if ($cont < 5) {
				//dados das noticias
				$data = strftime("%d.%m.%Y", strtotime($item->data));
				$titulo = $item->titulo;
				$id = $item->id;
				$imagem = $item->imagem;

				if ($cont == 0)
					$classe = 'style="bottom:0"';
				else
					$classe = '';

?>
                            <div class="slide">
                            	<a href="noticia.php?id=<?=$id?>">
<?
				if (($imagem != 'null') and ($imagem != NULL)) {
?>
                                	<img src="<?=$imagem?>" alt="<?=$titulo?>">
                                
<?
				} else {
?>
									<img src="img/slide_padrao.jpg" alt="<?=$titulo?>">
<?
				}
?>
								</a>
                                <div class="caption" <?=$classe?>>
                                    <p><b><?=$data?></b> - <?=$titulo?></p>
                                </div>
                            </div>
<?
				$cont++;
			} else
				break;
		}
	} else {
?>
							<div class="slide">
                                <a><img src="img/slide_padrao.jpg"></a>
                                <div class="caption" style="bottom:0;">
                                    <p>Nenhuma notícia foi encontrada no momento!</p>
                                </div>
                            </div>
<?
	}
?>
                        </div>

                        <div id="next">
                        	<a href="#" class="next"><img src="img/arrow-next.gif"  alt="Arrow Next"></a>
                        </div>
                    </div>
            	</div>

                <h2 class="dark-blue bold"> 			
                    Lançamentos 
                </h2>

                <div id="releases">
<?
	//verifica se ha catalogos cadastrados
	$verifica_cat = $xml_catalogos->item[0];
	if ($verifica_cat) {

		//lista os 4 primeiros
		$cont = 0;
		foreach ( $xml_catalogos->item as $item ) {
			if ($cont < 4) {
				//dados dos catalogos
				$titulo = $item->titulo;
				$id = $item->id;
				$imagem = $item->imagem;
				
				if (strlen($titulo) > 80)
					$tit_cat = substr($titulo, 0, 77)."...";
				else
					$tit_cat = $titulo;
?>
                    <a href="catalogo.php?id=<?=$id?>">
                        <div class="livro">
<?
				if (($imagem != 'null') and ($imagem != NULL)) {
?>
                            <img src="<?=$imagem?>" alt="<?=$titulo?>">
<?
				} else {
?>
							<img src="img/book-cover-padrao.png" alt="<?=$titulo?>">
<?
				}
?>
                            <p class="bold"><?=$tit_cat?></p>
                        </div>
                    </a>
<?
				$cont++;
			} else
				break;
		}
	} else {
?>
					<p>Nenhum catálogo foi encontrado no momento.</p>
<?
	}
?>
                </div>

<?php
	include "inc/conteudo_fim.php";
	include "inc/rodape.php";
?>