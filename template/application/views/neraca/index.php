        <div class="container-fluid">
            <div class="block-header">
            <!--    <h2>
                    LABA RUGI
                </h2>-->
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
								NERACA
							</h2>
							<h4>Per <?php echo $bulan?> tahun <?php echo $tahun?></h4>
                        </div>
                        <div class="body">
                        <form method="get" action="<?php echo base_url("neraca/search")?>">
                        <div class="row clearfix">
                                <div class="col-sm-4">                                    
                                    <label for="bulan">Bulan</label>                                    
                                    <select class="form-control show-tick" name = "bulan" required>
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
                                    <select class="form-control show-tick" name = "tahun" required>
                                        <option value="">-- Please Select --</option>
                                        <?php 
                                            for($i = '2016'; $i<=date('Y'); $i+=1){
                                                echo "<option value='$i'> $i </option>";
                                            }
                                        ?>
                                    </select>
                                </div>
								<div class="col-sm-4">	
									<div class ="row clearfix">
										<div class="col-sm-4">
											<br>
											<button type="submit" class="btn bg-deep-orange waves-effect">
											<i class="material-icons">search</i>
											<span>SEARCH</span>
											</button>
											</form>
										</div>
										<div class="col-sm-2">
											<br>
											<form method="get" action="<?php echo base_url("neraca/index")?>">
											<button type="submit" id="btn-reset" class="btn bg-grey waves-effect">
											<i class="material-icons">replay</i>
											<span>RESET</span>
											</button>
											</form>
										</div>
									</div>
								</div>
                       
                        </div>
                        
						<div class="row clearfix">
							<div class="col-sm-4">
							<h5>Total Harta</h5>
							<br>
							<h5>Total Hutang dan Modal</h5>
							</div>
							<div class="col-sm-1">
							<h5>:</h5>
							<br>
							<h5>:</h5>
							</div>
							<div class="col-sm-4">
							<h5><?php foreach($harta as $n){echo 'Rp. '.number_format($n['saldo'],2,",",".");}?></h5>
							<br>
							<h5><?php foreach($modal as $s){echo 'Rp. '.number_format($s['saldo'],2,",",".");}?></h5>
							</div>
						</div>
                            <div class="table-responsive">
                                <table id="tabel_neraca" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Saldo</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No. </th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Saldo</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;foreach($m_neraca as $m){ ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>                                                
                                                <td><?php echo $m['kode']; ?></td>
                                                <td><?php echo $m['nama']; ?></td>
                                                <td><?php echo 'Rp. '.number_format($m['saldo'],2,",","."); ?></td>
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

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery/jquery.min.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>asset/template/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	
	<!-- Autosize Plugin Js -->
    <script src="<?php echo base_url('asset/template') ?>/plugins/autosize/autosize.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#tabel_neraca').dataTable({
				"paging": false,
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				],
			});
			$.fn.dataTableExt.sErrMode = 'none';
		});
	</script>

