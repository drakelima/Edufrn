/*
*	Arquivo de validacao em javascript
*	Autor(a): Andressa Kroeff Pires
*	Contato: andressa@info.ufrn.br
*	Data de criacao: 12/11/2012
*/

// --- Campo com label automatico --- //
function limpaCampo(item, msg) {
	var cmp = item;
	var txt = msg;

	if (cmp.value == txt) {
		cmp.value = "";
	}
}

function preencheCampo(item, msg) {
	var cmp = item;
	var txt = msg;

	if (cmp.value == "") {
		cmp.value = txt;
	}
}
// ---------------------------------- //

// Verifica campos da busca
function verifBusca() {
	var cha = $("#chave").val();

	if (cha != "Palavra-chave" && cha != "") {
		$('#search').submit();
	} else
		alert('Informe a palavra-chave para gerar a busca!');
}

// Valida e-mail
function validaEmail(item) {
	var email = item.value;
	var erro = "Informe um e-mail correto!";

	if (email != '') {
		//Expressao Regular utilizada para validar o endereço de email
		var expressaoRegular = /^[a-zA-Z0-9_\.-]{2,}@([A-Za-z0-9_-]{2,}\.)+[A-Za-z]{2,4}$/;
		if ( !expressaoRegular.test(email) ) {
			alert(erro);
			item.value = "";
			return false;
		}
		return true;
	}
}

// Verifica campos do contato
function verifContato() {
	var nom = $("#cp_nome").val();
	var ema = $("#cp_email").val();
	var are = $("#cp_area").val();
	var ass = $("#cp_assunto").val();
	var men = $("#cp_mensagem").val();

	if (nom == "" || ema == "")
		alert('Informe os seus dados!');
	else if (are == "")
			alert('Escolha o destino da sua mensagem!');
		else if (ass == "")
				alert('Informe o assunto que deseja abordar!');
			else if (men == "")
					alert('Informe a mensagem!');
				else {
					e = document.getElementById("cp_email");

					if (validaEmail(e) != false) {
						$('#contato').submit();
					}
				}
}