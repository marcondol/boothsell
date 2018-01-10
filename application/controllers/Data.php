<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

   public function __construct(){
      parent::__construct();
      $this->load->model('booth_model');
   }

	public function location(){
      header('Content-Type: application/json');
      echo(json_encode($this->booth_model->get_location('')));
   }

}
