<a href="/user/show/{{ $id }}" class="usertag {{ $class ?? '' }}">
	<img class="usertag-avatar" src="/storage/users/avatars/{{ $id }}.png"/>
	<span class="usertag-nickname">{{ App\User::find($id)->nickname }}</span>
</a>
