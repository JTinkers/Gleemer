@extends('layouts.default')

@section('title', 'Submit')

@section('content')
    <div id="snippet-create">
		<form class="display(flex) flex-grow(1)" action="/snippets/store" method="post">
			{{ csrf_field() }}
	        <div class="panel flex-grow(1)">
	            <div class="panel-header">
	                <input type="text" name="title" class="flex-grow(1)"/>
	                <input type="checkbox" class="margin-left(16px)" id="chk-private"/>
	                <label for="chk-private">Private</label>
	            </div>
	            <div class="panel-content dim">
	                <textarea class="flex-grow(1)" name="content"></textarea>
	            </div>
	            <div class="panel-footer">
	                <select name="language">
	                    @foreach (config('snippets.languages') as $language)
	                        <option value="{{ $language }}">{{ $language }}</option>
	                    @endforeach
	                </select>
	                <input type="submit" class="button-submit margin-left(auto)" value="Create"/>
	            </div>
	        </div>
		</form>
    </div>
@endsection
