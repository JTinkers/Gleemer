@extends('layouts/default')

@section('title', 'Search')

@section('content')
	<div id="search-content-wrapper">
		<h3>@lang('general.search_results_for') "{{ $phrase }}" </h3>
		<div class="panel margin-bottom(16px)">
			<div class="panel-header">
				<span><i class="fas fa-file-alt margin-right(8px)"></i><b>@lang('general.snippets')</b></span>
			</div>
			@foreach($snippets->sortBy('date_posted') as $snippet)
				<div class="panel-section dim">
					<b><a href="/snippet/show/slug/{{ $snippet->slug }}">{{ $snippet->title }}</a></b>
					<span class="margin-left(auto)">{{ $snippet->language }}</span>
				</div>
			@endforeach
		</div>
		<div class="panel">
			<div class="panel-header">
				<span><i class="fas fa-user margin-right(8px)"></i><b>@lang('general.users')</b></span>
			</div>
			@foreach($users->sortBy('nickname') as $user)
				<div class="panel-section dim">
					<b><a href="/user/show/{{ $user->id }}">{{ $user->nickname }}</a></b>
				</div>
			@endforeach
		</div>
	</div>
@endsection
