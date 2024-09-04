<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
                <div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">PERMOHONAN SURAT SUDAH DICETAK</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add5" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Request</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_skl.tanggal_request,
                                                    -- data_request_skl.keperluan,
                                                    data_request_skl.request,
                                                    data_request_skl.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_skl ON data_request_skl.nik = data_user.nik
                                                WHERE data_request_skl.status = 3
                                                UNION
                                                SELECT
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_skd.tanggal_request,
                                                    -- data_request_skd.keperluan,
                                                    data_request_skd.request,
                                                    data_request_skd.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_skd ON data_request_skd.nik = data_user.nik
                                                WHERE data_request_skd.status = 3
                                                UNION
                                                SELECT
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_sku.tanggal_request,
                                                    -- data_request_sku.keperluan,
                                                    data_request_sku.request,
                                                    data_request_sku.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_sku ON data_request_sku.nik = data_user.nik
                                                WHERE data_request_sku.status = 3
                                                UNION
                                                SELECT
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_skk.tanggal_request,
                                                    -- data_request_skk.keperluan,
                                                    data_request_skk.request,
                                                    data_request_skk.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_skk ON data_request_skk.nik = data_user.nik
                                                WHERE data_request_skk.status = 3
                                                ";
                                                    // $sql = "SELECT * FROM data_request_skd natural join data_user WHERE status=3";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														// $keperluan = $data['keperluan'];
														// $keterangan = $data['keterangan'];
                                                        // $id= $data['id_request_skd'];
                                                        $request= $data['request'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:blue'>Sudah ACC Staf</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC staf</b>";
                                                        }elseif($status=="3"){
                                                            $status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
													<!-- <td><?php echo $keperluan;?></td> -->
                                                    <td><?php echo $request;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
                        </div>
					</div>
				</div>
