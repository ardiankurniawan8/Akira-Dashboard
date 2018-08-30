{{-- @php
	dd(Auth::user()->flag);	
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

					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title" align="center">Management Admin</h3>



						</div>
						<div class="panel-body">
							
                         		 @if (session('status'))
									    <div class="alert alert-success">
									        {{ session('status') }}
									    </div>
								 @endif
                         		 
							<p align="right"><a class="nav-link portfolio-link" data-toggle="modal" href="#addVoucher"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Admin</button></a></p>
							<table id="tables" class="table table-hover">
							    <thead>
							      <tr>
							        <th>Nama</th>
							        <th>Username</th>
							        <th></th>
							      </tr>
							    </thead>
							    <tbody>
							    @foreach($data['data']['users'] as $datas)
							      <tr>
							        <td>{{$datas['nama']}}</td>
							        <td>{{$datas['username']}}</td>
							        <td><a class="nav-link portfolio-link" data-toggle="modal" href="#delete"><button type="button" class="btn btn-danger">Deactive</button></a></td>
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

    <div id="addVoucher" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="add" method="POST" action="{{ route('admin.store') }}" aria-label="{{ __('Register') }}">
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
                  <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                  <div class="col-md-6">
                      <input id="username" type="number" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                      @if ($errors->has('username'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row mb-0" align="center">
                      <button type="submit" class="btn btn-primary">
                          Tambah Admin
                      </button>
                  
              </div>
          </form>
      </div>
      
    </div>

  </div>
</div>

<!--Delete Modal-->

    <div id="delete" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	Anda Yakin Untuk Menghapus Data ?
        <form action="{{ route('admin.destroy' , $datas['username'])}}" method="POST">
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
	$(document).ready(function() {
    $('#tables').DataTable( {
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data",
            "zeroRecords": "Data Kosong",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Data Kosong",
            "infoFiltered": "(Menampilkan dari _MAX_ data)"
        }
    } );
} );
</script>

</html>
