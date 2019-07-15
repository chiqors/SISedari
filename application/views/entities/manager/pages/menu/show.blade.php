@extends('entities.manager.layouts.panel')

@section('hstyles')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tampil Menu <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ site_url('manager') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('manager/menu') }}">Menu</a></li>
                        <li class="breadcrumb-item active">Tampil Menu</li>
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
                        <h3 class="card-title"><b>Informasi Menu</b></h3>
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
                                            <td>Nama Menu</td>
                                            <td>Soto</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>20000</td>
                                        </tr>
                                        <tr>
                                            <td>Stok Tersedia</td>
                                            <td>10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
						<a class="btn btn-warning" href="{{ site_url('manager/menu/edit/1') }}"><i class="fa fa-edit"></i> Ubah</a>
						<a class="btn btn-danger" href="{{ site_url('manager/menu/destroy/1') }}"><i class="fa fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

@section('fscripts')

@endsection
