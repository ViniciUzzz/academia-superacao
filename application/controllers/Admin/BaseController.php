<?php
defined("BASEPATH") OR exit("No direct script access allowed");


class BaseController extends CI_Controller {

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