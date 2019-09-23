<?php
	include "inicializacao.php";

	$raiz = "";

	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/conteudo.php";

	if (isset($_POST['cp_nome'])) {

		// Pegar dados do $_POST
		$nome = $_POST['cp_nome'];

		$destino = $_POST['cp_area']; // E-mail para o envio

		$assunto = $_POST['cp_assunto'];
		$email = $_POST['cp_email'];

		$mensagem = "<strong>Assunto: ".$assunto."</strong><br /><br />".$_POST['cp_mensagem'];

		$assunto_externo = "[Editora da UFRN] Contato do site";

		// Enviar o e-mail
		if (mail($destino, $assunto_externo, $mensagem, "Content-type: text/html; charset=utf-8\r\nFrom: $nome <$email>\r\n")) {
			header("Location: contato.php?msg=1");
		} else {
			header("Location: contato.php?msg=2");
		}

		exit;
	}
?>

                <!-- migalha -->
                <span class="mapa-site">
                     <a href="index.php">Início</a>
                     >
                     <a class="bold">Contato</a>
                </span>
                <hr>
                <div class="title">
                    <h1>Fale conosco!</h1>
                </div>

                <p>Se deseja entrar em contato conosco para obter informações adicionais, esclarecer alguma dúvida ou fazer sugestões, preencha o formulário abaixo.</p>

<?
	if (isset($_GET["msg"]) and ($_GET["msg"] > 0 and $_GET["msg"] < 3)) {

		//mensagens de envio
		$texto = array(
			1 => 'Mensagem enviada com sucesso!',
			2 => 'Erro ao enviar a mensagem. Por favor tente mais tarde!'
		);
?>
                <div id="mensagemEnvio">
                    <b>*</b> <?=$texto[$_GET["msg"]]?>
                </div>
<?
	}
?>

                <!--<form action="#" id="contato">-->
                <form id="contato" name="contato" method="post" action="contato.php">
                    <fieldset id="grupo1">
                        <label>
                            <p>Nome:</p>
                            <input type="text" id="cp_nome" name="cp_nome" value="" />
                        </label>
                        <label>
                            <p>Área de interesse:</p>
                            <select name="cp_area" id="cp_area">
                              <option value=""></option>
                              <option value="secretaria@editora.ufrn.br">Secretaria</option>
                              <option value="editoracao@editora.ufrn.br">Editoração</option>
                              <option value="direcao@editora.ufrn.br">Direção</option>
                              <option value="compras@editora.ufrn.br">Compras</option>
                              <option value="vendas@editora.ufrn.br">Vendas</option>
                              <option value="<?=$email_editora?>">Outro</option>
                            </select>
                        </label>
                    </fieldset>
                    <fieldset id="grupo2">
                        <label>
                            <p>Email:</p>
                            <input type="text" id="cp_email" name="cp_email" value="" onchange="validaEmail(this)" />
                        </label>
                        <label>
                            <p>Assunto:</p>
                            <input type="text" id="cp_assunto" name="cp_assunto" value="" />
                        </label>
                    </fieldset>
                    <fieldset id="mensagem">
                        <label for="message"><p>Mensagem:</p></label>
                        <textarea id="cp_mensagem" name="cp_mensagem" rows="0" cols="0"></textarea>

						<!-- botoes -->
                        <input type="button" value="Enviar" onclick="verifContato()" />
                        <input type="reset" value="Limpar" />
                    </fieldset>
                </form>

<?php
	include "inc/lateral_contato.php";
    include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>