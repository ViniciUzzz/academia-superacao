<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Bem-vindo(a) à <br>Superação Academia!</h2>
                            <p>Não tem uma conta?</p>
                            <a href="#" class="btn btn-white btn-outline-white">Entre em Contato</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Entrar</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="https://www.facebook.com/superacaostudio" target="_blank" class="social-icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                    <a href="https://www.instagram.com/superacaostudio.rafabraga/" target="_blank" class="social-icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-instagram"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <?php 
                            echo validation_errors("<div class='alert alert-danger'>", "</div>");
                            echo form_open("login");
                        ?>
                        <div class='alert alert-danger' style="display: <?php echo $messege_error != '' ? 'flex' : 'none'; ?>">
                            <?php echo $messege_error ?>
                        </div>
                        <fieldset>
                            <div class="form-group mb-3">
                                <label class="label" for="text-username">Usuário</label>
                                <input type="text" name="text-username" id="text-username" class="form-control" placeholder="Digite seu usuário..." value="<?php echo set_value('text-username') ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="text-password">Senha</label>
                                <input type="password" name="text-password" id="text-password" class="form-control" placeholder="Digite sua senha..." value="<?php echo set_value('text-password') ?>" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Entrar</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Lembre de mim
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Esqueceu sua senha?</a>
                                </div>
                            </div>
                        </fieldset>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>