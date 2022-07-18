@extends('layouts.backend.master')

@section('title')
    {{__('website/users.add user')}}
@stop

@section('Page Title')
    {{__('website/users.add user')}}
@stop



@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        <a class="btn btn-success" href="{{ URL('users.show') }}">{{__('website/users.back')}}</a>
        </div>
    </div>
</div><br>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br /><br />
        <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('website/users.username')}}</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('website/users.Email')}}</strong>
            {!! Form::text('email', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('website/users.password')}}</strong>
            {!! Form::password('password', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
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

@endsection
