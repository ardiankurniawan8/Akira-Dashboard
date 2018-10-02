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

					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title" align="center">Laporan Pelanggan</h3>

						</div>
						<div class="panel-body">
							<table id="tables" class="table table-hover">
							    <thead>
							      <tr>
							        <th>Nama User</th>
							        <th>Karyawan</th>
							        <th>Rating</th>
							        <th>Komentar</th>
							      </tr>
							    </thead>
							    <tbody>
							    @foreach($data['data']['rating'] as $datas)
							      <tr>
							        <td>{{$datas['user_id']}}</td>
							        <td>{{$datas['karyawan_id']}}</td>
							        <td>{{$datas['rating']}}</td>
							        <td>{{$datas['komentar']}}</td>
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
