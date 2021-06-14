<?php 

class Pesanan_model extends CI_Model
{	
	public function getData($select = null, $table, $limit = null, $where = null, $join = null)
	{	
		if(!empty($select)){
			$this->db->select($select);
		}

		if(!empty($where)){
			$this->db->where($where);
		}

		if(!empty($join)){
			if(is_array($join)){
				foreach($join as $key => $val){
					$this->db->join($val['table'], $val['on']);
				}
			}
		}

		return $this->db->get($table, $limit);
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function edit($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function delete($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}