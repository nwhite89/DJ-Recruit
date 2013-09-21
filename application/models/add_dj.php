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

    function EditSaveForm($form_data, $id) {
        $this->db->where('id', $id);
        $this->db->update('dj_contacts', $form_data); 

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    public function addDjEquipment($form_data) {
        $this->db->insert('dj_contact_equipment', $form_data);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    public function addDjMusic($form_data) {
        $this->db->insert('dj_contact_music', $form_data);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    public function getDJAge($dob = 0) {
        if ($dob == 0 || $dob == '' || $dob == null) {
            return '';
        } else {
            $now = time();

            $yearDiff   = date("Y", $now) - date("Y", $dob);
            $monthDiff  = date("m", $now) - date("m", $dob);
            $dayDiff    = date("d", $now) - date("d", $dob);

            if ($monthDiff < 0) {
                $yearDiff--;
            } elseif (($monthDiff == 0) && ($dayDiff < 0)) {
                $yearDiff--;
            }

            $result = intval($yearDiff);
            return $result;
        }
    }

    function removeUser($id) {
        $this->db->where('id', $id);
        $this->db->delete('dj_contacts');
        
        $this->db->where('contact_id', $id);
        $this->db->delete('dj_contact_equipment');

        $this->db->where('contact_id', $id);
        $this->db->delete('dj_contact_music');
    }
}
?>
