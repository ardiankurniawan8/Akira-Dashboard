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
					
					<!-- END OVERVIEW -->	

					<!-- Calendar -->
					<div class="panel panel-headline">
						<div class="panel-body">
							<div id='calendar'>
							</div>
						</div>
					</div>
					<!-- End Calendar -->
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
	<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
        	
            // put your options and callbacks here
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events : [
            @foreach($data['data']['headerReservasi'] as $datas)
            	{
            		
            		title : '{{$datas['tamu']}}',
            	 	start : '{{$datas['tanggal_reservasi']}}',
                kode :'{{$datas['kode']}}',
                @foreach($datas['detail_reservasi'] as $datass)
                  produk : '{{$datass['produk']}}',
                  terapis : '{{$datass['karyawan_id']['nama']}}',
                @endforeach
            	 },
			      @endforeach
            ],
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
            // select: function(start, end) {
            //     // Display the modal.
            //     // You could fill in the start and end fields based on the parameters
            //     $('#calendarModal').modal('show');

            // },
            eventClick:  function(event, jsEvent, view) {
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#eventID').html(event.kode);
                $('#eventProduk').html(event.produk);
                $('#eventTerapis').html(event.terapis);
                $('#calendarModal').modal();
            },
        })
    
    });

    		
</script>

</body>

<!--Tambah Modal-->

    <div id="calendarModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Reservasi</h4>
        </div>
        <div id="modalBody" class="modal-body">
          <h3 id="modalWhen" class="modal-title"></h3><br>
          Nama : <h4 id="modalTitle" class="modal-title"></h4><br>
          Kode Reservasi : <h4 id="eventID" class="modal-title"></h4><br>
          Nama Produk : <h4 id="eventProduk" class="modal-title"></h4><br>
          Nama Terapis : <h4 id="eventTerapis" class="modal-title"></h4><br>


        </div>
        
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        </div>
      </div>
    </div>
  </div>

</html>
