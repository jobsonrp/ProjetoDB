<?php
    session_start();
    $erro = '';

    if (!file_exists("controle/variaveis.php")) {
        header("Location: /paginas/configuraSGBD.php");  
    }
    require "controle/conf.php";

    if(isset($_SESSION['UserLog'])){
        header("Location: pagina_inicial.php");  
        die();
    }
    if (isset($_POST['login'])) {
        $username = $_POST['loguin'];
        $senha =  Md5($_POST['password']);

        $sql = "SELECT  `colunaSenha` as `senha`, `ColunaLogin` as `valor`  FROM `tabelausuarios` where ColunaLogin = ? and colunaSenha = ? ;";

        $consulta = Conexao::conectar()->prepare($sql);
        $consulta->bindParam(1, $username, PDO::PARAM_STR);
        $consulta->bindParam(2, $senha, PDO::PARAM_INT);
        $consulta->execute();
        $linha = $consulta->fetch(PDO::FETCH_ASSOC);


        if ($consulta->rowCount()==0) {
            $erro = "Usuario ou senha Incorreta!";
        }else{
            $_SESSION['UserLog'] = true;
            $_SESSION['nome_user'] = $username;
            $_SESSION['nome_password'] = $senha;
            header("Location: pagina_inicial.php"); 
        }
    }
    Conexao::desconnectar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
               
                <div class="login-panel panel panel-default">
                    
                    <div class="panel-heading">
                        <h3 class="panel-title">Login:</h3>
                    </div>

                    <div class="panel-body">
                        <form method="POST" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Login" name="login" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Senha" name="password" type="password">
                                </div>
                                <button type="submit" name="login" value="true" class="btn btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
				<?php if ($erro) { ?>
					<div class="alert alert-danger">
						<p><strong><?php echo $erro; ?></strong></p>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</body>
</html>