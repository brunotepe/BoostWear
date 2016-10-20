<!DOCTYPE html>
<html>
    <head>
        <title>BoostWear-Cadastro</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        if (isset($_GET['erro']) && $_GET['erro'] != '') {
            echo "<script>alert('As senhas se diferem!');</script>";
        }
        if (isset($_GET['go']) && $_GET['go'] != '') {
            $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
            $stmt = $pdo->prepare("SELECT * FROM vendedor");
            $stmt->execute();
            while ($linha = $stmt->fetch()) {
                $number = $linha[0];
            }
            $number++;
            $endereço = $_REQUEST['end'] . " " . $_REQUEST['bairro'];
            $telefone = "(" . $_REQUEST['DDD'] . ") " . $_REQUEST['telefone'];

            if ($_REQUEST['senha'] != $_REQUEST['confirmar']) {
                header("Location:cadastroVendedor.php?erro=1");
            } else {
                $sql = "INSERT INTO vendedor (idVendedor,nome_vendedor,telefone_vendedor,senha_vendedor,email_vendedor,cnpj,endereco,user_vendedor) VALUES (" . $number . ",'" . $_REQUEST['nome'] .
                        "','".$telefone."','". $_REQUEST['senha'] . "','" . $_REQUEST['email'] . "'," . $_REQUEST['cnpj'] . ",'" . $endereço . "','" . $_REQUEST['user'] . "')";
                if (!$pdo->query($sql)) {
                    print_r($pdo->errorInfo());
                    exit();
                    header("Location:cadastroVendedor.php");
                } else {
                    session_start();
                    $_SESSION['usuario'] = $_REQUEST['user'];
                    $_SESSION['codigo'] = $number;
                    $_SESSION['tipo'] = "V";
                    $pdo = null;
                    header("Location:../inicial/vendedor.php");
                }
            }
        }
        ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="..\..\..\..\index.php">BoostWear</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="..\..\..\..\index.php#about">Sobre</a>
                        </li>
                        <li>
                            <a href="..\..\..\..\index.php#services">Serviços</a>
                        </li>
                        <li>
                            <a href="..\..\..\..\index.php#contact">Contato</a>
                        </li>
                        <?php
                        session_start();
                        if (isset($_GET['id']) && $_GET['id'] == '1') {
                            $_SESSION['usuario'] = "";
                        }
                        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
                            echo "<li>";
                            echo "<a href='#'>" . $_SESSION['usuario'] . "</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='?id=1'>Sair</a>";
                            echo "</li>";
                        } else {
                            echo "<li>";
                            echo "<a href='..\..\loginCliente\loginCliente.php'>Login</a>";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </div>
    <div class="container" style="position:absolute;left:37%;top:15%;bottom:120px;border-style:outset;border-width:thin;border-radius:10px;border-radius:10px;background-color:#DCDCDC;width:500px;height:850px;">
        <form action="cadastroVendedor.php?go=1" method="POST" class="form-horizontal">
            <fieldset>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label">Nome de Usuario</label>
                    <div class="controls">
                        <input id="nome" name="user" type="text" placeholder="Nome de Usuario" class="form-control" required style="width:449px">
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Nome da Empresa</label>
                    <div class="controls">
                        <input id="nome" name="nome" type="text" placeholder="Nome da Empresa" class="form-control" required style="width:449px">
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label">Telefone</label>
                    <div class="controls">
                        <input id="telefone" name="DDD" min="10" max="100" type="number" placeholder="DDD" class="form-control" required style="width:80px">
                        <input id="telefone" name="telefone" type="number" placeholder="Insira seu Telefone" class="form-control" required style="width:365px;position:absolute;top:25.8%;left:19.5%;">
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label">Senha</label>
                    <div class="controls">
                        <input id="senha" name="senha" type="password" placeholder="Insira sua senha" class="form-control" required style="width:449px">
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label">Confirmar Senha</label>
                    <div class="controls">
                        <input id="ConfSenha" name="confirmar" type="password" placeholder="Insira sua senha" class="form-control" required style="width:449px">
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input id="email" name="email" type="text" placeholder="Insira seu email" class="form-control" required style="width:449px">
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">CNPJ</label>
                    <div class="controls">
                        <input id="CNPJ" name="cnpj" type="text" placeholder="Insira seu CNPJ" class="form-control" required style="width:449px">
                        <br>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Bairro</label>
                    <div class="controls">
                        <select id="bairro" name="bairro" class="form-control" style="width:449px">
                            <option>Centro</option>
                            <option>Sidil</option>
                            <option>Interlagos</option>
                            <option>Belvedere</option>
                        </select>
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Endereço</label>
                    <div class="controls">
                        <input id="CNPJ" name="end" type="text" placeholder="Endereço e numero" class="form-control" required style="width:449px">

                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>
                <!-- Button -->
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <a href="..\inicial\vendedor.php"><input type="submit" value="Enviar"  class="btn btn-primary"></a>
                        <a href="..\inicial\vendedor.php" class="btn btn-primary">Cancelar</a>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</body>
</html>


