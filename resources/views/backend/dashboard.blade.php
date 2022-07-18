@extends('layouts.backend.master')

@section('title')
    {{__('website/dashboard.title dashboard')}}
@endsection

@section('css')

@endsection

@section('content')
<div class="page-title">
    <div class="row">
      <div class="col-sm-6">
          <h4 class="mb-0">{{ __('website/dashboard.dashboard') }}</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
          <li class="breadcrumb-item"><a href="index.html" class="default-color">{{ __('website/dashboard.Home') }}</a></li>
          <li class="breadcrumb-item active">{{ trans('website/dashboard.dashboard') }}</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- widgets -->
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-danger">
                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <a class="float-right text-right" href="{{route('invoice.index')}}" >
              <p class="card-text text-dark">Invoices</p>
              <h4>{{\App\Models\invoice::count()}}</h4>
            </a>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top"><i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 81% lower growth</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-warning">
                <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <a class="float-right text-right" href="{{route('categories.index')}}">
              <p class="card-text text-dark">Category</p>
              <h4>{{\App\Models\category::count()}}</h4>
            </a>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top"><i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Total sales</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-success">
                <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <a class="float-right text-right" href="{{route('products.index')}}">
              <p class="card-text text-dark">Product</p>
              <h4>{{\App\Models\product::count()}}</h4>
            </a>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-primary">
                <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <a class="float-right text-right" href="{{route('users.index')}}">
              <p class="card-text text-dark">Users</p>
              <h4>{{\App\Models\User::count()}}</h4>
            </a>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top"><i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated</p>
        </div>
      </div>
    </div>
  </div>

<div class="row">  
<div class="calendar-main mb-30">
<div class="row">
  <div class="col-lg-3">
        <div class="row">
            <div class="col-12 sm-mb-30">
                <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-primary btn-block m-t-20">
                        <i class="fa fa-plus pr-2"></i> Create New
                    </a>
                <div id="external-events" class="m-t-20">
                    <br>
                    <p class="text-muted">Drag and drop your event or click in the calendar</p>
                    <div class="external-event bg-success fc-event">
                        <i class="fa fa-circle mr-2 vertical-middle"></i>New Theme Release
                    </div>
                    <div class="external-event bg-info fc-event">
                        <i class="fa fa-circle mr-2 vertical-middle"></i>My Event
                    </div>
                    <div class="external-event bg-warning fc-event">
                        <i class="fa fa-circle mr-2 vertical-middle"></i>Meet manager
                    </div>
                    <div class="external-event bg-danger fc-event">
                        <i class="fa fa-circle mr-2 vertical-middle"></i>Create New theme
                    </div>
                </div>
            </div>
        </div>
  </div>
      <div class="col-lg-9">
          <div id="calendar"></div>
          <div class="modal" tabindex="-1" role="dialog" id="event-modal">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Add New Event</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body p-20"></div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-success save-event">Create event</button>
                          <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Delete</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Modal Add Category -->
          <div class="modal" tabindex="-1" role="dialog" id="add-category">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Add a category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body p-20">
                          <form>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label class="control-label">Category Name</label>
                                      <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                  </div>
                                  <div class="col-md-6">
                                      <label class="control-label">Choose Category Color</label>
                                      <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                          <option value="success">Success</option>
                                          <option value="danger">Danger</option>
                                          <option value="info">Info</option>
                                          <option value="primary">Primary</option>
                                          <option value="warning">Warning</option>
                                      </select>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-success save-category" data-dismiss="modal">Save</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>
</div>
</div>
@endsection

@section('js')
@endsection