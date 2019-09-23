<?php
	include "inicializacao.php";

	$raiz = "";

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo_interna.php";

	if (!isset($_POST['chave'])) {

		header("location: index.php");
		exit;

	} else {
		$chave = $_POST['chave'];
?>
        <!-- Google search -->
        <script src="//www.google.com/jsapi" type="text/javascript"></script>
        <script type="text/javascript"> 
            google.load('search', '1', {language : 'pt-BR', style : google.loader.themes.GREENSKY});
            google.setOnLoadCallback(function() {
                var customSearchControl = new google.search.CustomSearchControl('003075121585300769612:n70epbosfxe');
                customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
                customSearchControl.draw('cse');
				customSearchControl.execute('<?=$chave?>');
            }, true);
        </script>

        <!-- Estilo busca (google) -->
        <link rel="stylesheet" href="<?=$raiz?>css/estilo_busca.css" type="text/css" />
<?
	}
?>
                    <!-- 
                    conteúdo principal
                    -->
                <section id="main-content-full">
            <span class="mapa-site">
                 <a href="index.html">Início</a>
                 >
                 <a class="bold">Busca </a>
            </span>

                <!-- migalha -->
                <hr>

            <div class="title">
                <h1>Busca geral da Edufrn</h1>
            </div>
            
            <div id="cse" class="cse">Carregando a busca</div>          

            
        </section>
        <a href="">
            <h2 class="voltar">Voltar</h2>
        </a>

                    <!-- 
                    fim do conteudo principal
                    -->

<?php
	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>