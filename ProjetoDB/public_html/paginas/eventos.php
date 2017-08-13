<?php 
    require "../controle/conf.php"; 
    session_start();
    
    if(!isset($_SESSION['UserLog'])){
        header("Location: ../index.php");  
        session_destroy();
    }

    date_default_timezone_set('UTC');

    try{
        $consulta = Conexao::conectar()->query("SELECT * FROM evento natural join tipoevento");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    Conexao::desconnectar();

    if(isset($_GET['opcao']) && $_GET['opcao']=='delete'){
    	$slqDelete = 'DELETE FROM `evento` WHERE `codigoEvent` = '.$_GET['codigoDlete'];
    	echo $slqDelete ;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Eclipse Eventos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>
<main class="container">


<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
  <li class="breadcrumb-item active">Eventos</li>
</ol>

<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Eventos</h2>
        </div>




    </div>
</header>


<?php


?>


<?php if (count($consulta)>=1) : ?>
<table class="table table-hover">
<thead>
    <tr>
        <th>Codigo</th>
        <th width="30%">Nome do Evento</th>
        <th>Descrição do Evento</th>
        <th>Data do Evento</th>
        <th>Tipo do Evento</th>
        <th>Opções</th>
    </tr>
</thead>
<tbody>

<?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
    <tr>
        <td><?php echo $linha->codigoEvent; ?></td>
        <td><?php echo $linha->Enome; ?></td>
        <td><?php echo $linha->Edescricao; ?></td>
        <td><?php echo date("d/m/Y", strtotime($linha->dataEvento)); ?></td>
        <td><?php echo $linha->descricao; ?></td>
        <td class="actions text-right">
            <a href="view.php?codigo=<?php echo $linha->codigoEvent; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
            <a href="edit.php?codigo=<?php echo $linha->codigoEvent; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
            <a href="eventos.php?codigoDlete=<?php echo $linha->codigoEvent; ?>&opcao=delete"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Excluir</a>
        </td>
    </tr>
<?php } ?>
</tbody>
</table>


<?php else : ?>
    <tr>
        <td colspan="6">Nenhum registro encontrado.</td>
    </tr>
<?php endif; ?>

</main>
    <?php include '../static/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>