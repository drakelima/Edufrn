<?php
	include "inicializacao.php";

	$raiz = "";

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	//pegando os catalogos
	$xml_catalogos = simplexml_load_file($local_url . $local_site . "antetitulo/xml/catalogos");
?>

                <!-- migalha -->
                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a class="bold">Catálogos</a>
                </span>

                <hr />

                <!--
                <hr id="migalha-catalogo">

                <div id="searchBox">						
                    <form name="search" method="post" action="busca.php">	
                        <input id="searchField" name="searchField" type="text" value="Buscar catálogo"> 
                        <input id="searchSubmit" type="submit" onClick="" value="" alt="Buscar" title="Efetuar busca">					
                        <div id="filtro">
                            <input type="radio" name="filtro" value="titulo" checked="true">Título &nbsp;&nbsp;
                            <input type="radio" name="filtro" value="tag"><span>Palavra-chave</span>
                        </div>	
                    </form>
                </div>
                 -->

                <div class="title">
                    <h1>Catálogos</h1>
                </div>
<?
	$verifica = $xml_catalogos->item[0];
	if ($verifica) {
?>
                <h2 class="bold underline">Lançamentos</h2>

                <div class="livros">
<?
		//lista os 30 primeiros
		$cont = 0;
		foreach ( $xml_catalogos->item as $item ) {
			if ($cont < 30) {
				//dados dos catalogos
				$titulo = $item->titulo;
				$id = $item->id;
				$imagem = $item->imagem;

				if (strlen($titulo) > 80)
					$tit_cat = substr($titulo, 0, 77)."...";
				else
					$tit_cat = $titulo;

				if ($cont == 6) {
?>
                    </div>

                    <hr />

                    <h2 class="bold underline">Outros catálogos</h2>

                    <div class="livros">
<?
				}
?>
					<a href="catalogo.php?id=<?=$id?>">
						<div class="livro">
<?
				if (($imagem != 'null' and $imagem != NULL)) {
?>
                            <img src="<?=$imagem?>" alt="<?=$titulo?>" />
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
?>
				</div>
<?
	} else {
?>
                <p><strong>Nenhum catálogo foi encontrado no momento.</strong></p>
<?php
	}

	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>