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
                            <h3 class="panel-title" align="center">Ganti Password</h3>

                        </div>
                        <div class="panel-body">
                            @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                 @endif
                        <form id="form" method="POST" onsubmit="return validateForm()" action="{{ route('gantipassword.update', Auth::user()->username) }}" aria-label="{{ __('Reset Password') }}">
                        {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $data['data']['users'][0]['username'] }}" required readonly>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpassword" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control{{ $errors->has('newpassword') ? ' is-invalid' : '' }}" name="newpassword" required>

                                @if ($errors->has('newpassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ketik Ulang Password Baru') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ganti Password') }}
                                </button>
                            </div>
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

    function validateForm() {
        var x = document.forms["form"]["newpassword"].value;
        var y = document.forms["form"]["password-confirm"].value;
        if (x === y) {
            // alert("Sama");
            return true;
        }else{
            alert("Password baru yang anda masukkan Tidak cocok")
            return false;
        }
    }

</script>

</html>
