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

      $itemIDs = $this->input->post('hd_booth_item_category');
      $items = [];
      for($i =0; $i<count($itemIDs); $i++){
            $items[] = array('booth_item_id'=>$this->input->post('hd_booth_item_'.$itemIDs[$i]), 
                              'booth_item_category_id'=>$itemIDs[$i],
                              'item_qty'=>1,
                              'item_price'=>$this->input->post('hd_booth_item_price_'.$itemIDs[$i]));
      }
      // print_r($items);
      $this->pesan_model->create_order($arr_data, $items);
      //$this->pesan_model->send_confirm_mail($arr_data['email'], $arr_data['confirmation_hash']);
      //$data = $this->booth_model->get_booth_detail($idx);
      //$this->load->view('sukses',$data);
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

   public function order_status($hash){
      $res = $this->pesan_model->get_payment_data($hash);
      if(!empty($res)){
         $booth_id = $res[0]->booth_id;
         $data = $this->booth_model->get_booth_detail($booth_id);
         $data['booking_id'] = $res[0]->booking_id;
         $data["name"] = $res[0]->name;
         $data["phone"] = $res[0]->phone;
         $data["booking_dttm"] = $res[0]->booking_dttm;
         $data["email"] = $res[0]->email;
         $data["hash"] = $hash;
         $data["order_state"] = $res[0]->order_state;
         $this->load->view('konfirmasibayar',$data);
      }else{
         echo "Data Tidak ditemukan";
      }
   }

   public function payment_confirm(){
      $hash = $this->input->post('idx');
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
      // $config['max_size']     = '100';
      // $config['max_width'] = '1024';
      // $config['max_height'] = '768';
      $config['file_name'] = $hash;

      $this->load->library('upload', $config);

      // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('img_frm')){
         $error = array('error' => $this->upload->display_errors());
      }
      else{
         $this->pesan_model->update_paid_order($hash);
         echo "sukses";
      }
   }
}
