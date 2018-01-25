<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nota_penjualan extends CI_Model {

    var $table = 'trans_penjualan';    

    var $column_order = array(null, 'tanggal','nomortransaksi','nama','totalbelumdiskon','biaya','country','total'); //set column field database for datatable orderable
    var $column_search = array('tanggal','nomortransaksi','nama','totalbelumdiskon','biaya','country','total'); //set column field database for datatable searchable 
    var $order = array('tanggal' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        
        //add custom filter here
        if($this->input->post('nama'))
        {
            $this->db->where('nama', $this->input->post('nama'));
        }
		if($this->input->post('tglawal'))
		{
			$this->db->where('tanggal >=', date('Y-m-d H:i:s', strtotime($this->input->post('tglawal').'00:00:00')));
		}
		if($this->input->post('tglakhir'))
		{
			$this->db->where('tanggal <=', date('Y-m-d H:i:s', strtotime($this->input->post('tglakhir').'23:59:59')));
		}	

        $this->db->select('*');
        $this->db->from($this->table);

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        //$this->db->join($this->table2, 't_gjurnal.noindex = t_gjurnal_vc.noindex_jurnal');

        return $this->db->count_all_results();
    }

    public function get_list_customers()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->group_by("nama");
		$this->db->order_by('nomortransaksi','asc');
        $query = $this->db->get();
        $result = $query->result();

        $customers = array();
        foreach ($result as $row) 
        {
            $customers[] = $row->nama;
        }
        return $customers;
    }

}
