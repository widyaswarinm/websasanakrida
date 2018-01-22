        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>
                    LABA RUGI
                </h2> -->
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LABA RUGI
                            </h2>
                        </div>
                        <div class="body">
                        <div class="demo-radio-button" >
                        <form method="get" action="<?php echo base_url("laba_rugi/pencarian")?>">
                        <div class="row clearfix">
                                <div class="col-sm-4">
                                    <input name="group1" type="radio" id="bulan" class="radio-col-blue-grey with-gap" />
                                    <label for="bulan">Bulan</label>
                                    
                                    <select class="form-control show-tick" name="bulan">
                                        <option value="">-- Please select --</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input name="group2" type="radio" id="triwulan" class="radio-col-blue-grey with-gap"/>
                                    <label for="triwulan">Triwulan</label>
                                    <select class="form-control show-tick" name="triwulan"  ); ?>>
                                        <option value="">-- Please select --</option>
                                        <option value="010203">Januari - Maret</option>
                                        <option value="040506">April - Juni</option>
                                        <option value="070809">Juli - September</option>
                                        <option value="101112">Oktober - Desember</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input name="group3" type="radio" id="semester" class="radio-col-blue-grey with-gap"/>
                                    <label for="semester">Semester</label>
                                    <select class="form-control show-tick" name="semester">
                                        <option value="">-- Please select --</option>
                                        <option value="10">Januari - Juni</option>
                                        <option value="20">Juli - Desember</option>
                                    </select>
                                </div>
                        </div>
                        <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p>Tahun</p>
                                    <select class="form-control show-tick" name = "tahun" required="">
                                        <option value="">-- Please Select --</option>
                                        <?php 
                                            for($i = '2016'; $i<=date('Y'); $i+=1){
                                                echo "<option value='$i'> $i </option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                        </div>
                        <div class="row clearfix">
                        <div class="col-sm-6">
                            <button type="submit" class="btn bg-blue-grey waves-effect">
                                    <i class="material-icons">search</i>
                                    <span>SEARCH</span>
                             </button>
                        </div>
                        </div>
                        </div>
                        </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No. </th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;foreach($m_laba_rugi as $m){ ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $m['kode']; ?></td>
                                                <td><?php echo $m['nama']; ?></td>
                                                <td><?php if ($m['head'] == '4'){
                                                        echo $m['saldo']; 
                                                    }else {
                                                        echo '0';
                                                    }
                                                    ?></td>                    
                                                <td><?php if ($m['head'] == '6' || $m['head'] == '5'){
                                                        echo $m['saldo']; 
                                                    }else {
                                                        echo '0';
                                                    }
                                                    ?></td>
                                                <td>
                                                    <?php
                                                    $tahbul = $m['tahunbulan'];
                                                    $bulan = substr($tahbul, -2);
                                                    $tahun = substr($tahbul, 0, 4);
                                                    
                                                    switch($bulan){
                                                        case '01' : echo "Januari"; break;
                                                        case '02' : echo "Februari"; break;
                                                        case '03' : echo "Maret"; break;
                                                        case '04' : echo "April"; break;
                                                        case '05' : echo "Mei"; break;
                                                        case '06' : echo "Juni"; break;
                                                        case '07' : echo "Juli"; break;
                                                        case '08' : echo "Agustus"; break;
                                                        case '09' : echo "September"; break;
                                                        case '10' : echo "Oktober"; break;
                                                        case '11' : echo "November"; break;
                                                        case '12' : echo "Desember"; break;
                                                    }
                                                    ?>
                                                </td>
                                               <td><?php echo $tahun; ?></td>                                                                       
                                            </tr>
                                        <?php $no++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
<!-- 
            <!-- Jquery Core Js -->
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
<!--     <script src="<?php echo base_url('asset/template') ?>/plugins/bootstrap/js/bootstrap.js"></script> -->

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('asset/template') ?>/js/admin.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/js/pages/forms/basic-form-elements.js"></script>
    <script src="<?php echo base_url('asset/template') ?>/js/pages/index.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url('asset/template') ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('asset/template') ?>/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url('asset/template') ?>/plugins/autosize/autosize.js"></script>

    <script type="text/javascript" src="<?php echo base_url('asset/template'); ?>/js/jquery.price_format.1.7.min.js"></script>


