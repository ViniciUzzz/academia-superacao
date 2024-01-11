<?php include_once('C:/wamp64/www/superacao-academia/application/views/Admin/templates/aside.php'); ?>

<div class="body-wrapper">

    <?php include_once('C:\wamp64\www\superacao-academia\application\views\Admin\templates\head.php'); ?>

    <div class="container-fluid custom-user-select">
        <div class="card rounded-4 position-relative">
            <img 
                src="<?php echo base_url("assets/admin/images/profile/capa.jpg") ?>" 
                class="rounded-top-4 custom-profile-cover" 
                alt="Imagem de capa do perfil"
            >
            <img 
                src="<?php echo base_url("assets/admin/images/profile/user-1.jpg") ?>" 
                class="position-absolute rounded-circle border border-2 border-primary custom-profile-user-img"
                alt="Imagem do Usuário <?php echo $user_info->full_name ?>" 
            >
            <div class="card-body mt-4">
                <div class="container-fluid">
                    <div class="row d-flex flex-wrap">
                        <div class="col col-12 col-sm-4 col-md-3 col-xxl-2 mt-3">
                            <label class="fs-2 mb-0">
                                Nome completo
                            </h2>
                            <p class="fs-5 fw-bolder">
                                <?php echo $user_info->full_name ?>
                            </p>
                        </div>
                        <div class="col col-12 col-sm-4 col-md-3 col-xxl-2  mt-3">
                            <h2 class="fs-2 mb-0">
                                Data Nasc.
                            </h2>
                            <p class="fs-5 fw-bolder">
                                <?php echo date('d/m/Y', strtotime($user_info->birth_date)) ?>
                            </p>
                        </div>
                        <div class="col col-12 col-sm-4 col-md-3 col-xxl-2  mt-3">
                            <h2 class="fs-2 mb-0">
                                Data Ingresso
                            </h2>
                            <p class="fs-5 fw-bolder">
                                <?php echo date('d/m/Y', strtotime($user_info->entry_date)) ?>
                            </p>
                        </div>
                        <?php 
                            $config['class'] = "col col-12 col-xxl-6";
                            echo form_open(base_url("admin/home/profile/profile_edit"), $config);
                        ?>
                            <div class= "row">
                                <label for="text-phone" class="form-label">
                                    Celular
                                </h2>
                                <input 
                                    type="text" 
                                    onkeyup="formatarPhone()" 
                                    maxlength="16" 
                                    name="text-phone" 
                                    id="text-phone" 
                                    class="form-control p-2" 
                                    value="<?php echo $user_info->phone ?>"
                                >
                            </div>
                            <div class= "row mt-3">
                                <label for="text-email" class="form-label">
                                    E-mail
                                </h2>
                                <input 
                                    type="email" 
                                    name="text-email" 
                                    id="text-email" 
                                    class="form-control p-2" 
                                    value="<?php echo $user_info->email ?>"
                                >
                            </div>
                            <div class= "row d-flex justify-content-end me-1 mt-3">
                                <button class="btn btn-primary btn-sm px-4 py-2" type="submit" style="width: auto">
                                    Alterar dados
                                </button>
                            </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <?php  echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
                <div class="container-fluid" style="display: <?php $msg = $this->session->tempdata('msg_register_correct'); echo isset($msg) ? "block" : "none"; ?>;">
                    <div class='alert alert-success'>
                        <?php 
                            $msg = $this->session->tempdata('msg_register_correct'); 
                            echo isset($msg) ? $this->session->tempdata('msg_register_correct') : ""; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>