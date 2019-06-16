@extends('layouts/default')

@section('title', 'Snippets')

@section('content')
	<div id="snippet-index-content-wrapper">
		@foreach ($models as $snippet)
			<div class="panel">
				<div class="panel-header">
					<a href="/snippet/show/{{ $snippet->id }}">
						<b>{{ $snippet->title }}</b>
					</a>
					<a href="#" class="usertag margin-left(auto) margin-right(-4px)">
						<img class="usertag-avatar" src="https://secure.gravatar.com/avatar/cc29879d431a1d31aa636bd50ba97614?s=16&d=retro&r=g"/>
						<span class="usertag-nickname">{{ $snippet->user->nickname }}</span>
					</a>
				</div>
				<div class="panel-content">
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
