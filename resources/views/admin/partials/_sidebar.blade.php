<nav>
	<ul class="nav">
		<li><a href="/dashboard" class="{{Request::is('dashboard')?"active":""}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
		<li><a href="/calendar" class="{{Request::is('calendar')?"active":""}}"><i class="lnr lnr-code"></i> <span>Calendar</span></a></li>
		<li>

			@if(Request::is('reservasi/konfirmasi')||Request::is('reservasi/checkin'))
			<a href="#subPages3" data-toggle="collapse" class="collapse active"><i class="lnr lnr-file-empty"></i> <span>Reservasi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPages3" class="collapsed">
				<ul class="nav">
					{{-- <li><a href="/management/therapist" class="">Workshift</a></li> --}}
					<li><a href="/reservasi/konfirmasi" class="">Reservasi Masuk</a></li>
					<li><a href="/reservasi/checkin" class="">Reservasi Diterima</a></li>
				</ul>
			</div>
			@else
			<a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Reservasi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPages3" class="collapse">
				<ul class="nav">
					{{-- <li><a href="/management/therapist" class="">Workshift</a></li> --}}
					<li><a href="/reservasi/konfirmasi" class="">Reservasi Masuk</a></li>
					<li><a href="/reservasi/checkin" class="">Reservasi Diterima</a></li>
				</ul>
			</div>
			@endif
		</li>
		<li><a href="/pembayaran" class="{{Request::is('pembayaran')?"active":""}}"><i class="lnr lnr-dice"></i> <span>Pembayaran</span></a></li>
		<li><a href="/terapis" class="{{Request::is('terapis')?"active":""}}"><i class="lnr lnr-dice"></i> <span>Terapis</span></a></li>
		{{-- <li>

			@if(Request::is('therapist/history')||Request::is('therapist/komisi')||Request::is('therapist/workshift'))
			<a href="#subPages" data-toggle="collapse" class="collapse active"><i class="lnr lnr-file-empty"></i> <span>Therapist</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPages" class="collapsed ">
				<ul class="nav">
					<li><a href="/therapist/history" class="">History</a></li>
					<li><a href="/therapist/komisi" class="">Komisi</a></li>
					<li><a href="/therapist/workshift" class="">Workshift</a></li>
				</ul>
			</div>
			@else
			<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Therapist</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPages" class="collapse ">
				<ul class="nav">
					<li><a href="/therapist/history" class="">History</a></li>
					<li><a href="/therapist/komisi" class="">Komisi</a></li>
					<li><a href="/therapist/workshift" class="">Workshift</a></li>
				</ul>
			</div>
			@endif
		</li> --}}
		<li>

			@if(Request::is('management/therapist')||Request::is('management/voucher')||Request::is('management/admin'))
			<a href="#subPages1" data-toggle="collapse" class="collapse active"><i class="lnr lnr-file-empty"></i> <span>Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPages1" class="collapsed">
				<ul class="nav">
					{{-- <li><a href="/management/therapist" class="">Workshift</a></li> --}}
					<li><a href="/management/voucher" class="">Voucher</a></li>
					<li><a href="/management/admin" class="">Admin</a></li>
				</ul>
			</div>
			@else
			<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPages1" class="collapse">
				<ul class="nav">
					{{-- <li><a href="/management/therapist" class="">Workshift</a></li> --}}
					<li><a href="/management/voucher" class="">Voucher</a></li>
					<li><a href="/management/admin" class="">Admin</a></li>
				</ul>
			</div>
			@endif
		</li>
		
		<li>
			@if(Request::is('laporan/pelanggan')||Request::is('laporan/transaksi')||Request::is('laporan/historyvoucher')||Request::is('laporan/reservasi'))
			<a href="#subPages2" data-toggle="collapse" class="collapse active"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPages2" class="collapsed ">
				<ul class="nav">
					<li><a href="/laporan/pelanggan" class="">Pelanggan</a></li>
					<li><a href="/laporan/transaksi" class="">Transaksi</a></li>
					<li><a href="/laporan/historyvoucher" class="">Voucher</a></li>
					<li><a href="/laporan/reservasi" class="">Reservasi</a></li>
				</ul>
			</div>
			@else
			<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPages2" class="collapse ">
				<ul class="nav">
					<li><a href="/laporan/pelanggan" class="">Pelanggan</a></li>
					<li><a href="/laporan/transaksi" class="">Transaksi</a></li>
					<li><a href="/laporan/historyvoucher" class="">Voucher</a></li>
					<li><a href="/laporan/reservasi" class="">Reservasi</a></li>
				</ul>
			</div>
			@endif
		</li>
	</ul>
</nav>