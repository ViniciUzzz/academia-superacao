<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class FormLogin extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->library("form_validation"); 
    }

    /**
     * Displays the login page.
     *
     * This method displays the system"s login page. It accepts an optional parameter ($param1) that may
     * contain an error message to be displayed on the page. The necessary data is loaded and passed to
     * the corresponding views.
     *
     * @param string|null $param1 Optional error message.
    */
    public function index($param1 = null) {
        $data = [
            "title"=> "Login",
            "messege_error"=> $param1,
        ];
        $this->load->view("Login/templates/head", $data);
        $this->load->view("Login/form-login");
        $this->load->view("Login/templates/footer");
    }

    /**
     * Performs user authentication.
     *
     * This method is responsible for processing the user login attempt. It uses the "form_validation"
     * library to validate the username and password fields. Upon successful validation, the "check_login"
     * function from the "users_model" is called to verify the credentials in the database.
     *
     * If the credentials are correct, the user is redirected to the "dashboard" page. Otherwise, an error
     * message is displayed on the login page.
    */
    public function login() {
        $this->load->library("form_validation");
        $this->load->model("users_model");

        $this->form_validation->set_rules("text-username","Usuário", "required|min_length[3]");
        $this->form_validation->set_rules("text-password","Senha", "required|min_length[3]");

        if (!$this->form_validation->run()) {
            $this->index();
        } else {
            $username = $this->input->post("text-username");
            $password = $this->input->post("text-password");

            $query = $this->users_model->check_login($username, $password);
            if ($query) {
                $this->session->set_userdata("user_id", $this->users_model->get_user_id($username));
                $this->session->set_userdata("logged", TRUE);
                
                redirect(base_url("dashboard"));
            }
            else {
                $messege_error = "Seu cadastro não foi encontrado. Por favor, entre em contato conosco para obter suporte";
                $this->index($messege_error);
            }
        }
    }
}