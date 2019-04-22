@extends('layouts.default')

@section('content')
    <div id="snippet-index">
        @foreach($snippets as $snippet)
            <div class="panel">
                <div class="panel-header">
                    <span class="margin-right(16px) line-height(normal) text-overflow(ellipsis) overflow(hidden) white-space(nowrap)">{{ $snippet->title }}</span>
                    <span class="margin-left(auto) flex-shrink(0)">{{ $snippet->user->name }}</span>
                </div>
                <div class="panel-content dim">
                    <highlight-code lang="{{ $snippet->language }}">
                        {{ $snippet->content }}
                    </highlight-code>
                </div>
                <div class="panel-footer">
                    <div>
                        <i class="far fa-fw fa-eye"></i>
                        <span class="margin-right(16px)">{{ $snippet->views->count() }}</span>
                        @if($snippet->ratings->sum('value') >= 0)
                            <i class="far fa-thumbs-up"></i>
                        @else
                            <i class="far fa-thumbs-down"></i>
                        @endif
                        <span>{{ $snippet->ratings->sum('value') }}</span>
                    </div>
                    <button class="button flex-shrink(0) margin-left(auto)">
                        <i class="far fa-copy margin-right(4px)"></i>
                        <span>copy</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
