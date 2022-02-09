<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import Model
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking_model extends CI_Model {

    private $_batchImport;
    function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}


    public function setBatchImport($batchImport) {
       
        $this->_batchImport = $batchImport;
    }

    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->trans_start();
        $this->db->insert_batch('dtdc_tracking_no', $data);
        //$this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                echo "SOME OF TRACKING NUMBER IS DUPLICATE/already exists. SO won't process";die;
            } 
        else {
                $this->db->trans_commit();
            }
    }
    // get employee list
    public function employeeList() {
        $this->db->select(array('e.id', 'e.first_name', 'e.last_name', 'e.email', 'e.dob', 'e.contact_no'));
        $this->db->from('import as e');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function display() {
        $this->db->select(array('e.id', 'e.track_no', 'e.status', 'e.created_at'));
        $this->db->from('dtdc_tracking_no as e');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>