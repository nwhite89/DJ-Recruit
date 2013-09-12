<?php

class add_music extends CI_Model {

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
        $this->db->insert('dj_music', $form_data);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    function removeMusic($id) {        
        $this->db->where('id', $id);
        $this->db->delete('dj_music');
    }

}
?>
