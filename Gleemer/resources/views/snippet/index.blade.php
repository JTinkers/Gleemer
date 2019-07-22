@extends('layouts/default')

@section('title', 'Snippets')

@section('content')
	<snippetapicontainer id="snippet-index-content-wrapper" url="http://gleemer.test/api/snippets/page/">
		<template slot-scope="data">
			<transition-group name="fade" id="snippet-index-left-pane" name="slide-fade">
				<div v-for="snippet in data.resultsLeft" :key="snippet.id" class="panel">
					<div class="panel-header">
						<a class="margin-right(8px) overflow(hidden) text-overflow(ellipsis) white-space(nowrap)" :href="'/snippet/show/'+snippet.id"><b>@{{ snippet.title }}</b></a>
						<a :href="'/user/show/'+snippet.user.id" class="usertag margin-left(auto)">
							<img class="usertag-avatar" :src="'/storage/users/avatars/'+snippet.user.id+'.png'"/>
							<span class="usertag-nickname">@{{ snippet.user.nickname }}</span>
						</a>
					</div>
					<div class="snippet-code panel-section dim">
						<pre v-highlightjs><code :class="snippet.language">@{{ snippet.contents }}</code></pre>
					</div>
					<div class="panel-footer">
						<i class="far fa-comment"></i>
						<span class="margin-left(4px)">@{{ snippet.comments_count }}</span>
						<i class="far fa-star margin-left(16px)"></i>
						<span class="margin-left(4px)">@{{ snippet.favourites_count }}</span>
						<span class="margin-left(auto)">@{{ snippet.human_date_posted }}</span>
					</div>
				</div>
			</transition-group>
			<transition-group name="fade" id="snippet-index-right-pane">
				<div v-for="snippet in data.resultsRight" :key="snippet.id" class="panel">
					<div class="panel-header">
						<a class="margin-right(8px) overflow(hidden) text-overflow(ellipsis) white-space(nowrap)" :href="'/snippet/show/'+snippet.id"><b>@{{ snippet.title }}</b></a>
						<a :href="'/user/show/'+snippet.user.id" class="usertag margin-left(auto)">
							<img class="usertag-avatar" :src="'/storage/users/avatars/'+snippet.user.id+'.png'"/>
							<span class="usertag-nickname">@{{ snippet.user.nickname }}</span>
						</a>
					</div>
					<div class="snippet-code panel-section dim">
						<pre v-highlightjs><code :class="snippet.language">@{{ snippet.contents }}</code></pre>
					</div>
					<div class="panel-footer">
						<i class="far fa-comment"></i>
						<span class="margin-left(4px)">@{{ snippet.comments_count }}</span>
						<i class="far fa-star margin-left(16px)"></i>
						<span class="margin-left(4px)">@{{ snippet.favourites_count }}</span>
						<span class="margin-left(auto)">@{{ snippet.human_date_posted }}</span>
					</div>
				</div>
			</transition-group>
		</template>
	</snippetapicontainer>
@endsection
