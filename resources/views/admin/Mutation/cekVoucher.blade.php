{{-- @php
	dd($id);
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
							<h3 class="panel-title" align="center">Cek Voucher</h3>

						</div>
						<div class="panel-body">
					        <form method="post" action="{{-- {{ route('voucher.updateowner',$datas['id']) }} --}}" aria-label="{{ __('Cek Voucher') }}">
					        	{{ csrf_field() }}

					              <div class="form-group row">
					                  <label for="waktu" class="col-md-4 col-form-label text-md-right">Kode Voucher</label>

					                  <div class="col-md-6">
					                      <input id="kode" type="text" class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}" name="kode" value="" required autofocus>

					                      @if ($errors->has('kode'))
					                          <span class="invalid-feedback" role="alert">
					                              <strong>{{ $errors->first('kode') }}</strong>
					                          </span>
					                      @endif
					                  </div>
					              </div>
              
					              <div class="form-group row mb-0" align="center">
					                        <button type="submit" class="btn btn-warning">
					                          Cek
					                    	</button>
					                    	<a href="{{ route('pembayaran.show'),$id }}"><button type="button" class="btn btn-default	">
					                          Lewati
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
