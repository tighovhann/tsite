<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>tsite</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="{site_url('css/default.css')}" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="logo">
  <a href='{site_url()}'><img src="{site_url('img/company_logo.png')}" alt="tigran.co.cc" /></a>
</div>

<div id="navigationTop">
  <ul>
    {if isset($pages) }
        {if is_array($pages) }
            {foreach from=$pages item=page}
                {if isset($page.name) and isset($page.id) }
                    <li><a href={site_url("pages/id/`$page.id`")}>{$page.name}</a></li>
                {/if}
            {/foreach}
        {/if}
    {/if}

    <li><input type="button" value="+" onClick="show_form('new_page_form')" /></li>
  </ul>
</div><!-- end: navigationtop -->

<div id="contentWrapper">
    <div id="content">

    <div id='new_page_form'>
        {form_open_multipart('pages/add')}
            <div class='textfield'>
                {form_label('name', 'page_name')}
                {form_input('page_name')}

            </div>
            <div class='buttons'>
                {form_submit('add', 'add')}

            </div>
        {form_close()}
    </div>

    {if isset($page_id) }
        <a href={site_url("pages/remove/`$page_id`")}><img src={site_url('img/delete.png')}></a>
    {/if}

    {if isset($texts) }

        <div>
            {if is_array($texts) }
                {foreach from=$texts item=text }
                    {if isset($page.name) and isset($text.id) and isset($text.content)} 

                        <div class='{$text.type}'>
                            <a href='{site_url("texts/id/`$text.id`")}'>{$text.name}</a>
                            <a href='{site_url("texts/edit/`$text.id`")}'>
                                <img height='16' src='{site_url('img/edit.png')}'>
                            </a>
                            <a href='{site_url("texts/remove/`$text.id`")}'>
                                <img height='16' src='{site_url('img/delete.png')}'>
                            </a>
                            <p>{$text.content}</p>
                        </div>
                    {/if}
                {/foreach}
            {/if}

        </div>
    {/if}

    {if isset($comments) }

        <div>
            {if is_array($comments) }
                {foreach from=$comments item=comment }
                    {if isset($page.name) and isset($comment.id) and isset($comment.content) }

                        <p>{$comment.content}</p>
                    {/if}
                {/foreach}
            {/if}

        </div>
    {/if}

	{if isset($page_id) }

        <input type="button" value="+" onClick="show_form('new_text_form')" />
        <div id='new_text_form'>
		{form_open_multipart('texts/add')}
                <div class='textfield'>
                    {form_label('name', 'text_name')}
                    {form_input('text_name')}

                </div>
                <div class='textfield'>
                    {form_label('content', 'text_content')}
                    {form_textarea('text_content')}

                </div>
                {form_hidden('page_id', $page_id)}

                <div class='textfield'>
                    {form_label('type', 'text_type')}
                    {form_dropdown('text_type')}

                </div>
                <div class='buttons'>
                    {form_submit('add', 'add')}

                </div>
			{form_close()}
       </div>
	{/if}

	{if isset($text_id) }

        <input type="button" value="+" onClick="show_form('new_comment_form')" />
        <div id='new_comment_form'>
            {form_open_multipart('comments/add')}
                <div class='textfield'>
                    {form_label('content', 'comment_content')}
                    {form_textarea('comment_content')}

                </div>
                {form_hidden('text_id', $text_id)}

                <div class='buttons'>
                    {form_submit('add', 'add')}

                </div>
            {form_close()}
        </div>
	{/if}
