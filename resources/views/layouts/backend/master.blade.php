<!DOCTYPE html>
<html lang="en" dir="{{App::getlocale() == 'en' ? '':'rtl'}}">
<head>
  @include('layouts.backend.head')
</head>

<body>

<div class="wrapper">

<!--=================================
 preloader -->
 
<div id="pre-loader">
    <img src="{{asset('backend/assets/images/pre-loader/loader-01.svg')}}" alt="">
</div>

<!--=================================
 preloader -->


  @include('layouts.backend.main-header')

<!--=================================
 Main content -->
 
<div class="container-fluid">
  <div class="row">

    @include('layouts.backend.main-sidebar')

 <!--=================================
wrapper -->

    <div class="content-wrapper">

        @yield('content')

<!--=================================
 wrapper -->
  @include('layouts.backend.footer')  
    </div>
  </div>
</div>

  @include('layouts.backend.script')


  
</body>
</html>