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
                <h1>Alur Transaksi (Bagian Terakhir) <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Alur Transaksi</li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>
            </div>
		</div>
		<div class="row">
            <div class="col-sm-12">
                <hr class="separator">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center align-items-center">
                    <h5>Cara untuk membuat alur transaksi:</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb arr-bread d-flex justify-content-center align-items-center">
                    <li><a href="#">Alur Data</a></li>
					<li><a href="#">Detail Transaksi</a></li>
					<li class="active"><span>Transaksi</span></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ site_url('kasir/alur/transaksi/store_transaksi/'.$this->session->info_alur_id_transaksi) }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
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
										<label for="id">ID Transaksi ({{ $this->session->info_alur_id_transaksi }})</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Transaksi</label>
                                        <div class="input-group date" id="tanggal" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#tanggal" placeholder="Silahkan, tekan icon tanggal untuk menginput" readonly/>
											<div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
                                    </div>
                                    <div class="form-group">
										<label for="sub_total">Sub Total</label>
										<input id="sub_total" type="text" class="form-control" name="sub_total" value="{{ $info_sub_total_transaksi }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kupon">Kupon</label>
                                        <select id="kupon" class="form-control" name="kupon">
											<option value="" info="0" selected>TIDAK PAKAI KUPON</option>
											@if(@$info_kupon)
											@foreach ($info_kupon as $info_data)
											<option value="{{ $info_data->id }}" info="{{ $info_data->diskon }}">Kupon #{{ $info_data->id }} ({{ $info_data->diskon }}%)</option>
											@endforeach
											@else
											<option>--KUPON TIDAK TERSEDIA--</option>
											@endif
										</select>
									</div>
									<div class="form-group">
                                        <label for="total_harga">Total Harga</label>
                                        <input id="total_harga" type="text" class="form-control" name="total_harga" value="{{ $info_sub_total_transaksi }}" readonly>
									</div>
									<div class="form-group">
                                        <label for="bayar">Bayar</label>
                                        <input id="bayar" type="text" class="form-control" name="bayar" value="0">
									</div>
									<div class="form-group">
                                        <label for="kembalian">Kembalian</label>
                                        <input id="kembalian" type="text" class="form-control" name="kembalian" value="0" readonly>
									</div>
									<div class="form-group">
                                        <label for="kasir">Kasir</label>
                                        <input type="text" class="form-control" name="kasir" name="kasir" value="{{ $this->session->nip }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
		$('#kupon').on('change', function() {
			var input_sub_total = $('#sub_total').val();
			var input_kupon_diskon = $('option:selected', this).attr('info');
			var input_total_harga = $('#total_harga');
			var total_harga_kurang = input_sub_total * (input_kupon_diskon/100);
			var total_harga = input_sub_total - total_harga_kurang;
			input_total_harga.val(total_harga);
		});
		$('#bayar').on('input', function() {
			var input_total_harga = $('#total_harga').val();
			var input_bayar = $(this).val();
			var kembalian = input_bayar - input_total_harga;
			if (kembalian < 0) {
				$('#kembalian').val('Belum Valid');
			} else {
				$('#kembalian').val(kembalian);
			}
		});
	</script>
@endsection
