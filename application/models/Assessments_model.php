<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessments_model extends CI_Model {
    public $id;
    public $user;
    public $height;
    public $current_weight;
    public $waist_circumf;
    public $hip_circumf;
    public $left_arm_circumf;
    public $right_arm_circumf;
    public $left_thigh_circumf;
    public $right_thigh_circumf;
    public $body_fat;
    public $lean_mass;
    public $fat_mass;
    public $objective;

    /**
     * Method get_summary_users_assessments
     * 
     * This method retrieves a summary of user assessments, including user 
     * details and assessment data, by performing a join operation between 
     * the 'assessments' and 'users' tables in the database. The result is 
     * ordered by assessment date in descending order.
     * 
     * @access public
     * @return array Returns an array containing objects representing a summary 
     *               of user assessments, including user details and assessment 
     *               data.
     */
    public function get_summary_users_assessments() {
        // Configuração da consulta
        $this->db->select(
            'u.full_name, '.
            'a.id, '.
            'a.objective, '.
            'a.user, '.
            'a.current_weight, '.
            'a.assessment_date, '.
            'COUNT(a.id) as assessment_count' 
        );
        
        $this->db->from('assessments a');
        $this->db->join('users u', 'u.id = a.user', 'left');  // Substitua 'id' pelo campo chave estrangeira real
        // $this->db->group_by('a.user'); 
    
        // Execução da consulta
        $query = $this->db->get();
    
        // Verificação de erros
        if (!$query) {
            die("Erro na consulta: " . $this->db->error());
        }
    
        // Retornar os resultados da consulta
        return $query->result();
    }
    

    /**
     * Method get_user_assessments
     *
     * Retrieves the assessments of a specific user from the database.
     *
     * This method is responsible for retrieving the assessments of a specific user
     * from the 'assessments' table in the database. It uses CodeIgniter's Database
     * Query Builder to perform a join operation with the 'users' table, selecting
     * specific columns, and filtering by the user ID. The results are ordered by
     * the assessment date in descending order.
     *
     * @param int $id_user The ID of the user for whom assessments will be retrieved.
     * @return array Returns an array of objects containing user assessments.
    */
    public function get_user_assessments($id_user) {
        $this->db->select(
            'users.id as iduser, '.
            'users.full_name, '.
            'assessments.id, '.
            'assessments.height, '.
            'assessments.objective, '.
            'assessments.user, '.
            'assessments.current_weight, '.
            'assessments.assessment_date '
        );
        $this->db->from('assessments');
        $this->db->where('users.id', $id_user);
        $this->db->join('users','users.id = assessments.user');
        $this->db->order_by('assessments.assessment_date', 'DESC');

        return $this->db->get()->result();
    }

    /**
     * Method get_assessment_details
     *
     * Retrieves the details of a specific physical assessment from the database.
     *
     * This method is responsible for retrieving the details of a specific physical
     * assessment from the 'assessments' table in the database. It uses CodeIgniter's
     * Database Query Builder to perform a join operation with the 'users' table,
     * selecting specific columns, and filtering by the assessment ID.
     *
     * @param int $id The ID of the assessment for which details will be retrieved.
     * @return mixed Returns an object containing assessment details if found, otherwise NULL.
    */
    public function get_assessment_details($id) {
        $this->db->select(
            'users.id as iduser, '.
            'users.full_name, '.
            'assessments.*'
        );
        $this->db->from('assessments');
        $this->db->where('assessments.id', $id);
        $this->db->join('users','users.id = assessments.user');

        $query = $this->db->get()->result();

        if (count($query) > 0) {
            return $query[0];
        } else 
            return NULL;
    }
    
    /**
     * Method create_assessment
     *
     * Inserts a new physical assessment into the database.
     *
     * This method is responsible for inserting a new physical assessment into
     * the 'assessments' table in the database. It takes an array of data containing
     * the details of the assessment and uses CodeIgniter's Database Query Builder
     * to perform the insertion operation.
     *
     * @param array $data An array containing the data for the new assessment.
     * @return bool Returns TRUE if the insertion is successful, otherwise FALSE.
    */
    public function create_assessement($data) {
        return $this->db->insert("assessments", $data);
    }

    /**
     * Method edit_assessment
     *
     * Updates the details of a specific physical assessment in the database.
     *
     * This method is responsible for updating the details of a specific physical assessment
     * in the database. It takes the ID of the user and an array of updated data, then uses
     * the CodeIgniter's Database Query Builder to update the corresponding record in the 'assessments'
     * table.
     *
     * @param int $id The ID of the user associated with the assessment to be updated.
     * @param array $data An array containing the updated data for the assessment.
     * @return bool Returns TRUE if the update is successful, otherwise FALSE.
    */
    public function edit_assessement($id, $data) {
        $this->db->where("id", $id);

        return $this->db->update("assessments", $data);
    }

    /**
     * Method delete_assessment
     * 
     * This method deletes a specific assessment from the 'assessments' 
     * table in the database based on the provided assessment ID.
     * 
     * @param int $id_assessment The ID of the assessment to be deleted.
     * 
     * @access public
     * @return void
    */
    public function delete_assessment($id_assessments) {
        $this->db->where("id", $id_assessments);

        return $this->db->delete("assessments");
    }
}