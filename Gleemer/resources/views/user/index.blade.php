@extends('layouts/default')

@section('content')
	<div id="user-index-content-wrapper">
		<div class="display(flex) flex-direction(column)">
			<span class="margin-bottom(4px)">Login:</span>
			<input name="login" type="text"/>
		</div>
		<div class="display(flex) flex-direction(column) margin-top(16px)">
			<span class="margin-bottom(4px)">Password:</span>
			<input name="password" type="password"/>
		</div>
		<input class="margin-top(16px)" type="submit"/>
	</div>
@endsection
