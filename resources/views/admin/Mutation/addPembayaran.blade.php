{{-- @php
	dd($voucher);
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
							<h3 class="panel-title" align="center">Pembayaran</h3>

						</div>
						<div class="panel-body">
							@if (session('status'))
									    <div class="alert alert-success">
									        {{ session('status') }}
									    </div>
							@endif
							<p align="right"><a class="nav-link portfolio-link" data-toggle="modal" href="#addProduk"><button type="button" class="btn btn-success">Cek Voucher</button></a></p>

							<div align="center">
   							</div>
					        <form id="form" method="POST" onsubmit="return validateForm()" action="{{ route('pembayaran.store') }}" aria-label="{{ __('Register') }}">
				              @csrf

				              <div class="form-group row">
				              	@php
				              		$diskon = $voucher['data']['CheckVoucherQuery']['jumlah'];
				              		$referensi = $voucher['data']['CheckVoucherQuery']['kode'];	
				              		
				              	@endphp

				              		<label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('tanggal') }}</label>

					                  <div class="col-md-6">
					                  	<label id="tanggal" for="tanggal" class="col-md-4 col-form-label text-md-right">{{date('y-m-d h:i:s')}}</label>
					                  </div>

					                  <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis') }}</label>

					                  <div class="col-md-6">
					                  	<label id="jenis" for="jenis" class="col-md-4 col-form-label text-md-right">Tunai</label>
					                  </div>

					              	<label for="kode" class="col-md-4 col-form-label text-md-right">{{ __('Kode Reservasi') }}</label>

					              	<div class="col-md-6">
				                      <input id="kode" type="text" class="form-control" name="kode" value="{{$data['data']['headerReservasi'][0]['kode']}}" readonly>
				                  </div>

				                  {{-- SUM HARGA PRODUK --}}
				                  @php
				                  	$harga = 0;
				                  	foreach($data['data']['headerReservasi'][0]['detail_reservasi'] as $produk){
				                  		$harga += $produk['produk_id']['harga'];
				                  	}
				                  @endphp

					                  <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

					                  <div class="col-md-6">
					                  	<label id="harga" for="harga" class="col-md-4 col-form-label text-md-right">{{number_format($harga,2,',','.')}}</label>
					                  </div>

									  <label for="referensi" class="col-md-4 col-form-label text-md-right">{{ __('Referensi Voucher') }}</label>

					              	<div class="col-md-6">
				                      <input id="referensi" type="text" class="form-control" name="referensi" value="{{$referensi}}" readonly>
				                  </div>


					                  <label for="potongan" class="col-md-4 col-form-label text-md-right">{{ __('Diskon') }}</label>

					                  <div class="col-md-6">
					                  	<label id="potongan" for="potongan" class="col-md-4 col-form-label text-md-right">{{number_format($diskon,2,',','.')}}</label>
					                  </div>

									{{--TOTAL PEMBAYARAN--}}
					                  @php
					                  		$total = $harga - $diskon;
					                  		if($total<0){
					                  			$total = 0;
					                  		}
					                  @endphp
					                  <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total') }}</label>

					                  <div class="col-md-6">
					                  	<label id="total" name="total" for="total" class="col-md-4 col-form-label text-md-right">{{number_format($total,2,',','.')}}</label>
					                  	{{-- <input id="totall" for="totall" name="totall" type="number" class="form-control{{ $errors->has('totall') ? ' is-invalid' : '' }}" value="{{ $total }}" readonly> --}}
					                  </div>
					              
				                  <label for="jumlah" class="col-md-4 col-form-label text-md-right">Jumlah</label>

				                  <div class="col-md-6">
				                  	<input id="jumlah" type="number" class="uang form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" name="jumlah" value="{{ old('jumlah') }}" required autofocus>

				                  	<input id="diskon" type="hidden" class="form-control{{ $errors->has('diskon') ? ' is-invalid' : '' }}" name="diskon" value="{{ $diskon }}" hidden readonly>			                      

				                      @if ($errors->has('jumlah'))
				                          <span class="invalid-feedback" role="alert">
				                              <strong>{{ $errors->first('jumlah') }}</strong>
				                          </span>
				                      @endif
				                  </div>
				              </div>          

				              <div class="form-group row mb-0" align="center">
				                      <button id="myButton" type="submit" class="btn btn-primary">
				                          Selesai
				                      </button>
				                  
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

<!--Tambah Modal-->

    <div id="addProduk" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cek Voucher</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('cekvoucher.update', $data['data']['headerReservasi'][0]['id']) }}" aria-label="{{ __('Cek Voucher') }}">
              {{ csrf_field() }}
			{{ method_field('PATCH') }}

              <div class="form-group row">
                  <label for="voucher" class="col-md-4 col-form-label text-md-right">{{ __('Kode Voucher') }}</label>

                  <div class="col-md-6">
                      <input id="voucher" type="text" class="form-control{{ $errors->has('voucher') ? ' is-invalid' : '' }}" name="voucher" value="{{ old('voucher') }}" required autofocus>

                      @if ($errors->has('voucher'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('voucher') }}</strong>
                          </span>
                      @endif
                  </div>

              </div>           

              <div class="form-group row mb-0" align="center">
                      <button type="submit" class="btn btn-primary">
                          Cek Voucher
                      </button>
                  
              </div>
          </form>
      </div>
      
    </div>

  </div>
</div>

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
