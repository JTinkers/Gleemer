<div class="snippet">
	<div class="snippet-header">
		<span>{{ $snippet->title }}</span>
	</div>
	<div class="snippet-content">
		<span>{{ $snippet->contents }}</span>
	</div>
	<div class="snippet-footer">
		<div class="snippet-footer-user">
			<img class="snippet-footer-user-avatar" src="https://secure.gravatar.com/avatar/cc29879d431a1d31aa636bd50ba97614?s=16&d=retro&r=g"/>
			<span class="snippet-footer-user-nickname">{{ $snippet->user->nickname }}</span>
		</div>
		<div class="snippet-footer-date">
			<span>{{ $snippet->date_posted }}</span>
		</div>
	</div>
</div>
