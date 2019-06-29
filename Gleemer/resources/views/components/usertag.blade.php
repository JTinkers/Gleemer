<a href="/user/show/{{ $id }}" class="usertag {{ $class ?? '' }}">
	<img class="usertag-avatar" src="https://secure.gravatar.com/avatar/cc29879d431a1d31aa636bd50ba97614?s=16&d=retro&r=g"/>
	<span class="usertag-nickname">{{ App\User::find($id)->nickname }}</span>
</a>
