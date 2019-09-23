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
	foreach (simplexml_load_file($local_url . $local_site . "noticia/xml/".$id)->item as $item) {
		$id = $item->id;
		$titulo = $item->titulo;
	}
?>

                <!-- migalha -->
                <span class="mapa-site">
                    <a href="index.php">Início</a>
                    >
                    <a href="catalogos.php">Catálogos</a>
                    >
                    <a class="bold">Desejo comprar</a>
                </span>

                <hr />

                <div class="title">
                    <h1>Desejo comprar!</h1>				
                </div>

                <p>
                	Você está comprando o catálogo "<strong><?=$titulo?></strong>".<br />
	                Para confirmar o seu interesse, preencha o formulário abaixo com as informações de compra e entrega.
				</p>

                <form action="#" id="compra"> 
                    <p class="bold">Dados Pessoais</p>
    
                    <fieldset>		
         
                        <label>		            	
                            <p>Nome completo:</p>
                            <input type="text" name="nome" value="" class="full"/> 
                        </label>	           
                        
                    </fieldset>
    
                    <fieldset class="terco bottom">
                        <label >		            	
                            <p>Data de nascimento:</p>
                            <input type="text" name="nome" value="" class="terco"/> 
                        </label>
    
                    </fieldset>
    
                    <fieldset class="terco left right bottom">
    
                        <label>		            	
                            <p>CPF:</p>
                            <input type="text" name="nome" value="" class="terco"/> 
                        </label>
    
                    </fieldset>
    
                    <fieldset class="terco bottom">
                        
                        <label >		            	
                            <p>E-mail:</p>
                            <input type="text" name="nome" value="" class="terco"/> 
                        </label>
    
                    </fieldset>
    
                    <p class="bold">Endereço</p>
    
                    <fieldset>		
         
                        <label>		            	
                            <p>Logradouro:</p>
                            <input type="text" name="nome" value="" class="full"/> 
                        </label>	           
                        
                    </fieldset>
    
                    
                    <fieldset class="quarto bottom">
                        
                        <label>		            	
                            <p>CEP:</p>
                            <input type="text" name="nome" value="" class="terco"/> 
                        </label>
    
                    </fieldset>
    
                    <fieldset class="quarto bottom left right">
                        
                        <label>		            	
                            <p>Bairro:</p>
                            <input type="text" name="nome" value="" class="terco"/> 
                        </label>
    
                    </fieldset>
    
                    <fieldset class="quarto bottom right">
                        
                        <label>		            	
                            <p>Cidade:</p>
                            <input type="text" name="nome" value="" class="terco"/> 
                        </label>
    
                    </fieldset>
    
                    <fieldset class="quarto bottom">
                        
                        <label>		            	
                            <p>Estado:</p>
                            <select name="estado">
                                <option value=""></option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </label>
    
                    </fieldset>
    
    
    
                    <p class="bold">Recebimento</p>
    
                    <fieldset class="quarto bottom right">
                        
                        <label>		            	
                            <p>Quantidade:</p>
                            <input type="text" name="nome" value="" class="terco"/> 
                        </label>
    
                    </fieldset>
    
                    <fieldset class="terco bottom">
                        
                        <label>		            	
                            <p>Forma de recebimento:</p>
                            <select>
                              <option value=""></option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                            </select>
                        </label>
    
                    </fieldset>
     
                    <fieldset id="mensagem">
                 
                        <label for="message"><p>Observações:</p></label> 
                        <textarea name="message" rows="0" cols="0"></textarea> 
                 
                        <input type="submit" value="Enviar" name="submit" class="submit" />		
    
                        <input type="submit" value="Limpar" name="submit" class="submit" />
                 
                    </fieldset><!-- end user-message -->
     
                </form>

                <p>
                	<a href="javascript:history.back()" class="bold dark-blue">Clique aqui</a>, caso não deseje prosseguir com essa compra e voltar para a página anterior.
				</p>

<?php
	include "inc/conteudo_interna_fim.php";
	include "inc/rodape.php";
?>