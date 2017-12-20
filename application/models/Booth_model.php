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
      $q = "select booth_id ,booth_location, booth_spec, booth_state, booth_item_default from mast_booth $cat";
      $query = $this->db->query($q);

      foreach($query->result() as $item){
         $res_item = $this->get_default_item($item->booth_item_default);
         $arr_tmp = json_decode($item->booth_location);
         $arr_tmp->idx = $item->booth_id;
         $arr_tmp->booth_state = $item->booth_state;
         $arr_tmp->booth_spec = json_decode($item->booth_spec);
         $arr_tmp->booth_item = $res_item;
         $arr_res[] = $arr_tmp;
      }
      return array("arr_prop"=>$arr_res, "mast_item"=>$this->get_mast_item());
   }

   public function get_default_item($booth_item_default){
      $qitem = "SELECT a.booth_item_id,b.booth_item_category_nm, a.booth_item_nm, a.booth_item_price FROM mast_booth_item a"
                . " LEFT JOIN mast_booth_item_category b on a.booth_item_category_id = b.booth_item_category_id "
                . " WHERE a.booth_item_id in ($booth_item_default)";
      return $this->db->query($qitem)->result();
   }

   public function get_mast_item(){
      $q_mast_item = "SELECT a.booth_item_id, b.booth_item_category_nm, a.booth_item_id, a.booth_item_nm, a.booth_item_price FROM mast_booth_item a
      LEFT JOIN mast_booth_item_category b on a.booth_item_category_id = b.booth_item_category_id";
      $res_mast_item = $this->db->query($q_mast_item);
      foreach($res_mast_item->result() as $item){
         $tmp_arr = array();
         foreach($item as $key=>$val){
            $tmp_arr[$key]=$val;
         }
         $arr_return[$item->booth_item_category_nm][] = $tmp_arr;
      }
      return $arr_return;
   }


   public function get_booth_detail($booth_id){
      $cat='';
      if($booth_id!=''){
         $cat = "where booth_id = '$booth_id'";
      }
      $q = "select booth_id ,booth_location, booth_spec, booth_state, booth_item_default from mast_booth $cat";
      $query = $this->db->query($q);
      foreach($query->result() as $item){
         $arr_tmp = new stdClass();
         $res_item = $this->get_default_item($item->booth_item_default);
         $arr_tmp->idx = $item->booth_id;
         $arr_tmp->booth_state = $item->booth_state;
         $arr_tmp->booth_spec = json_decode($item->booth_spec);
         $arr_tmp->booth_item = $res_item;
         $arr_res[] = $arr_tmp;
      }
      return array("arr_prop"=>$arr_res);
   }

   public function update_booth_status($booth_id){
      $this->db->update("mast_booth",array("booth_state"=>"booked"), "booth_id = $booth_id");
   }
}