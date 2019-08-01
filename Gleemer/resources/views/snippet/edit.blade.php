@extends('layouts/default')

@section('title', 'Submit')

@section('content')
	<div id="snippet-edit-content-wrapper">
		<form class="display(flex) flex-direction(column) flex-grow(1)" method="post" action="/snippet/update/{{ $snippet->id }}">
			<div class="panel flex-grow(1)">
				@csrf
				<div class="panel-header">
					<input class="flex-grow(1) margin-left(-8px) margin-right(8px)" type="text" name="title" value="{{ $snippet->title }}"/>
					<select class="margin-right(-8px)" name="visibility_mode">
						@foreach(config('gleemer.visibility_modes') as $mode)
							<option value="{{ $mode }}" {{ $snippet->visibility_mode == $mode ? 'selected' : '' }}>@lang('snippets.visibility_' . $mode)</option>
						@endforeach
					</select>
				</div>
				<div class="panel-section">
					<textarea class="align-self(stretch) flex-grow(1)" name="contents">{{ $snippet->contents }}</textarea>
				</div>
				<div class="panel-footer">
					<select class="margin-left(-8px)" name="language">
						@foreach(config('gleemer.languages') as $i => $language)
							<option {{ $snippet->language == ucfirst($language) ? 'selected' : '' }}>{{ $language }}</option>
						@endforeach
					</select>
					<input class="margin-left(auto) margin-right(-8px)" type="submit" value="@lang('inputs.submit')"/>
				</div>
			</div>
		</form>
	</div>
@endsection
