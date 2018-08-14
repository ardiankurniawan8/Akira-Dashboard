{{-- @php
	dd($user);
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
							<h3 class="panel-title" align="center">Kirim Voucher</h3>

						</div>
						<div class="panel-body">
							<div align="center">
							<img src="{{URL::asset($path)}}" alt="Italian Trulli" width="500" height="200">
							<br><br><br><br><br>
   							</div>
					        <form method="post" action="{{ route('voucher.updateowner',$datas['id']) }}" aria-label="{{ __('Add Produk') }}">
					        	{{ csrf_field() }}
								{{ method_field('PATCH') }}

					              <div class="form-group row">
					                  <label for="kode" class="col-md-4 col-form-label text-md-right">{{ __('Kode') }}</label>

					                  <div class="col-md-6">
					                  	<label for="kode" class="col-md-4 col-form-label text-md-right">{{$datas['kode']}}</label>
					                  </div>
					              </div>

					              <div class="form-group row">
					                  <label for="waktu" class="col-md-4 col-form-label text-md-right">Username</label>

					                  <div class="col-md-6">
					                      <input id="username" type="number" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="" required autofocus>

					                      @if ($errors->has('username'))
					                          <span class="invalid-feedback" role="alert">
					                              <strong>{{ $errors->first('username') }}</strong>
					                          </span>
					                      @endif
					                  </div>
					              </div>
              
					              <div class="form-group row mb-0" align="center">
					                        <button type="submit" class="btn btn-warning">
					                          Kirim
					                    	</button>
					                    	<a href="{{-- {{ route('dashboard.index') }} --}}"><button type="submit" class="btn btn-default	">
					                          Batal
					                    	</button></a>
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
