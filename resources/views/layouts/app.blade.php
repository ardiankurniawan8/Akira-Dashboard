<!DOCTYPE html>
<html lang="en">

  <head>

    @include('partials._head')

  </head>

  <body id="page-top">

    <!-- Navigation -->
    
    <!--@include('partials._nav')-->

    <!-- Header -->
    <header class="masthead">
      
      @yield('header')

    </header>

    @yield('menu')
    <!-- Footer -->
    <!--<footer>
      
    @include('partials._footer')

    </footer>-->


    @include('partials._javascript')

  </body>

</html>