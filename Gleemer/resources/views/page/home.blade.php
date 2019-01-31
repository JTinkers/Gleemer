@extends('layout.default')

@section('title', 'Home')

@section('content')
    <div id="submit">
        <div class="panel">
            <div class="panel-division flex">
                <input class="fg-1" type="text" name="title" placeholder="Snippet Title"/>
                <input id="private" type="checkbox"/><label for="private" class="ml-16">Private</label>
            </div>
            <div class="panel-division dim flex fg-1">
                <textarea class="fg-1"></textarea>
            </div>
            <div class="panel-division flex ai-c">
                <input type="submit" value="Submit"/>
                <select class="ml-16">
                    <option>Auto</option>
                    @for ($i=0; $i < 10; $i++)
                        <option>Language {{ $i }}</option>
                    @endfor
                </select>
                <div class="ml-a">tags</div>
            </div>
        </div>
    </div>
@endsection
