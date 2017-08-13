<?php
    if (!file_exists("../controle/variaveis.php")) {
     
        $file = fopen('../controle/variaveis.php', 'w');
        if (isset($_POST['config'])) {
            $text  = " define('DB_HOSTNAME', '".$_POST['server']."');";
            $text .= " define('DB_USERNAME', '".$_POST['User']."');"; 
            $text .= "define('DB_PASSWORD', '".$_POST['paswd']."');";
            $text .= "define('DB_DRIVER', '".$_POST['driver']."');";
        }
        fwrite($file, '<?php ');
        fwrite($file, $text);
        fclose($file); 
    }
    header("Location: ../pagina_inicial.php");   
?>