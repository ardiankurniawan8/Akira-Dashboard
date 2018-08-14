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
							<h3 class="panel-title" align="center">Terapis</h3>

						</div>
						<div class="panel-body">
							<p align="right"><a class="nav-link portfolio-link" data-toggle="modal" href="#addKaryawan"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah data</button></a></p>
							<table class="table table-hover">
							    <thead>
							      <tr>
							        <th>NIP</th>
							        <th>Nama</th>
							        <th>Rating</th>
							        <th style="width: 300px"></th>
							      </tr>
							    </thead>
							    <tbody>
							    @foreach($data['data']['KaryawanQuery'] as $datas)
							    {{-- @php
							    	dd($datas);
							    @endphp --}}
							      <tr>
							        <td>{{$datas['nip']}}</td>
							        <td>{{$datas['nama']}}</td>
							        <td>{{$datas['rating']}}</td>
							        <td><a class="nav-link portfolio-link" href="{{-- {{ route('dashboard.edit', $datas['id']) }} --}}"><button type="button" class="btn btn-primary">Edit</button></a><span>
							        <a class="nav-link portfolio-link" href="{{ route('terapis.show', $datas['id']) }}"><button type="button" class="btn btn-primary">Workshift</button></a></td>
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

    <div id="addKaryawan" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Karyawan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('terapis.store') }}" aria-label="{{ __('Register') }}">
              @csrf

              <div class="form-group row">
                  <label for="uuid" class="col-md-4 col-form-label text-md-right">{{ __('UUID') }}</label>

                  <div class="col-md-6">
                      <input id="uuid" type="text" class="form-control{{ $errors->has('uuid') ? ' is-invalid' : '' }}" name="uuid" value="{{ old('uuid') }}" required autofocus>

                      @if ($errors->has('uuid'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('uuid') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="nip" class="col-md-4 col-form-label text-md-right">NIP</label>

                  <div class="col-md-6">
                      <input id="nip" type="number" class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}" name="nip" value="{{ old('nip') }}" required autofocus>

                      @if ($errors->has('nip'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nip') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>

                  <div class="col-md-6">
                      <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                      @if ($errors->has('nama'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nama') }}</strong>
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

  </div>
</div>

</html>
