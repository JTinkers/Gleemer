<div id="ban-screen">
	<p>Sorry, it seems that you were a <b>naughty</b> human being</p>
	<p>You've been <b>banned</b> for a reason: {{ $ban->reason }}</p>
	<p>Your ban will be <b>lifted</b> in: {{ $ban->human_unban_date }}</p>
	<i class="fas fa-ban"></i>
</div>

<style>
	@import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,700|Raleway:200,300,400,700|Fira+Mono:400|Open+Sans:300,400,700');
	@import url("https://use.fontawesome.com/releases/v5.7.2/css/all.css");

	body
	{
		margin: 0;
		padding: 0;
		background: rgb(255, 45, 45);
	}

	#ban-screen
	{
		display: flex;
		flex-direction: column;
		align-items: center;
		align-content: center;
		justify-content: center;
		font-family: 'Open Sans', sans-serif;
		font-size: 32px;
		width: 100vw;
		height: 100vh;
		color: white;
	}

	i
	{
		position: absolute;
		color: rgb(255, 65, 65);
		font-size: 100vh;
		z-index: -1;
	}
</style>
