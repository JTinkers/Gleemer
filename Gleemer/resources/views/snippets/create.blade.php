@extends('layouts.default')

@section('content')
    <div id="snippet-create">
        @panel
            @slot('header')
                <input type="text" class="flex-grow(1)"/>
                <input type="checkbox" class="margin-left(16px)" id="chk-private"/>
                <label for="chk-private">Private</label>
            @endslot
            @slot('content')
                <textarea class="flex-grow(1)"></textarea>
            @endslot
            @slot('footer')
                <select>
                    <option selected>auto</option>
                    @foreach ($languages as $language)
                        <option value="{{ $language }}">{{ $language }}</option>
                    @endforeach
                </select>
                <input type="submit" class="margin-left(auto)" value="Create"/>
            @endslot
        @endpanel
    </div>
@endsection
