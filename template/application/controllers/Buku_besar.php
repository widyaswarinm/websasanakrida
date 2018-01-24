<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_besar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku_besar','customers');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        
        $countries = $this->customers->get_list_countries();

        $opt = array('' => 'All Country');
        foreach ($countries as $country) {
            $opt[$country] = $country;
        }

        $data['form_country'] = form_dropdown('',$opt,'','id="kode" class="form-control"');
        $data['_view'] = 'buku_besar/index';
        $this->load->view('layout/main', $data);
    }

    public function ajax_list()
    {
        $list = $this->customers->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->tanggal;
            $row[] = $customers->nojurnal;
            $row[] = $customers->keterangan;
            $row[] = $customers->kode;
            $row[] = $customers->debit;
            $row[] = $customers->kredit;


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->customers->count_all(),
                        "recordsFiltered" => $this->customers->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

}
