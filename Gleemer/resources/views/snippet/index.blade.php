@extends('layouts/default')

@section('title', 'Snippets')

@section('content')
	<div id="snippet-index-content-wrapper">
		@foreach ($models as $snippet)
			<div class="panel">
				<div class="panel-header">
					<a class="margin-right(8px) overflow(hidden) text-overflow(ellipsis) white-space(nowrap)" href="/snippet/show/{{ $snippet->id }}"><b>{{ $snippet->title }}</b></a>
					@usertag(['id' => $snippet->user->id, 'class' => 'margin-left(auto) margin-right(-4px)'])
				</div>
				<div class="snippet-code panel-section dim">
					<pre v-highlightjs><code class="{{ $snippet->language }}">{{ $snippet->contents }}</code></pre>
				</div>
				<div class="panel-footer">
					<i class="far fa-comment"></i>
                    <span class="margin-left(4px)">{{ $snippet->comments->count() }}</span>
					<i class="far fa-star margin-left(16px)"></i>
                    <span class="margin-left(4px)">{{ $snippet->favourites->count() }}</span>
					<span class="margin-left(auto)">{{ $snippet->human_date_posted }}</span>
				</div>
			</div>
		@endforeach
	</div>
@endsection
