@extends('entities.manager.layouts.panel')

@section('hstyles')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Transaksi <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ site_url('manager') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('manager/transaksi') }}">Transaksi</a></li>
                        <li class="breadcrumb-item active">Show Transaksi</li>
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
                        <h3 class="card-title"><b>Transaksi Information</b></h3>
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
                                            <td>14 July 2019 - 14:30:00</td>
                                        </tr>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>150000</td>
                                        </tr>
                                        <tr>
                                            <td>Kupon</td>
                                            <td>Kupon #1 - 25%</td>
										</tr>
										<tr>
											<td>Total Harga</td>
											<td>125000</td>
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
                        <h3 class="card-title"><b>Pembayaran Information</b></h3>
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
                                            <td>200000</td>
                                        </tr>
                                        <tr>
                                            <td>Kembalian</td>
                                            <td>50000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
						<a class="btn btn-warning" href="{{ site_url('manager/transaksi/edit/1') }}"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-danger" href="{{ site_url('manager/transaksi/destroy/1') }}"><i class="fa fa-trash"></i> Delete</a>
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
										<a href="{{ site_url('manager/transaksi/detail_create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> New Transaksi</a>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="row float-right">
										<label for="filter">
											<select id="table-data-filter-column" class="form-control form-control-sm">
												<option>Transaksi</option>
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
                                    <th>Transaksi</th>
									<th>Menu</th>
									<th>Jumlah Beli</th>
									<th>Total Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<td>1</td>
									<td>Transaksi #1</td>
									<td>Menu #1</td>
									<td>2</td>
									<td>50000</td>
									<td>
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-chevron-circle-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item nav-warning" href="{{ site_url('manager/transaksi/detail_edit/1') }}"><i
                                                    class="fa fa-edit"></i> Edit</a>
												<a class="dropdown-item nav-danger" href="{{ site_url('manager/transaksi/detail_destroy/1') }}"><i 
													class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
								</tr>
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
