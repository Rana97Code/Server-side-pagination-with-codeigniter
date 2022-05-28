<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hscode_model extends CI_Model {


    public function __construct(){
		parent::__construct();
		
		
	}
    var $table ='hs_code';
    var $column_order=array('id','hs_code','description','calculate_year');
    var $select_column=array(null,'hs_code','description','calculate_year');


    function make_query(){
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if(isset($_POST['search']['value']))
        {
            $this->db->like("hs_code",$_POST["search"]["value"]);
            $this->db->or_like("description",$_POST["search"]["value"]);
        }
        if(isset($_POST["order"])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);

        }
        else{
            $this->db->order_by("id","DESC");
        }
    }

    function make_datatables(){
        $this->make_query();  
        if($_POST["length"] != -1)  
        {  
             $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data(){
        $this->make_query();
        $query =$this->db->get();
        return $query->num_rows();
    }

    function get_all_data(){
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	public function Hscode(){
        $sql ="SELECT * FROM hs_code";
        $query = $this->db->query($sql);
        return $query->result();

    }

   


}