@extends('layouts/default')

@section('title', $user->nickname)

@section('content')
	<div id="user-show-content-wrapper">
		<div class="column-start(0) column-end(1) panel flex-grow(1)">
			<div class="panel-header">
				<img id="user-show-avatar" src="/storage/users/avatars/{{ $user->default_avatar ? 'default' : $user->id }}.png"/>
				<span class="margin-left(8px)">{{ $user->nickname }}</span>
				@if(UserManager::get() && UserManager::get()->id == $user->id)
					<a href="/user/edit/{{ $user->id }}" class="margin-left(auto)"><i class="fas fa-pencil-alt margin-right(4px)"></i>@lang('user.edit')</a>
				@endif
			</div>
			<div class="panel-section dim flex-direction(column)">
				<div class="display(flex)">
					<span>@lang('user.registered')</span>
					<span class="margin-left(auto)">{{ $user->human_date_registered }}</span>
				</div>
			</div>
			<div class="panel-section dim flex-direction(column)">
				<div class="display(flex) margin-bottom(16px)">
					<span>@lang('general.snippets')</span>
					<span class="margin-left(auto)">{{ $user->snippets()->count() }}</span>
				</div>
				<div class="display(flex) margin-bottom(16px)">
					<span>@lang('snippets.views')</span>
					<span class="margin-left(auto)">{{ $snippet_views }}</span>
				</div>
				<div class="display(flex)">
					<span>@lang('snippets.ratings')</span>
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
		@if(UserManager::get() && (UserManager::get()->id == $user->id || boolval(UserManager::get()->flags & PowerFlag::ViewSnippets)))
			<div class="column-start(0) column-end(2) panel flex-grow(1)">
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
		@endif
		@if(UserManager::get() && (UserManager::get()->id == $user->id || boolval(UserManager::get()->flags & PowerFlag::ViewFavourites)))
			<div class="column-start(2) column-end(4) panel flex-grow(1)">
				<div class="panel-header">
					<span><i class="fas fa-star margin-right(8px)"></i><b>@lang('general.favourites')</b></span>
				</div>
				@foreach($favourites->sortBy('date_posted') as $favourite)
					<div class="panel-section dim">
						<b><a href="/snippet/show/slug/{{ $favourite->slug }}">{{ $favourite->title }}</a></b>
						<span class="margin-left(auto)">{{ $favourite->language }}</span>
					</div>
				@endforeach
			</div>
		@endif
	</div>
@endsection
