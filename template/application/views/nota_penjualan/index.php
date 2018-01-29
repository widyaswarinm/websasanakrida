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
                                LAPORAN NOTA PENJUALAN
                            </h2>
                        </div>
                        <div class="body">
                        <form id="form-filter">
                        <div class="row clearfix">
                                <div class="col-sm-6">
									<div class="form-group">
										<label for="nama">Customer</label>
										<?php echo $form_customer; ?>										
									</div>
								</div>
                        </div>
                        <div class="row clearfix">
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<label for="tglawal">Tanggal Awal</label> 
										<input type="text" class="datepicker form-control" id="tglawal" placeholder="Please choose a date..." required>
									</div>
								</div>
                            </div>
							<div class="col-sm-2">
								<div class="form-group">
									<div>
										<br>
										<br>
										<p> sampai dengan</p>
									</div>
								</div>
                            </div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<label for="tglakhir">Tanggal Akhir</label> 
										<input type="text" class="datepicker form-control" id="tglakhir" placeholder="Please choose a date..." required>
									</div>
								</div>
                            </div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-4">	
								<br>
								<button type="button" id="btn-filter" class="btn bg-deep-orange waves-effect">
								<i class="material-icons">search</i>
								<span>SEARCH</span>
								</button>
								<button type="button" id="btn-reset" class="btn bg-grey waves-effect" onclick="resetForm(event, $(this));">
								<i class="material-icons">replay</i>
								<span>RESET</span>
								</button>
							</div>
						</div>
                        </form>

                            <div id="alert-nota" class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Isikan data dengan lengkap!						
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
											<th>Tanggal</th>
                                            <th>Kode Transaksi</th>
                                            <th>Customer</th>
                                            <th>Total Penjualan</th>
                                            <th>Biaya</th>
                                            <th>Total Pajak</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
											<th>Tanggal</th>
                                            <th>Kode Transaksi</th>
                                            <th>Customer</th>
                                            <th>Total Penjualan</th>
                                            <th>Biaya</th>
                                            <th>Total Pajak</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
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
			$("#alert-nota").hide();
			//datatables
			table = $('#table').DataTable({ 
				"paging": false,
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				"order": [], //Initial no order.

				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('nota_penjualan/ajax_list')?>",
					"type": "POST",
					"data": function ( data ) {
						data.nama = $('#nama').val();
						data.tglawal = $('#tglawal').val();
						data.tglakhir = $('#tglakhir').val();
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
				if($('#tglawal').val()=='' || $('#tglakhir').val()==''){					
					$("#alert-nota").show();
				} else{
					$("#alert-nota").hide();
					table.ajax.reload();  //just reload table
				}
			});
			$('#btn-reset').click(function(){ //button reset event click
				$('#form-filter')[0].reset();
				$("#alert-nota").hide();
				table.ajax.reload();  //just reload table
			});

			$.fn.dataTableExt.sErrMode = 'none';
		});
		
		function resetForm(e, thisobj) {
			thisform = thisobj.closest('form');
			selectbox_in_form = thisform.find('select');

			// completely remove selected when it has been assigned.
			selectbox_in_form.find('option:selected').removeAttr('selected');
			selectbox_in_form.val('');
			selectbox_in_form.change();

			delete selectbox_in_form;
			delete thisform;
		}// resetForm

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

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url('asset/template'); ?>/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url('asset/template'); ?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>