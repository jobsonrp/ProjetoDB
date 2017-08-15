<?php 
    require "../controle/conf.php"; 
    session_start();
    
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
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>

<main class="container">

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="../index.php">Inicial</a></li>
  <li class="breadcrumb-item active">Cadastro</li>
</ol>


<h2>Cadastro de Usuário</h2>

<form action="cadastro.php" method="post">

  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="campo1">CPF</label>
      <input type="text" class="form-control" name="cpf" maxlength="14" OnKeyPress="tecla();formatar('###.###.###-##', this)">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Nome</label>
      <input type="text" class="form-control" name="nome">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Acompanhante</label>
      <input type="text" class="form-control" name="nomeAcompanhante">
    </div>
    <div class="form-group col-md-2">
      <label for="campo4">Data de Nascimento</label>
      <input type="date" class="form-control" name="datanascimento" OnKeyPress="formatar('##/##/####', this)">
    </div>      
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
      <a href="../index.php" class="btn btn-sm btn-default">Voltar</a>
    </div>
  </div>

</form>

</main>
    <?php include '../static/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function formatar(mascara, documento){
          var i = documento.value.length;
          var saida = mascara.substring(0,1);
          var texto = mascara.substring(i)
          if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
          }

        }
    </script>
    <script>
        function tecla(){
          evt = window.event;
          var tecla = evt.keyCode;

          if(tecla < 48 || tecla > 57){ 
            alert('Precione apenas teclas numéricas');
            evt.preventDefault();
          }
        }
    </script>
</body>
</html>