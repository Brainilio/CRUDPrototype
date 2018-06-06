<?php

class Main_model extends CI_Model {




    public function test_main() {
        echo "This is a model function";

    }

    function insert_data($data) {

            $this->db->insert("tbl_user", $data);
    }

    function fetch_data()
    {

        $this->db->select("*");
        $this->db->from("tbl_user");
        $query = $this->db->get();
        return $query;
    }

    function delete_data($id) {

        $this->db->where("id", $id);
        $this->db->delete("tbl_user");


    }

    function fetch_single_data($id) {

        $this->db->where("id", $id);
        $query = $this->db->get("tbl_user");
        return $query;

    }

    function update_data($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("tbl_user", $data);
    }

}