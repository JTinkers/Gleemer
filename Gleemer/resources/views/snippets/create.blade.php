@extends('layouts.default')

@section('content')
    <div id="snippet-create">
        <div class="panel">
            <div class="panel-header">
                <input type="text" class="flex-grow(1)"/>
                <input type="checkbox" class="margin-left(16px)" id="chk-private"/>
                <label for="chk-private">Private</label>
            </div>
            <div class="panel-content dim">
                <textarea class="flex-grow(1)"></textarea>
            </div>
            <div class="panel-footer">
                <select>
                    <option selected>auto</option>
                    @foreach ($languages as $language)
                        <option value="{{ $language }}">{{ $language }}</option>
                    @endforeach
                </select>
                <input type="submit" class="margin-left(auto)" value="Create"/>
            </div>
        </div>
    </div>
@endsection
