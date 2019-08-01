@extends('layouts/default')

@section('title', $snippet->title)

@section('content')
	<div id="snippet-show-content-wrapper">
		<div class="panel flex-grow(1) align-self(stretch) column-start(0) column-end(3)">
			<span id="copy-slug-source" hidden>
				{{ url('/') . '/snippet/show/slug/' . $snippet->slug }}
			</span>
			<div class="panel-header">
				<span class="margin-right(8px) overflow(hidden) text-overflow(ellipsis) white-space(nowrap)">
					<b>{{ $snippet->title }}</b>
				</span>
				<span class="margin-left(auto)">{{ $snippet->language }}</span>
			</div>
			<div class="snippet-code panel-section dim">
				<pre v-highlightjs><code class="{{ $snippet->language }}" id="code-copy-source">{{ $snippet->contents }}</code></pre>
				@if(UserManager::get() && boolval(UserManager::get()->flags & config('gleemer.power_flags')::Panel))
					@admintoolbar
						@slot('buttons')
							@if(UserManager::get()->flags & config('gleemer.power_flags')::DeleteSnippet)
								<a href="/snippet/destroy/{{ $snippet->id }}">
									<i class="margin-left(8px) far fa-trash-alt"></i>
								</a>
							@endif
						@endslot
					@endadmintoolbar
				@endif
			</div>
			<div class="panel-footer">
				<form class="display(flex)" method="post" action="/rating/store">
					@csrf
					<input type="hidden" name="value" value="1"/>
					<input type="hidden" name="snippet_id" value="{{ $snippet->id }}"/>
					<a class="rating-thumbs display(flex) align-items(center)" href="#" onclick="this.parentNode.submit()"  @if($rating_value == 1) checked @endif>
						<i class="far fa-thumbs-up"></i>
						<span class="margin-left(4px)">{{ $snippet->ratings->where('value', 1)->count() }}</span>
					</a>
				</form>
				<form class="display(flex) margin-left(16px)" method="post" action="/rating/store">
					@csrf
					<input type="hidden" name="value" value="-1"/>
					<input type="hidden" name="snippet_id" value="{{ $snippet->id }}"/>
					<a class="rating-thumbs display(flex) align-items(center)" href="#" onclick="this.parentNode.submit()"  @if($rating_value == -1) checked @endif>
						<i class="far fa-thumbs-down"></i>
						<span class="margin-left(4px)">{{ $snippet->ratings->where('value', -1)->count() }}</span>
					</a>
				</form>
				<div class="display(flex) margin-left(auto) margin-right(-4px)">
					<clipboarder source="#code-copy-source" id="snippet-toolbar-copy-button" class="button-outline margin-right(4px)">
						<i class="margin-right(4px) far fa-copy"></i>
						<span>@lang('snippets.toolbar_copy')</span>
					</clipboarder>
					<form class="display(flex) margin-right(4px)" method="post" action="/favourite/store">
						@csrf
						<input type="hidden" name="snippet_id" value="{{ $snippet->id }}"/>
						<a id="snippet-toolbar-save-button" class="button-outline" href="#" onclick="this.parentNode.submit()">
							<i class="margin-right(4px) far fa-star"></i>
							@if($snippet->isFavourited)
								<span>@lang('snippets.toolbar_unsave')</span>
							@else
								<span>@lang('snippets.toolbar_save')</span>
							@endif
						</a>
					</form>
					<clipboarder source="#copy-slug-source" id="snippet-toolbar-share-button" class="button-outline" href="#">
						<i class="margin-right(4px) fas fa-link"></i>
						<span>@lang('snippets.toolbar_share')</span>
					</clipboarder>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-header">
				@usertag(['id' => $snippet->user->id, 'class' => 'margin-left(-4px)'])
				<div class="margin-left(auto)">
					<span>{{ $snippet->human_date_posted }}</span>
				</div>
			</div>
			<div class="panel-section dim flex-direction(column)">
				<div class="display(flex) margin-bottom(16px)">
					<span>@lang('snippets.views')</span>
					<span class="margin-left(auto)">{{ $snippet->views->count() }}</span>
				</div>
				<div class="display(flex) margin-bottom(16px)">
					<span>@lang('snippets.favourites')</span>
					<span class="margin-left(auto)">{{ $snippet->favourites->count() }}</span>
				</div>
				<div class="display(flex) margin-bottom(16px)">
					<span>@lang('snippets.comments')</span>
					<span class="margin-left(auto)">{{ $snippet->comments->count() }}</span>
				</div>
				<div class="display(flex)">
					<span>@lang('snippets.rating')</span>
					<span class="margin-left(auto)">{{ $snippet->ratings->sum('value') }}</span>
				</div>
			</div>
			<div class="panel-section dim flex-direction(column)">
				<div class="display(flex)">
					<span>@lang('snippets.visibility')</span>
					<span class="margin-left(auto)">@lang('snippets.visibility_' . $snippet->visibility_mode)</span>
				</div>
			</div>
		</div>
		<div id="snippet-comment-container" class="panel">
			<div class="panel-header">
				<span><i class="far fa-comments margin-right(8px)"></i><b>@lang('snippets.comments')</b></span>
			</div>
			<div class="panel-section dim display(flex) flex-direction(column)">
				@foreach ($snippet->comments as $comment)
					<div class="snippet-comment">
						<div class="display(flex) overflow(hidden)">
							<p class="word-break(break-all) margin-right(4px)">{{ $comment->content }}</p>
						</div>
						<div class="display(flex) flex-direction(column) align-items(flex-end) margin-left(auto)">
							@usertag(['id' => $snippet->user->id, 'class' => 'margin-bottom(8px)'])
							<span>{{ $comment->date_posted }}</span>
						</div>
						@if(UserManager::get() && boolval(UserManager::get()->flags & config('gleemer.power_flags')::Panel))
							@admintoolbar
								@slot('buttons')
									@if(UserManager::get()->flags & config('gleemer.power_flags')::DeleteComment)
										<a href="/comment/destroy/{{ $comment->id }}">
											<i class="margin-left(8px) far fa-trash-alt"></i>
										</a>
									@endif
								@endslot
							@endadmintoolbar
						@endif
					</div>
				@endforeach
			</div>
			<div class="panel-footer">
				<form class="display(flex) flex-grow(1)" method="post" action="/comment/store">
					@csrf
					<input type="hidden" name="snippet_id" value="{{ $snippet->id }}"/>
					<input class="flex-grow(1)" name="content" type="text"/>
					<input class="margin-left(8px)" type="submit" value="@lang('inputs.submit')">
				</form>
			</div>
		</div>
	</div>
@endsection
