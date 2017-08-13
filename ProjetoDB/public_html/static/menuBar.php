<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">Eclipse Eventos</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <!--
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evento
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="paginas/eventos.php">Gerenciar Evento</a></li>
                        <li><a href="paginas/add.php">Novo Evento</a></li>
                    </ul>

                </li>
            </ul>
-->


<ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $_SESSION['nome']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!-- <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li> -->
            <li><a href="?deslogar"><i class="fa fa-sign-in" aria-hidden="true"></i> Sair</a></li>
          </ul>
        </li>
      </ul>

        </div>
    </div>
</nav>