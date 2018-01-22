<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class M_laba_rugi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get m_metode_pembayaran by pk
     */
    // function get_m_metode_pembayaran($pk)
    // {
    //     return $this->db->get_where('m_metode_pembayaran',array('pk'=>$pk))->row_array();
    // }
    
    /*
     * Get all m_metode_pembayaran
     */
    function get_all_m_laba_rugi()
    {   
        return $this->db->query("SELECT head,a.kode,nama,saldo,tahunbulan,proyekfk,kontrakfk FROM 
                               ((SELECT head,kode,SUM(saldo) AS saldo,tahunbulan,proyekfk,kontrakfk FROM acc_pendapatan GROUP BY head,kode ORDER BY kode)  UNION 
                               (SELECT head,kode,SUM(saldo) AS saldo,tahunbulan,proyekfk,kontrakfk FROM acc_biaya GROUP BY head,kode ORDER BY kode) ) a
                                LEFT JOIN acc_kiraan b ON a. kode = b.kode")->result_array();


    }

}
