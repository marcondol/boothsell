<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

   public function __construct(){
      parent::__construct();
      $this->load->model('booth_model');
      $this->load->model('pesan_model');
   }

	public function index($idx){
      $data = $this->booth_model->get_booth_detail($idx);
		$this->load->view('pesan',$data);
   }

   public function add(){
      $idx = $this->input->post('booth_id');
      $date = new DateTime();
      $tmp_stamp = $date->getTimestamp();
      $arr_data['booth_id'] = $idx;
      $arr_data['name'] = $this->input->post('nama');
      $arr_data['phone'] = $this->input->post('no_telp');
      $arr_data['email'] = $this->input->post('email');
      $arr_data['booth_price'] = $this->input->post('booth_price');
      $arr_data['confirmation_hash'] = hash('sha256', $tmp_stamp);
      $this->pesan_model->create_order($arr_data);
      $this->pesan_model->send_confirm_mail($arr_data['email'], $arr_data['confirmation_hash']);
      $data = $this->booth_model->get_booth_detail($idx);
      $this->load->view('sukses',$data);
   }

   public function email_verification($hash){
      $res = $this->pesan_model->get_confirm_email($hash);
      if(!empty($res)){
         $booth_id = $res[0]->booth_id;
         $booking_id = $res[0]->booking_id;
         $email = $res[0]->email;
         $addr_hash = hash('sha256', $booking_id.$booth_id.$email);
         $this->booth_model->update_booth_status($booth_id);
         $this->pesan_model->update_verified_order($booking_id, $addr_hash);
         $this->pesan_model->send_member_mail($email, $addr_hash);
         echo "confirmasi berhasil";
      }else{
         echo "Gagal! Data tidak ditemukan, atau sudah ter Verifikasi";
      }
   }

   public function payment_confirmation($hash){

   }
}
