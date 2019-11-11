<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shortener extends CI_Controller {

    public function index() {
        $this->load->helper(['url', 'url_shortening_helper', 'form']);
        $this->load->library(['session', 'form_validation']);
        $this->load->model('linkshortener_model');
        $this->form_validation->set_rules('link', 'Link', 'required|valid_url');

        if (!$this->form_validation->run()) {

            $this->load->view('shortenerform');
        } else {
            $short_link = $this->linkshortener_model->insert_long_link();
            $this->session->set_flashdata('item', $short_link);

            redirect($uri = "success");
        }
    }

    public function success() {
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->flashdata('item')) {
            show_404();
        }

        $short_link = $this->session->flashdata('item');
        $this->load->view('formsuccess', $short_link);
    }

}
