@extends('layouts.backend.master')
@section('css')

@section('title')
    {{__('website/category.category title')}}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{__('website/category.categories')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{__('website/product.setting')}}</a></li>
                    <li class="breadcrumb-item active">{{__('website/category.categories')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @include('backend.message')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @can('create category')  
                    <div class="row">
                        <div class="col mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#AddCategories">{{__('website/category.new category')}}</button>
                        </div>
                        
                        @include('backend.categories.create')
                    </div>
                    @endcan

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('website/category.category name')}}</th>
                                <th>{{__('website/category.notes')}}</th>
                                <th>{{__('website/category.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$categorie->name}}</td>
                                    <td>{{$categorie->notes == true ? $categorie->notes : __('website/category.note message')}}</td>
                                    <td>

                                        @can('edit category')
                                        <button class="btn btn-success btn-sm" title="{{__('website/invoice.edit')}}" data-toggle="modal"
                                                data-target="#Editcategorie{{$categorie->id}}"><i
                                                class="fa fa-edit"></i></button>
                                        @endcan

                                        @can('delete category')
                                        <button class="btn btn-danger btn-sm" title="{{__('website/invoice.delete')}}" data-toggle="modal"
                                                data-target="#Deleted{{$categorie->id}}"><i class="fa fa-trash"></i>
                                        </button>
                                        @endcan
                                    </td>

                                    @can('edit category')
                                    @include('backend.categories.edit')
                                    @endcan
                                    
                                    @can('delete category')
                                    @include('backend.categories.deleted')
                                    @endcan

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
@endsection
