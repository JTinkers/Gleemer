@extends('layouts/default')

@section('content')
	<div id="user-index-content-wrapper">
		<form class="panel flex-grow(1) margin-right(128px)">
			<div class="panel-header">
				<h3><i class="fas fa-sign-in-alt margin-right(8px)"></i>Sign-in</h3>
			</div>
			<div class="panel-section flex-direction(column)">
				<div class="display(flex) flex-direction(column)">
					<span class="margin-bottom(4px)">@lang('user.login'):</span>
					<input name="login" type="text"/>
				</div>
				<div class="display(flex) flex-direction(column) margin-top(16px)">
					<span class="margin-bottom(4px)">@lang('user.password'):</span>
					<input name="password" type="password"/>
				</div>
			</div>
			<div class="panel-footer">
				<input class="blue margin-left(-8px) flex-grow(1) margin-right(-8px)" type="submit" value="@lang('user.signin')"/>
			</div>
		</form>
		<form class="panel flex-grow(1) margin-left(128px)">
			<div class="panel-header">
				<h3><i class="fas fa-sign-in-alt margin-right(8px)"></i>Sign-up</h3>
			</div>
			<div class="panel-section flex-direction(column)">
				<div class="display(flex) flex-direction(column)">
					<span class="margin-bottom(4px)">@lang('user.login'):</span>
					<input name="login" type="text"/>
				</div>
				<div class="display(flex) flex-direction(column) margin-top(16px)">
					<span class="margin-bottom(4px)">@lang('user.password'):</span>
					<input name="password" type="password"/>
				</div>
				<div class="display(flex) flex-direction(column) margin-top(16px)">
					<span class="margin-bottom(4px)">@lang('user.email'):</span>
					<input name="email" type="email"/>
				</div>
			</div>
			<div class="panel-section flex-direction(column)">
				<div class="display(flex) flex-direction(column)">
					<span class="margin-bottom(4px)">@lang('user.nickname'):</span>
					<input name="nickname" type="text"/>
				</div>
			</div>
			<div class="panel-footer">
				<input class="purple margin-left(-8px) flex-grow(1) margin-right(-8px)" type="submit" value="@lang('user.signup')"/>
			</div>
		</form>
	</div>
@endsection
