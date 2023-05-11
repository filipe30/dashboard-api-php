<?php
session_start() ;
$token = $_SESSION['tokenAcess'];
$url = "http://ciaserver/t/trido.com.br/public/wp-json/api/usuario";

$auth = 'authorization: Bearer';
$options  = array (
    'http' =>
        array (
            'ignore_errors' => true,
            'method' => 'GET',
            'header' =>
                array (
                    0 => $auth . $token,
                    1 => 'Content-Type: application/x-www-form-urlencoded',
                ),
        ),
);

$context  = stream_context_create( $options );
$response = file_get_contents(
    $url,
    false,
    $context
);
$response = json_decode( $response );

// Valida se tem alguém logado
if(!$token){
    session_abort();
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="pt">
<?php // head
require_once ('components/head/head.php');
?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-xxl-2">
            <?php require_once ('components/sidebar/sidebar.php') ?>
        </div>
        <div class="col-md-9 col-xxl-10">
            <div class="content-info">
                <div class="row topo-home">
                    <?php
                    // Topo do container principal
                    require_once ('components/container/topo-pagina.php');
                    ?>
                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                        <p>Bem-vindo(a) de volta, <b><?= $response->{'nome'}; ?></b>.<br>Tudo certo para vender muito hoje?</p>
                        <p><strong>Meu Plano</strong> <span class="badge bg-primary">Enterprise</span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="sub-container br-15">

                                <h4>Dados do usuário</h4>
                                <form action="#" method="POST" class="form login-update">
                                    <div class="row ">
                                        <div class="col-12 col-md-4 col-lg-5">
                                            <label for="username" class="form-label">Nova Senha*</label>
                                            <div class="input-group">
                                                <input type="password" id="pass" name="password" class="form-control" placeholder="Digite a sua senha" required aria-describedby="btn-switch">
                                                <button class="btn btn-light" type="button" id="btn-switch"><i class="material-icons-outlined position-relative" style="top:4px">visibility_off</i></button>
                                            </div>
                                            <div class="tip"><span>Mínimo de 8 caracteres, contendo um número, uma letra maíuscula e uma letra minúscula</span></div>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-5">
                                            <label for="pass" class="form-label">Repita a Senha*</label>

                                            <div class="input-group">
                                                <input type="password" id="pass-repeat" name="password-repeat" class="form-control" placeholder="Digite a sua senha" required aria-describedby="switch-btn">
                                                <button class="btn btn-light" type="button" id="switch-btn"><i class="material-icons-outlined position-relative" style="top:4px">visibility_off</i></button>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-2">
                                            <div class="input-group">
                                                <button type="submit" class="form-control btn btn-primary btn-lg rounded-5 submit">Atualizar senha</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php // Footer
require_once ('components/footer/footer.php'); ?>

</body>
</html>