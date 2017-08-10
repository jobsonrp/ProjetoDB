<?php
    require "../controle/conf.php";
    $codigos =  $_GET['codigo'];
    date_default_timezone_set('UTC');

    $stmt = Crud::busca('evento', $codigos);
    $exite = $stmt->rowCount();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Eclipse Eventos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>

<main class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="eventos.php">Eventos</a></li>
        <li class="breadcrumb-item active">Data</li>
    </ol>
    
    <?php  if($exite>0): ?>
    <h2>Evento Codigo: <?php echo $codigos; ?></h2>
    <hr>

    <dl class="dl-horizontal">
        <dt>Nome do Evento:</dt>
        <dd><?php echo $result->Enome; ?></dd>
        <dt>Descrição do Evento:</dt>
        <dd><?php echo $result->Edescricao; ?></dd>
        <dt>Data do Evento:</dt>
        <dd><?php echo date("d/m/Y", strtotime($result->dataEvento)); ?></dd>
    </dl>

    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="edit.php?codigo=<?php echo $result->codigo; ?>" class="btn btn-primary">Editar</a>
            <a href="eventos.php" class="btn btn-default">Voltar</a>
        </div>
    </div>

    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            <p><strong>ERRO:</strong> Não Exite registro!</p>
        </div>
    <?php endif; ?>

</main>
    <?php include '../static/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>