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
							<h3 class="panel-title" align="center">Edit Terapis</h3>

						</div>
						<div class="panel-body">
   
					        <form method="post" action="{{ route('terapis.update',$data['data']['KaryawanQuery'][0]['id']) }}" aria-label="{{ __('Add Produk') }}">
					        	{{ csrf_field() }}
								{{ method_field('PATCH') }}

					              <div class="form-group row">
					                  <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

					                  <div class="col-md-6">
					                      <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{$data['data']['KaryawanQuery'][0]['nama']}}" required autofocus>

					                      @if ($errors->has('nama'))
					                          <span class="invalid-feedback" role="alert">
					                              <strong>{{ $errors->first('nama') }}</strong>
					                          </span>
					                      @endif
					                  </div>
					              </div>

					               <div class="form-group row">
						              <label for="nama" class="col-md-4 col-form-label text-md-right">Gender</label>

						                  <div class="col-md-6">
						                        <input type="radio" name="gender" value="l" required> Laki-Laki
										  		<input type="radio" name="gender" value="p" required> Perempuan<br>
						                  </div>
						              </div>		             

					              <div class="form-group row mb-0" align="center">
					                        <button type="submit" class="btn btn-primary">
					                          Simpan
					                    	</button>
					                    	{{-- <a href="{{ route('dashboard.index') }}"><button type="submit" class="btn btn-default	">
					                          Batal
					                    	</button></a> --}}
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
        <form action="{{ route('terapis.destroy' , $data['data']['KaryawanQuery'][0]['id'])}}" method="POST">
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

</html>
