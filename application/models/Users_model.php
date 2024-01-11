<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Users_model extends CI_Model {
    public $id;
    public $cpf;
    public $username;
    public $full_name;
    public $email;
    public $phone;
    public $admin;
    public $activated;
    public $password;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Check login credentials.
     *
     * This method checks whether the provided username and password correspond to a valid user
     * in the system. The password is stored as an MD5 hash in the database.
     *
     * @param string $username The username to be checked.
     * @param string $password The password to be checked (should be provided as MD5).
     * @return bool Returns TRUE if the credentials are valid; FALSE otherwise.
    */
    public function check_login($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", md5($password));
        $this->db->where("activated", 1);
        
        $response = $this->db->get("users")->result(); 

        if (count($response) == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get user information.
     *
     * This method queries the database to retrieve specific information about the user based on the
     * provided ID.
     *
     * @param int $id User ID to be queried.
     * @return array Query result containing user information.
    */
    public function get_user_info($id) {
        $this->db->where("id", $id);
    
        $query = $this->db->get("users")->result();
      
        if (count($query) > 0) {
            return $query[0];
        } else {
            return array();
        }
    }

    /**
     * Get user ID by username.
     *
     * This method queries the database to retrieve the user ID based on the provided username.
     *
     * @param string $username Username for which to obtain the ID.
     * @return array Query result containing the user ID.
    */
    public function get_user_id($username) {
        $this->db->select("id");
        $this->db->where("username", $username);
        
        return $this->db->get("users")->row()->id;
    }


    /**
     * Method check_email_changes
     * 
     * This method checks if an email address is already registered for 
     * another user, excluding the user with the provided ID from the check. 
     * The method returns true if the email address is not associated with 
     * any other user (except the user with the provided ID), and false otherwise.
     * 
     * @param int $id The ID of the user being excluded from the check.
     * @param string $email The email address to be checked.
     * 
     * @access public
     * @return bool Returns true if the email address is not associated with any 
     *              other user (except the user with the provided ID), and false 
     *              otherwise.
    */
    public function check_email_changes($id, $email) {
        $this->db->select("id");
        $this->db->where("id !=", $id);
        $this->db->where("email", $email);
        
        $query = $this->db->get("users");
        return !($query->num_rows() > 0);
    }

    /**
     * Method check_username
     * 
     * This method checks if a username is already registered for another 
     * user, excluding the user with the provided ID from the check. The 
     * method returns true if the username is not associated with any other 
     * user (except the user with the provided ID), and false otherwise.
     * 
     * @param int $id The ID of the user being excluded from the check.
     * @param string $username The username to be checked.
     * 
     * @access public
     * @return bool Returns true if the username is not associated with any 
     *              other user (except the user with the provided ID), and 
     *              false otherwise.
    */
    public function check_username($id, $username) {
        $this->db->select("id");
        $this->db->where("id !=", $id);
        $this->db->where("username", $username);
    
        $query = $this->db->get("users");

        return !($query->num_rows() > 0);
    }

    /**
     * Method check_cpf
     * 
     * This method checks if a CPF (Brazilian identification number) 
     * is already registered for another user, excluding the user with 
     * the provided ID from the check. The method returns true if the 
     * CPF is not associated with any other user (except the user with 
     * the provided ID), and false otherwise.
     * 
     * @param int $id The ID of the user being excluded from the check.
     * @param string $cpf The CPF to be checked.
     * 
     * @access public
     * @return bool Returns true if the CPF is not associated with any 
     *              other user (except the user with the provided ID), 
     *              and false otherwise.
    */
    public function check_cpf($id, $cpf) {
        $this->db->select("id");
        $this->db->where("id !=", $id);
        $this->db->where("cpf", $cpf);
    
        $query = $this->db->get("users");

        return !($query->num_rows() > 0);
    }

    /**
     * Changes the user profile by updating the phone number and email.
     *
     * @param int $id User ID
     * @param string $phone New phone number
     * @param string $email New email address
     * @return bool Returns TRUE on successful update, FALSE otherwise
    */
    public function change_user_profile($id, $phone, $email) {
        $data["phone"] = $phone;
        $data["email"] = $email;
        
        $this->db->where("id", $id);

        return $this->db->update("users", $data);
    }

    /**
     * Method create_user
     * 
     * This method creates a new user in the database with the provided 
     * information.
     * 
     * @param string $cpf The CPF (Brazilian identification number) of 
     *                    the user.
     * @param string $username The username of the user.
     * @param string $full_name The full name of the user.
     * @param string $email The email address of the user.
     * @param string $phone The phone number of the user.
     * @param bool $admin A boolean indicating whether the user is an 
     *                    administrator (true) or not (false).
     * @param string $password The password of the user (hashed using 
     *                         md5 for basic illustration purposes, consider 
     *                         using stronger encryption methods in a 
     *                         production environment).
     * @param string $birth_date The birth date of the user.
     * 
     * @access public
     * @return bool Returns true if the user is successfully inserted into 
     *              the database, and false otherwise.
    */
    public function create_user($cpf, $username, $full_name, $email, $phone, $admin, $password, $birth_date) {
        $data["cpf"] = $cpf;
        $data["username"] = $username;
        $data["full_name"] = $full_name;
        $data["email"] = $email;
        $data["phone"] = $phone;

        if($admin) {
            $data["admin"] = 1;
        } else {
            $data["admin"] = 0;
        }

        $data["activated"] = 1;
        $data["password"] = md5($password);
        $data["birth_date"] = $birth_date;

        return $this->db->insert("users", $data);
    }

    /**
     * Method edit_user
     * 
     * This method updates an existing user in the database with the 
     * provided information.
     * 
     * @param int $id The ID of the user to be edited.
     * @param string $cpf The new CPF (Brazilian identification number) 
     *                    of the user.
     * @param string $username The new username of the user.
     * @param string $full_name The new full name of the user.
     * @param string $email The new email address of the user.
     * @param string $phone The new phone number of the user.
     * @param bool $admin A boolean indicating whether the user is an 
     *                    administrator (true) or not (false).
     * @param bool $activated A boolean indicating whether the user is 
     *                        activated (true) or not (false).
     * @param string|null $password The new password of the user (hashed 
     *              using md5 for basic illustration purposes, set to null 
     *              if not updated, and consider using stronger encryption 
     *              methods in a production environment).
     * @param string $birth_date The new birth date of the user.
     * 
     * @access public
     * @return bool Returns true if the user is successfully updated in the 
     *              database, and false otherwise.
    */
    public function edit_user($id, $cpf, $username, $full_name, $email, $phone, $admin, $activated, $password, $birth_date) {
        $data["cpf"] = $cpf;
        $data["username"] = $username;
        $data["full_name"] = $full_name;
        $data["email"] = $email;
        $data["phone"] = $phone;

        if($admin) {
            $data["admin"] = 1;
        } else {
            $data["admin"] = 0;
        }
        if($activated) {
            $data["activated"] = 1;
        } else {
            $data["activated"] = 0;
        }
        if ($password) {
            $data["password"] = md5($password);
        }
        
        $data["birth_date"] = $birth_date;

        $this->db->where('id', $id);
        return $this->db->update("users", $data);
    }

    /**
     * Method get_users
     * 
     * This method retrieves all users from the 'users' table in the 
     * database.
     * 
     * @access public
     * @return array Returns an array containing user objects representing 
     *               all users in the 'users' table.
    */
    public function get_users() {
        return $this->db->get("users")->result();
    }

    /**
     * Método get_registered_users
     *
     * Obtém informações básicas de usuários registrados no banco de dados.
     *
     * Este método realiza uma consulta ao banco de dados para recuperar os 
     * IDs e nomes completos dos usuários registrados.
     *
     * @return array Retorna um array de objetos contendo informações dos 
     *               usuários registrados. Cada objeto possui as propriedades 
     *               'id' e 'full_name'.
     */
    public function get_registered_users() {
        $this->db->select("id, full_name");

        return $this->db->get("users")->result();
    }

    /**
     * Method delete_user
     * 
     * This method deletes a user from the 'users' table in the 
     * database based on the provided user ID.
     * 
     * @param int $id The ID of the user to be deleted.
     * 
     * @access public
     * @return bool Returns true if the user is successfully 
     *              deleted from the 'users' table, and false 
     *              otherwise.
    */
    public function delete_user($id) {
        $this->db->where("id", $id);
        
        return $this->db->delete("users");
    }
}