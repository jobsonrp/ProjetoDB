<?php 
    require "../controle/conf.php"; 
    session_start();
    date_default_timezone_set('UTC');
    
    if(!isset($_SESSION['UserLog'])){
        header("Location: ../index.php");  
        session_destroy();
    }

    if(isset($_GET['opcao']) && $_GET['opcao']=='delete'){
    	$slqDelete = 'DELETE FROM `ingresso` WHERE `codigoIngresso` = '.$_GET['codigoDlete'];
    	echo $slqDelete ;
    }

    $sql = "SELECT * FROM ingresso natural join pessoa natural join evento where codigoEvent=".$_GET['codigo'];
    $stmt = Conexao::conectar()->query($sql);
    $exite = $stmt->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
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
		<li class="breadcrumb-item"><a href="eventos.php">Evento view</a></li>
		<li class="breadcrumb-item active">Ingressos</li>
	</ol>

	<table  class="table table-hover">
		<thead>
			<tr>
				<th>CPF</th>
				<th>Nome</th>
				<th>Acompanhante </th>
				<th>Nome do Evenlto</th>
				<th>Data da Compra</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($result = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
				<tr>
					<td><?php echo $result->cpf; ?></td>
					<td><?php echo $result->nome; ?></td>
					<td><?php echo $result->nomeAcompanhante; ?></td>
					<td><?php echo $result->Enome; ?></td>
					<td><?php echo $result->dataCompra; ?></td>
					<td>

					<a class="btn btn-sm btn-danger" href="ingressos.php?codigo=<?php echo $result->codigoEvent; ?>&codigoDlete=<?php echo $result->codigoIngresso; ?>&opcao=delete"> <i class="fa fa-trash"></i> Cansela Compra</a>
					
				</tr>
			<?php } ?>
		</tbody>
	</table>





<!-- Modal de Delete  href="ingressos.php?codigo=<?php echo $result->codigoEvent; ?>&codigoDlete=<?php echo $result->codigoIngresso; ?>&opcao=delete" -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <a id="confirm" class="btn btn-primary" href="#">Sim</a>
        <a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->


	
</main>
    <?php include '../static/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>