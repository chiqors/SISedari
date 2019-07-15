@extends('entities.manager.layouts.panel')

@section('hstyles')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Pengguna <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ site_url('manager') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('manager/pengguna') }}">Pengguna</a></li>
                        <li class="breadcrumb-item active">Show Pengguna</li>
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
                        <h3 class="card-title"><b>Pengguna Information</b></h3>
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
                                            <td>Nama Lengkap</td>
                                            <td>Setiawan Gunadi</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>Jl. Rancaekek no 2</td>
                                        </tr>
                                        <tr>
                                            <td>Kontak</td>
                                            <td>07842342345</td>
										</tr>
										<tr>
											<td>Jabatan</td>
											<td>Kasir</td>
										</tr>
										<tr>
											<td>Username</td>
											<td>setiawan1</td>
										</tr>
										<tr>
											<td>Password</td>
											<td><button class="btn btn-info btn-xs show-pw"><i class="fa fa-eye"></i> Show</button></td>
										</tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
						<a class="btn btn-warning" href="{{ site_url('manager/pengguna/edit/1') }}"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-danger" href="{{ site_url('manager/pengguna/destroy/1') }}"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

@section('fscripts')

@endsection
