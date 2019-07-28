@extends('entities.kasir.layouts.panel')

@section('hstyles')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Alur Transaksi (Bagian 1) <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('kasir') }}">Beranda</a></li>
					<li class="breadcrumb-item">Alur Transaksi</li>
                    <li class="breadcrumb-item active">Detail Transaksi</li>
                </ol>
            </div>
		</div>
		<div class="row">
            <div class="col-sm-12">
                <hr class="separator">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center align-items-center">
                    <h5>Cara untuk membuat alur transaksi:</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb arr-bread d-flex justify-content-center align-items-center">
                    <li><a href="#">Alur Data</a></li>
                    <li class="active"><span>Detail Transaksi</span></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ site_url('kasir/alur/transaksi/store_detail_transaksi') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Transaksi</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="id_transaksi">ID Transaksi</label>
                                        <input type="text" class="form-control" name="id_transaksi" value="{{ $info_transaksi }}" readonly>
                                    </div>
                                    <div class="form-group">
										<label for="id_menu">Menu</label>
                                        <select id="id_menu" class="form-control" name="id_menu">
											@if(@$info_menu)
											@foreach ($info_menu as $info_data)
											<option value="{{ $info_data->id }}" info="{{ $info_data->harga }}">#{{ $info_data->id }} - {{ $info_data->nama_menu }} - Rp.{{ $info_data->harga }}</option>
											@endforeach
											@else
											<option value="">--MENU TIDAK TERSEDIA--</option>
											@endif
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_beli">Jumlah Beli</label>
                                        <input id="jumlah_beli" type="text" class="form-control" name="jumlah_beli">
									</div>
									<div class="form-group">
                                        <label for="total_harga">Total Harga</label>
                                        <input id="total_harga" type="number" class="form-control" name="total_harga" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
							<button type="submit" class="btn btn-info" name="submitForm" value="loop">Selesai & Ulangi</button> | 
							<button type="submit" class="btn btn-primary" name="submitForm">Selesai & Lanjut</button>
                        </div>
                    </div>
                    <!-- /.card -->
				</div>
				<div class="col-md-6">
                    <!-- table form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pesanan Menu</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
							<div class="row">
								<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Menu</th>
											<th>Harga</th>
											<th>Jumlah Beli</th>
											<th>Total Harga</th>
										</tr>
									</thead>
									<tbody>
										@php
											$i = 1;
										@endphp
										@if(@$info_transaksi_menu)
										@foreach($info_transaksi_menu as $info_data)
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{ $info_data->nama_menu }}</td>
											<td>Rp. {{ $info_data->harga }}</td>
											<td>{{ $info_data->jumlah_beli }}</td>
											<td>Rp. {{ $info_data->total_harga }}</td>
										</tr>
										@endforeach
										@endif
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4"><b>Sub Total</b></td>
											<td>Rp. {{ (empty($info_sub_total->sub_total)) ? '0' : $info_sub_total->sub_total }}</td>
										</tr>
									</tfoot>
								</table>
							</div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('fscripts')
	<!-- DataTables -->
	<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
	<script>
			$(document).ready(function() {
				var table = $('#table-data').DataTable({
					"bFilter": false
				});
			});
	</script>
    <script type="text/javascript">
        $(function () {
            $('#tanggal').datetimepicker({
                format : 'YYYY-MM-DD hh:mm:ss',
                ignoreReadonly: true
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('cpanel/vendor/bootstrap-datetimepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- CK Editor -->
    <script type="text/javascript" src="{{ asset('cpanel/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            ClassicEditor
            .create(document.querySelector('#body-editor'))
            .then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.error(error)
            })
        })
	</script>
	<script>
		$('#jumlah_beli').on('input', function() {
			var input_harga_menu = $('option:selected', $('#id_menu')).attr('info');
			var input_jumlah_beli = $(this).val();
			var total_harga = input_harga_menu * input_jumlah_beli;

			var input_total_harga = $('#total_harga');
			input_total_harga.val(total_harga);
		});
	</script>
@endsection
