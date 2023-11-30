<?php
//inserir.php
require_once '../bd/conexao.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_usuario = "SELECT * FROM usuario where email = '$email';";

    $result_usuario = $conexao->query($sql_usuario);

    if ($result_usuario->num_rows == 0) {
        $sql = "INSERT into usuario values ('$email', '$senha', '$nome', '$celular', default ,default, default, default);";

        if ($conexao->query($sql)) {

            $message_success = "Usuario cadastrado com sucesso!";

        } else {

            echo "Erro: " . $sql . " " . $conexao->connect_error;

        }   
    }else{
        $message_error = "Usuário Já cadastrado, por favor tente outro email ou tente login! Nos contate para qualquer problema";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="../text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title> New jeans - Cadastro</title>
    <style>
        .dropdown-menu {
            min-width: 6rem!important;
        }
    </style>
</head>

<body>
    <!-- cabeçalho-- > <-->
    <header class="cabeçalho bg-light">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="../index.php"><img class="blockquote text-center"
                    src="../imagens/LOGO-removebg-preview.png" width="120px"></a>
        </nav>
        <ul class="nav justify-content-center">
            <li class=" col-2 nav-iten"><img src="../imagens/procurar.svg" width="23px"></li>
            <li class="col-10 nav-item"><input class="form-control mx-auto" type="search" placeholder="Pesquisar"></li>
        </ul>
        <ul class="nav justify-content-end ">
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
            require_once '../bd/conexao.php';
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
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link" href="menu.html"><img src="../imagens/do-utilizador.svg" width="20px"></a>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="login.php">login</a>
                            <a class="dropdown-item" href="cadastro.php">cadastrar</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>

    <!-- pop-up cadastro feito com Sucesso-- > <-->
    <?php
    if (isset($message_success)) {
        echo "
                <div class='alert alert-success justify-content-center' role='alert'>
                <strong>$message_success</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
    } elseif (isset($message_error)) {
        echo "
                <div class='alert alert-warning justify-content-center' role='alert'>
                <strong>$message_error</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
    }
    $conexao->close();
    ?>
    <!-- CADASTRO USUARIO-- > <-->
    <div>
        <div class="container-fluid blockquote text-center">
            <h1 class="h1-secundario">Registrar</h1></br>
        </div>
        <div class="container col-3 blockquote text-center">
            <p>Cadastre-se com</p>
            <button type="button" class="btn btn-outline-secondary col-12"><img src="../imagens/google.png"
                    width="20px"> Continue com o Google</button></br></br>
            <p>ou</p>
            <div class="dropdown-divider col-12"></div>
        </div>
        <div class="container-fluid col-3 blockquote ">
            <form action="" method="post">
                <div class="form-group">
                    <label>Dados Pessoais</label>
                    <input type="text" class="form-control" placeholder="Nome Completo" name="nome"></br>
                    <input type="phone" class="form-control" placeholder="(xx) xxxxx-xxxx" name="celular">
                </div>
                <div class="form-group">
                    <label>Detalhes de Login</label>
                    <input type="email" class="form-control " placeholder="Seu email" name="email" required minlength="8" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Por favor, insira um endereço de e-mail válido."></br>
                    <input type="password" class="form-control" placeholder="Senha" name="senha" required minlength="8" maxlength="26">
                </div>

                <button type="submit" class="btn btn-outline-primary col-12">Cadastrar-se</button></br></br>
            </form>
            <div class="dropdown-divider col-12"></div>
        </div></br></br>

        <!-- rodapé-- > <-->
        <footer class="rodape py-3">
            <div class="container">
                <table class="table table-dark table-borderless blockquote text-center">
                    <tbody>
                        <tr class="titulo-rodape">
                            <th scope="row"></th></br>
                            <td>
                                <p>Patrocinadores:</p>
                            </td>
                            <td>
                                <p>Ajuda:</p>
                            </td>
                            <td>
                                <p>Informações:</p>
                            </td>
                        </tr>
                        <tr class="inforodape">
                            <th scope="row"></th>
                            <td>
                                <p><img src="../imagens/patro-1.png" width="100px"></p>
                            </td>
                            <td><a href="../faleconosco.php" class="nav-link">Fale Conosco</a></td>
                            <td><a href="../quemsomos.php" class="nav-link">Sobre a Loja</a></td>
                        </tr>
                        <tr class="inforodape">
                            <th scope="row"></th>
                            <td>
                                <p><img src="../imagens/patro2.png" width="100px"></p>
                            </td>
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