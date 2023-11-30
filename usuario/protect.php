<?php 

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['email'])){
    die(
        "
<html lang='pt-BR'>
        <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='../style.css'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
            integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
        <script src='https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js'></script> 
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js'></script>
        <title> New jeans - Login</title>
        <style>
        .dropdown-menu {
            min-width: 6rem!important;
        }
        </style>
    </head>
    <body>
        <header class='cabeçalho bg-light'>
        <nav class='navbar navbar-light'>
            <a class='navbar-brand' href='../index.php'><img class='blockquote text-center'
                    src='../imagens/LOGO-removebg-preview.png' width='120px'></a>
        </nav>
        <ul class='nav justify-content-center'>
            <li class=' col-2 nav-iten'><img src='../imagens/procurar.svg' width='23px'></li>
            <li class='col-10 nav-item'><input class='form-control mx-auto' type='search' placeholder='Pesquisar'></li>
        </ul>
        <ul class='nav justify-content-end '>
            <li class='nav-item'>
                <div class='dropdown'>
                    <div class='dropdown'>
                        <button class='btn btn-light dropdown-toggle btn-sm' type='button' id='dropdownMenuButton'
                            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <a class='nav-link'><img src='../imagens/menu-hamburguer.svg' width='20px'></a>
                        </button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <a class='dropdown-item' href='../index.php'>Página Inicial</a>
                            <a class='dropdown-item' href='../produtos.php'>Produtos</a>
                            <a class='dropdown-item' href='../quemsomos.php'>Sobre a Loja</a>
                            <a class='dropdown-item' href='../faleconosco.php'>Fale Conosco</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class='nav-item'>
                <div class='dropdown'>
                    <div class='dropdown'>
                        <button class='btn btn-light btn-sm pb-4' type='button' id='dropdownMenuButton'
                            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' onclick='window.location.href=\"../bd/compra.php\"'>
                            <a class='nav-link'>
                                <img class='mx-1' src='../imagens/bolsa-de-compras.svg' width='20px'>
                            </a>
                        </button>
                    </div>
                </div>
            </li>
            <li class='nav-item mr-5'>
            <div class='dropdown'>
                <div class='dropdown'>
                    <button class='btn btn-light dropdown-toggle btn-sm' type='button' id='dropdownMenuButton'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <a class='nav-link' href='menu.html'><img src='../imagens/do-utilizador.svg' width='20px'></a>
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <a class='dropdown-item' href='../usuario/login.php'>login</a>
                        <a class='dropdown-item' href='../usuario/cadastro.php'>cadastrar</a>
                    </div>
                </div>
        </div>
            </li>
        </ul>
    </header>



        <div class='container d-flex flex-column align-items-center pt-5 mt-5'>
            <h1 class='display-5 mb-5'>
                <b>Voce nao pode acessar esta pagina faça login!</b>
            <h1>
            <p class='mt-3'>
                <a class='btn btn-success btn-lg' href=\"../usuario/login.php\">Ir Para</a>
            </p>
        </div>
        


        <footer class='rodape fixed-bottom py-3'>
        <div class='container'>
            <table class='table table-dark table-borderless blockquote text-center'>
                <tbody>
                    <tr class='titulo-rodape'>
                        <th scope='row'></th></br>
                        <td><p>Patrocinadores:</p></td>
                        <td><p>Ajuda:</p></td>
                        <td><p>Informações:</p></td>
                    </tr>
                    <tr class='inforodape'>
                        <th scope='row'></th>
                        <td><p><img src='../imagens/patro-1.png' width='100px'></p></td>
                        <td><a href='../faleconosco.php' class='nav-link'>Fale Conosco</a></td>
                        <td><a href='../quemsomos.php' class='nav-link'>Sobre a Loja</a></td>
                    </tr>
                    <tr class='inforodape'>
                        <th scope='row'></th>
                        <td><p><img src='../imagens/patro2.png' width='100px'></p></td>
                        <td><a href='../feedback.php' class='nav-link'>Feedback</a></td>
                        <td>
                            <a>
                                <img src='../imagens/INSTA_adobe_express.png' width='30px'>
                                <img src='../imagens/ttk.png' width='35px'> 
                                <img src='../imagens/face_adobe_express.png' width='20px'>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </footer
    </body>
    </html>
        "
    );
}


?>