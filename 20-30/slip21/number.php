<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NumberCheck extends CI_Controller {

    public function index()
    {
        // Load the view
        $this->load->view('number_check_view');
    }
}
