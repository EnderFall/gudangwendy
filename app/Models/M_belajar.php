<?php

namespace App\Models;
use CodeIgniter\Model;

class M_belajar extends Model
{
	public function tampil($table){
		return $this->db->table($table)->get()->getResult();
	}
	public function join($table, $table2, $on){
		return $this->db->table($table)->join($table2,$on)->get()->getResult();
	}
	public function filter($table, $table2, $on, $filter1,$filter2, $awal, $akhir){
		return $this->db->table($table)->where($filter1,$awal)->where($filter2,$akhir)->join($table2,$on)->get()->getResult();
	}
	public function input($table, $data){
		return $this->db->table($table)->insert($data);
	}
	public function hapus($table, $where){
		return $this->db->table($table)->delete($where);
	}
	public function edit($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRow();
	}
	function updat($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}
}