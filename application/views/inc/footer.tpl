
<div id="footer">
{if isset($error) }
    <div class='error'>{$error}</div>
{/if}
{if isset($info) }
    <div class='info'>{$info}</div>
{/if}
  <div id="footer_links">
{if isset($pages) }
	{if is_array($pages) }
		{foreach from=$pages item=page }
			{if isset($page.name) and isset($page.id) }
				<a href='{site_url("pages/id/`$page.id`")}'>{$page.name}</a>
			{/if}
		{/foreach}
	{/if}
{/if}
  </div>
  <div id="footer_copyright">
  <strong>copyright &copy; 2010-2011 tsite - all rights reserved</strong><br />
  </div>
</div>
</div><!-- END: contentWrapper -->
</body>
<script src="{site_url('js/jquery-1.4.2.min.js')}"></script>
<script>
    $('#new_page_form').toggle();
    $('#new_text_form').toggle();
    $('#new_comment_form').toggle();
    $('#news_form').toggle();
    function show_form(f) {
        $('#' + f).toggle();
    }
</script>
</html>
