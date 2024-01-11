
<?php include_once('/../templates/aside.php'); ?>


<div class="body-wrapper">

    <?php include_once('C:\wamp64\www\superacao-academia\application\views\Admin\templates\head.php'); ?>
 
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">
                        Cadastro de Usuários
                    </h5>
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart("admin/management/users/validate_user_edit/". $user_edit_info->id); ?> 
                                <div class="container-fluid mb-4 d-flex align-items-center row">
                                    <div class="d-flex align-items-center">
                                        <img 
                                            id="previewImage"
                                            src="<?php echo base_url("assets/admin/images/profile/user-1.jpg") ?>" 
                                            alt="Imagem do Usuário" 
                                            class="rounded-circle me-4 border border-2 border-primary custom-profile-user-img mt-2"
                                        >
                                        
                                    </div>
                                    <input type="file" name="text-img" id="text-img" class="form-control-file custom-file-input mt-4" onchange="updatePreview()">
                                </div>
                                <div class="container-fluid" style="display: <?php $msg = $this->session->tempdata('msg_register_correct'); echo isset($msg) ? "block" : "none"; ?>;">
                                    <div class='alert alert-success'>
                                        <?php 
                                            $msg = $this->session->tempdata('msg_register_correct'); 
                                            echo isset($msg) ? $this->session->tempdata('msg_register_correct') : ""; 
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-12 col-sm-6 mt-3">
                                        <label for="text-fullname" class="form-label">
                                            Nome Completo
                                        </label>
                                        <input type="text" class="form-control" id="text-fullname" name="text-fullname" value="<?php echo $user_edit_info->full_name ?>">
                                    </div>
                                    <div class="col col-12 col-sm-6 mt-3">
                                        <label for="text-nickname" class="form-label">
                                            Usuário
                                        </label>
                                        <input type="text" class="form-control" id="text-nickname" name="text-nickname" value="<?php echo $user_edit_info->username?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-12 col-sm-6 mt-3">
                                        <label for="text-cpf" class="form-label">
                                            CPF
                                        </label>
                                        <input onkeyup="formatarCPF()" maxlength="14" type="text" class="form-control" id="text-cpf" name="text-cpf" value="<?php echo $user_edit_info->cpf ?>">
                                    </div>
                                    <div class="col col-12 col-sm-6 d-flex justify-content-around align-items-center">
                                        <div class="d-inline mt-3">
                                            <label for="text-admin" class="form-label d-block">
                                                Admin
                                            </label>
                                            <input 
                                                type="checkbox" 
                                                class="form-check-input d-block mx-auto" 
                                                id="text-admin" 
                                                name="text-admin" 
                                                value="1" 
                                                <?php echo $user_edit_info->admin ? "checked" : "" ?>
                                            >
                                        </div>
                                        <div class="d-inline mt-3">
                                            <label for="text-activated" class="form-label d-block">
                                                Usuário Ativo
                                            </label>
                                            <input 
                                                type="checkbox" 
                                                class="form-check-input d-block mx-auto" 
                                                id="text-activated"
                                                name="text-activated"
                                                value="1"
                                                <?php echo $user_edit_info->activated ? "checked" : "" ?>
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col col-12 col-sm-6 mt-3">
                                        <label for="text-phone" class="form-label">
                                            Celular
                                        </label>
                                        <input 
                                            onkeyup="formatarPhone()" 
                                            maxlength="16"
                                            type="text" 
                                            class="form-control" 
                                            id="text-phone"
                                            name="text-phone"
                                            value="<?php echo $user_edit_info->phone ?>"
                                        >
                                    </div>
                                    <div class="col col-12 col-sm-6 mt-3">
                                        <label for="text-birth_date" class="form-label">
                                            Data Nasc.
                                        </label>
                                        <input type="date" class="form-control" id="text-birth_date" name="text-birth_date" value="<?php echo $user_edit_info->birth_date ?>">
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="text-email" class="form-label">
                                        E-mail
                                    </label>
                                    <input type="email" class="form-control" id="text-email" name="text-email" value="<?php echo $user_edit_info->email ?>">
                                    <div id="emailHelp" class="form-text">
                                        Por favor, forneça um endereço de e-mail válido. Este será usado para comunicações importantes e login.
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <div class="col col-12 col-sm-6 mt-3">
                                        <label for="text-password" class="form-label">
                                            Alterar Senha
                                        </label>
                                        <input type="password" class="form-control" id="text-password" name="text-password">
                                    </div>
                                    <div class="col col-12 col-sm-6 mt-3">
                                        <label for="text-confirm_password" class="form-label">
                                            Confirmar Senha
                                        </label>
                                        <input type="password" class="form-control" id="text-confirm_password" name="text-confirm_password">
                                    </div>
                                </div>
                                <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
                                <div class="row my-5">
                                    <div class="col-12 d-flex justify-content-end">
                                        <a type="button" href="<?php echo base_url("gerenciamento/listar_usuarios")?>" class="btn btn-light px-4 mx-3">
                                            <i class="bi bi-arrow-left-circle me-2"></i> Voltar
                                        </a>
                                        <button type="submit" class="btn btn-primary px-4">
                                            Alterar
                                        </button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>