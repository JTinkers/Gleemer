@extends('layouts/default')

@section('title', 'Snippets')

@section('content')
	<div id="snippet-index-content-wrapper">
		@foreach ($models as $model)
			@snippet(['snippet' => $model])
		@endforeach
	</div>
@endsection
