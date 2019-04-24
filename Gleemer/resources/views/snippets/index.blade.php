@extends('layouts.default')

@section('title', 'Browse')

@section('content')
    <div id="snippet-index">
        @foreach($snippets as $snippet)
            <div class="panel snippet">
                <div class="panel-header">
                    <span class="margin-right(16px) line-height(normal) text-overflow(ellipsis) overflow(hidden) white-space(nowrap)">{{ $snippet->title }}</span>
					<div class="snippet-user">
						<span>{{ $snippet->user->name }}</span>
						<img src="http://www.iconhot.com/icon/png/star-trek-tos-crew/16/spock-earth-2.png"/>
					</div>
                </div>
                <div class="panel-content dim snippet-content">
                    <highlight-code lang="{{ $snippet->language }}">
						{{ $snippet->content }}
                    </highlight-code>
                </div>
                <div class="panel-footer">
                    <span>{{ $snippet->language }}</span>
                    <span class="margin-left(auto)">{{ $snippet->getDatePosted() }}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
