<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BoostWear - login</title>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="container" style="position:absolute;left:37%;top:15%;border-style:outset;border-width:thin;border-radius:10px;border-radius:10px;background-color:#DCDCDC;width:340px;height:350px;">
            <form action="loginCliente.php?go=1" method="POST" class="form-signin">       
                <h2 class="form-signin-heading">Login</h2><br>
                <input type="text" class="form-control" name="username" placeholder="Email" style="width:300px" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="Senha" style="width:300px" required=""/>   <br>   
                <a href="..\cliente\inicial\cliente.php"><input class="btn btn-lg btn-primary btn-block" type="submit" style="width:310px;background-color:#4B0082;border-color:#4B0082;" value="Logar"></a><br>  
                <a href="..\cliente\inicial\cliente.php" class="btn btn-lg btn-primary" style="width:310px;height:45px;background-color:#4682B4;border-color:#4682B4;" >Cancelar</a> <br>
                <hr>
                <a href="..\cliente\cadastro\cadastroCliente.php">Crie Uma Conta</a>
            </form>
        </div>
        <?php
        session_start();
        if (isset($_REQUEST['go']) && $_REQUEST['go'] != "") {
            if (isset($_REQUEST['username'], $_REQUEST['password'])) {
                $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
                $stmt = $pdo->prepare("SELECT * FROM cliente");
                $stmt->execute();
                while ($linha = $stmt->fetch()) {
                    if ($_REQUEST['username'] == $linha[5]) {
                        if ($_REQUEST['password'] == $linha[3]) {
                            $_SESSION['usuario'] = $_REQUEST['username'];
                            $_SESSION['codigo'] = $linha[0];
                            header("Location:..\cliente\inicial\cliente.php");
                        }
                    }
                }
                echo "<script>alert('Usuario não Cadastrado!');</script>";
            }
        }
        ?>
    <body>
</html>