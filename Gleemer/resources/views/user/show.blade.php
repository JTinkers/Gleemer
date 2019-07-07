@extends('layouts/default')

@section('title', $user->nickname)

@section('content')
	<div id="user-show-content-wrapper">
		<div class="column-start(0) column-end(1) panel flex-grow(1)">
			<div class="panel-header">
				<img id="user-show-avatar" src="https://secure.gravatar.com/avatar/cc29879d431a1d31aa636bd50ba97614?s=16&d=retro&r=g"/>
				<span class="margin-left(8px)">{{ $user->nickname }}</span>
			</div>
			<div class="panel-section dim flex-direction(column)">
				<div class="display(flex)">
					<span>Registered </span>
					<span class="margin-left(auto)">{{ $user->human_date_registered }}</span>
				</div>
			</div>
			<div class="panel-section dim flex-direction(column)">
				<div class="display(flex) margin-bottom(16px)">
					<span>Snippets</span>
					<span class="margin-left(auto)">{{ $user->snippets()->count() }}</span>
				</div>
				<div class="display(flex) margin-bottom(16px)">
					<span>Views</span>
					<span class="margin-left(auto)">{{ $snippet_views }}</span>
				</div>
				<div class="display(flex)">
					<span>Ratings</span>
					<span class="margin-left(auto)">{{ $snippet_ratings }}</span>
				</div>
			</div>
		</div>
		<div class="column-start(1) column-end(4) panel flex-grow(1) align-self(stretch)">
			<div class="panel-header">
				<span><i class="fas fa-user margin-right(8px)"></i><b>Bio</b></span>
			</div>
			<div class="panel-section dim">
				<p>{{ $user->bio }}</p>
			</div>
		</div>
		<div class="column-start(0) column-end(4) panel flex-grow(1)">
			<div class="panel-header">
				<span><i class="fas fa-file-alt margin-right(8px)"></i><b>Snippets</b></span>
			</div>
			@foreach($snippets->sortBy('date_posted') as $snippet)
				<div class="panel-section dim">
					<b><a href="/snippet/show/slug/{{ $snippet->slug }}">{{ $snippet->title }}</a></b>
					<span class="margin-left(auto)">{{ $snippet->language }}</span>
				</div>
			@endforeach
		</div>
	</div>
@endsection
