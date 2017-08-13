<?php 
    require "../controle/conf.php";
    session_start();

    if(!isset($_SESSION['UserLog'])){
        header("Location: ../index.php");  
        session_destroy();
    }

    $codigos =  $_GET['codigo'];
    date_default_timezone_set('UTC');

    $sql = "SELECT * FROM evento Natural join tipoevento Natural join ambiente WHERE codigoEvent=".$codigos;
    $stmt = Conexao::conectar()->query($sql);
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
  <li class="breadcrumb-item active">Editar Evento</li>
</ol>


<h2>Editar Evento</h2>

<form action="" method="post">

  <hr />
  <div class="row">


    <div class="form-group col-md-12">
      <input type="hidden" class="form-control" name="codigoEvent" value="<?php echo $result->codigoEvent;?>" >
    </div>

    <div class="form-group col-md-7">
      <label for="name">Nome  do Evento </label>
      <input type="text" class="form-control" name="Enome" value="<?php echo $result->Enome;?>" >
    </div>



    <div class="form-group col-md-3">
      <label for="campo2">Descrição do Evento</label>
      <input type="text" class="form-control" name="edescricao" value="<?php echo $result->Edescricao;?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data do Evento</label>
      <input type="date" class="form-control" name="dataevento" value="<?php echo $result->dataEvento;?>">
    </div>

    <div class="form-group col-md-12">
      <label for="campo3">Tipo do Evento</label>
      <input type="text" class="form-control" name="tipoevento" value="<?php echo $result->descricao;?>" >
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Ambiente </label>
      <input type="text" class="form-control" name="ambiente" value="<?php echo $result->codigoAmbiente;?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Tipo de Evento</label>
      <input type="text" class="form-control" name="descricao" value="<?php echo $result->descricao;?>">
    </div>

  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-sm  btn-primary">Salvar</button>
      <a href="eventos.php" class="btn btn-sm  btn-default">Cancelar</a>
    </div>
  </div>

</form>

</main>
    <?php include '../static/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>