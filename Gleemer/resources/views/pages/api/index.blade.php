@extends('layouts/default')

@section('title', 'API')

@section('content')
	<div id="api-index-content-wrapper">
		<div class="panel margin-bottom(16px)">
			<div class="panel-header">
				<span><i class="fas fa-question-circle margin-right(8px)"></i><b>About</b></span>
			</div>
			<div class="panel-section dim flex-direction(column)">
				<p>Gleemer hosts a variety of public and private APIs.</p>
				<br>
				<p>Public APIs require no API Key, but have limited amount of requests and data it can fetch.</p>
				<br>
				<p>Private APIs have no limits, but require a unique API Key that can be found in user panel.</p>
			</div>
		</div>
		<div class="panel margin-bottom(16px)">
			<div class="panel-header">
				<span><i class="fas fa-question-circle margin-right(8px)"></i><b>Public API</b></span>
			</div>
			<div class="panel-section flex-direction(column)">
				<input type="text" class="margin-bottom(8px)" readonly value="/api/snippets">
				<p>Returns all available snippets.</p>
			</div>
		</div>
		<div class="panel">
			<div class="panel-header">
				<span><i class="fas fa-question-circle margin-right(8px)"></i><b>Private API</b></span>
			</div>
			<div class="panel-section flex-direction(column)">
				<input type="text" class="margin-bottom(8px)" readonly value="/api/snippets/store">
				<p>Submits a snippet to the service.</p>
				<br>
				<span>Args:</span>
				<ul>
					<li><b>api_key</b>: Key required to access private API</li>
					<li><b>title</b>: Title of submitted snippet</li>
					<li><b>contents</b>: Snippets' code</li>
					<li><b>language</b>: Language used in syntax highlighting</li>
				</ul>
			</div>
		</div>
	</div>
@endsection
