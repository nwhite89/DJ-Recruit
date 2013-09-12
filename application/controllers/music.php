<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('add_music');
    } 

    public function add($id = null) {
        if ($id == null) {
            redirect('djs');
        }

        $this->db->limit(1);
        $this->db->where('id', $id);
        $query = $this->db->get('dj_contacts');
        $djs = $query->result();


        $data = array(
            'djId' => $id,
            'djs' => $djs
        );

        $this->form_validation->set_rules('music', 'Music', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('music_add', $data);
            $this->load->view('footer');
        } else {
            
            $form_data = array(
                'contact_id' => $id,
                'music' => set_value('music')
            );
                    
        
            if ($this->add_music->SaveForm($form_data) == TRUE) {
                redirect('djs/success');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }

    }

    public function remove($id = '') {
        if ($id != '') {
            $this->add_music->removeMusic($id);
        }
        redirect('djs/success');
    }

}

/* End of file equipment.php */
/* Location: ./application/controllers/equipment.php */