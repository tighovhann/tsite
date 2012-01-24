</div><!-- END: content -->
<div id="leftColumn">
    <input type="button" value="+" onClick="show_form('news_form')" />
	<div id='news_form'>
        <p>
			<form action='news/add'>
                <div class='textfield'>
                    {form_label('name', 'news_name')}
                    {form_input('news_name', '')}
                </div>
                <div class='textfield' style='width: 160px;'>
                    {form_label('content', 'news_content')}
                    {form_textarea('news_content')}
                </div>
                <div class='buttons'>
                    {form_submit('submit', 'submit')}
                </div>
		    </form>
        </p>
	</div>
	{if isset($news) }
	<div id='news'>
		{if is_array($news) }
			{foreach from=$news item=item }
                {if isset($item.name) and isset($item.content) and isset($item.id) } 
					<a href='{site_url("news/id/`$item.id`")}'>{$item.name}</a> |
					<a href='{site_url("news/remove/`$item.id`")}'>remove</a>
					<p>{$item.content}</p>
				{/if}
			{/foreach}
		{/if}
	</div>
	{/if}
</div><!-- end: leftcolumn -->
