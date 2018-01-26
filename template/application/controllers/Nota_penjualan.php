<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota_penjualan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_nota_penjualan','transaksi');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        
        $customers = $this->transaksi->get_list_customers();

        $opt = array('' => 'All Customers');
        foreach ($customers as $customer) {
            $opt[$customer] = $customer;
        }

        $data['form_customer'] = form_dropdown('',$opt,'','id="nama" class="form-control" data-live-search="true"');
        $data['_view'] = 'nota_penjualan/index';
        $this->load->view('layout/main', $data);
    }

    public function ajax_list()
    {
        $list = $this->transaksi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $trans) {
            $no++;
            $row = array();
            $row[] = $no;
			$row[] = $trans->tanggal;
			$row[] = $trans->nomortransaksi;
			$row[] = $trans->nama;
			$row[] = 'Rp. '.number_format($trans->totalbelumdiskon,2,",",".");
			$row[] = 'Rp. '.number_format($trans->biaya,2,",",".");
			$row[] = 'Rp. '.number_format($trans->totalpajak,2,",",".");
			$row[] = 'Rp. '.number_format($trans->total,2,",",".");


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->transaksi->count_all(),
                        "recordsFiltered" => $this->transaksi->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

}
