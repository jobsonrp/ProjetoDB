<?php $erro = null; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <h2>Conectando com o Banco</h2>
                <div class="login-panel panel panel-default">
                    
                    <div class="panel-heading">
                        <h3 class="panel-title">Digite o login e senha do SGBD</h3>
                    </div>

                    <div class="panel-body">

                        <form method="POST" role="form" action="userAdmn.php" id="carform">
                            <fieldset>
                            	<div class="form-group">
                                    <input class="form-control" required placeholder="URL Servidor" name="server" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="User" name="User" type="text" autofocus>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" required placeholder="Senha" name="paswd" type="password">
                                </div>
                                <div class="form-group">
                                    <select  name="driver" class="form-control" form="carform">
                                        <option value="pgsql">PostgreSQL</option>
                                        <option value="mysql" selected>MySQL</option>
                                    </select>
                                </div>
                                <button type="submit" name="config" value="true" class="btn btn-success btn-block">Configuarar</button>

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