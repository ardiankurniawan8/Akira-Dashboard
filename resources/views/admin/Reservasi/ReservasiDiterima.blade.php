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
							<h3 class="panel-title" align="center">Reservasi Diterima</h3>

						</div>
						<div class="panel-body">
							
							<table id="tables" class="table table-hover">
							    <thead>
							      <tr>
							        <th>Tanggal</th>
							        <th>Nama</th>
							        <th>Kode Reservasi</th>
							        <th>Produk</th>
							        <th>Terapis</th>
							        <th></th>
							      </tr>
							    </thead>
							    <tbody>
							    	@php
							    	// dd($data);
							    		foreach($data['data']['statusReservasi'] as $datas){
							    		$tanggal = $datas['header_reservasi_id']['tanggal_reservasi'];
							    		$tanggal = date('y-m-d', strtotime($tanggal));

								    		if($tanggal === date('y-m-d')){
								    @endphp
								    			<tr>
										        <td>{{$datas['header_reservasi_id']['tanggal_reservasi']}}</td>
										        <td>{{$datas['header_reservasi_id']['tamu']}}</td>
										        <td>{{$datas['header_reservasi_id']['kode']}}</td>
										        <td>@foreach($datas['header_reservasi_id']['detail_reservasi'] as $datass)
										        	<ul>{{$datass['produk_id']['nama']}}</ul>
										        	
										        @endforeach</td>

										        <td>@foreach($datas['header_reservasi_id']['detail_reservasi'] as $datass)
										        	<ul>{{$datass['karyawan_id']['nama']}}</ul>
										        	
										        @endforeach</td>
										        <td><a class="nav-link portfolio-link" href="{{ route('checkin.edit', $datas['header_reservasi_id']['kode']) }}"><button type="button" class="btn btn-primary">Checkin</button></a></td>
										        
										      </tr>
									@php
								    		}		    		
							    		}
							    	@endphp
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
