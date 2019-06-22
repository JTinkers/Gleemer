@extends('layouts/default')

@section('title', 'Search')

@section('content')
	{{ $snippets->count() }}
	{{ $users->count() }}
@endsection
