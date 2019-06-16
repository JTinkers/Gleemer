@extends('layouts/default')

@section('title', $snippet->title)

@section('content')
	<div id="snippet-show-content-wrapper">
		<div id="snippet-view-panel" class="panel flex-grow(1)">
			<div class="panel-header">
				<span>
					<b>{{ $snippet->title }}</b>
				</span>
				<span class="margin-left(auto)">{{ $snippet->language }}</span>
			</div>
			<div class="panel-content">
				<pre>{{ $snippet->contents }}</pre>
			</div>
			<div class="panel-footer">
				<a class="display(flex) align-items(center)" href="#">
					<i class="far fa-thumbs-up"></i>
					<span class="margin-left(4px)">{{ $snippet->ratings->where('value', 1)->count() }}</span>
				</a>
				<a class="display(flex) align-items(center) margin-left(16px)" href="#">
					<i class="far fa-thumbs-down"></i>
					<span class="margin-left(4px)">{{ $snippet->ratings->where('value', -1)->count() }}</span>
				</a>
				<div class="display(flex) margin-left(auto) margin-right(-4px)">
					<a id="snippet-toolbar-copy-button" class="button-outline margin-right(4px)" href="#">
						<i class="margin-right(4px) far fa-copy"></i>
						<span>copy</span>
					</a>
					<a id="snippet-toolbar-save-button" class="button-outline margin-right(4px)" href="#">
						<i class="margin-right(4px) far fa-star"></i>
						<span>save</span>
					</a>
					<a id="snippet-toolbar-share-button" class="button-outline" href="#">
						<i class="margin-right(4px) fas fa-link"></i>
						<span>share</span>
					</a>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-header">
				<a href="#" class="usertag margin-left(-4px)">
					<img class="usertag-avatar" src="https://secure.gravatar.com/avatar/cc29879d431a1d31aa636bd50ba97614?s=16&d=retro&r=g"/>
					<span class="usertag-nickname">{{ $snippet->user->nickname }}</span>
				</a>
				<div class="margin-left(auto)">
					<span>{{ $snippet->date_posted }}</span>
				</div>
			</div>
			<div class="panel-content flex-direction(column)">
				<div class="display(flex) margin-bottom(16px)">
					<span>Views</span>
					<span class="margin-left(auto)">{{ $snippet->views->count() }}</span>
				</div>
				<div class="display(flex) margin-bottom(16px)">
					<span>Favourites</span>
					<span class="margin-left(auto)">{{ $snippet->views->count() }}</span>
				</div>
				<div class="display(flex) margin-bottom(16px)">
					<span>Comments</span>
					<span class="margin-left(auto)">{{ $snippet->comments->count() }}</span>
				</div>
				<div class="display(flex)">
					<span>Rating</span>
					<span class="margin-left(auto)">{{ $snippet->ratings->sum('value') }}</span>
				</div>
			</div>
		</div>
		<div id="snippet-comment-container">
			@foreach ($snippet->comments as $comment)
				<div class="snippet-comment">
					<span>{{ $comment->content }}</span>
					<div class="display(flex) flex-direction(column) align-items(flex-end) margin-left(auto)">
						<a href="#" class="usertag margin-bottom(8px)">
							<img class="usertag-avatar" src="https://secure.gravatar.com/avatar/cc29879d431a1d31aa636bd50ba97614?s=16&d=retro&r=g"/>
							<span class="usertag-nickname">{{ $comment->user->nickname }}</span>
						</a>
						<span>{{ $comment->date_posted }}</span>
					</div>
				</div>
			@endforeach
			<form class="display(flex)" method="post" action="/comment/store">
				@csrf
				<input type="hidden" name="snippet_id" value="{{ $snippet->id }}"/>
				<input class="flex-grow(1)" name="content" type="text"/>
				<input class="margin-left(4px)" type="submit"/>
			</form>
		</div>
	</div>
@endsection
