@extends('layouts.backend.master')

@section('title')
    {{__('backend/main-sidebar.User Permissions')}}
@stop

@section('Page Title')
 {{__('website/roles.edit permission')}} : {{ $role->name }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
        <a class="btn btn-success" href="{{ route('roles.index') }}">{{__('website/roles.back')}}</a>
        </div>
    </div>
</div><br>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('website/roles.permissions')}}:</strong>
            <br/><br/>
            @foreach($permission as $value)
                <label style="font-size: 20px">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
        <button type="submit" class="btn btn-success">{{__('website/roles.update')}}</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
