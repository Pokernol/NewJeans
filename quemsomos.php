<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title> New jeans - Sobre</title>
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
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="window.location.href='bd/compra.php'">
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

    <div>
        <div></br>
            <div class="container-fluid blockquote text-center">
                <h1 class="h1-secundario text-dark">Sobre a New Jeans</h1>
                </br></br>
                <video width="900px" autoplay loop><source src="imagens/brand_video.mp4" type="video/mp4"></video>
            </div></br>

            <div class="container-fluid blockquote text-center">
                <p class="titulo-secundario">“Novos Genes”</p>
                <p class="texto-secundario">A New Jeans é um símbolo da moda atemporal e de sua evolução.</br>
                    O nome da loja faz alusão à ideia de “novos genes”, simbolizando uma nova geração de </br>
                    estilo e tendências. A New Jeans não apenas oferece roupas, mas também representa o </br>
                    conceito de que a moda está em constante evolução, adaptando-se às tendências do </br>
                    mundo e da geração atual. A nossa loja abraça o espírito inovador da moda, atendendo </br> a todos
                    os gostos e públicos.</p>
            </div></br></br></br>
            <div class="container-fluid blockquote text-center">
                </br>
                <button type="button" class="btn btn-outline-dark btn-lg"
                    onclick="window.location.href='index.php'">Voltar ao site</button>
                </br>
            </div></br></br></br>
        </div>
    </div>

     <!-- rodapé-- > <-->
     <footer class="rodape py-3">
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
                        <td><p><img src="imagens/patro-1.png" width="100px"></p></td>
                        <td><a href="faleconosco.php" class="nav-link">Fale Conosco</a></td>
                        <td><a href="quemsomos.php" class="nav-link">Sobre a Loja</a></td>
                    </tr>
                    <tr class="inforodape">
                        <th scope="row"></th>
                        <td><p><img src="imagens/patro2.png" width="100px"></p></td>
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