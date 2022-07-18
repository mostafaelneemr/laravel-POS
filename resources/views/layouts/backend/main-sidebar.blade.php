    <!-- Left Sidebar start-->
    <div class="side-menu-fixed">
        <div class="scrollbar side-menu-bg">
         <ul class="nav navbar-nav side-menu" id="sidebarnav">
           <!-- menu item Dashboard-->
           <li>
             <a href="{{route('dashboard')}}">
               <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('backend/main-sidebar.dashboard') }}</span></div>
               <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
             </a>
           </li>

           <!-- component -->
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('backend/main-sidebar.Components') }}</li>
           
            <!-- menu item Elements-->
            @can('invoices')
            <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{__('backend/main-sidebar.invoice')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
              </a>
              <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">    
              @can('view invoice')
                <li> <a href="{{route('invoice.index')}}">{{__('backend/main-sidebar.view invoice')}}</a> </li>
              @endcan
              @can('create invoice')
                <li> <a href="{{route('invoice.create')}}">{{__('backend/main-sidebar.create invoice')}}</a> </li>
              @endcan
              @can('archive invoice')
                <li> <a href="{{route('archive.index')}}">{{__('backend/main-sidebar.archive invoice')}}</a> </li>
              @endcan
              </ul>
            </li>
            @endcan
            
            @can('Elements')
           <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
               <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{ __('backend/main-sidebar.Elements') }}</span></div>
               <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
             </a>
             <ul id="elements" class="collapse" data-parent="#sidebarnav">
            @can('categories')
              <li> <a href="{{route('categories.index')}}"> {{ trans('backend/main-sidebar.categories') }} </a> </li>
            @endcan
            @can('Products')
               <li><a href="{{route('products.index')}}">{{ trans('backend/main-sidebar.Products') }}</a></li>
            @endcan
              </ul>
           </li>
           @endcan

           <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('backend/main-sidebar.Permissions') }}</li>
            <!-- permissions-->
            @can('permissions')
            <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                <div class="pull-left"><i class="ti-pie-chart"></i><span class="right-nav-text">{{__('backend/main-sidebar.users')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
              </a>
              <ul id="chart" class="collapse" data-parent="#sidebarnav">
            @can('user permission')                
                <li> <a href="{{route('roles.index')}}">{{__('backend/main-sidebar.User Permissions')}}</a> </li>
            @endcan
            @can('user list')
                <li> <a href="{{route('users.index')}}">{{__('backend/main-sidebar.users list')}}</a> </li>
            @endcan
              </ul>
            </li>            
            @endcan
           <!-- menu item todo-->
           {{-- <li>
             <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">Todo list</span> </a>
           </li> --}}
            <!-- menu item chat-->
            {{-- <li> 
              <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">Chat </span></a>  
            </li> --}}
            <!-- menu item mailbox-->
           {{-- <li>
             <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">Mail box</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
           </li> --}}
           <!-- menu title -->
           {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li> --}}
           <!-- menu item Widgets-->
           {{-- <li>
             <a href="widgets.html"><i class="ti-blackboard"></i><span class="right-nav-text">Widgets</span> <span class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
           </li> --}}
           <!-- menu item Form-->
           {{-- <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
               <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Form & Editor</span></div>
               <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
             </a>
             <ul id="Form" class="collapse" data-parent="#sidebarnav">
               <li> <a href="editor.html">Editor</a> </li>
               <li> <a href="editor-markdown.html">Editor Markdown</a> </li>
               <li> <a href="form-input.html">Form input</a> </li>
               <li> <a href="form-validation-jquery.html">form validation jquery</a> </li>
               <li> <a href="form-wizard.html">form wizard</a> </li>
               <li> <a href="form-repeater.html">form repeater</a> </li>
               <li> <a href="input-group.html">input group</a> </li>
               <li> <a href="toastr.html">toastr</a> </li>
             </ul>
           </li> --}}
           <!-- menu item table -->
           {{-- <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
               <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">data table</span></div>
               <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
             </a>
             <ul id="table" class="collapse" data-parent="#sidebarnav">
               <li> <a href="data-html-table.html">Data html table</a> </li>
               <li> <a href="data-local.html">Data local</a> </li>
               <li> <a href="data-table.html">Data table</a> </li>
             </ul>
           </li>
           <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li> --}}
           </ul>
         </li>
       </ul>
     </div> 
   </div> 
   
   <!-- Left Sidebar End-->