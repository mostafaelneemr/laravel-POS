@extends('layouts.backend.master')

@section('title')
    {{__('add new permossion')}}
@endsection

@section('css')
@endsection


@section('content')

    <div class="page-title">
        <div class="row">
            
            @can('add permission')
            <div class="col-sm-6">
                <a class="btn btn-success" href="{{ route('roles.create') }}">{{__('website/roles.add')}}</a>
            </div>
            @endcan
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}" class="default-color">{{__('website/roles.Home')}}</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('roles')}}">{{__('website/roles.Page Title')}}</a></li>
                </ol>
            </div>

        </div>
    </div>

    @include('backend.message')

    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-7 col-sm-7 col-md-12">
                            <div class="form-group">
                                <strong>{{__('website/roles.name')}} :</strong><br>
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div><br>

                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body ">
                                    <h5 class="card-title">{{__('website/roles.Page Title')}}</h5>
                                    <div class="accordion gray plus-icon round">
                                        <div class="acd-group">
                                            <a href="#" class="acd-heading">{{__('backend/main-sidebar.User Permissions')}}</a>
                                            <div class="acd-des">
                                                @foreach($permission as $value)
                                                    <label style="font-size: 20px;"> - 
                                                        {{ $value->name }}</label>  
                                                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} 
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">{{__('website/roles.add')}}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
@endsection

@section('js')
@endsection
