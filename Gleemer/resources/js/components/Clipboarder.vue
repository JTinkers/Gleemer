<template>
    <div :source="source" v-on:click.stop="onClick">
        <slot></slot>
    </div>
</template>

<script>
    export default
    {
        props:
		{
			source: String
		},
        methods:
        {
            onClick()
			{
				var range = document.createRange();
				var el = document.querySelector(this.source);
				var hidden = false;

				if(el.getAttribute('hidden'))
				{
					hidden = true;
					el.removeAttribute('hidden');
				}

				range.selectNodeContents(el);

				var selection = window.getSelection();
				selection.removeAllRanges();
				selection.addRange(range);

				document.execCommand('copy');

				selection.removeAllRanges();

				if(hidden)
				{
					el.setAttribute('hidden', 'true');
				}
			}
        }
    }
</script>
