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

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Article</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('dashboard::articles.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $article->title}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Body:</strong>
                {{ $article->body}}
            </div>
        </div>
    </div>   
    
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
