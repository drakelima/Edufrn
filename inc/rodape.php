
    <!-- 
    FOOTER: Informacoes adicionais, logo, copyright...
    -->
    <footer>
        <section id="info">
            <div class="wrap">
                <!-- 
                endereco e contato
                -->
                <div id="bottom-contato">
                    <header>
                        <h2>editora da ufrn</h2>
                    </header>
                    <p>
                        Campus Universitário UFRN – Lagoa Nova <br>
                        CEP 59.072-970 |  Natal/RN –Brasil <br>
                        Fone: 84 3215-3236 / Fax: 84 3215-3206 <br>
                        Email: <a href="mailto:<?=$email_editora?>"><?=$email_editora?></a>
                    </p>	
                </div>	

                <!-- 
                navegacao rodape
                -->
                <div id="bottom-nav">
                    <header>
                        <h2>navegue aqui</h2>
                    </header>
                    <ul>
                        <li><a href="pagina.php?a=e_historia">A editora</a></li>
                        <li><a href="catalogos.php">Catálogo</a></li>
                        <li><a href="pagina.php?a=pub_digitais">Públicações Digitais </a></li>
                        <li><a href="pagina.php?a=como_publicar">Como publicar?</a></li>
                        <li><a href="noticias.php">Notícias</a></li>
                        <li><a href="eventos.php">Eventos</a></li>
                        <li><a href="documentos.php">Documentos</a></li>
                        <li><a href="contato.php">Contato</a></li>
                    </ul>
                </div>

                <!-- 
                mídias sociais
                -->
                <div id="bottom-social">
                    <span class = "titulo_rodape">
                        <h2>redes sociais</h2>
                    </span>
                    
                    <a class = "img_social" href = "#">
						<img src = "img/img_facebook.png">
					</a>
					<a class = "img_social" href = "#">
						<img src = "img/img_twiter.png">
					</a>
					<a class = "img_social" href = "#">
						<img src = "img/img_rss.png">
					</a>
                    
                </div>
            </div>
        </section>
    
        <section id="bottom">
            <div class="wrap">
                <a href="http://www.ufrn.br/" target="blank"><img src="<?=$raiz?>img/logo_ufrn.png" alt="UFRN" id="logo_ufrn"></a>
                
    
                <a href="https://www.info.ufrn.br/" target="blank"><img src="<?=$raiz?>img/logo_sinfo.png" alt="SINFO" id="logo_sinfo"></a>
    
                <p>2014 &copy; EDUFRN - Todos os direitos reservados. UFRN - Universidade Federal do Rio Grande do Norte</p>
                
            </div>
        </section>
    </footer>
    <!-- 
    FIM FOOTER
    -->

    <? 	include "javascript.php"; ?>
</body>
</html>