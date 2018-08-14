{{-- @php
	dd($data);
@endphp --}}
<!doctype html>
<html lang="en">

<head>

	@include('admin.partials._head')

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->

		@include('admin.partials._nav')

		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">

				@include('admin.partials._sidebar')

			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title" align="center">Voucher</h3>

						</div>
						<div class="panel-body">
							<p align="right"><a class="nav-link portfolio-link" data-toggle="modal" href="#addVoucher"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Buat Voucher</button></a></p>
							<table class="table table-hover">
							    <thead>
							      <tr>
							        <th>Kode Voucher</th>
							        <th>Jenis</th>
							        <th>Jumlah</th>
							        <th>Syarat</th>
							        <th>Tanggal Kadaluarsa</th>
							        <th>Pemilik</th>
							        <th></th>
							      </tr>
							    </thead>
							    <tbody>
							    @foreach($data['data']['Voucher'] as $datas)
							    {{-- @php
							    	dd($datas);
							    @endphp --}}
							      <tr>
							        <td>{{$datas['kode']}}</td>
							        <td>{{$datas['jenis']}}</td>
							        <td>{{$datas['jumlah']}}</td>
							        <td>{{$datas['syarat']}}</td>
							        <td>{{$datas['tanggal_kadaluarsa']}}</td>
							        <td>{{$datas['owner_id']['nama']}}</td>
                      <td><a class="nav-link portfolio-link" href="{{ route('voucher.editowner', $datas['id']) }}"><button type="button" class="btn btn-warning">Kirim</button></a></td>
							        <td><a class="nav-link portfolio-link" href="{{ route('voucher.edit', $datas['id']) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
							      </tr>
							     @endforeach
							    </tbody>
							  </table>
						</div>
					</div>
					<!-- END OVERVIEW -->	

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	@include('admin.partials._javascript')
</body>

<!--Tambah Modal-->

    <div id="addVoucher" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Buat Voucher</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('voucher.store') }}" aria-label="{{ __('Register') }}">
              @csrf

              <div class="form-group row">
                  <label for="kode" class="col-md-4 col-form-label text-md-right">{{ __('Kode') }}</label>

                  <div class="col-md-6">
                      <input id="kode" type="text" class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}" name="kode" value="{{ old('kode') }}" required autofocus>

                      @if ($errors->has('kode'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('kode') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="jenis" class="col-md-4 col-form-label text-md-right">Jenis</label>

                  <div class="col-md-6">
                      <input id="jenis" type="text" class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}" name="jenis" value="{{ old('jenis') }}" required autofocus>

                      @if ($errors->has('jenis'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('jenis') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="jumlah" class="col-md-4 col-form-label text-md-right">Jumlah</label>

                  <div class="col-md-6">
                      <input id="jumlah" type="number" class="form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" name="jumlah" value="{{ old('jumlah') }}" required autofocus>

                      @if ($errors->has('jumlah'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('jumlah') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="syarat" class="col-md-4 col-form-label text-md-right">Syarat</label>

                  <div class="col-md-6">
                      <textarea id="syarat" name="syarat" type="text" class="form-control"></textarea>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="tanggal_kadaluarsa" class="col-md-4 col-form-label text-md-right">Tanggal Kadaluarsa</label>

                  <div class="col-md-6">
                      <input id="tanggal_kadaluarsa" type="text" class="form-control input-append date form_datetime{{ $errors->has('tanggal_kadaluarsa') ? ' is-invalid' : '' }} datetime" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}" required autofocus>

                      @if ($errors->has('tanggal_kadaluarsa'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tanggal_kadaluarsa') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="logo_voucher" class="col-md-4 col-form-label text-md-right">Gambar Voucher</label>

                  <div class="col-md-6">
                      <input id="logo_voucher" type="file" class="" name="logo_voucher" value="{{ old('logo_voucher') }}">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="logo_qr" class="col-md-4 col-form-label text-md-right">Gambar QRcode</label>

                  <div class="col-md-6">
                      <input id="logo_qr" type="file" class="" name="logo_qr" value="{{ old('logo_qr') }}">

                  </div>
              </div>       

              <div class="form-group row mb-0" align="center">
                      <button type="submit" class="btn btn-primary">
                          Tambah Produk
                      </button>
                  
              </div>
          </form>
      </div>
      
    </div>

  </div>
</div>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
</script> 


</html>
