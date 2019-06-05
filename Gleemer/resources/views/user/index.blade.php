@extends('layouts/default')

@section('content')
	<div id="user-index-content-wrapper">
		<div>
			<h3>Sign-in</h3>
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
		<div>
			<h3>Sign-up</h3>
		</div>
	</div>
@endsection
