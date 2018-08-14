{{-- @php
	dd($datas['id']);
@endphp --}}
<!doctype html>
@php
	$path = 'assets/img/'.$datas['logo_voucher'].'';
	// dd($path);
@endphp
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
							<h3 class="panel-title" align="center">Edit Voucher</h3>

						</div>
						<div class="panel-body">
							<div align="center">
							<img src="{{URL::asset($path)}}" alt="Italian Trulli" width="500" height="200">
							<br><br><br><br><br>
   							</div>
					        <form method="post" action="{{ route('voucher.update',$datas['id']) }}" aria-label="{{ __('Add Produk') }}">
					        	{{ csrf_field() }}
								{{ method_field('PATCH') }}

					              <div class="form-group row">
					                  <label for="kode" class="col-md-4 col-form-label text-md-right">{{ __('Kode') }}</label>

					                  <div class="col-md-6">
					                      <input id="kode" type="text" class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}" name="kode" value="{{$datas['kode']}}" required autofocus>

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
					                      <input id="jenis" type="text" class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}" name="jenis" value="{{$datas['jenis']}}" required autofocus>

					                      @if ($errors->has('jenis'))
					                          <span class="invalid-feedback" role="alert">
					                              <strong>{{ $errors->first('jenis') }}</strong>
					                          </span>
					                      @endif
					                  </div>
					              </div>

					              <div class="form-group row">
					                  <label for="waktu" class="col-md-4 col-form-label text-md-right">Jumlah</label>

					                  <div class="col-md-6">
					                      <input id="jumlah" type="number" class="form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" name="jumlah" value="{{$datas['jumlah']}}" required autofocus>

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
					                      <textarea id="syarat" name="syarat" type="text" class="form-control">{{$datas['syarat']}}</textarea>
					                  </div>
					              </div>

					              <div class="form-group row">
					                  <label for="tanggal_kadaluarsa" class="col-md-4 col-form-label text-md-right">Tanggal Kadaluarsa</label>

					                  <div class="col-md-6">
					                      <input id="tanggal_kadaluarsa" type="text" class="form-control input-append date form_datetime{{ $errors->has('tanggal_kadaluarsa') ? ' is-invalid' : '' }} datetime" name="tanggal_kadaluarsa" value="{{$datas['tanggal_kadaluarsa']}}" required autofocus>

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
					                      <input id="logo_voucher" type="file" class="" name="logo_voucher" value="{{ $datas['logo_voucher'] }}">
					                  </div>
					              </div>

					              <div class="form-group row">
					                  <label for="logo_qr" class="col-md-4 col-form-label text-md-right">Gambar QRcode</label>

					                  <div class="col-md-6">
					                      <input id="logo_qr" type="file" class="" name="logo_qr" value="{{$datas['logo_qr']}}">

					                  </div>
					              </div>                

					              <div class="form-group row mb-0" align="center">
					                        <button type="submit" class="btn btn-primary">
					                          Simpan
					                    	</button>
					                    	<a href="{{-- {{ route('dashboard.index') }} --}}"><button type="submit" class="btn btn-default	">
					                          Batal
					                    	</button></a>
					                  		<a href="#deleteProduk" data-toggle="modal" class="btn btn-danger" role="button">Hapus</a>
					              </div>
					          </form>
     
      
    
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
<!--Warning Modal-->

    <div id="deleteProduk" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	Anda Yakin Untuk Menghapus Data ?
        <form action="{{-- {{ route('dashboard.destroy' , $datas['id'])}} --}}" method="POST">
		    <input name="_method" type="hidden" value="DELETE">
		    {{ csrf_field() }}
		    {{ method_field('DELETE') }}

		    <div class="modal-footer no-border">
		    	<button type="submit" class="btn btn-danger">Ya</button>
		        <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
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
