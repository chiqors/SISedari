@extends('layouts.panel')

@section('hstyles')
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Edit' : 'Create' }} Transaksi <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('') }}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{ site_url('transaksi') }}">Transaksi</a></li>
					<li class="breadcrumb-item"><a href="{{ site_url('detail') }}">Detail Transaksi</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Edit' : 'Create' }} Detail Transaksi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('transaksi/edit/1') : site_url('transaksi/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
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
                                        <select class="form-control" name="id_transaksi">
											<option value="1">Transaksi #1 - (DD/MM/YYYY - hh:mm:ss) - Kasir</option>
										</select>
                                    </div>
                                    <div class="form-group">
										<label for="id_menu">ID Menu</label>
                                        <select class="form-control" name="id_menu">
											<option value="1">Menu #1 - Nama Menu</option>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_beli">Jumlah Beli</label>
                                        <input type="text" class="form-control" name="jumlah_beli" value="{{ @$info ? @$info->jumlah_beli : '' }}">
									</div>
									<div class="form-group">
                                        <label for="total_harga">Total Harga</label>
                                        <input type="text" class="form-control" name="total_harga" value="{{ @$info ? @$info->tanggal_promo_selesai : '' }}" readonly>
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
