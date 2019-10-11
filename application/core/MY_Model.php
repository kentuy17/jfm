<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	protected $table = '';

	public function selectItem($in_data, $in_select = '*', $in_order = 'idx DESC')
	{
		$this->db->select($in_select);
		$this->db->order_by($in_order);

		return $this->db->get_where($this->table, $in_data, 1, 0)->row();
	}

	public function selectItemArray($in_data, $in_select = '*', $in_order = 'idx DESC')
	{
		$this->db->select($in_select);
		$this->db->order_by($in_order);

		return $this->db->get_where($this->table, $in_data, 1, 0)->row_array();
	}

	public function getItems($in_data, $in_select = '*', $in_limit = PAGINATION_ITEM_MAX, $in_offset = 0, $in_order = 'idx DESC')
	{
		$this->db->select($in_select);
		$this->db->order_by($in_order);

		return $this->db->get_where($this->table, $in_data, $in_limit, $in_offset)->result();
	}

	public function getItemsArray($in_data, $in_select = '*', $in_limit = PAGINATION_ITEM_MAX, $in_offset = 0, $in_order = 'idx DESC')
	{
		$this->db->select($in_select);
		$this->db->order_by($in_order);

		return $this->db->get_where($this->table, $in_data, $in_limit, $in_offset)->result_array();
	}

	public function getItemsCount($in_data)
	{
		$this->db->where($in_data);
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}

	public function insertItem($in_data, $in_log = null)
	{
		$this->db->insert($this->table, $in_data);
		$ret = $this->db->insert_id();

		if (isset($in_log) && is_array($in_log)) {
			$in_log['idx'] = $ret;
			$in_log['query'] = $this->db->last_query();
			$this->db->insert('user_log', $in_log);
		}

		return $ret;
	}

	public function updateItem($in_data, $in_where, $debug = false, $in_log = null)
	{
		$ret = $this->db->update($this->table, $in_data, $in_where);

		if($debug){
            $this->firephp->log($this->db->last_query());
        }

		if (isset($in_log) && is_array($in_log)) {
			$in_log['query'] = $this->db->last_query();
			$this->db->insert('user_log', $in_log);
		}

		return $ret;
	}

	public function deleteItem($in_data, $in_log = null)
	{
		$ret = $this->db->delete($this->table, $in_data);

		if (isset($in_log) && is_array($in_log)) {
			$in_log['query'] = $this->db->last_query();
			$this->db->insert('user_log', $in_log);
		}

		return $ret;
	}

}
