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
        if (isset($_GET['codigo']) && $_GET['codigo'] != "") {
            $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
            $sql = "DELETE from tipo where Produto_id=".$_GET['codigo']."";
            $pdo->query($sql);
            $sql = "DELETE from estacao where Produto_id=".$_GET['codigo']."";
            $pdo->query($sql);
            $sql = "DELETE from cor where Produto_id=".$_GET['codigo']."";
            $pdo->query($sql);
            $sql = "DELETE from material where Produto_id=".$_GET['codigo']."";
            $pdo->query($sql);
            $sql = "DELETE from img where Produto_id=".$_GET['codigo']."";
            $pdo->query($sql);
            $sql = "DELETE from avaliacao where Produto_id=".$_GET['codigo']."";
            $pdo->query($sql);
            $sql = "DELETE from produto where idProduto=".$_GET['codigo']."";
            $pdo->query($sql);
        }
        ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class = "sr-only">Toggle navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            </button>
            <a class = "navbar-brand" href = "..\..\..\..\index.php">BoostWear</a>
            </div>
            <!--Collect the nav links, forms, and other content for toggling -->
            <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav">
            <li>
            <a href = "..\..\..\..\index.php#about">Sobre</a>
            </li>
            <li>
            <a href = "..\..\..\..\index.php#services">Serviços</a>
            </li>
            <li>
            <a href = "..\..\..\..\index.php#contact">Contato</a>
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
    <br><br><br><br><br><br><br>
    <div >
        <?php
        echo "<center>";
        echo "<h2>Produtos Cadastrados</h2>";

        echo '<table width ="1000"  border = "1" class = "table table-striped">';
        $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
        $stmt = $pdo->prepare("SELECT * FROM produto");
        $stmt->execute();
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome Produto</th>";
        echo "<th>Quantidade</th>";
        echo "<th>Preço</th>";
        echo "<th>Tamanho</th>";
        echo "<th>Genero</th>";
        echo "<th>Editar</th>";
        echo "<th>Excluir</th>";
        echo "</tr>";
        while ($linha = $stmt->fetch()) {
            if ($_SESSION['codigo'] == $linha[7]) {
                echo "<tr>";
                echo "<td>" . $linha[0] . "</td>";
                echo "<td>" . $linha[1] . "</td>";
                echo "<td>" . $linha[3] . "</td>";
                echo "<td>R$" . $linha[6] . "</td>";
                echo "<td>" . $linha[5] . "</td>";
                echo "<td>" . $linha[4] . "</td>";
                echo "<td>" . "" . '<a href="..\edicao\edicaoProdutos.php?codigo=' . $linha[0] . '">Editar</a>' . "" . "</td>";
                echo "<td>" . "" . "<a href='?codigo=" . $linha[0] . "'>Excluir</a>" . "" . "</td>";
                echo "</tr>";
            }
        }
        echo '</table>';
        echo "</center>";
        ?>
</div>
<center><a href="..\intermedio\intermedio.php" class="btn btn-primary" >Voltar</a></center>
</body>
</html>


