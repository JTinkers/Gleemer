@extends('layouts.default')

@section('title', 'Snippet title here')

@section('content')
	<span>{{ $snippet->language }}</span>
	<button class="button-outlined flex-shrink(0) margin-left(auto)">
		<i class="far fa-copy margin-right(4px)"></i>
		<span>copy</span>
	</button>
	<button class="button-outlined flex-shrink(0) margin-left(8px)">
		<i class="far fa-star margin-right(4px)"></i>
		<span>save</span>
	</button>
	<button class="button-outlined flex-shrink(0) margin-left(8px)">
		<i class="fas fa-link margin-right(4px)"></i>
		<span>share</span>
	</button>
@endsection
