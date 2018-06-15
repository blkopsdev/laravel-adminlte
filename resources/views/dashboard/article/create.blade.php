{{-- Extends Layout --}}
@extends('layouts.backend')

<?php
$_pageTitle = 'Article';
$_pageSubtitle = '';
?>

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {!! Breadcrumbs::render('dashboard') !!}
@endsection

{{-- Page Title --}}
@section('page-title', $_pageTitle)

{{-- Page Subtitle --}}
@section('page-subtitle', $_pageSubtitle)

{{-- Header Extras to be Included --}}
@section('head-extras')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Article</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('dashboard::articles.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard::articles.store') }}" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <strong>Titlt:</strong>
                    <input type="text" name="title" placeholder="Title" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea name="body" id="" placeholder="Body" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            
        </div>
    </form>
</div>    
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
