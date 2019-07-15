@extends('entities.ceo.layouts.panel')

@section('hstyles')
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Pengguna <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('ceo') }}">Beranda</a></li>
					<li class="breadcrumb-item"><a href="{{ site_url('ceo/pengguna') }}">Pengguna</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Pengguna</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('ceo/pengguna/edit/1') : site_url('ceo/pengguna/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Pengguna</h3>
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
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{ @$info ? @$info->nama : '' }}">
                                    </div>
                                    <div class="form-group">
										<label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" placeholder="Alamat">{{ @$info ? @$info->alamat : '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select class="form-control" name="jabatan">
											<option value="kasir">Kasir</option>
											<option value="manager">Manajer</option>
											<option value="ceo">CEO</option>
										</select>
									</div>
									<div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ @$info ? @$info->username : '' }}">
									</div>
									<div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Password">
									</div>
									<div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-{{ @$info ? 'warning' : 'primary' }}">Submit</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format : 'YYYY-MM-DD hh:mm:ss',
                ignoreReadonly: true
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('admin/vendor/bootstrap-datetimepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- CK Editor -->
    <script type="text/javascript" src="{{ asset('admin/vendor/ckeditor/ckeditor.js') }}"></script>
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
@endsection
