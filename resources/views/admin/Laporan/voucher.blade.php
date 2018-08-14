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
							<h3 class="panel-title" align="center">History Voucher</h3>

						</div>
						<div class="panel-body">
							<table class="table table-hover">
							    <thead>
							      <tr>
							        <th>Tanggal</th>
							        <th>Kode Voucher</th>
							        <th>Pemilik</th>
							      </tr>
							    </thead>
							    <tbody>
							    @foreach($data['data']['Kepemilikan'] as $datas)
							    {{-- @php
							    	dd($datas);
							    @endphp --}}
							      <tr>
							        <td>{{$datas['tanggal']}}</td>
							        <td>{{$datas['voucher']['kode']}}</td>
							        <td>{{$datas['pemilik']}}</td>
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
</html>
