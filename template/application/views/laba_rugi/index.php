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
                        <form method="post" action="<?php echo base_url("laba_rugi/pencarian")?>">
                        <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label for="bulan">Bulan</label>
                                    
                                    <select class="form-control show-tick" name="bulan" data-live-search="true">
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
                                    <label for="tahun">Tahun</label>
                                    <select class="form-control show-tick" name = "tahun" data-live-search="true">
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
                            <button type="submit" class="btn bg-deep-orange waves-effect">
                                    <i class="material-icons">search</i>
                                    <span>SEARCH</span>
                             </button>

                             <button class="btn bg-grey waves-effect">
                                    <i class="material-icons">replay</i>
                                    <span>RESET</span>
                             </button>
                        
                        </div>
                        </div>

                        </form>

                            <div id="alert-laba-rugi" class="alert alert-danger">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Isikan data dengan lengkap!
                            </div>
                        

                            </br></br>

                            <div class="row clearfix">
                                <div class="col-sm-4" >
                                        <p class="font-bold" style="font-size: 14px">Total Pendapatan</p></br>
                                </div>
                                <div class="col-sm-1">
                                        <p class="font-bold" style="font-size: 14px"> : </p>
                                </div>
                                <div class="col-sm-4">
                                        <p class="font-bold" style="font-size: 14px">
                                            <?php foreach($sum_pendapatan as $m){
                                                        $pendapatan = $m['saldo'];
                                            } 

                                            echo "Rp".number_format($pendapatan,2,",",".");?>
                                        </p>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                        <p class="font-bold" style="font-size: 14px">Total Biaya</p></br>
                                </div>
                                <div class="col-sm-1">
                                        <p class="font-bold" style="font-size: 14px"> : </p>
                                </div>
                                <div class="col-sm-4">
                                        <p class="font-bold" style="font-size: 14px">
                                            <?php foreach($sum_biaya as $m){
                                                       $biaya = $m['saldo']; 
                                            } 
                                            echo "Rp".number_format($biaya,2,",","."); ?>
                                        </p>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                        <p class="font-bold" style="font-size: 14px">Laba</p></br>
                                </div>
                                <div class="col-sm-1">
                                        <p class="font-bold" style="font-size: 14px"> : </p>
                                </div>
                                <div class="col-sm-4">
                                        <p class="font-bold" style="font-size: 14px">
                                            <?php echo "Rp".number_format($pendapatan-$biaya,2,",","."); ?>
                                        </p>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="table" class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                                <td><?php if ($m['head'] == '5'||$m['head'] == '6'||$m['head'] == '7'||$m['head'] == '9'){
                                                        echo "Rp".number_format($m['saldo'],2,",",".");
                                                    }else {
                                                        echo "Rp".number_format('0',2,",","."); 
                                                    }
                                                    ?></td>                    
                                                <td><?php if ($m['head'] == '4' || $m['head'] == '8'){
                                                        echo "Rp".number_format($m['saldo'],2,",",".");
                                                    }else {
                                                        echo "Rp".number_format('0',2,",","."); 
                                                    }
                                                    ?></td>
                                                <td>
                                                    <?php
                                                    $tahbul = $m['tahunbulan'];
                                                    $bulan = substr($tahbul, -2);
                                                    $tahun = substr($tahbul, 0, 4);
                                                    
                                                    switch($bulan){
                                                        case '01' : $bulan = "Januari"; break;
                                                        case '02' : $bulan = "Februari"; break;
                                                        case '03' : $bulan = "Maret"; break;
                                                        case '04' : $bulan = "April"; break;
                                                        case '05' : $bulan = "Mei"; break;
                                                        case '06' : $bulan = "Juni"; break;
                                                        case '07' : $bulan = "Juli"; break;
                                                        case '08' : $bulan = "Agustus"; break;
                                                        case '09' : $bulan = "September"; break;
                                                        case '10' : $bulan = "Oktober"; break;
                                                        case '11' : $bulan = "November"; break;
                                                        case '12' : $bulan = "Desember"; break;
                                                    }

                                                    echo $bulan;
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

        <!-- Jquery Core Js -->
    <script src="<?php echo base_url('asset/template') ?>/plugins/jquery/jquery.min.js"></script>

    
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


    <script type="text/javascript">

    $('#alert-laba-rugi').hide();

    $(document).ready(function() {
        // $('#alert-laba-rugi').hide();

        $('#table').dataTable({
        "paging": false,

        
        dom: 'Bfrtip',

        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]


        });

        $.fn.dataTable.ext.errMode = 'none';


    });


    </script>    

