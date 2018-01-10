<?php

class Booth_model extends CI_Model {
   public function __construct(){
      parent::__construct();
   }

   public function get_location($category_id){
      $cat='';
      if($category_id!=''){
         $cat = "where booth_category_id = '$category_id'";
      }
      $q = "select booth_id ,booth_location, booth_spec, booth_state, booth_price from mast_booth $cat";
      $query = $this->db->query($q);
      foreach($query->result() as $item){
         $arr_tmp = json_decode($item->booth_location);
         $arr_tmp->idx = $item->booth_id;
         $arr_tmp->booth_state = $item->booth_state;
         $arr_tmp->booth_price = "Rp ".number_format($item->booth_price,0,",",".");
         $arr_tmp->booth_spec = json_decode($item->booth_spec);
         $arr_res[] = $arr_tmp;
      }
      return array("arr_prop"=>$arr_res);
   }

   public function get_booth_detail($booth_id){
      $cat='';
      if($booth_id!=''){
         $cat = "where booth_id = '$booth_id'";
      }
      $q = "select booth_id ,booth_location, booth_spec, booth_state, booth_price from mast_booth $cat";
      $query = $this->db->query($q);
      foreach($query->result() as $item){
         $arr_tmp = json_decode($item->booth_location);
         $arr_tmp->idx = $item->booth_id;
         $arr_tmp->booth_state = $item->booth_state;
         $arr_tmp->booth_price = $item->booth_price;
         $arr_tmp->booth_spec = json_decode($item->booth_spec);
         $arr_res[] = $arr_tmp;
      }
      return array("arr_prop"=>$arr_res);
   }

   public function update_booth_status($booth_id){
      $this->db->update("mast_booth",array("booth_state"=>"booked"), "booth_id = $booth_id");
   }
}