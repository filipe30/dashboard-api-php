<?php
$url = "http://ciaserver/t/trido.com.br/public/wp-json/jwt-auth/v1/token";
// cria um resource cURL
$ch = curl_init($url);

// monte um array que conterá os campos a serem enviados
$data = array(
    'username' => $_POST['username'],
    'password' => $_POST['password']
);

// vamos usar a função json encode para transformar nosso array em uma string Json válida
$corpo = json_encode($data);

// agora vamos anexar o corpo em formato json da sua requisição
curl_setopt($ch, CURLOPT_POSTFIELDS, $corpo);

// defina o conteúdo do envio como json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// ative o recebimento de retorno da requisição
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// executa a requisição POST
$resultado = curl_exec($ch);

// encerra conexão e libera variável
curl_close($ch);
$response = json_decode($resultado);

session_start();
$_SESSION['tokenAcess'] = $response->{'token'};
#print_r($_SESSION['tokenAcess']);
if($_SESSION['tokenAcess']){
    header("Location: http://ciaserver/t/trido.com.br/dashboard/dashboard.php");
}


// 1 - Aqui estamos usando json_decode para transformar nossa resposta JSON em um objeto PHP.
#echo '<pre>' . print_r(json_decode($resultado), true) . '</pre>';
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Trido - A um passo de realizar o sonho, faça o login!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
</head>
<body>
    <div class="container-fluid lg-h-100">
        <div class="row justify-content-center align-items-center lg-h-100">
            <div class="col-lg-5 order-1 order-lg-0 position-relative">
                <div class="login-wrap p-3 p-md-5 col-lg-8 mx-auto">
                    <h1 class="mb-2">Você está a um <span>clique </span>de vender!</h1>
                    <p class="mb-5">Administre sua loja virtual inteira por aqui.</p>
                    <form action="#" method="POST" class="login-form">

                        <?php
                        // Verifica se há msg de erro
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && $response->message) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $response->message ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>
                        <label for="username" class="form-label">E-mail do administrador da loja Trido</label>
                        <div class="input-group mb-30px">
                            <input type="email" name="username" id="username" class="form-control" placeholder="exemplo: contato@petshopdapat.com.br" required>
                        </div>
                        <label for="pass" class="form-label">Senha da sua loja</label>
                        <div class="input-group mb-30px">
                            <input type="password" id="pass" name="password" class="form-control" placeholder="Digite a sua senha" required aria-describedby="btn-switch">
                            <button class="btn btn-secondary" type="button" id="btn-switch"><i class="material-icons-outlined position-relative" style="top:4px">visibility_off</i></button>
                        </div>
                        <div class="input-group mb-30px">
                            <button type="submit" class="form-control btn btn-primary rounded-5 submit px-3">Acessar a loja</button>
                        </div>
                        <div class="text-center my-2">
                            <a href="#">Esqueceu a senha?</a>
                        </div>
                        <div class="my-2">
                            <p class="text-center">Ainda não tem uma loja da trido? <a href="#">Bora criar uma!</a></p>
                        </div>
                    </form>
                </div>
                <figure class="form-img">
                    <img src="assets/svg/login/form-detalhe.svg" class="img-fluid" alt="Faça o login">
                </figure>
            </div>
            <div class="col-lg-7 order-0 order-lg-1 pe-0 bx-shadow position-relative d-flex justify-content-end align-items-end lg-h-100">
                <figure class="position-absolute logo-home">
                    <img src="assets/images/logo.png" class="img-fluid" alt="Acesse sua loja, boas vendas!">
                </figure>
                <figure class="mb-0">
                    <img src="assets/images/login/modelo.jpg" class="img-fluid" alt="Bem-vindo Empreendedor!">
                </figure>
            </div>
        </div>
    </div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

    <script>
        window.onload = () => {
            const field = document.querySelector('#pass');
            const btn = document.querySelector('#btn-switch');
            if(btn && field){
                btn.addEventListener('click', e => {
                    if(btn.children[0].innerHTML == 'visibility_off'){
                        btn.children[0].innerHTML = 'visibility';
                        field.setAttribute('type', 'text');
                    } else {
                        btn.children[0].innerHTML = 'visibility_off';
                        field.setAttribute('type', 'password');
                    }
                });
            }
        }
    </script>

</body>
</html>

