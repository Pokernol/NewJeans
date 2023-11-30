<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title> Fale conosco</title>
    <style>
            body, html {
        background: #ffffff!important;
    }
        .dropdown-menu {
            min-width: 6rem!important;
        }
    </style>
</head>

<body>
    <!-- cabeçalho-- > <-->
    <header class="cabeçalho bg-light">
        <nav class="navbar navbar-light ml-3">
            <a class="navbar-brand" href="index.php">
                <img class="blockquote text-center" src="imagens/LOGO-removebg-preview.png" width="120px">
            </a>
        </nav>
        <ul class="nav justify-content-center">
            <li class=" col-2 nav-iten">
                <img src="imagens/procurar.svg" width="23px">
            </li>
            <li class="col-10 nav-item">
                <input class="form-control mx-auto" type="search" placeholder="Pesquisar">
            </li>
        </ul>
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link" href="menu.html"><img src="imagens/menu-hamburguer.svg"
                                    width="20px"></a>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="index.php">Página Inicial</a>
                            <a class="dropdown-item" href="produtos.php">Produtos</a>
                            <a class="dropdown-item" href="quemsomos.php">Sobre a Loja</a>
                            <a class="dropdown-item" href="faleconosco.php">Fale Conosco</a>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            require_once 'bd/conexao.php';
            session_start();
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
                            onclick="window.location.href='bd/compra.php'">
                            <a class="nav-link">
                                <img class="mx-1" src="imagens/bolsa-de-compras.svg" width="20px">
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
                                <a class="nav-link" href="menu.html"><img src="imagens/do-utilizador.svg" width="20px"></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="usuario/logout.php">Logout</a>
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
                                <a class="nav-link" href="menu.html"><img src="imagens/do-utilizador.svg" width="20px"></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="usuario/login.php">login</a>
                                <a class="dropdown-item" href="usuario/cadastro.php">cadastrar</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </li>
        </ul>
    </header>

    <!-- fale conosco conteudo-- > <-->
    <div>
        <!-- texto-- > <-->
        <div>
            <div class="container-fluid blockquote text-center mt-3">
                <h1 class="h1-secundario text-dark">Fale Conosco</h1>
            </div></br>
            <div class="container-fluid blockquote text-center">
                <p class="titulo-secundario">Entre em contato</p>
                <p class="texto-secundario">nosso time está disponível de segunda a sábado das 08h às 20h, exceto
                    feriados.</p>
                <p class="texto-secundario">Desculpe-nos, nosso tempo de resposta está acima do esperado.</p>
            </div></br>
        </div>

        <!--chat e telefone-- > <-->
        <div class="container col-5">
            <table class="table table-borderless blockquote text-center ">
                <tbody class="  mx-auto ">
                    <tr>
                        <th scope="row"></th>
                        <td><img class="" src="imagens/chat.svg" width="45px"></td>
                        <td><img class="" src="imagens/telephone.svg" width="45px"></td>
                    </tr>
                    <tr class="titulo-secundario">
                        <th scope="row"></th>
                        <td>Assistente Virtual </td>
                        <td>Telefone </td>
                    </tr>
                    <tr class="texto-secundario">
                        <th scope="row"></th>
                        <td>
                            <p>Tire dúvidas, consulte seus</p> pedidos
                            e veja o status do<p> atendimento</p>
                        </td>
                        <td>
                            <p>Ligue e acompanhe suas </p>
                            <p></p>solicitações com nossos </p>atendentes
                        </td>
                    </tr>
                </tbody>
            </table>
        </div></br></br></br>

        <!--EMAIL-- > <-->
        <div>
            <div class="container col-2">
                <table class="table table-borderless blockquote text-center ">
                    <tbody class="  mx-auto ">
                        <tr>
                            <th scope="row"></th>
                            <td><img class="" src="imagens/email.svg" width="48px"></td>
                            <td>
                                <h2>E-mail</h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <div class="container-fluid blockquote text-center">
                    <p class="titulo-secundario">SEU CONTATO É MUITO IMPORTANTE PARA NÓS</p>
                    <p class="texto-secundario">Faça sua solicitação com nossos atendentes:</p>
                    <p class="texto-secundario">Envie-nos um e-mail preenchendo os campos abaixo, e logo retornaremos o
                        seu contato</p>
                </div>
                </br></br>
                <form class="col-5 container">
                    <div class=" form-group">
                        <label for="formGroupExampleInput">Endereço de e-mail</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Escolha abaixo, onde você realizou sua compra:</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>--</option>
                            <option>New Jeans - Loja Virtual</option>
                        </select>
                    </div></br>
                    <div class=" form-group">
                        <label for="formGroupExampleInput">Assunto</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                    </div></br>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição (Descreva aqui, detalhadamente sua
                            solicitação )</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Enviar</button></br>
                </form></br></br>
            </div>
        </div>
    </div>
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
                            <p><img src="imagens/patro-1.png" width="100px"></p>
                        </td>
                        <td><a href="faleconosco.php" class="nav-link">Fale Conosco</a></td>
                        <td><a href="quemsomos.php" class="nav-link">Sobre a Loja</a></td>
                    </tr>
                    <tr class="inforodape">
                        <th scope="row"></th>
                        <td>
                            <p><img src="imagens/patro2.png" width="100px"></p>
                        </td>
                        <td><a href="feedback.php" class="nav-link">Feedback</a></td>
                        <td>
                            <a>
                                <img src="imagens/INSTA_adobe_express.png" width="30px">
                                <img src="imagens/ttk.png" width="35px">
                                <img src="imagens/face_adobe_express.png" width="20px">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </footer>
</body>

</html>