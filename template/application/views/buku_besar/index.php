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
                        <form id="form-filter">
                        <div class="row clearfix">
                                <div class="form-group">
                                    <label for="kode" class="col-sm-2 control-label">Kode</label>
                                    <div class="col-sm-4">
                                        <?php echo $form_country; ?>
                                    </div>
                                </div>
                        </div>
                        <div class="row clearfix">
                                <!-- <div class="col-sm-4">
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
                                </div> -->
                                <div class="form-group">
                                    <label for="LastName" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-4">
                                        <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                                        <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                        </div>
                        <!-- <div class="row clearfix">
                        <div class="col-sm-6">
                            <button type="submit" class="btn bg-blue-grey waves-effect">
                                    <i class="material-icons">search</i>
                                    <span>SEARCH</span>
                             </button>
                        </div>
                        </div> -->
                        
                        </form>

                        <?php if($this->session->flashdata('message')!=null OR $this->session->flashdata('message')!='') {?>
                            <div class="alert alert-danger alert-dismissable">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('message'); ?>
                                    <?php echo $this->session->set_flashdata('message',''); ?>
                            </div>
                        <?php } ?>
                            <div class="table-responsive">
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
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- <?php $no=1;foreach($m_buku_besar as $m){ ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo substr($m['tanggal'], 0,11); ?></td>
                                                <td><?php echo $m['nojurnal']; ?></td>
                                                <td><?php echo $m['keterangan']; ?></td>
                                                <td><?php echo $m['kode']; ?></td>
                                                <td><?php echo 'Rp. '.number_format($m['debit'],2,",","."); ?></td>
                                                <td><?php echo 'Rp. '.number_format($m['kredit'],2,",","."); ?></td>
                                                                                                                       
                                            </tr>
                                        <?php $no++;} ?> -->
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

var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('buku_besar/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.kode = $('#kode').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

        


    });


    
    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });



});

</script>

    <!-- Bootstrap Core Js -->
<!--     <script src="<?php echo base_url('asset/template') ?>/plugins/bootstrap/js/bootstrap.js"></script> -->

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

      <!-- Moment Plugin Js -->
    <script src="<?php echo base_url('asset/template'); ?>/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url('asset/template'); ?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>