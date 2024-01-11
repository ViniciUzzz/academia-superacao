<?php include_once('C:/wamp64/www/superacao-academia/application/views/Admin/templates/aside.php'); ?>

<div class="body-wrapper">

    <?php include_once('C:\wamp64\www\superacao-academia\application\views\Admin\templates\head.php'); ?>

    <div class="container-fluid custom-user-select">
        <div class="card rounded-4">
            <div class="card-body">
                <?php  echo form_open_multipart("admin/management/assessments/validate_assessments_edit/$assessement_edit_info->id"); ?>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text" class="form-label">Usuários</label>
                            <select class="form-select" id="select-user" name="select-user" required <?php echo $user_info->admin ? '' : 'disabled' ?>>
                                <option value="<?php echo $assessement_edit_info->user ?>"> <?php echo $assessement_edit_info->full_name ?> </option>
                            </select>
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-birth_date" class="form-label">Data Nasc.</label>
                            <input 
                                type="date" 
                                class="form-control" 
                                id="text-birth_date" 
                                name="text-birth_date"
                                value="<?php echo date('Y-m-d', strtotime($assessement_edit_info->assessment_date)) ?>"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                            >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-height" class="form-label">Altura <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-height" 
                                name="text-height"
                                placeholder="ex: 170"
                                maxlength="3"
                                value="<?php echo $assessement_edit_info->height ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-current_weight" class="form-label">Peso Atual (kg)<span></span></label>
                            <input 
                                type="text"
                                class="form-control" 
                                id="text-current_weight" 
                                name="text-current_weight"
                                placeholder="ex: 80.520"
                                maxlength="7"
                                value="<?php echo $assessement_edit_info->current_weight ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-waist_circumf" class="form-label">Circunferência da Cintura <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-waist_circumf" 
                                name="text-waist_circumf"
                                placeholder="ex: 60.3"
                                maxlength="7"
                                value="<?php echo  $assessement_edit_info->waist_circumf ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-hip_circumf" class="form-label">Circunferência do quadril <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-hip_circumf" 
                                name="text-hip_circumf"
                                placeholder="ex: 60.3"
                                maxlength="6"
                                value="<?php echo $assessement_edit_info->hip_circumf ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-left_arm_circumf" class="form-label">Circunferência - Braço Esquerdo <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-left_arm_circumf" 
                                name="text-left_arm_circumf"
                                placeholder="ex: 30.00"
                                maxlength="6"
                                value="<?php echo $assessement_edit_info->left_arm_circumf ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-right_arm_circumf" class="form-label">Circunferência - Braço Direito. <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-right_arm_circumf" 
                                name="text-right_arm_circumf"
                                placeholder="ex: 30.00"
                                maxlength="6"
                                value="<?php echo $assessement_edit_info->right_arm_circumf ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-left_thigh_circumf" class="form-label">Circunferência - Coxa Esquerdo <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-left_thigh_circumf" 
                                name="text-left_thigh_circumf"
                                placeholder="ex: 30.00"
                                maxlength="6"
                                value="<?php echo $assessement_edit_info->left_thigh_circumf ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-right_thigh_circumf" class="form-label">Circunferência - Coxa Direito. <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-right_thigh_circumf" 
                                name="text-right_thigh_circumf"
                                placeholder="ex: 30.00"
                                maxlength="6"
                                value="<?php echo $assessement_edit_info->right_thigh_circumf ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-body_fat" class="form-label">Gordura Corporal<span>(%)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-body_fat" 
                                name="text-body_fat"
                                placeholder="ex: 15.50"
                                maxlength="5"
                                value="<?php echo $assessement_edit_info->body_fat ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-lean_mass" class="form-label">Massa Magra <span>(kg)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-lean_mass" 
                                name="text-lean_mass"
                                placeholder="ex: 55.00"
                                maxlength="7"
                                value="<?php echo $assessement_edit_info->lean_mass ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-fat_mass" class="form-label">Massa Gorda<span>(kg)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-fat_mass" 
                                name="text-fat_mass"
                                placeholder="ex: 15.50"
                                maxlength="7"
                                value="<?php echo $assessement_edit_info->fat_mass ?>"
                                oninput="validationInput(this)"
                                required
                                <?php echo $user_info->admin ? '' : 'disabled' ?>
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="select-objective" class="form-label">Objetivo</label>
                            <select class="form-select" id="select-objective" name="select-objective" <?php echo $user_info->admin ? '' : 'disabled' ?> required>
                                <option value="Perda de Peso" <?php echo ($assessement_edit_info->objective == "Perda de Peso") ? 'selected' : ''; ?>>Perda de Peso</option>
                                <option value="Ganho de Massa" <?php echo ($assessement_edit_info->objective == "Ganho de Massa") ? 'selected' : ''; ?>>Ganho de Massa</option>
                            </select>
                        </div>
                        <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
                        <div class="row my-5">
                            <div class="col-12 d-flex justify-content-end">
                                <a type="button" href="<?php echo $user_info->admin ? base_url("gerenciamento/avaliacoes") : base_url("gerenciamento/avaliacoes_usuario/$user_info->id")?>" class="btn btn-light px-4 mx-3">
                                    <i class="bi bi-arrow-left-circle me-2"></i> Voltar
                                </a>
                                <button type="submit" class="btn btn-primary px-4"  style="display: <?php echo $user_info->admin ? "flex" : "none" ?>;">
                                    Alterar
                                </button>
                            </div>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>