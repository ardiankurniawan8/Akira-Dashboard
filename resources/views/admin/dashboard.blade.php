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
							<h3 class="panel-title">Weekly Overview</h3>
							<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number">102</span>
											<span class="title">Member</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">203</span>
											<span class="title">Reservasi Sukses</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">{{count($data['data']['produk'])}}</span>
											<span class="title">Produk</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">10</span>
											<span class="title">Therapist</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title" align="center">Produk</h3>

						</div>
						<div class="panel-body">
							<p align="right"><a class="nav-link portfolio-link" data-toggle="modal" href="#addProduk"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah data</button></a></p>
							<table class="table table-hover">
							    <thead>
							      <tr>
							        <th>Nama</th>
							        <th>Kode</th>
							        <th>Waktu</th>
							        <th>Harga</th>
							        <th style="width: 300px">Deskripsi</th>
							        <th></th>
							      </tr>
							    </thead>
							    <tbody>
							    @foreach($data['data']['produk'] as $datas)
							      <tr>
							        <td>{{$datas['nama']}}</td>
							        <td>{{$datas['kode']}}</td>
							        <td>{{$datas['waktu']}}</td>
							        <td>Rp. {{number_format($datas['harga'],2,',','.')}}</td>
							        <td>{{$datas['deskripsi']}}</td>
							        <td><a class="nav-link portfolio-link" href="{{ route('dashboard.edit', $datas['id']) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
							      </tr>
							     @endforeach
							    </tbody>
							  </table>
						</div>
					</div>	

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

    <div id="addProduk" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Produk</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('dashboard.store') }}" aria-label="{{ __('Register') }}">
              @csrf

              <div class="form-group row">
                  <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                  <div class="col-md-6">
                      <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                      @if ($errors->has('nama'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nama') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="waktu" class="col-md-4 col-form-label text-md-right">Waktu</label>

                  <div class="col-md-6">
                      <input id="waktu" type="number" class="form-control{{ $errors->has('waktu') ? ' is-invalid' : '' }}" name="waktu" value="{{ old('waktu') }}" required autofocus>

                      @if ($errors->has('waktu'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('waktu') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <label for="harga" class="col-md-4 col-form-label text-md-right">Harga</label>

                  <div class="col-md-6">
                      <input id="harga" type="number" class="uang form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}" name="harga" value="{{ old('harga') }}" required autofocus>

                      @if ($errors->has('harga'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('harga') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

                  <div class="col-md-6">
                      <textarea id="deskripsi" name="deskripsi" type="text" class="form-control"></textarea>
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
	$(document).ready(function(){
 
                // Format mata uang.
    $( '.uang' ).mask('000.000.000', {reverse: true});
 
    });

    $(document).submit(function(){
 
                // Format mata uang.
    $( '.uang' ).unmask();
 
    });
	
</script>

</html>
