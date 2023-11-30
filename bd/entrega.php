<?php
require_once 'conexao.php';

include('../usuario/protect.php');

$sql_carrinho = "SELECT * from carrinho;";

$result_carrinho = $conexao->query($sql_carrinho);

if ($result_carrinho->num_rows > 0) {
    $message = "Compra efetuada com sucesso!";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Entrega</title>
    <style>
        .dropdown-menu {
            min-width: 6rem!important;
        }
    </style>
</head>

<body>
    <header class="cabeçalho bg-light">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="../index.php"><img class="blockquote text-center"
                    src="../imagens/LOGO-removebg-preview.png" width="120px"></a>
        </nav>
        <ul class="nav justify-content-center">
            <li class=" col-2 nav-iten"><img src="../imagens/procurar.svg" width="23px"></li>
            <li class="col-10 nav-item"><input class="form-control mx-auto" type="search" placeholder="Pesquisar"></li>
        </ul>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link"><img src="../imagens/menu-hamburguer.svg" width="20px"></a>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="../index.php">Página Inicial</a>
                            <a class="dropdown-item" href="../produtos.php">Produtos</a>
                            <a class="dropdown-item" href="../quemsomos.php">Sobre a Loja</a>
                            <a class="dropdown-item" href="../faleconosco.php">Fale Conosco</a>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            require_once 'conexao.php';
            $cont = 0;
            $sql = "select * from carrinho";
            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cont++;
                }
            } else {
                $cont = 0;
            }
            ?>
            <li class="nav-item">
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm pb-4" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            onclick="window.location.href='../bd/compra.php'">
                            <a class="nav-link">
                                <img class="mx-1" src="../imagens/bolsa-de-compras.svg" width="20px">
                                <span>
                                    <sup class="text-dark">
                                        <?php echo $cont; ?>
                                    </sup>
                                </span>
                            </a>
                        </button>
                    </div>
                </div>
            </li>
            <li class="nav-item mr-5">
                <?php
                if (isset($_SESSION['nome'])) {
                    ?>
                    <div class="dropdown">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a class="nav-link" href="menu.html"><img src="../imagens/do-utilizador.svg"
                                        width="20px"></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="../usuario/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link" href="menu.html"><img src="../imagens/do-utilizador.svg" width="20px"></a>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="../usuario/login.php">login</a>
                            <a class="dropdown-item" href="../usuario/cadastro.php">cadastrar</a>
                        </div>
                    </div>
                </div>
                    <?php
                }
                ?>
            </li>
        </ul>
    </header>
<?php

