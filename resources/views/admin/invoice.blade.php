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
							<h3 class="panel-title" align="center">Invoice</h3>

						</div>
						<div class="panel-body">
							@if (session('status'))
									    <div class="alert alert-success">
									        {{ session('status') }}
									    </div>
							@endif

							<div align="center">
   							</div>
					        {{-- <form id="form" method="POST" action="{{ route('pembayaran.store') }}" aria-label="{{ __('Register') }}"> --}}
				              @csrf

				              <div class="form-group row">
				              		<label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('tanggal') }}</label>

					                  <div class="col-md-6">
					                  	<label id="tanggal" for="tanggal" class="col-md-4 col-form-label text-md-right">{{$data['data']['HeaderTransaksi'][0]['tanggal']}}</label>
					                  </div>

					                  <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Pembayaran') }}</label>

					                  <div class="col-md-6">
					                  	<label id="jenis" for="jenis" class="col-md-4 col-form-label text-md-right">{{$data['data']['HeaderTransaksi'][0]['nomor']}}</label>
					                  </div>

					              	<label for="kode" class="col-md-4 col-form-label text-md-right">{{ __('Kode Reservasi') }}</label>

					              	  <div class="col-md-6">
					                  	<label id="jenis" for="jenis" class="col-md-4 col-form-label text-md-right">{{$data['data']['HeaderTransaksi'][0]['id_detail'][0]['ref_id']}}</label>
					                  </div>
					                  @php
					                  $total = 0;
					                  @endphp
					                  <label for="produk" class="col-md-4 col-form-label text-md-right">{{ __('Produk') }}</label><br><br><br><br><hr>

					                  @foreach($data['data']['HeaderTransaksi'][0]['id_detail'] as $produks)
					                  
					                  	<label id="produk" for="produk" class="col-md-4 col-form-label text-md-right">{{$produks['produk']}}</label>
					                  	
					                  	<div class="col-md-6">
					                  	<label id="harga" for="harga" class="col-md-4 col-form-label text-md-right">{{number_format($produks['harga'],2,',','.')}}</label>
					                    </div>
					                  	@php
					                  	$total += $produks['harga'];
					                  	@endphp
					                  	<br>
					                  @endforeach
					                  <hr>
					                  <label for="voucher" class="col-md-4 col-form-label text-md-right">{{ __('Kode Voucher') }}</label>
					                  @php
						                  $referensi = $data['data']['HeaderTransaksi'][0]['id_pembayaran'][0]['referensi'];
						                  if($referensi == null){
						                  	$referensi = "-";
						                  }
						              @endphp

					                  <div class="col-md-6">
					                  	<label id="voucher" for="voucher" class="col-md-4 col-form-label text-md-right">{{$referensi}}</label>
					                  </div>

					                  <label for="potongan" class="col-md-4 col-form-label text-md-right">{{ __('Diskon') }}</label>

					                  <div class="col-md-6">
					                  	<label id="potongan" for="potongan" class="col-md-4 col-form-label text-md-right">{{number_format($data['data']['HeaderTransaksi'][0]['id_detail'][0]['diskon'],2,',','.')}}</label>
					                  </div>
					                  @php
					                  	$total = $total - $data['data']['HeaderTransaksi'][0]['id_detail'][0]['diskon'];
					                  	if($total<0){
					                  		$total = 0;
					                  	} 

					                  	$kembali = $data['data']['HeaderTransaksi'][0]['id_pembayaran'][0]['jumlah'] - $total;
					                  @endphp
					                  <label for="bayar" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Bayar') }}</label>

					                  <div class="col-md-6">
					                  	<label id="kembali" for="kembali" class="col-md-4 col-form-label text-md-right">{{number_format($data['data']['HeaderTransaksi'][0]['id_pembayaran'][0]['jumlah'],2,',','.')}}</label>
					                  </div>
					              
				                  <label for="kembali" class="col-md-4 col-form-label text-md-right">Kembalian</label>
				                  <div class="col-md-6">
					                  	<label id="kembali" for="kembali" class="col-md-4 col-form-label text-md-right">{{number_format($kembali,2,',','.')}}</label>
					                  </div>
				              </div>          

				              <div class="form-group row mb-0" align="center">
				                <form action="{{ route('print.show',$data['data']['HeaderTransaksi'][0]['nomor'])}}">
							    	<input class="btn btn-primary" value="Print" type="submit"/>
								</form>
				                  
				              </div>
				          {{-- </form> --}}
     
      
    
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

<script type="text/javascript">
	$(document).ready(function(){
 
                // Format mata uang.
    $( '.uang' ).mask('000.000.000', {reverse: true});
 
    });

    $(document).submit(function(){
 
                // Format mata uang.
    $( '.uang' ).unmask();
 
    }); 

    function validateForm() {
	    var x = document.forms["form"]["total"].value;
	    var y = document.forms["form"]["jumlah"].value;
	    if (y < x) {
	        alert("Jumlah uang yang anda masukkan kurang");
	        return false;
	    }
	}
	
</script>

</html>
