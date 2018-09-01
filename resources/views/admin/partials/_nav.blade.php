<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="/dashboard"><img src="{{URL::asset('assets/img/akira.png')}}" alt="Akira Reflexology" class="img-responsive logo"></a>
	</div>
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
		</div>
		
		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{URL::asset('assets/img/user.png')}}" class="img-circle" alt="Avatar"><span>{{Auth::user()->nama}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
					<ul class="dropdown-menu">
						<!--<li><a href="/home"><i class="lnr lnr-user"></i> <span>Landing Page</span></a></li>-->
						<li><a href="{{route('gantipassword.edit',Auth::user()->username)}}"><i class="lnr lnr-envelope"></i> <span>Ganti Password</span></a></li>
						<li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>