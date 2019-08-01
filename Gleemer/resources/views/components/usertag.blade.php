<a class="usertag {{ $class ?? '' }}" href="/user/show/{{ $id }}">
	<img class="usertag-avatar" src="/storage/users/avatars/{{ App\User::find($id)->default_avatar ? 'default' : $id }}.png"/>
	<span class="usertag-nickname">{{ App\User::find($id)->nickname }}</span>
</a>
