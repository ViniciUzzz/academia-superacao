<?php
defined("BASEPATH") OR exit("No direct script access allowed");

require APPPATH . 'controllers\Admin\BaseController.php';

class Users extends BaseController { 

    /**
     * Method list_users
     * 
     * This method loads the user listing page, displaying a list of 
     * users. It retrieves necessary data such as the page title, user 
     * information, and a list of users using the "users_model." The 
     * page components, including the header, user listing content, 
     * and footer, are then loaded.
     * 
     * @access public
     * @return void
    */
    public function index() {
        $data = [
            "title"=> "Listagem de usuários",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
            "get_users"=> $this->users_model->get_users(),
        ];

        $this->load->view("admin/templates/head", $data);
        $this->load->view("admin/Management/list_users");
        $this->load->view("admin/templates/footer");
    }

    /**
     * Method register_user
     * 
     * This method loads the user registration page, allowing the 
     * administrator to register a new user. It retrieves necessary 
     * data such as the page title and user information using the 
     * "users_model." The page components, including the header, 
     * user registration content, and footer, are then loaded.
     * 
     * @access public
     * @return void
    */
    public function register_user() {
        $data = [
            "title"=> "Registrar Usuário",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
        ];

        $this->load->view("admin/templates/head", $data);
        $this->load->view("admin/Management/register_user");
        $this->load->view("admin/templates/footer");
    }

    /**
     * Method edit_user
     * 
     * This method loads the page for editing a user's information.
     * It retrieves necessary data such as the page title, user 
     * information of the currently logged-in user, and the information 
     * of the user to be edited using the "users_model." The page 
     * components, including the header, user edit content, and footer, 
     * are then loaded.
     * 
     * @param int $id The user ID to be edited.
     * 
     * @access public
     * @return void
    */
    public function edit_user($id) {
        $data = [
            "title"=> "Alterar Usuário",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
            "user_edit_info"=> $this->users_model->get_user_info($id),
        ];

        $this->load->view("admin/templates/head", $data);
        $this->load->view("admin/Management/edit_user");
        $this->load->view("admin/templates/footer");
    }

    /**
     * Method delete_user
     * 
     * This method deletes a user with the specified ID. If the deletion is successful,
     * the method redirects the administrator to the user listing page. Otherwise,
     * an error message is displayed.
     * 
     * @param int $id The user ID to be deleted.
     * 
     * @access public
     * @return void
    */
    public function delete_user($id) {
        if ($this->users_model->delete_user($id)) {
            $this->index();
        } else  {
            echo "Houve um erro no sistema!";
        }
    }

    /**
     * Method validate_user_registration
     * 
     * This method validates the user registration form using CodeIgniter's 
     * form validation library. If the validation fails, the administrator is 
     * redirected back to the user registration page with error messages. 
     * If the validation is successful, the user data is extracted from the form,
     * and an attempt is made to create a new user using the "users_model." 
     * If successful, the administrator is redirected to the user listing page 
     * with a success message. Otherwise, an error message is displayed.
     * 
     * @access public
     * @return void
    */
    public function validate_user_registration() {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("text-fullname","Nome Completo","required|min_length[3]");
        $this->form_validation->set_rules("text-nickname","Usuário", "required|min_length[3]|is_unique[users.username]");
        $this->form_validation->set_rules("text-cpf","CPF", "required|min_length[14]|is_unique[users.cpf]");
        $this->form_validation->set_rules("text-phone","Celular", "required|min_length[16]");
        $this->form_validation->set_rules("text-birth_date","Data Nascimento", "required");
        $this->form_validation->set_rules("text-email","E-mail", "required|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("text-password","Senha", "required|min_length[3]");
        $this->form_validation->set_rules("text-confirm_password","Confirmar Senha", "required|matches[text-password]");
        
        if (!$this->form_validation->run()) {
            $this->register_user();
        } else {
            $cpf = $this->input->post("text-cpf");
            $username = $this->input->post("text-nickname");
            $fullname = $this->input->post("text-fullname");
            $email = $this->input->post("text-email");
            $phone = $this->input->post("text-phone");
            $admin = $this->input->post("text-admin");
            $password = $this->input->post("text-password");
            $birth_date = $this->input->post("text-birth_date");

            if ($this->users_model->create_user($cpf, $username, $fullname, $email, $phone, $admin, $password,$birth_date)) {
                $messeges["msg_register_correct"] = "Usuário criado com sucesso!";
                $this->session->set_tempdata($messeges, NULL, 1);
            
                $this->index();
            } else {
                echo "Houve um erro no sistema!";
            }
        }
    }

    /**
     * Method validate_user_edit
     * 
     * This method validates the user edit form using CodeIgniter's 
     * form validation library. If the validation fails, the administrator 
     * is redirected back to the user edit page with error messages. 
     * If the validation is successful, the user data is extracted from the 
     * form, and an attempt is made to update the user information using the 
     * "users_model." If successful, the administrator is redirected to the 
     * user listing page with a success message. Otherwise, an error message 
     * is displayed.
     * 
     * @param int $id The user ID to be edited.
     * 
     * @access public
     * @return void
    */
    public function validate_user_edit($id) {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("text-fullname","Nome Completo","required|min_length[3]");
        $this->form_validation->set_rules("text-nickname","Usuário", "required|min_length[3]");
        $this->form_validation->set_rules("text-cpf","CPF", "required|min_length[14]");
        $this->form_validation->set_rules("text-phone","Celular", "required|min_length[16]");
        $this->form_validation->set_rules("text-birth_date","Data Nascimento", "required");
        $this->form_validation->set_rules("text-email","E-mail", "required|valid_email");
        $this->form_validation->set_rules("text-password","Senha", "min_length[3]");
        $this->form_validation->set_rules("text-confirm_password","Confirmar Senha", "matches[text-password]");
        
        if (!$this->form_validation->run()) {
            $this->edit_user($id);
        } else {
            $cpf = $this->input->post("text-cpf");
            $username = $this->input->post("text-nickname");
            $email = $this->input->post("text-email");
            
            if (!$this->users_model->check_email_changes($id, $email)) {
                $this->form_validation->set_rules("text-email","Email", "is_unique[users.email]");
            }
            if (!$this->users_model->check_username($id, $username)) {
                $this->form_validation->set_rules("text-nickname","Usuário", "is_unique[users.username]");
            }
            if (!$this->users_model->check_cpf($id, $cpf)) {
                $this->form_validation->set_rules("text-cpf","CPF", "is_unique[users.cpf]");
            }
            
            if (!$this->form_validation->run()) {
                $this->edit_user($id);
                return;
            }

            $fullname = $this->input->post("text-fullname");
            $phone = $this->input->post("text-phone");            
            $admin = $this->input->post("text-admin");
            $activated = $this->input->post("text-activated");
            $password = $this->input->post("text-password");
            $birth_date = $this->input->post("text-birth_date");

            if ($this->users_model->edit_user($id, $cpf, $username, $fullname, $email, $phone, $admin, $activated, $password,$birth_date)) {
                $messeges["msg_register_correct"] = "Usuário atualizado com sucesso!";
                $this->session->set_tempdata($messeges, NULL, 1);
                
                $this->index();
            } else {
                echo "Houve um erro no sistema!";
            }
        }
    }

}