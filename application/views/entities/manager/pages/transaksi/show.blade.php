@extends('entities.manager.layouts.panel')

@section('hstyles')

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
                        <li class="breadcrumb-item"><a href="{{ site_url('manager') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('manager/transaksi') }}">Transaksi</a></li>
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
                                            <td>{{ $info1->tanggal }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>{{ $info1->sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kupon</td>
                                            <td>{{ $info1->kupon }}</td>
										</tr>
										<tr>
											<td>Total Harga</td>
											<td>{{ $info1->total_harga }}</td>
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
                                            <td>{{ $info1->bayar }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kembalian</td>
                                            <td>{{ $info1->kembalian }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
						
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
								<div class="col-sm-6">
									<div class="row">
										
									</div>
								</div>
								<div class="col-sm-6">
									<div class="row float-right">
										<label for="filter">
											<select id="table-data-filter-column" class="form-control form-control-sm">
												<option>Menu</option>
												<option>Jumlah Beli</option>
												<option>Total Harga</option>
											</select>
										</label>
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
                                </tr>
                            </thead>
                            <tbody>
								@foreach ($info2 as $info_data)
                                <tr>
									<td>{{ $info_data->id }}</td>
									<td>Menu #{{ $info_data->id_menu }}</td>
									<td>{{ $info_data->jumlah_beli }}</td>
									<td>{{ $info_data->total_harga }}</td>
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

@endsection
