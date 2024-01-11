<?php
defined("BASEPATH") OR exit("No direct script access allowed");

require APPPATH . 'controllers\Admin\BaseController.php';

class Profile extends BaseController {

    public function index() {
        $data = [
            "title"=> "Perfil",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
        ];

        $this->load->view("admin/templates/head", $data);
        $this->load->view("admin/Home/profile");
        $this->load->view("admin/templates/footer");
    }

    /**
     * Method profile_edit
     * 
     * This method is responsible for processing changes to the user's 
     * profile. It uses the CodeIgniter form validation library to validate 
     * the phone and email fields. If the validation is successful, the 
     * changes are saved to the database. Otherwise, error messages can be set.
     * 
     * @access public
     * @return void
    */
    public function profile_edit() {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("text-phone", "Celular", "min_length[16]");
        $this->form_validation->set_rules("text-email", "E-mail", "valid_email");

        if ($this->form_validation->run()) {
            $data = ["msg_register_correct"=> 'Alterações Salvas!'];
            $this->session->set_tempdata($data, NULL, 1);

            $phone = $this->input->post("text-phone");
            $email = $this->input->post("text-email");
            $id = $this->session->userdata("user_id");
            
            if ($this->users_model->check_email_changes($id, $email) == False) {
                $this->form_validation->set_rules("text-email", "E-mail", "is_unique[users.email]");
                $this->form_validation->run();
            } else {
                $this->users_model->change_user_profile($id, $phone, $email);
            }
        }

        $this->index();
    }
}