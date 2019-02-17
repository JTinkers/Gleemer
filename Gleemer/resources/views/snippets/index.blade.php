@extends('layouts.default')

@section('content')
    <div id="snippet-index">
        @foreach($snippets as $snippet)
            @panel
                @slot('header')
                    <span class="margin-right(16px) text-overflow(ellipsis) overflow(hidden) white-space(nowrap)">{{ $snippet->title }}</span>
                    <button class="button flex-shrink(0) margin-left(auto)">
                        <i class="far fa-copy margin-right(4px)"></i>
                        <span>copy</span>
                    </button>
                @endslot
                @slot('content')
                    <highlight-code lang="{{ $snippet->language }}">
                        {{ $snippet->content }}
                    </highlight-code>
                @endslot
                @slot('footer')
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
                    <span class="margin-left(auto)">{{ $snippet->user->name }}</span>
                @endslot
            @endpanel
        @endforeach
    </div>
@endsection
