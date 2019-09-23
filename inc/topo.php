</head>
<body>

    <!--
    HEADER: logo, busca, menu
    -->
    <header>
        <div id="site-header">
            <!-- Centraliza conteudo -->
            <div class="wrap">
                <a href="index.php">
                    <h1 id="logo">EDUFRN</h1>				
                </a>

                <!-- Icones rapidos e busca -->
                <form id="search" name="search" action="busca.php" method="post">
                    <a href="index.php"><img src="img/home.png" alt="Início" /></a>
                    <a href="contato.php"><img src="img/mail.png" alt="Contate-nos"></a>

                    <div id="fields">
                        <input type="text" class="searchField" id="chave" name="chave" onClick="limpaCampo(this, 'Palavra-chave')" onBlur="preencheCampo(this, 'Palavra-chave')" value="Palavra-chave" />
                        <input type="button" class="searchSubmit" alt="Buscar" onClick="verifBusca()" title="Efetuar busca" value="" />
                    </div>
                </form>              
            </div>
        </div>

    </header>
    <!--
    FIM HEADER
    -->

 <!-- Navegacao principal - Menu -->
<? include "menu.php"; ?>