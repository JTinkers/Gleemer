<template>
    <div>
		<div id="snippet-index-panes">
        	<slot :resultsLeft="sortedResultsLeft" :resultsRight="sortedResultsRight"></slot>
		</div>
		<div v-observe-visibility="bottomReached"></div>
    </div>
</template>

<script>
    export default
    {
        props: ['url'],
        data: () =>
        ({
			results: [],
            resultsLeft: [],
            resultsRight: [],
			page: 0
        }),
		methods:
		{
			bottomReached: function(isVisible)
			{
				if(!isVisible)
					return;

				this.fetch()
			},
			fetch: function()
			{
				let elem = this

				this.page++

				axios.get(this.url + this.page).then(response => (Object.entries(response.data)).forEach(function(el, i, arr)
				{
					elem.results.push(el[1])
				}))
			}
		},
		computed:
		{
			sortedResultsLeft: function()
			{
				return this.results.filter((value, index, arr) => index % 2 != 0)

			},
			sortedResultsRight: function()
			{
				return this.results.filter((value, index, arr) => index % 2 == 0)
			}
		}
    }
</script>
