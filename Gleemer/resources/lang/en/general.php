<?php

return [
	'no_power' => 'Not enough admin power to perform the task.',
    'credits' => 'Created with <i class="fas fa-heart"></i> fueled by <i class="fas fa-coffee"></i>',
	'search_results_for' => 'Search results for phrase: ',
	'users' => 'Users',
	'snippets' => 'Snippets',
	'favourites' => 'Favourites',
	'about_api' => 'About API',
	'close' => 'Close',
	'public_api' => 'Public API',
	'private_api' => 'Private API',
	'api_description' => "<p>Gleemer hosts a variety of public and private APIs.</p>
	<br>
	<p>Public APIs require no API Key, but have limited amount of requests and data it can fetch.</p>
	<br>
	<p>Private APIs have no limits, but require a unique API Key that can be found in user panel.</p>",
	'public_api_snippets' => "<p>Returns all available snippets.</p>",
	'private_api_snippet_store' => "<p>Submits a snippet to the service.</p>
	<br>
	<span>Args:</span>
	<ul>
		<li><b>api_key</b>: Key required to access private API</li>
		<li><b>title</b>: Title of submitted snippet</li>
		<li><b>contents</b>: Snippets' code</li>
		<li><b>language</b>: Language used in syntax highlighting</li>
	</ul>"
];
