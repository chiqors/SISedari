@extends('entities.kasir.layouts.panel')

@section('hstyles')
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Transaksi <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('kasir/transaksi') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Transaksi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('kasir/transaksi/edit/1') : site_url('kasir/transaksi/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi</h3>
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
                                        <label for="tanggal">Tanggal Transaksi</label>
                                        <div class="input-group date" id="tanggal" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#tanggal" value="{{ @$info ? @$info->tanggal : '' }}" readonly/>
											<div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
                                    </div>
                                    <div class="form-group">
										<label for="sub_total">Sub Total</label>
										<input type="text" class="form-control" name="sub_total" value="{{ @$info ? @$info->sub_total : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kupon">Kupon</label>
                                        <select class="form-control" name="kupon">
											@foreach ($info_kupon as $info_data)
											<option value="{{ $info_data->id }}">Kupon #{{ $info_data->id }} ({{ $info_data->diskon }})</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
                                        <label for="total_harga">Total Harga</label>
                                        <input id="total_harga" type="text" class="form-control" name="total_harga" value="{{ @$info ? @$info->total_harga : '' }}">
									</div>
									<div class="form-group">
                                        <label for="bayar">Bayar</label>
                                        <input id="bayar" type="text" class="form-control" name="bayar" value="{{ @$info ? @$info->bayar : '' }}">
									</div>
									<div class="form-group">
                                        <label for="kembalian">Kembalian</label>
                                        <input id="kembalian" type="text" class="form-control" name="kembalian" value="{{ @$info ? @$info->kembalian : '' }}" readonly>
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
            $('#tanggal').datetimepicker({
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
	<script>
		$('#bayar').on('input', function() {
			var input_total_harga = $('#total_harga').val();
			var input_bayar = $(this).val();
			var kembalian = input_total_harga - input_bayar;

			$('#kembalian').val(kembalian);
		});
	</script>
@endsection
