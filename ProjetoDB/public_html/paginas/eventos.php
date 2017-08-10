<?php 
    require "../controle/conf.php"; 
    date_default_timezone_set('UTC');
    //$conn = Conexao::conectar();

    try{
        $consulta = Conexao::conectar()->query("SELECT * FROM evento natural join TipoEvento");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    Conexao::desconnectar();
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
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Eventos</a>
            <a class="btn btn-default" href="eventos.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>


<?php


?>


<?php if (count($consulta)>0) : ?>
<table class="table table-hover">
<thead>
    <tr>
        <th>Codigo</th>
        <th width="30%">Nome</th>
        <th>Descrição</th>
        <th>Data</th>
        <th>Atualizado em</th>
        <th>Opções</th>
    </tr>
</thead>
</thead>
<tbody>

<?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
    <tr>
        <td><?php echo $linha->codigo; ?></td>
        <td><?php echo $linha->Enome; ?></td>
        <td><?php echo $linha->Edescricao; ?></td>
        <td><?php echo date("d/m/Y", strtotime($linha->dataEvento)); ?></td>
        <td><?php echo $linha->descricao; ?></td>
        <td class="actions text-right">
            <a href="view.php?codigo=<?php echo $linha->codigo; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
            <a href="edit.php?codigo=<?php echo $linha->codigo; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $linha->codigo; ?>">
                <i class="fa fa-trash"></i> Excluir
            </a>
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









<!-- Modal de Delete-->
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