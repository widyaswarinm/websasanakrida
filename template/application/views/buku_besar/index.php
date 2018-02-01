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
                                BUKU BESAR
                            </h2>
                        </div>
                        <div class="body">
                        <div class="demo-radio-button" >
                        <form method="post" action="<?php echo base_url("buku_besar/pencarian")?>">
                        <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label>Kode</label>
                                    <select name="kode" class="form-control">
                                        <option value="">-- Please select --</option>
                                        <?php 
                                        foreach($m_buku_besar_kode as $m)
                                        {
                                            $selected = ($m['kode'] == $this->input->post('kode')) ? ' selected="selected"' : "";

                                            echo '<option value="'.$m['kode'].'" '.$selected.'>'.$m['kode'].'</option>';
                                        } 
                                        ?>
                                    </select>
                                </div>
                        </div>
                        <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label>Tanggal Awal</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id = "date_awal" name = "date_awal" type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    </br></br>
                                    <p>sampai dengan</p>
                                </div>

                                <div class="col-sm-4">
                                    <label>Tanggal Akhir</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name = "date_akhir" type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row clearfix">
                        <div class="col-sm-6">
                            <button id = "search" type="submit" class="btn bg-deep-orange waves-effect">
                                    <i class="material-icons">search</i>
                                    <span>SEARCH</span>
                             </button>

                             <button class="btn bg-grey waves-effect">
                                    <i class="material-icons">replay</i>
                                    <span>RESET</span>
                             </button>
                        </div>
                        </div>
                        </div>
                        </form>
                        <div id="alert-buku-besar" class="alert alert-danger">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Isikan data dengan lengkap!
                            </div>

                            </br></br>

                            <div class="row clearfix">
                                <div class="col-sm-4" >
                                        <p class="font-bold" style="font-size: 14px">Saldo Awal</p></br>
                                </div>
                                <div class="col-sm-1">
                                        <p class="font-bold" style="font-size: 14px"> : </p>
                                </div>
                                <div class="col-sm-4">
                                        <p class="font-bold" style="font-size: 14px">
                                            <?php foreach($saldo_awal as $m){

                                                if($m['head']=='1'||$m['head']=='5'||$m['head']=='6'||$m['head']=='7'||$m['head']=='9'){
                                                        $saldo_awal = $m['debit'] - $m['kredit'];
                                                        }
                                                else{
                                                        $saldo_awal = $m['kredit'] - $m['debit'];
                                                }

                                            }
                                            echo "Rp".number_format($saldo_awal,2,",","."); 
                                            ?>
                                        </p>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                        <p class="font-bold" style="font-size: 14px">Saldo Akhir</p></br>
                                </div>
                                <div class="col-sm-1">
                                        <p class="font-bold" style="font-size: 14px"> : </p>
                                </div>
                                <div class="col-sm-4">
                                        <p class="font-bold" style="font-size: 14px">
                                            <?php foreach($saldo_akhir as $m){
                                                if($m['head']=='1'||$m['head']=='5'||$m['head']=='6'||$m['head']=='7'||$m['head']=='9'){
                                                        $saldo_akhir = $m['debit'] - $m['kredit'];
                                                        }
                                                else{
                                                        $saldo_akhir = $m['kredit'] - $m['debit'];
                                                }
                                            }
                                            echo "Rp".number_format($saldo_awal+$saldo_akhir,2,",","."); 
                                            ?>
                                        </p>
                                </div>
                            </div>

                            <div class="table-responsive" id="table-r">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Tanggal</th>
                                            <th>No. Jurnal</th>
                                            <th>Keterangan</th>
                                            <th>Kode</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No. </th>
                                            <th>Tanggal</th>
                                            <th>No. Jurnal</th>
                                            <th>Keterangan</th>
                                            <th>Kode</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="show_data">
                                        <?php 
                                        $no=1;
                                        $saldo=$saldo_awal;
                                        foreach($m_buku_besar as $m){ 
                                        if($m['head']=='1'||$m['head']=='5'||$m['head']=='6'||$m['head']=='7'||$m['head']=='9'){
                                                        $saldo = $saldo + ($m['debit'] - $m['kredit']);
                                                        }
                                        else{
                                                        $saldo = $saldo + ($m['kredit'] - $m['debit']);
                                        }
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo substr($m['tanggal'], 0,11); ?></td>
                                                <td><?php echo $m['nojurnal']; ?></td>
                                                <td><?php echo $m['keterangan']; ?></td>
                                                <td><?php echo $m['kode']; ?></td>
                                                <td><?php echo 'Rp. '.number_format($m['debit'],2,",","."); ?></td>
                                                <td><?php echo 'Rp. '.number_format($m['kredit'],2,",","."); ?></td>
                                                <td><?php echo 'Rp. '.number_format($saldo,2,",","."); ?></td>
                                                                                                                       
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

        <script type="text/javascript">

    $('#alert-buku-besar').hide();

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



