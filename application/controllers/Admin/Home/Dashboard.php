<?php
defined("BASEPATH") OR exit("No direct script access allowed");

require APPPATH . 'controllers\Admin\BaseController.php';

class Dashboard extends BaseController {

    /**
     * Constructor Method
     * 
     * This constructor initializes the class by calling the parent 
     * constructor, loading the "users_model," and checking if a user 
     * is logged in. If not, it redirects the user to the base URL.
     * 
     * @access public
     * @return void
    */
    public function __construct() {
        parent::__construct();
        $this->load->model("users_model");

        if (!$this->session->userdata("logged")) {
            redirect(base_url());
        }
    }


    /**
     * Method dashboard
     * 
     * This method loads the dashboard page.
     * 
     * @access public
     * @return void
    */
    public function index() {
        $data = [
            "title"=> "Dashboard",
            "user_info"=> $this->users_model->get_user_info($this->session->userdata("user_id")),
        ];

        $this->load->view("admin/templates/head", $data);
        $this->load->view("admin/Home/dashboard");
        $this->load->view("admin/templates/footer");
    }

    /**
     * Method logout
     * 
     * This method is responsible for logging out the currently 
     * authenticated user. It clears the user-related session data, 
     * such as "user_id" and "logged," and redirects the user to 
     * the base URL.
     * 
     * @access public
     * @return void
    */
    public function logout() { 
        $this->session->set_userdata("user_id", "");
        $this->session->set_userdata("logged", FALSE);

        redirect(base_url());
    }
}