@extends('layouts/default')

@section('title', $snippet->title)

@section('content')
	<div id="snippet-show-content-wrapper">
		<div id="snippet-view-panel" class="panel flex-grow(1)">
			<div class="panel-header">
				<span>{{ $snippet->title }}</span>
			</div>
			<div class="panel-content">
				<pre>{{ $snippet->contents }}</pre>
			</div>
			<div class="panel-footer">
				<span>{{ $snippet->language }}</span>
				<div class="display(flex) margin-left(auto)">
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
		<div id="snippet-view-side-panel" class="panel flex-grow(1)">
			<div class="panel-header">
				<div>
					<img src="https://secure.gravatar.com/avatar/cc29879d431a1d31aa636bd50ba97614?s=16&d=retro&r=g"/>
					<span>{{ $snippet->user->nickname }}</span>
				</div>
				<div>
					<span>{{ $snippet->date_posted }}</span>
				</div>
			</div>
			<div class="panel-content">

			</div>
			<div class="panel-footer">

			</div>
		</div>
	</div>
@endsection
