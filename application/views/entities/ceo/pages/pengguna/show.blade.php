@extends('entities.ceo.layouts.panel')

@section('hstyles')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tampil Pengguna <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ site_url('ceo') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('ceo/pengguna') }}">Pengguna</a></li>
                        <li class="breadcrumb-item active">Tampil Pengguna</li>
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
                        <h3 class="card-title"><b>Informasi Pengguna</b></h3>
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
											<td>NIP</td>
											<td>{{ $info->nip }}</td>
										</tr>
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>{{ $info->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{ $info->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kontak</td>
                                            <td>{{ $info->kontak }}</td>
										</tr>
										<tr>
											<td>Jabatan</td>
											<td>{{ $info->jabatan }}</td>
										</tr>
										<tr>
											<td>Username</td>
											<td>{{ $info->username }}</td>
										</tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
						<a class="btn btn-warning" href="{{ site_url('ceo/pengguna/edit/'.$info->nip) }}"><i class="fa fa-edit"></i> Ubah</a>
						<a class="btn btn-danger" href="{{ site_url('ceo/pengguna/destroy/'.$info->nip) }}"><i class="fa fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

@section('fscripts')

@endsection
