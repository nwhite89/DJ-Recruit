<?php

class add_equipment extends CI_Model {

    public function __construct() {
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

    public function SaveForm($form_data) {
        $this->db->insert('dj_equipment', $form_data);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    public function removeEquipment($id) {        
        $this->db->where('id', $id);
        $this->db->delete('dj_equipment');
    }

    public function listEquipment() {
        $query = $this->db->get('dj_equipment');
        return $query->result();
    }

}
?>