if ($result_carrinho->num_rows > 0) {
    $message = "Compra efetuada com sucesso!";

    if (isset($message)) {
        echo "
            <div class='alert alert-success justify-content-center' role='alert'>
            <strong>$message</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    }
    ?>



    <div class="container">
        <div class="container-fluid blockquote text-center">
            <h1 class="display-3"><b>Produtos a Caminho</b></h1>
        </div></br>
        <div class="mb-3">
            <div class="d-flex align-items-center">
                <img class="mx-2" src="../imagens/caminhao.svg" width="100px">
                <h4> Acompanhe sua entrega: </h4>
            </div>
            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0"
                aria-valuemax="100">
                <div class="progress-bar" style="width: 25%"></div>
            </div>
        </div>
        <h3>Extrato da compra efetuada</h3></br>
        <table class="table table-primary">
        <?php

            if (!isset($_SESSION)) {
                session_start();
            }

        $email = $_SESSION['email'];

        $sql_usuario = "SELECT * from usuario where email = '$email';";

        $result_usuario = $conexao->query($sql_usuario);

        $cont = 1;
        $total_compra = 0;

        if ($result_usuario->num_rows > 0) {
            echo
                "<tr>
                        <th class='text-center'>#</th>
                        <th class='text-center'>E-mail</th>
                        <th class='text-center'>Nome</th>
                        <th class='text-center'>Celular</th>
                        <th class='text-center'>Endereço</th>
                        <th class='text-center'>Cidade</th>
                        <th class='text-center'>Estado</th>
                        <th class='text-center'>CEP</th>
                    </tr>";

            while ($row = $result_usuario->fetch_assoc()) {
                ?>
                <tr>
                    <td class="align-middle text-center"><?php echo $cont ?></td>
                    <td class="align-middle text-center"><?php echo $row['email'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['nome'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['celular'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['endereco'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['cidade'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['estado'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['cep'] ?></td>
                </tr>
        </table></br>
        <table class="table table-success">
        <?php
            }
        }  

        if ($result_carrinho->num_rows > 0) {
            echo
                "<tr>
                        <th class='text-center'>#</th>
                        <th class='text-center'>Produto</th>
                        <th class='text-center'>Cor</th>
                        <th class='text-center'>Tamanho</th>
                        <th class='text-center'>Preco Produto</th>
                        <th class='text-center'>Quantidade</th>
                        <th class='text-center'>Preco Total</th>
                        <th class='text-center'>Ação</th>
                    </tr>";

            while ($row = $result_carrinho->fetch_assoc()) {
                $row['compra'] = 'Finalizado';
                ?>
                <tr>
                    <td class="align-middle text-center"><?php echo $cont ?></td>
                    <td class="align-middle text-center"><?php echo $row['produto'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['cor'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['tamanho'] ?></td>
                    <td class="align-middle text-center">R$ <?php echo $row['preco'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['qtdade'] ?></td>
                    <td class="align-middle text-center">R$ <?php echo $row['total'] ?></td>
                    <td class="align-middle text-center"><?php echo $row['compra'] ?></td>
                </tr>
                <?php
                $total_compra += $row['total'];
                $cont++;
            }}
        ?>
        </table>
        <div class="blockquote text-center mb-5">
            </br>
            <button type="button" class="btn btn-dark btn-lg" onclick="window.location.href='../produtos.php'">Voltar para o inicio</button>
        </div>
    </div>

<?php
        $conexao->query('DELETE from carrinho');
?>
<?php
}else{
?>
        <div class='container d-flex flex-column align-items-center pt-5 mt-5'>
        <h1 class='display-5 text-center mb-5'><b>Voce ainda não pode acessar esta pagina<br>Por favor coloque algo no carrinho!</b><h1>
            <p class='mt-3'>
                <a class='btn btn-success btn-lg' href="../produtos.php">Ir Para</a>
            </p>
        </div>      
<?php
}
?>
    <!-- RODAPE -->
    <footer class="rodape <?php if($result_carrinho->num_rows==0) echo 'fixed-bottom' ?> py-3">
        <div class="container">
            <table class="table table-dark table-borderless blockquote text-center">
                <tbody>
                    <tr class="titulo-rodape">
                        <th scope="row"></th></br>
                        <td><p>Patrocinadores:</p></td>
                        <td><p>Ajuda:</p></td>
                        <td><p>Informações:</p></td>
                    </tr>
                    <tr class="inforodape">
                        <th scope="row"></th>
                        <td><p><img src="../imagens/patro-1.png" width="100px"></p></td>
                        <td><a href="../faleconosco.php" class="nav-link">Fale Conosco</a></td>
                        <td><a href="../quemsomos.php" class="nav-link">Sobre a Loja</a></td>
                    </tr>
                    <tr class="inforodape">
                        <th scope="row"></th>
                        <td><p><img src="../imagens/patro2.png" width="100px"></p></td>
                        <td><a href="../feedback.php" class="nav-link">Feedback</a></td>
                        <td>
                            <a>
                                <img src="../imagens/INSTA_adobe_express.png" width="30px">
                                <img src="../imagens/ttk.png" width="35px"> 
                                <img src="../imagens/face_adobe_express.png" width="20px">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </footer>
</body>

</html>