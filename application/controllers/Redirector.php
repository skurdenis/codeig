<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Redirector extends CI_Controller {

    public function make_redirect($short) {
        $this->load->helper(['url', 'url_shortening_helper']);
        $this->load->model('linkshortener_model');
        redirect("{$this->linkshortener_model->lookup_addr(decode_url($short))}");
    }

}
