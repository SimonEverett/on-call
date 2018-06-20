{foreach from=$export key=bar item=foo}
{$bar},
	{foreach from=$foo item=foo1}
		{$foo1},
	{/foreach}
{/foreach}


