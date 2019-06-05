@extends('layouts/default')

@section('content')
	<div id="snippet-show-content-wrapper">
		<div class="panel">
			<div class="panel-header">
				{{ $snippet->title }}
			</div>
			<div class="panel-content">
				{{ $snippet->contents }}
			</div>
			<div class="panel-footer">

			</div>
		</div>
	</div>
@endsection
