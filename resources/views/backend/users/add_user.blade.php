@extends('layouts.backend.master')

@section('title')
    {{__('website/users.add user')}}
@stop

@section('Page Title')
    {{__('website/users.add user')}}
@stop



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{__('website/users.add user')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{__('website/dashboard.dashboard')}}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">{{__('website/users.users')}}</a></li>
                </ol>
            </div>
        </div>
    </div>

@include('backend.message')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="form-row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>{{__('website/users.username')}}</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>{{__('website/users.Email')}}</strong>
            {!! Form::text('email', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>{{__('website/users.password')}}</strong>
            {!! Form::password('password', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>{{__('website/users.confirm password')}}</strong>
            {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('website/users.user type')}}</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">{{__('website/users.add')}}</button>
    </div>
</div>

{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
