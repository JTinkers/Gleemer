<template>
    <form :action="action" :method="method" :serialize="serialize" @change="onChange">
        <slot></slot>
    </form>
</template>

<script>
    export default
    {
        props:
		{
			pattern: String,
			method: String,
			serialize: Boolean
		},
        data: () =>
        ({
            action: ''
        }),
		mounted()
		{
			if(!this.serialize)
			{
				$( this.$el ).on("submit", function()
				{
					window.location = this.action

					return false;
				});
			}
		},
        methods:
        {
            onChange: function()
            {
                var e = this.$el
                this.action = this.pattern.replace(/{(\w+)}/g, function(match)
                {
                    return $( e ).find(`[name='${match.substring(1, match.length - 1)}']`).val()
                })
            }
        }
    }
</script>
