@extends('layouts/default')

@section('content')
	<div id="snippet-index-content-wrapper">
		@for ($i=0; $i < 10; $i++)			
			<div class="snippet">
				<div class="snippet-header">
					Header
				</div>
				<div class="snippet-content">
					Content
				</div>
				<div class="snippet-footer">
					Footer
				</div>
			</div>
		@endfor
	</div>
@endsection
