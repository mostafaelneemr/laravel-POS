<!--=================================
 header start-->
 <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <!-- logo -->
  <div class="text-left navbar-brand-wrapper">
      <a class="navbar-brand brand-logo" href="{{route('dashboard')}}"><img src="{{asset('backend/assets/images/logo-dark.png')}}" alt=""></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('backend/assets/images/logo-icon-dark.png')}}" alt=""></a>
  </div>
  <!-- Top bar left -->
  <ul class="nav navbar-nav mr-auto">
      <li class="nav-item">
          <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
      </li>
      
      <li class="nav-item">
          <div class="search">
              <a class="search-btn not_click" href="javascript:void(0);"></a>
              <div class="search-box not-click">
                  <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
                  <button class="search-button" type="submit"><i class="fa fa-search not-click"></i></button>
              </div>
          </div>
      </li>
  </ul>
  <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
     {{-- notifications --}}
        @can('notification')
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="ti-bell"></i>
            <span class="badge badge-danger notification-status"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
            <div class="dropdown-header notifications">
                <a href="{{route('markAsRead_All')}}">{{__('backend/main-sidebar.read notification')}}</a>
                <span class="badge badge-pill badge-warning">{{Auth::user()->unreadNotifications()->count()}}</span>
            </div>
            <div class="dropdown-divider"></div>
            @foreach (Auth::user()->unreadNotifications as $notification )
            <a href="{{route('invoice.index')}}" class="dropdown-item">{{$notification->data['title']}} {{$notification->data['user']}} <small class="float-right text-muted time">{{$notification->created_at}}</small> </a>
            <hr/>
            @endforeach
            </div>
        </li>
        @endcan

       {{-- button translate --}}
      <div class="btn-group mb-1">
          <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if (App::getLocale() == 'ar')
                  {{ LaravelLocalization::getCurrentLocaleName() }}
                  <img src="{{ URL::asset('backend/assets/images/flags/EG.png') }}" alt="">
              @else
                  {{ LaravelLocalization::getCurrentLocaleName() }}
                  <img src="{{ URL::asset('backend/assets/images/flags/US.png') }}" alt="">
              @endif
          </button>
          <div class="dropdown-menu">
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                      {{ $properties['native'] }}
                  </a>
              @endforeach
          </div>
      </div>

      <li class="nav-item dropdown mr-30">
          <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img src="{{asset('backend/assets/images/avatar5.png')}}" alt="avatar">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-header">
                  <div class="media">
                      <div class="media-body">
                          @php $data = Auth::user(); @endphp
                            <h5 class="mt-0 mb-0">{{$data->name}}</h5>
                            <span>{{$data->email}}</span>
                      </div>
                  </div>
              </div>
               {{-- <div class="dropdown-divider"></div> 
              <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
              <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
              <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
              <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span class="badge badge-info">6</span> </a> --}} 
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>{{__('website/dashboard.setting')}}</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="text-danger ti-unlock"></i>{{__('website/dashboard.logout')}}</a>
              <form id="logout-form" action="{{  \LaravelLocalization::localizeURL('/logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
</nav>

<!--=================================
header End-->