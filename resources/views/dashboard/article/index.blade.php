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
                <h2>Articles</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('dashboard::articles.create') }}" class="btn btn-success">Create New Article</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Body</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->body }}</td>
                <td>
                    <a href="{{ route('dashboard::articles.show', $article->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('dashboard::articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ action('Dashboard\ArticleController@destroy', $article->id) }}" method="post" style="display:inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>   
    {{ $articles->links() }}
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
