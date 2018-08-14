<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/akira.png" alt="Akira Reflexology" class="img-responsive logo"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#portfolio">Layanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#team">Therapist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#services">Tentang Kami</a>
        </li>
         @guest
                    <li class="nav-item">
                        <a class="nav-link portfolio-link" data-toggle="modal" href="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link portfolio-link" data-toggle="modal" href="#registerModal">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::check()&& Auth::user()->admin == 1)
                                <a class="dropdown-item" href="/dashboard">
                               Admin Page
                            </a> 
                            
                            @endif
                                                  
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
      </ul>
    </div>
  </div>
</nav>

               