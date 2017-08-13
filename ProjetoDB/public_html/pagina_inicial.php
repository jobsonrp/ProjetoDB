<?php
    session_start();
    if(!isset($_SESSION['UserLog'])){
        header("Location: index.php");  
        session_destroy();
    }
    if (isset($_GET['deslogar'])) {
        session_destroy();
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Eclipse Eventos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/style.css">
</head>
<body>
<?php include 'static/menuBar.php' ?>

<main class="container">
<h1>Administração</h1>
<hr/>   
<div class="row">


    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="paginas/add.php" class="btn btn-primary">
            <div class="row">
                <div class="col-xs-12 text-center">
            
                    <i class="fa fa-calendar-plus-o fa-5x" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Novo Evento</p>
                </div>
            </div>
        </a>
    </div>


    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="paginas/eventos.php" class="btn btn-warning">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-calendar-check-o  fa-5x" aria-hidden="true"></i>

                </div>
                <div class="col-xs-12 text-center">
                    <p>Evento</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="#" class="btn btn-success">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-tree fa-5x" aria-hidden="true"></i>

                </div>
                <div class="col-xs-12 text-center">
                    <p>Novo Ambiente</p>
                </div>
            </div>
        </a>
    </div>



</div>
</main> 
    <?php include 'static/footer.php'; ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>