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
#print_r($response);

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
                        <p></p>
                        <p><strong>Meu Plano</strong> <span class="badge bg-success">Enterprise</span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="content-info mt-5">
                        <h4>Dados cadastrais</h4>

                        <form action="#" method="POST" class="form login-update">
                            <div class="row mt-4">
                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">Nome e Sobrenome*</label>
                                    <div class="input-group">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Digite o seu nome completo" required>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">E-mail*</label>

                                    <div class="input-group">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu email" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-4">
                                <div class="col-12 col-md-6">
                                    <label for="cpf_cnpj" class="form-label">CPF ou CNPJ*</label>
                                    <div class="input-group">
                                        <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control" placeholder="Digite o CPF ou CNPJ" required>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="row">

                                        <div class="col-12 col-md-3">
                                            <label for="tel" class="form-label">Telefone*</label>
                                            <div class="input-group">
                                                <select class="form-select" id="tel" name="tel" aria-label="Escolha o tipo de telefone">
                                                    <option value="1" selected>Telefone</option>
                                                    <option value="2">Celular</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-2">
                                            <label for="ddi" class="form-label">País*</label>
                                            <div class="input-group">
                                                <input type="text" id="ddi" name="ddi" class="form-control" placeholder="DDI" required>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="ddd" class="form-label">DDD*</label>
                                            <div class="input-group">
                                                <input type="text" id="ddd" name="ddd" class="form-control" placeholder="DDD" required>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                            <label for="numero" class="form-label">Número*</label>
                                            <div class="input-group">
                                                <input type="text" id="numero" name="numero" class="form-control" placeholder="Número do telefone" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <label for="fuso" class="form-label">Fuso horário*</label>
                                    <div class="input-group">
                                        <select class="form-select" id="fuso" name="fuso" aria-label="Escolha o fuso horário">
                                            <option value="1" selected>São Paulo</option>
                                            <option value="2">Rio Branco</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 col-md-3">
                                    <label for="store" class="form-label">Você possui loja física?*</label>
                                    <div class="input-group">
                                        <select class="form-select" id="store" name="store" aria-label="Escolha o fuso horário">
                                            <option value="1" selected>Sim</option>
                                            <option value="2">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="team" class="form-label">Qual é o tamanho da sua equipe?*</label>
                                    <div class="input-group">
                                        <select class="form-select" id="team" name="team" aria-label="Escolha o fuso horário">
                                            <option value="1" selected>1 até 10 pessoas</option>
                                            <option value="2">Mais de 10 pessoas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="ramo" class="form-label">Qual é o ramo do seu negócio?*</label>
                                    <div class="input-group">
                                        <select class="form-select" id="ramo" name="ramo" aria-label="Escolha o fuso horário">
                                            <option value="1" selected>Petshop</option>
                                            <option value="2">Veterinário</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-2">
                                <div class="input-group">
                                    <button type="submit" class="form-control btn btn-primary btn-lg rounded-5 submit">Atualizar cadastro</button>
                                </div>
                            </div>

                        </form>


                    </div> <!-- Atualização de cadastro -->

                    <div class="content-info mt-5">
                        <h4>Dados cadastrais</h4>

                        <div class="tip"><span>De acordo com a lei federal nº 7962/13, todas as lojas virtuais precisam<br>apresentar o endereço físico, mesmo que seja sua residência.<br>Isso confere segurança e credibilidade aos seu clientes.</span></div>

                        <form action="#" method="POST" class="form login-update">
                            <div class="row mt-4">
                                <div class="col-12 col-md-6 col-lg">
                                    <label for="cep" class="form-label">CEP</label>
                                    <div class="input-group">
                                        <input type="text" id="cep" name="cep" class="form-control" placeholder="00000-000">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg">
                                    <label for="number_address" class="form-label">Número</label>

                                    <div class="input-group">
                                        <input type="number" id="number_address" name="number_address" class="form-control" placeholder="Número">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="comp_address" class="form-label">Complemento</label>

                                    <div class="input-group">
                                        <input type="text" id="comp_address" name="comp_address" class="form-control" placeholder="Complemento Ex.: Loja 350">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="neigh_address" class="form-label">Bairro</label>

                                    <div class="input-group">
                                        <input type="text" id="neigh_address" name="neigh_address" class="form-control" placeholder="Digite o bairro">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="city_address" class="form-label">Complemento</label>

                                    <div class="input-group">
                                        <input type="text" id="city_address" name="city_address" class="form-control" placeholder="Número">
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 col-lg">
                                    <label for="uf" class="form-label">UF*</label>
                                    <div class="input-group">
                                        <select class="form-select" id="uf" name="uf" aria-label="Estado">
                                            <option value="1" selected>MG</option>
                                            <option value="2">SP</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="col-12 col-md-4 col-lg-2">
                                <div class="input-group">
                                    <button type="submit" class="form-control btn btn-primary btn-lg rounded-5 submit">Atualizar endereço</button>
                                </div>
                            </div>

                        </form>

                    </div><!-- Endereço da loja -->

                    <div class="content-info mt-5">
                        <a href="#" class="text-danger underline"><span>Cancelar minha loja da Trido</span> <i class="ms-2 material-icons-outlined">
cancel
</i></a>
                        <div class="tip"><span>Por que você me esquece e some? E se eu me interessar por alguém?</span></div>
                        <div class="tip"><span>Ficaremos muito tristes se você nos abandonar, mas você livre para seguir seu coração.</span></div>
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