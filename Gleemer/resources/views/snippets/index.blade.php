@extends('layouts.default')

@section('content')
    <div id="snippet-index">
        @foreach($snippets as $snippet)
            @panel
                @slot('header')
                    <span>{{ $snippet->title }}</span>
                    <span>copy</span>
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
