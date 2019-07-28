@extends('entities.manager.layouts.panel')

@section('hstyles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Beranda</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Beranda</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Default box -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Ranking Menu (Desc)</h3>

					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Menu</th>
									<th>Harga Menu</th>
									<th>Jumlah Beli</th>
									<th>Tanggal Transaksi</th>
								</tr>
							</thead>
							<tbody>
								@php
										$i = 1;
								@endphp
								@foreach($info_rankmenu as $info_data)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $info_data->nama_menu }}</td>
									<td>{{ $info_data->harga }}</td>
									<td>{{ (!empty($info_data->jumlah_beli)) ? $info_data->jumlah_beli : '0' }}</td>
									<td>{{ (!empty($info_data->tanggal)) ? $info_data->tanggal : 'Belum Ada Transaksi' }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					Footer
				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->
		</div>
	</div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
<!-- DataTables -->
<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
	var table = $('#table-data').DataTable({
		"bFilter": false
	});

	$('.dataTables_filter input').unbind().bind('keyup', function() {
        var colIndex = document.querySelector('#table-data-filter-column').selectedIndex;
        table.column( colIndex).search( this.value ).draw();
    });
</script>
@endsection
