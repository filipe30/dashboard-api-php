<?php global $end_url; ?>
<script type="text/javascript" src="assets/libs/bootstrap/bootstrap.bundle.js"></script>

<?php if($end_url === 'dashboard.php') : ?>

<!-- Modal -->
<div class="modal fade" id="boas-vindas" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalToggleLabel">Seja bem-vindo</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid mb-2" src="assets/images/topo-modal.png" alt="Trido Loja">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <!--            <div class="modal-footer">-->
            <!---->
            <!--            </div>-->
        </div>
    </div>
</div>
<?php endif; ?>
<script>
    window.onload = () => {
        // Função para mudar input password para text
        function switchButton(field, btn){
            let b = document.querySelector(btn);
            let f = document.querySelector(field);
            if(b){
                b.addEventListener('click', e => {
                    if(b.children[0].innerHTML == 'visibility_off'){
                        b.children[0].innerHTML = 'visibility';
                        f.setAttribute('type', 'text');
                    } else {
                        b.children[0].innerHTML = 'visibility_off';
                        f.setAttribute('type', 'password');
                    }
                });
            }
        }

        <?php if($end_url === 'dashboard.php') : ?>

        <?php endif; ?>

        <?php if($end_url === 'alterar-pass.php') : ?>
        switchButton('#pass', '#btn-switch');
        switchButton('#pass-repeat', '#switch-btn');
        <?php endif; ?>

        let theme_mode = document.querySelector('#tema-perfil');
        const icon = document.querySelector('#icon-prof');
        const label = document.querySelector('#text-perfil');

        theme_mode.addEventListener('click', () => {
            theme_mode.toggleAttribute('checked');
            if(theme_mode.hasAttribute('checked')){
                icon.innerHTML = 'dark_mode';
                label.innerHTML = 'Tema Escuro';
            } else {
                icon.innerHTML = 'light_mode';
                label.innerHTML = 'Tema Claro';

            }
        });
    }
</script>

<?php
?>