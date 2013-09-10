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

        $data = array(
            'djs' => $djs
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
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('dj_add');
            $this->load->view('footer');
        }
        else {
            
            $form_data = array(
                'name' => set_value('name'),
                'email' => set_value('email'),
                'mobile' => set_value('mobile'),
                'address_line1' => set_value('address_line1'),
                'address_line2' => set_value('address_line2'),
                'town' => set_value('town'),
                'postcode' => set_value('postcode')
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
                    
        
            if ($this->add_dj->EditSaveForm($form_data) == TRUE) {
                redirect('djs/success');
            } else {
                $this->load->view('header');
                echo 'An error occurred saving your information. Please try again later';
                $this->load->view('footer');
            }
        }
    }

    function success() {
        $this->load->view('header');
        echo 'Success';
        $this->load->view('footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */