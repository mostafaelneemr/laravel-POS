@extends('layouts.backend.master')

@section('title')
    {{__('website/users.users')}}
@endsection

@section('css')

@endsection

@section('content')
    @include('backend.message')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{__('website/users.users')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}" class="default-color">{{__('website/dashboard.Home')}}</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('users')}}">{{__('website/roles.Page Title')}}</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @can('user-create')
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('users.create') }}">{{__('website/users.add user')}}</a>
                        </div>
                    @endcan
                    <div class="table-responsive mt-15">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <tr>
                                <th>#</th>
                                <th>{{__('website/users.username')}}</th>
                                <th>{{__('website/users.Email')}}</th>
                                <th>{{__('website/users.user type')}}</th>
                                <th width="280px">{{__('website/users.operation')}}</th>
                            </tr>
                            @foreach ($data as $key => $user)
                                <tr style=" text-align: center;">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('user-edit')
                                            <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">{{__('website/users.edit')}}</a>
                                        @endcan

                                        @can('user-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit(__('website/users.delete'), ['class' => 'btn btn-danger']) !!}
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
