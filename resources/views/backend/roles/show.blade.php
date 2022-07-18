@extends('layouts.backend.master')

@section('title')
    {{__('backend/main-sidebar.User Permissions')}}
@stop

@section('Page Title')
    {{__('website/roles.permissions')}} : {{ $role->name }}
@stop


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('roles.index') }}">{{__('website/roles.back')}}</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 24px">
        <div class="form-group">
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                <span class="badge badge-info">{{ $v->name }}</span>

                @endforeach
            @endif
        </div>
    </div>
</div>
@stop
