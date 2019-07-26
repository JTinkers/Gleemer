@extends('layouts/default')

@section('title', $user->nickname)

@section('content')
	<div id="user-edit-content-wrapper">
		<form class="panel align-self(stretch) column-start(0) column-end(1)" action="/user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="panel-header">
				<span><i class="fas fa-user margin-right(8px)"></i><b>Avatar (16x16)</b></span>
			</div>
			<div class="panel-section dim flex-direction(column)">
				<div class="margin-bottom(16px)">
					<img id="user-edit-avatar" src="/storage/users/avatars/{{ $user->default_avatar ? 'default' : $user->id }}.png"/>
				</div>
				<input type="file" name="avatar">
			</div>
			<div class="panel-footer">
				<input class="margin-left(-8px)" type="submit" value="@lang('inputs.save')"/>
			</div>
		</form>
		<form class="panel align-self(stretch) column-start(1) column-end(4)" action="/user/update/{{ $user->id }}" method="POST">
			@csrf
			<div class="panel-header">
				<span><i class="fas fa-user margin-right(8px)"></i><b>Bio</b></span>
			</div>
			<div class="panel-section dim">
				<textarea class="flex-grow(1)" name="bio">{{ $user->bio }}</textarea>
			</div>
			<div class="panel-footer">
				<input class="margin-left(-8px)" type="submit" value="@lang('inputs.save')"/>
			</div>
		</form>
		<form class="panel align-self(stretch) column-start(0) column-end(4)" action="/user/update/{{ $user->id }}" method="POST">
			@csrf
			<input type="hidden" name="generateKey" value="true"/>
			<div class="panel-header">
				<span><i class="fas fa-user margin-right(8px)"></i><b>@lang('user.api_key')</b></span>
			</div>
			<div class="panel-section dim">
				<input type="text" readonly class="flex-grow(1)" name="api_key" value="{{ $user->api_key }}"/>
			</div>
			<div class="panel-footer">
				<input class="margin-left(-8px)" type="submit" value="@lang('user.generate')"/>
			</div>
		</form>
	</div>
@endsection
