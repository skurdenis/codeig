<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Linkshortener_model extends CI_Model {

    public $link;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_long_link() {
        $this->link = $this->input->post('link');
        $this->db->insert('links', ["long_link" => $this->link]);
        $ins_id = $this->db->insert_id();
        $this->db->where('id', $ins_id);
        $data = ["short_link" => encode_url($ins_id)];
        $this->db->update('links', $data);
        return $data;
    }

    public function lookup_addr($addr) {
        return $this->db->select('long_link')->where('id', $addr)->get('links')->result_array()[0]['long_link'];
    }

}
