@extends('layouts/default')

@section('title', 'Snippets')

@section('content')
	<div id="snippet-index-content-wrapper">
		@foreach ($models as $snippet)
			<div class="panel">
				<div class="panel-header">
					<a href="/snippet/show/{{ $snippet->id }}"><i class="fas fa-code margin-right(8px)"></i><b>{{ $snippet->title }}</b></a>
					@usertag(['id' => $snippet->user->id, 'class' => 'margin-left(auto) margin-right(-4px)'])
				</div>
				<div class="panel-section dim">
					<pre>{{ $snippet->contents }}</pre>
				</div>
				<div class="panel-footer">
					<span>{{ $snippet->language }}</span>
					<span class="margin-left(auto)">{{ $snippet->date_posted }}</span>
				</div>
			</div>
		@endforeach
	</div>
@endsection
