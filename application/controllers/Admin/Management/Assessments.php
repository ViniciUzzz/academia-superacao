<?php
defined("BASEPATH") OR exit("No direct script access allowed");

require APPPATH . 'controllers\Admin\BaseController.php';

class Assessments extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('assessments_model');
    }

    /**
     * Method index
     *
     * Displays the list of users and a summary of their assessments in
     * the administration panel.
     *
     * This method is responsible for loading the list of users and a summary
     * of their assessments in the administration panel. It retrieves information
     * about the currently authenticated user, such as the page title, user information,
     * and a summary of assessments, using the 'users_model' and 'assessments_model'.
     *
     * @return void The method does not return a specific value but loads the necessary
     *              views for the page, such as the assessment list and user information.
    */
    public function index() {
        $data = [
            "title"=> "Listagem de Avaliações",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
            "sumary_assessments"=> $this->assessments_model->get_summary_users_assessments(),
            "is_details_user"=> false,
        ];

        $this->load->view("admin/templates/head", $data);
        $this->load->view("admin/Management/list_assessments");
        $this->load->view("admin/templates/footer");
    }

    /**
     * Method list_user_assessments
     *
     * Displays the list of physical assessments for a user in the
     * administration panel.
     *
     * This method is responsible for loading the list of physical assessments
     * for a specific user in the administration panel. It retrieves the user's
     * assessments using the 'assessments_model' and organizes the necessary
     * data for the page display, such as the page title, user information, and
     * a summary of the assessments.
     *
     * @param int $id_user The ID of the user for whom assessments will be listed.
     * @return void The method does not return a specific value but loads the
     *              necessary views for the page, such as the assessment list or
     *              a message indicating that no assessments were found for the user.
    */
    public function list_user_assessments($id_user) {
        $sumary_assessments = $this->assessments_model->get_user_assessments($id_user);

        $data = [
            "title"=> "Listagem de usuários",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
            "sumary_assessments"=> $sumary_assessments,
            "is_details_user"=> true,
        ];

        $this->load->view("admin/templates/head", $data);

        if ($sumary_assessments) {
            $this->load->view("admin/Management/list_assessments");
        } else {
            $this->load->view("admin/Management/assessments_not_found");
        }

        $this->load->view("admin/templates/footer");
    }

    /**
     * Method register_assessments
     *
     * Displays the physical assessments registration page in the
     * administration panel.
     *
     * This method is responsible for loading the physical assessments
     * registration page in the administration panel. It retrieves
     * information about the currently authenticated user, such as the
     * page title, user information, and the list of registered users,
     * which is necessary for display on the page.
     *
     * @return void The method does not return a specific value but
     *              loads the necessary views for the page.
    */
    public function register_assessments() {
        $data = [
            "title"=> "Registrar Avaliação",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
            'registered_users' => $this->users_model->get_registered_users(),
        ];

        $this->load->view("admin/templates/head", $data);
        $this->load->view("admin/Management/register_assessments");
        $this->load->view("admin/templates/footer");
    }

    /**
     * Method validate_assessments_edit
     *
     * Validates and processes the update of a physical assessment in the system.
     *
     * This method is responsible for handling the validation and processing of the update
     * for a specific physical assessment in the system. It retrieves the updated data from
     * a form, validates it, and then calls the 'edit_assessment' method of the 'assessments_model'
     * to perform the update.
     *
     * @param int $id The ID of the assessment to be updated.
     * @return void The method does not return a specific value, but it redirects to the home page
     *              after a successful update or prints an error message in case of failure.
    */
    public function edit_assessment($id) {
        $data = [
            "title"=> "Listagem de usuários",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
            "assessement_edit_info"=> $this->assessments_model->get_assessment_details($id),
        ];

        $this->load->view("admin/templates/head", $data);
        $this->load->view("admin/Management/edit_assessments");
        $this->load->view("admin/templates/footer");
    }

    /**
     * Method delete_assessment
     *
     * Deletes a physical assessment from the system.
     *
     * This method is responsible for deleting a physical assessment 
     * from the system based on the provided assessment ID. It calls 
     * the 'delete_assessment' method of the 'assessments_model' 
     * to perform the deletion.
     *
     * @param int $id_assessment The ID of the physical assessment to be deleted.
     * @return void The method does not return a specific value but redirects
     *              to the home page after successful deletion or prints an error
     *              message in case of failure.
    */
    public function delete_assessment($id_assessments) {
        if ($this->assessments_model->delete_assessment($id_assessments)) {
            $this->index();
        } else  {
            echo "Houve um erro no sistema!";
        }
    }

    /**
     * Method validate_assessments_registration
     *
     * Validates and processes the registration of physical assessments 
     * in the system.
     *
     * This method retrieves the data submitted by a physical assessments 
     * registration form, validates them, and, if valid, creates a new 
     * entry in the database using the 'assessments_model'.
     *
     * @return void The method does not return a specific value but may 
     *              redirect the user to the home page after successful 
     *              registration or print an error message in case of failure.
     */
    public function validate_assessments_registration() {
        $data = [
            "user"=> $this->input->post("select-user"),
            "height"=> $this->input->post("text-height"),
            "current_weight"=> $this->input->post("text-current_weight"),
            "waist_circumf"=> $this->input->post("text-waist_circumf"),
            "hip_circumf"=> $this->input->post("text-hip_circumf"),
            "left_arm_circumf"=> $this->input->post("text-left_arm_circumf"),
            "right_arm_circumf"=> $this->input->post("text-right_arm_circumf"),
            "left_thigh_circumf"=> $this->input->post("text-left_thigh_circumf"),
            "right_thigh_circumf"=> $this->input->post("text-right_thigh_circumf"),
            "body_fat"=> $this->input->post("text-body_fat"),
            "lean_mass"=> $this->input->post("text-lean_mass"),
            "fat_mass"=> $this->input->post("text-fat_mass"),
            "objective"=> $this->input->post("select-objective"),
       
        ];
        if ($this->assessments_model->create_assessement($data)) { 
            $messeges["msg_register_correct"] = "Avaliação criado com sucesso!";
            $this->session->set_tempdata($messeges, NULL, 1);
            $this->index();
        } else {
            echo 'Houve um erro no sistema!';
        }
    }

    /**
     * Method validate_assessments_edit
     *
     * Validates and processes the update of a physical assessment in the system.
     *
     * This method is responsible for handling the validation and processing of the update
     * for a specific physical assessment in the system. It retrieves the updated data from
     * a form, validates it, and then calls the 'edit_assessment' method of the 'assessments_model'
     * to perform the update.
     *
     * @param int $id The ID of the assessment to be updated.
     * @return void The method does not return a specific value, but it redirects to the home page
     *              after a successful update or prints an error message in case of failure.
    */
    public function validate_assessments_edit($id) {
        $data = [
            "user"=> $this->input->post("select-user"),
            "height"=> $this->input->post("text-height"),
            "current_weight"=> $this->input->post("text-current_weight"),
            "waist_circumf"=> $this->input->post("text-waist_circumf"),
            "hip_circumf"=> $this->input->post("text-hip_circumf"),
            "left_arm_circumf"=> $this->input->post("text-left_arm_circumf"),
            "right_arm_circumf"=> $this->input->post("text-right_arm_circumf"),
            "left_thigh_circumf"=> $this->input->post("text-left_thigh_circumf"),
            "right_thigh_circumf"=> $this->input->post("text-right_thigh_circumf"),
            "body_fat"=> $this->input->post("text-body_fat"),
            "lean_mass"=> $this->input->post("text-lean_mass"),
            "fat_mass"=> $this->input->post("text-fat_mass"),
            "objective"=> $this->input->post("select-objective"),
        ];

        if ($this->assessments_model->edit_assessement($id, $data)) { 
            $messeges["msg_register_correct"] = "Avaliação atualizada com sucesso!";
            $this->session->set_tempdata($messeges, NULL, 1);
            $this->index();
        } else {
            echo 'Houve um erro no sistema!';
        }
    }
}