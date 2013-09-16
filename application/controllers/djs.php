<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class djs extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -  
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('add_dj');
    } 

    public function index() {
        $this->load->view('header');

        $this->db->order_by('name', 'DESC');

        $query = $this->db->get('dj_contacts');
        $djs = $query->result();

        $data = array(
            'djs' => $djs
        );

        $this->load->view('djs', $data);
        $this->load->view('footer');
    }

    public function views($id = '') {
        $this->load->view('header');
        $this->db->limit(1);
        $this->db->where('id', $id);

        $query = $this->db->get('dj_contacts');
        $djs = $query->result();

        $query = $this->db->query('SELECT  dje.id, dje.name 
            FROM dj_contact_equipment djce
            INNER JOIN dj_equipment dje
            ON dje.id = djce.equipment_id
            WHERE djce.contact_id = ' . $id);
        $equipment = $query->result();

        $query = $this->db->query('SELECT  djm.id, djm.music
            FROM dj_contact_music djcm
            INNER JOIN dj_music djm
            ON djm.id = djcm.music_id
            WHERE djcm.contact_id = '. $id);

        $music = $query->result();
        $this->load->model('add_equipment');
        $equipmentList = $this->add_equipment->listEquipment();
        
        $this->load->model('add_music');
        $musicList = $this->add_music->listMusic();

        $data = array(
            'djs' => $djs,
            'equipment' => $equipment,
            'music' => $music,
            'equipmentList' => $equipmentList,
            'musicList' => $musicList
        );

        $this->load->view('dj_name', $data);
        $this->load->view('footer');
    }
  
    public function add() {            
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'E-mail', '');
        $this->form_validation->set_rules('mobile', 'Mobile', '');
        $this->form_validation->set_rules('address_line1', 'Address Line 1', '');
        $this->form_validation->set_rules('address_line2', 'Address Line 2', '');
        $this->form_validation->set_rules('town', 'Town', '');
        $this->form_validation->set_rules('postcode', 'Postcode', '');
        $this->form_validation->set_rules('dob', 'Dob', '');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('dj_add');
            $this->load->view('footer');
        }
        else {
            $dobDate = strtotime(set_value('dob'));
            $form_data = array(
                'name' => set_value('name'),
                'email' => set_value('email'),
                'mobile' => set_value('mobile'),
                'address_line1' => set_value('address_line1'),
                'address_line2' => set_value('address_line2'),
                'town' => set_value('town'),
                'postcode' => set_value('postcode'),
                'dob' => $dobDate
            );
                    
        
            if ($this->add_dj->SaveForm($form_data) == TRUE) {
                redirect('djs/success');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    public function edit($id = '') {
        $this->db->limit(1);
        $this->db->where('id', $id);

        $query = $this->db->get('dj_contacts');
        $djs = $query->result();

        $data = array(
            'djs' => $djs
        );

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'E-mail', '');
        $this->form_validation->set_rules('mobile', 'Mobile', '');
        $this->form_validation->set_rules('address_line1', 'Address Line 1', '');
        $this->form_validation->set_rules('address_line2', 'Address Line 2', '');
        $this->form_validation->set_rules('town', 'Town', '');
        $this->form_validation->set_rules('postcode', 'Postcode', '');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('dj_edit', $data);
            $this->load->view('footer');
        }
        else {
            $form_data = array(
                'id' => $id,
                'name' => set_value('name'),
                'email' => set_value('email'),
                'mobile' => set_value('mobile'),
                'address_line1' => set_value('address_line1'),
                'address_line2' => set_value('address_line2'),
                'town' => set_value('town'),
                'postcode' => set_value('postcode')
            );
        
            if ($this->add_dj->EditSaveForm($form_data, $id) == TRUE) {
                redirect('djs/success');
            } else {
                $this->load->view('header');
                echo 'An error occurred saving your information. Please try again later';
                $this->load->view('footer');
            }
        }
    }

    public function remove($id = '') {
        $this->add_dj->removeUser($id);
        redirect('djs/success');
    }

    public function addEquipment() {
        $this->db->limit(1);
        $this->db->where('name', $this->input->post('dj-equipment'));
        $query = $this->db->get('dj_equipment');
        $equipment = $query->result();

        $form_data = array(
            'contact_id' => $this->input->post('dj-id'),
            'equipment_id' => $equipment[0]->id
        );
                    
        
        if ($this->add_dj->addDjEquipment($form_data) == TRUE) {
            redirect('djs/success');
        } else {
            echo 'An error occurred saving your information. Please try again later';
        }
    }

    public function addMusic() {
        $this->db->limit(1);
        $this->db->where('name', $this->input->post('dj-music'));
        $query = $this->db->get('dj_music');
        $music = $query->result();

        $form_data = array(
            'contact_id' => $this->input->post('dj-id'),
            'music_id' => $music[0]->id
        );
                    
        
        if ($this->add_dj->addDjMusic($form_data) == TRUE) {
            redirect('djs/success');
        } else {
            echo 'An error occurred saving your information. Please try again later';
        }
    }

    function success() {
        $this->load->view('header');
        $this->load->view('success');
        $this->load->view('footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */