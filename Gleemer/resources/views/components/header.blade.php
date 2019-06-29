<div id="header">
	<div id="logo">
		<span>Gleemer</span>
	</div>
	<dynform id="search" method="get" pattern="/search/{phrase}">
		<div id="search-icon">
			<i class="fas fa-search"></i>
		</div>
		<input id="search-input" type="text" name="phrase"/>
	</dynform>
	<div id="menu">
		<a class="menu-button" href="/">
			<div>
				<i class="fas fa-file-alt"></i>
			</div>
		</a>
		<a class="menu-button" href="/snippet/create">
	        <div>
				<i class="fas fa-plus-square"></i>
			</div>
		</a>
		<a class="menu-button" href="/api">
	        <div>
				<i class="fas fa-share-alt"></i>
			</div>
		</a>
		@if(!UserManager::get())
			<a class="menu-button" href="/user">
	    	    <div>
					<i class="fas fa-fw fa-user"></i>
				</div>
			</a>
		@else
			@usertag(['id' => UserManager::get()->id, 'class' => 'dark margin-left(8px)'])
		@endif
	</div>
</div>
