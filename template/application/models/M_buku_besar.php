<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku_besar extends CI_Model {

    var $table1 = 't_gjurnal';
    var $table2 = 't_gjurnal_vc';

    var $column_order = array(null, 'tanggal','nojurnal','keterangan','kode','debit','kredit'); //set column field database for datatable orderable
    var $column_search = array('tanggal','nojurnal','keterangan','kode','debit','kredit'); //set column field database for datatable searchable 
    var $order = array('tanggal' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        
        //add custom filter here
        if($this->input->post('kode'))
        {
            $this->db->where('kode', $this->input->post('kode'));
        }

        $this->db->select('tanggal,nojurnal,t_gjurnal.keterangan,kode,debit,kredit');
        $this->db->from($this->table1);
        $this->db->join($this->table2, 't_gjurnal.noindex = t_gjurnal_vc.noindex_jurnal');

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
        $this->db->select('tanggal,nojurnal,t_gjurnal.keterangan,kode,debit,kredit');
        $this->db->from($this->table1);
        $this->db->join($this->table2, 't_gjurnal.noindex = t_gjurnal_vc.noindex_jurnal');

        return $this->db->count_all_results();
    }

    public function get_list_countries()
    {
        $this->db->select('kode');
        $this->db->select('tanggal,nojurnal,t_gjurnal.keterangan,kode,debit,kredit');
        $this->db->from($this->table1);
        $this->db->join($this->table2, 't_gjurnal.noindex = t_gjurnal_vc.noindex_jurnal');
        $this->db->order_by('kode','asc');
        $query = $this->db->get();
        $result = $query->result();

        $countries = array();
        foreach ($result as $row) 
        {
            $countries[] = $row->kode;
        }
        return $countries;
    }

}
