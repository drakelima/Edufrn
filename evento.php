<?php
	include "inicializacao.php";

	$raiz = "";

	if (isset($_GET['id']) or $_GET['id'] != '')
		$id = $_GET['id'];
	else {
		header("location: eventos.php");
		exit;
	}

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	foreach (simplexml_load_file($local_url . $local_site . "evento/xml/".$id)->item as $item) {
		$titulo = $item->titulo;
		$descricao = $item->descricao;
		$dataI = strftime("%d/%m/%Y", strtotime($item->dataInicio));
		$dataF = strftime("%d/%m/%Y", strtotime($item->dataFim));

		if ($dataF != $dataI)
			$periodo = $dataI." a ".$dataF;
		else
			$periodo = $dataI;

		$local = $item->local;
		if ($local == '')
			$local = '-';

		$email = $item->email;

		$telefone = $item->telefone;
		if ($telefone == '')
			$telefone = '-';

		$site = $item->site;
		$links = $item->outrasUrls;
		if ($links == '')
			$links = '-';

		$imagem = $item->imagem;

		$titulo_a = $item->nomeArquivo;
		$arquivo = $item->arquivo;

		if ($arquivo != 'null' and $arquivo != NULL) {
			if ($titulo_a != 'null' and $titulo_a != NULL)
				$texto_arquivo = $titulo_a;
			else
				$texto_arquivo = 'Clique aqui para baixar!';
		} else
			$texto_arquivo = '';
	}
?>

                <!-- migalha -->
                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a href="eventos.php">Eventos</a>
                    >
				 	<a class="bold"><?=$titulo?></a>
                </span>

                <hr>

                <div class="title">
                    <h1><?=$titulo?></h1>
                </div>

                <div id="evento-info">
					<ul>
						<li>
							Período: 
							<span><?=$periodo?></span>
						</li>
						<li>
							Local: 
							<span><?=$local?></span>
						</li>
						<li>
							Telefone(s):
							<span><?=$telefone?></span>
						</li>
						<li>
							E-mail:
<?
	if ($email != '') {
?>
                            <a href="mailto:<?=$email?>"><?=$email?></a>
<?
	} else echo "-";
?>
						</li>
						<li>
							Site:
<?
	if ($site != '') {
?>
							<a href="<?=$site?>" target="_blank"><?=$site?></a>
<?
	} else echo "-";
?>
						</li>

						<li>
							Arquivo em anexo:
<?
	if ($texto_arquivo != '') {
?>
							<a href="<?=$arquivo?>" title="Baixe aqui o arquivo!" target="_blank"><?=$texto_arquivo?></a>
<?
	} else echo "-";
?>
						</li>
						<li class="last">
							Outras URL's:
							<?=$links?>
						</li>
					</ul>
				</div>

				<div id="corpo-evento">
<?
	if ($imagem != 'null') {
?>
                	<div id="img-evento">
                        <div class="aumenta">
                            <a href="<?=$imagem?>" title="<?=$titulo?>">
                                <img src="<?=$imagem?>" title="Clique para ampliar a imagem!" />
                            </a>
                        </div>
                    </div>
<?
	}
?>
                    <p><?=nl2br($descricao)?></p>
                </div>

<?php
	include "inc/voltar.php";
	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>