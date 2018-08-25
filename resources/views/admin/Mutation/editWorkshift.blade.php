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
							<h3 class="panel-title" align="center">Edit Workshift</h3>

						</div>
						<div class="panel-body">
							<div align="center">
   							</div>
					        <form method="post" action="{{ route('terapis.updateworkshift',$data['data']['WorkshiftQuery'][0]['id']) }}" aria-label="{{ __('Add Produk') }}">
					        	{{ csrf_field() }}
								{{ method_field('PATCH') }}

					              <div class="form-group row">
					                  <label for="kode" class="col-md-4 col-form-label text-md-right">{{ __('Hari') }}</label>

					                  <div class="col-md-6">
					                      <input id="hari" type="text" class="form-control{{ $errors->has('hari') ? ' is-invalid' : '' }}" name="hari" value="{{$data['data']['WorkshiftQuery'][0]['hari']}}" readonly required autofocus>

					                      @if ($errors->has('hari'))
					                          <span class="invalid-feedback" role="alert">
					                              <strong>{{ $errors->first('hari') }}</strong>
					                          </span>
					                      @endif
					                  </div>
					              </div>

					              <div class="form-group row">
					                  <label for="jam_mulai" class="col-md-4 col-form-label text-md-right">Jam Mulai</label>

					                  <div class="col-md-6">
					                      <input id="jam_mulai" type="text" class="form-control timepicker{{ $errors->has('jam_mulai') ? ' is-invalid' : '' }}" name="jam_mulai" value="{{$data['data']['WorkshiftQuery'][0]['jam_mulai']}}" required autofocus>

					                      @if ($errors->has('jam_mulai'))
					                          <span class="invalid-feedback" role="alert">
					                              <strong>{{ $errors->first('jam_mulai') }}</strong>
					                          </span>
					                      @endif
					                  </div>
					              </div>

					              <div class="form-group row">
					                  <label for="jam_akhir" class="col-md-4 col-form-label text-md-right">Jam Berakhir</label>

					                  <div class="col-md-6">
					                      <input id="jam_akhir" type="text" class="form-control timepicker{{ $errors->has('jam_akhir') ? ' is-invalid' : '' }}" name="jam_akhir" value="{{$data['data']['WorkshiftQuery'][0]['jam_akhir']}}" required autofocus>

					                      @if ($errors->has('jam_akhir'))
					                          <span class="invalid-feedback" role="alert">
					                              <strong>{{ $errors->first('jam_akhir') }}</strong>
					                          </span>
					                      @endif
					                  </div>
					              </div>

					              <div class="form-group row mb-0" align="center">
					                        <button type="submit" class="btn btn-primary">
					                          Simpan
					                    	</button>
					                    	{{-- <a href="{{ route('terapis.index') }}"><button type="button" class="btn btn-default	">
					                          Batal
					                    	</button></a> --}}
					                    	@php
					                    		if($data['data']['WorkshiftQuery']['0']['flag'] == 1){
					                    	@endphp
					                  		<a href="#nonaktif" data-toggle="modal" class="btn btn-danger" role="button">Nonaktif</a>
					                  		@php
					                  		}else
					                  		{
					                  		@endphp
					                  		<a href="#aktif" data-toggle="modal" class="btn btn-warning" role="button">Aktif</a>
					                  		@php
					                  		}	
					                  		@endphp
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
<!--Nonaktif Modal-->

    <div id="nonaktif" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Non-aktif</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	Anda Yakin Untuk Non-aktif Data ?
        <form action="{{ route('terapis.disableworkshift' , $data['data']['WorkshiftQuery']['0']['id'])}}" method="POST">
		    <input name="_method" type="hidden">
		    {{ csrf_field() }}
		    {{ method_field('PATCH') }}

		    <div class="modal-footer no-border">
		    	<button type="submit" class="btn btn-danger">Ya</button>
		        <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
		    </div>
		</form>
      </div>
      
    </div>

  </div>
</div>

<!--aktif Modal-->

    <div id="aktif" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Aktif</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	Anda Yakin Untuk Aktif Data ?
        <form action="{{ route('terapis.enableworkshift' , $data['data']['WorkshiftQuery']['0']['id'])}}" method="POST">
		    <input name="_method" type="hidden">
		    {{ csrf_field() }}
		    {{ method_field('PATCH') }}

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
    $('.timepicker').timepicker({
    timeFormat: 'HH:mm:ss',
    interval: 60,
    minTime: '10',
    maxTime: '22',
    defaultTime: '',
    startTime: '1',
    dynamic: true,
    dropdown: true,
    scrollbar: true,
});
</script> 

</html>
