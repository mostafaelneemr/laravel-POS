@extends('errors::illustrated-layout')

@section('code', '405')
@section('title')
@lang('common.Sorry, Method Not Allowed.')

@endsection

@section('image')
    <div style="background-image: url({{ asset('backend/assets/media/error/bg6.jpg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message')
    @lang('common.Sorry, Method Not Allowed.')
@endsection
