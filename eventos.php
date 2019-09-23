<?php
	include "inicializacao.php";

	$raiz = "";

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	//pegando os eventos
	$xml_eventos = simplexml_load_file($local_url . $local_site . "evento/xml/");
?>

                <!-- migalha -->
                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a class="bold">Eventos</a>
                </span>

                <hr>

                <div class="title">
                    <h1>Eventos</h1>
                </div>

                <p>Fique por dentro das atividades e eventos realizados pela editora!</p>
<?
	$verifica = $xml_eventos->item[0]->id; //variavel de verificacao

	if ($verifica) {
?>	
                <ul class="listagem-eventos">
<?
		$cont = 1;
		foreach( $xml_eventos->item as $item ) {
			if ($cont % 2 == 0)
				$classe = "cor2";
			else
				$classe = "cor1";
	
			//dados dos eventos
			$id = $item->id;
			$dataI = strftime("%d/%m", strtotime($item->dataInicio));
			$dataF = strftime("%d/%m", strtotime($item->dataFim));

			if ($dataF != $dataI)
				$periodo = $dataI." a ".$dataF;
			else
				$periodo = $dataI;

			$titulo = $item->titulo;
?>
                    <a href="evento.php?id=<?=$id?>">
                        <li class="<?=$classe?>">
                            <span class="data"><?=$periodo?></span>
                            <span class="desc"><?=$titulo?></span>
                        </li>
                    </a>
<?
			$cont++;
		}
?>
				</ul>
<?
	} else {
?>
                <p>
                    <br />
                    <strong>Nenhum evento foi encontrado no momento.</strong>
                </p>
<?php
	}

	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>