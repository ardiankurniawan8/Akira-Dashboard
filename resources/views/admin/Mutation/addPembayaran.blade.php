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
							<h3 class="panel-title" align="center">Pembayaran</h3>

						</div>
						<div class="panel-body">
							<div align="center">
   							</div>
					        <form method="POST" action="{{ route('pembayaran.store') }}" aria-label="{{ __('Register') }}">
				              @csrf

				              <div class="form-group row">
				              	@php
				              		$diskon = 0;
				              	@endphp
					              	<label for="kode" class="col-md-4 col-form-label text-md-right">{{ __('Kode') }}</label>

					              	<div class="col-md-6">
				                      <input id="kode" type="text" class="form-control" name="kode" value="{{$data['data']['headerReservasi'][0]['kode']}}" readonly>
				                  </div>

					                  <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>


					                  <div class="col-md-6">
					                  	<label id="harga" for="harga" class="col-md-4 col-form-label text-md-right">Rp. {{$data['data']['headerReservasi'][0]['detail_reservasi'][0]['produk_id']['harga']}}</label>
					                  </div>

					                  <label for="potongan" class="col-md-4 col-form-label text-md-right">{{ __('Diskon') }}</label>

					                  <div class="col-md-6">
					                  	<label id="potongan" for="potongan" class="col-md-4 col-form-label text-md-right">Rp. {{$diskon}}</label>
					                  </div>

					                  <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('tanggal') }}</label>

					                  <div class="col-md-6">
					                  	<label id="tanggal" for="tanggal" class="col-md-4 col-form-label text-md-right">{{date('y-m-d h:i:s')}}</label>
					                  </div>

					                  <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis') }}</label>

					                  <div class="col-md-6">
					                  	<label id="jenis" for="jenis" class="col-md-4 col-form-label text-md-right">Tunai</label>
					                  </div>

				                  <label for="jumlah" class="col-md-4 col-form-label text-md-right">Jumlah</label>

				                  <div class="col-md-6">
				                      <input id="jumlah" type="text" class="form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" name="jumlah" value="{{ old('jumlah') }}" required autofocus>

				                      @if ($errors->has('jumlah'))
				                          <span class="invalid-feedback" role="alert">
				                              <strong>{{ $errors->first('jumlah') }}</strong>
				                          </span>
				                      @endif
				                  </div>
				              </div>          

				              <div class="form-group row mb-0" align="center">
				                      <button type="submit" class="btn btn-primary">
				                          Selesai
				                      </button>
				                  
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

</html>
