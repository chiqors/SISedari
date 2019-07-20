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
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Planning <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('ceo') }}">Beranda</a></li>
					<li class="breadcrumb-item"><a href="{{ site_url('ceo/planning') }}">Planning</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Planning</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('ceo/planning/update/'.@$info->id) : site_url('ceo/planning/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Planning</h3>
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
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ @$info ? @$info->judul : '' }}" readonly>
                                    </div>
                                    <div class="form-group">
										<label for="konten">Konten</label>
                                        <textarea class="form-control" name="konten" readonly>{{ @$info ? @$info->konten : '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_promo_mulai">Tanggal Promo Mulai</label>
                                        <input type="text" class="form-control" name="tanggal_promo_mulai" value="{{ @$info ? @$info->tanggal_promo_mulai : '' }}">
									</div>
									<div class="form-group">
                                        <label for="tanggal_promo_selesai">Tanggal Promo Selesai</label>
                                        <input type="text" class="form-control" name="tanggal_promo_selesai" value="{{ @$info ? @$info->tanggal_promo_selesai : '' }}">
									</div>
									<div class="form-group">
                                        <label for="nip_karyawan">NIP Manager</label>
                                        <input type="text" class="form-control" name="nip_karyawan" value="{{ @$info ? @$info->nip_karyawan : '' }}" readonly>
									</div>
									<div class="form-group">
										<label for="status">Status?</label>
										<select class="form-control" name="status">
											<option value="Belum Disetujui" {{ (@$info == 'Belum Disetujui') ? 'selected' : '' }}>Belum Disetujui</option>
											<option value="Ditolak" {{ (@$info == 'Ditolak') ? 'selected' : '' }}>Ditolak</option>
											<option value="Disetujui" {{ (@$info == 'Belum Disetujui') ? 'selected' : '' }}>Disetujui</option>
										</select>
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
@endsection
