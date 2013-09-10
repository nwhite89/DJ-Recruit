<?php

class add_dj extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // --------------------------------------------------------------------

    /** 
    * function SaveForm()
    *
    * insert form data
    * @param $form_data - array
    * @return Bool - TRUE or FALSE
    */

    function SaveForm($form_data) {
        $this->db->insert('dj_contacts', $form_data);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    function EditSaveForm($form_data) {
        $this->db->where('id', $form_data['id']);
        print_r($form_data);
        $this->db->update('dj_contacts', $form_data); 

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }
}
?>