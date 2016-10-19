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
        <form action="cadastroProdutos.php?go=1" method="POST">
            <?php
            if (isset($_GET['go']) && $_GET['go'] != '') {
                session_start();
                $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
                $stmt = $pdo->prepare("SELECT * FROM produto");
                $stmt->execute();
                while ($linha = $stmt->fetch()) {
                    $numero = $linha[0];
                }
                   $numero++;
                $sql = "INSERT INTO produto (idProduto,nome_produto,descricao,quantidade,genero,tamanho,preco,Vendedor_id)values (".$numero.",'".$_REQUEST['nome'].
                        "','".$_REQUEST['descricao']."',".$_REQUEST['quantidade'].",'".$_REQUEST['genero']."','".$_REQUEST['tamanho'].
                        "',".$_REQUEST['preco'].",".$_SESSION['codigo'].")";
                if (!$pdo->query($sql)) {
                    echo "oi";
                    exit();
                    header("Location:cadastroProdutos.php");
                } else {
                    session_start();
                    $pdo = null;
                    header("Location:cadastroProdutos2.php");
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
                        <a class="navbar-brand" href="..\..\..\index.php">BoostWear</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="..\..\..\index.php#about">Sobre</a>
                            </li>
                            <li>
                                <a href="..\..\..\index.php#services">Serviços</a>
                            </li>
                            <li>
                                <a href="..\..\..\index.php#contact">Contato</a>
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
        <div class="container" style="position:absolute;left:38%;top:8%;bottom:120px;border-style:outset;border-width:thin;border-radius:10px;border-radius:10px;background-color:#DCDCDC;width:385px;height:640px;">
            <form class="form-horizontal">
                <fieldset>
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Nome do Produto</label>
                        <div class="controls">
                            <input id="nome" name="nome" type="text" placeholder="Insira seu nome" class="form-control" required style="width:350px">
                            <p class="help-block">* Campo Obrigatório</p>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label">Quantidade</label>
                        <div class="controls">
                            <input id="quantidade" name="quantidade" type="number" min="1" placeholder="Quantidade" class="form-control" required style="width:350px">
                            <p class="help-block">* Campo Obrigatório</p>
                        </div>
                    </div>

                    <div class="contrl-group">
                        <label class="control-label">Tamanho</label>
                        <div class="controls" class="radio">
                            <input type="radio" name="tamanho" value="34"> 34
                            <input type="radio" name="tamanho" value="36"> 36
                            <input type="radio" name="tamanho" value="38"> 38
                            <input type="radio" name="tamanho" value="40"> 40
                            <input type="radio" name="tamanho" value="42"> 42
                            <input type="radio" name="tamanho" value="44"> 44
                            <input type="radio" name="tamanho" value="46"> 46
                            <input type="radio" name="tamanho" value="48"> 48
                            <input type="radio" name="tamanho" value="50"> 50</br></br>
                            <input type="radio" name="tamanho" value="PP"> PP
                            <input type="radio" name="tamanho" value="P"> P
                            <input type="radio" name="tamanho" value="M"> M
                            <input type="radio" name="tamanho" value="G"> G
                            <input type="radio" name="tamanho" value="GG"> GG
                            <input type="radio" name="tamanho" value="XGG"> XGG
                            <input type="radio" name="tamanho" value="XXG"> XXG
                            <p class="help-block">* Campo Obrigatório</p>
                        </div>
                    </div>

                    <div class="contrl-group">
                        <label class="control-label">Genero</label>
                        <div class="controls" class="radio">
                            <input type="radio" name="genero" value="masculino"> Masculino
                            <input type="radio" name="genero" value="masculino"> Feminino
                            <p class="help-block">* Campo Obrigatório</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Preço</label>
                        <div class="controls">
                            <input id="preco" name="preco" type="number" min="0.01" placeholder="Preço" class="form-control" required style="width:350px">
                            <p class="help-block">* Campo Obrigatório</p>
                        </div>
                    </div>
                    <div class="form-group" style="width:98%;">
                        <label  for="comment">Descrição:</label>
                        <textarea name="descricao" class="form-control" rows="5" id="texto"></textarea>
                    </div>
                    </div>


                    <!-- Button -->
                    <div class="control-group" style="position:absolute;left:46%;top:90%;">
                        <label class="control-label"></label>
                        <div class="controls">
                            <a><input type="submit" value="Proximo"  class="btn btn-primary"></a>
                            <a href="..\inicial\vendedor.php" class="btn btn-primary">Cancelar</a>
                        </div>
                    </div>
            </form>
            </fieldset>
    </form>
</body>
</html>


