@extends('layouts/default')

@section('title', 'API')

@section('content')
	<div id="api-index-content-wrapper">
		<div class="panel margin-bottom(16px)">
			<div class="panel-header">
				<span><i class="fas fa-question-circle margin-right(8px)"></i><b>@lang('general.about_api')</b></span>
			</div>
			<div class="panel-section dim flex-direction(column)">
				@lang('general.api_description')
			</div>
		</div>
		<div class="panel margin-bottom(16px)">
			<div class="panel-header">
				<span><i class="fas fa-question-circle margin-right(8px)"></i><b>@lang('general.public_api')</b></span>
			</div>
			<div class="panel-section flex-direction(column)">
				<input type="text" class="margin-bottom(8px)" readonly value="/api/snippets">
				@lang('general.public_api.snippets')
			</div>
		</div>
		<div class="panel">
			<div class="panel-header">
				<span><i class="fas fa-question-circle margin-right(8px)"></i><b>@lang('general.private_api')</b></span>
			</div>
			<div class="panel-section flex-direction(column)">
				<input type="text" class="margin-bottom(8px)" readonly value="/api/snippets/store">
				@lang('general.private_api_snippet_store')
			</div>
		</div>
	</div>
@endsection
