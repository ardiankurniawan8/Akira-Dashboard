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
							<h3 class="panel-title" align="center">Workshift {{$data['data']['KaryawanQuery'][0]['nama']}}</h3>

						</div>
						<div class="panel-body">
							
							<table class="table table-hover">
							    <thead>
							      <tr>
							        <th>Hari</th>
							        <th>Jam Mulai</th>
							        <th>Jam Akhir</th>
							        <th>Status</th>
							        <th style="width: 300px"></th>
							      </tr>
							    </thead>
							    <tbody>
							    @foreach($data['data']['KaryawanQuery'][0]['penempatan'][0]['workshift'] as $datas)
							    @php
							    	if($datas['flag'] == 0){
							    		$string = "Off";	
							    	}else
							    	{
							    		$string = "On";
							    	}
							    @endphp
							      <tr>
							        <td>{{$datas['hari']}}</td>
							        <td>{{$datas['jam_mulai']}}</td>
							        <td>{{$datas['jam_akhir']}}</td>
							        <td>{{$string}}</td>
							        <td><a class="nav-link portfolio-link" href="{{ route('terapis.editworkshift', $datas['id']) }}"><button type="button" class="btn btn-primary">Edit</button></a><span>
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

<div id="addWorkshift" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Workshift</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{-- {{ route('terapis.store') }} --}}" aria-label="{{ __('Register') }}">
              @csrf

              <div class="form-group row">
                  <label for="hari" class="col-md-4 col-form-label text-md-right">Hari</label>

                  <div class="col-md-6">
                      <input id="hari" type="text" class="form-control{{ $errors->has('hari') ? ' is-invalid' : '' }}" name="hari" value="{{ old('hari') }}" required autofocus>

                      @if ($errors->has('hari'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('hari') }}</strong>
                          </span>
                      @endif
                  </div>

                  <label for="awal" class="col-md-4 col-form-label text-md-right">Jam Mulai</label>

                  <div class="col-md-6">
                      <input id="awal" type="text" style="z-index: 100000;" class="form-control timepicker{{ $errors->has('awal') ? ' is-invalid' : '' }}" name="awal" value="{{ old('awal') }}" required autofocus>

                      @if ($errors->has('awal'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('awal') }}</strong>
                          </span>
                      @endif
                  </div>

                  <label for="akhir" class="col-md-4 col-form-label text-md-right">Jam Berakhir</label>

                  <div class="col-md-6">
                      <input id="akhir" type="text" class="form-control timepicker{{ $errors->has('akhir') ? ' is-invalid' : '' }}" name="akhir" value="{{ old('akhir') }}" required autofocus>

                      @if ($errors->has('akhir'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('akhir') }}</strong>
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
