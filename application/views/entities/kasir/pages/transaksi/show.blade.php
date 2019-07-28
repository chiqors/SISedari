@extends('entities.kasir.layouts.panel')

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
                    <h1>Tampil Transaksi <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ site_url('kasir/transaksi') }}">Transaksi</a></li>
                        <li class="breadcrumb-item active">Tampil Transaksi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Informasi Transaksi</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Tanggal Transaksi</td>
                                            <td>{{ $info->tanggal }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>{{ $info->sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kupon</td>
                                            <td>{{ $info->kupon }}</td>
										</tr>
										<tr>
											<td>Total Harga</td>
											<td>{{ $info->total_harga }}</td>
										</tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Informasi Pembayaran</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Bayar</td>
                                            <td>{{ $info->bayar }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kembalian</td>
                                            <td>{{ $info->kembalian }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
						<a class="btn btn-warning" href="{{ site_url('kasir/transaksi/edit/'.$info->id) }}"><i class="fa fa-edit"></i> Ubah</a>
						<a class="btn btn-danger" href="{{ site_url('kasir/transaksi/destroy/'.$info->id) }}"><i class="fa fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="row">
        <div class="col-12">
            <div class="card">
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
                        <div class="col-sm-12">
                            <div class="row">
								<div class="col-sm-12">
									<div class="row">
										
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
									<th>Menu</th>
									<th>Jumlah Beli</th>
									<th>Total Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach ($info2 as $info_data)
									<tr>
										<td>{{ $info_data->id }}</td>
										<td>Menu #{{ $info_data->id_menu }}</td>
										<td>{{ $info_data->jumlah_beli }}</td>
										<td>{{ $info_data->total_harga }}</td>
										<td>
											<a href="{{ site_url('kasir/transaksi/detail_edit/'.$info_data->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah</a> | 
											<a href="{{ site_url('kasir/transaksi/detail_destroy/'.$info_data->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
										</td>
									</tr>
								@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
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
