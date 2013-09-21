<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('add_equipment');
    } 

    public function add() {
        $this->form_validation->set_rules('equipment', 'Equipment', 'required|is_unique[dj_equipment.name]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('equipment_add');
            $this->load->view('footer');
        } else {
            
            $form_data = array(
                'name' => set_value('equipment'),
            );
                    
        
            if ($this->add_equipment->SaveForm($form_data) == TRUE) {
                redirect('djs/success');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }

    }

    public function remove($id = '') {
        if ($id != '') {
            $this->add_equipment->removeEquipment($id);
        }
        redirect('djs/success');
    }

}

/* End of file equipment.php */
/* Location: ./application/controllers/equipment.php */