@extends('layouts.backend.master')

@section('title')
    {{__('backend/main-sidebar.User Permissions')}}
@endsection

@section('css')

@endsection

@section('content')

    @include('backend.message')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{__('backend/main-sidebar.User Permissions')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{URL('dashboard')}}" class="default-color">{{__('website/roles.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('website/roles.Page Title')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @can('create permission')
                        <a class="btn btn-success" href="{{ route('roles.create') }}">{{__('website/roles.add')}}</a>
                    @endcan

                    <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                        <tr>
                            <th>#</th>
                            <th>{{__('website/roles.name')}}</th> 
                            <th width="280px">{{__('website/roles.operation')}}</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr style=" text-align: center;">
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('show permission')
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">{{__('website/roles.show')}}</a>
                                    @endcan

                                    @can('edit permission')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">{{__('website/roles.edit')}}</a>
                                    @endcan

                                    @can('delete permission')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit(__('website/roles.delete'), ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>


@endsection

@section('js')

@endsection
