<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>tsite</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="<?php echo site_url('css/default.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="logo">
  <a href='<?=site_url()?>'><img src="<?php echo site_url('img/company_logo.png'); ?>" alt="tigran.co.cc" /></a>
</div>

<div id="navigationTop">
  <ul>
<?php if(isset($pages)) {
	if(is_array($pages)) {
		foreach($pages as $page) {
			if(isset($page['name']) and isset($page['id'])) {
				$id = $page['id'];
				$name = $page['name'];
				echo("<li>"
					."<a href='".site_url()."pages/id/".$page['id']."'>"
					.$page['name']."</a>"
					."</li>");
			}
		}
	}
}
?>
    <li><input type="button" value="+" onClick="show_form('new_page_form')" /></li>
  </ul>
</div><!-- end: navigationtop -->

<div id="contentWrapper">

<div id="content">


<?php
if(isset($page_id)) {
	echo "<a href=".site_url('pages/remove/'.$page_id)."><b>delete</b></a>";
}
?>

<div>
<?php if(isset($texts)) {
	if(is_array($texts)) {
		foreach($texts as $text) {
			if(isset($page['name']) and isset($text['id']) 
					and isset($text['content'])) 
			{
				echo("<div class='".$text['type']."'>"
					."<h1><a href='"
					.site_url()."texts/id/".$text['id']."'></h1>"
					.$text['name']."<a href='"
					.site_url('texts/remove/'.$text['id'])
					."'><b> - delete</b></a>"
					."<p>".$text['content']."</p>"
					."</div>"
					);
			}
		}
	}
}
?>
</div>

<div>
<?php if(isset($comments)) {
	if(is_array($comments)) {
		foreach($comments as $comment) {
			if(isset($page['name']) and isset($comment['id']) 
					and isset($comment['content'])) 
			{
				echo("<p>".$comment['content']."</p>");
			}
		}
	}
}
?>
</div>

<div id='new_page_form'>
<?php
	if (isset($root_page)) {
		echo form_open_multipart('pages/add')
				.form_fieldset('new page')
					."<div class='textfield'>"
						.form_label('name', 'page_name')
						.form_input('page_name')
					."</div>"
					."<div class='buttons'>"
						.form_submit('add', 'add')
					."</div>"
				.form_fieldset_close()
			.form_close();
	}
?>
</div>

<?php 
	if(isset($page_id)) {
        echo('<input type="button" value="+" onClick="show_form(\'new_text_form\')" />');
        echo "<div id='new_text_form'>";
		$text_types = array(
			'fullwidth'=>'fullwidth',
			'halfwidth_left'=>'halfwidth_left',
			'halfwidth_right'=>'halfwidth_right',
				);
		echo form_open_multipart('texts/add')
				.form_fieldset('new text')
					."<div class='textfield'>"
						.form_label('name', 'text_name')
						.form_input('text_name')
					."</div>"
					."<div class='textfield'>"
						.form_label('content', 'text_content')
						.form_textarea('text_content')
					."</div>"
					.form_hidden('page_id', $page_id)
					."<div class='textfield'>"
						.form_label('type', 'text_type')
						.form_dropdown('text_type', $text_types)
					."</div>"
					."<div class='buttons'>"
						.form_submit('add', 'add')
					."</div>"
				.form_fieldset_close()
			.form_close();
        echo "</div>";
	}
?>

<?php 
	if(isset($text_id)) {
        echo('<input type="button" value="+" onClick="show_form(\'new_comment_form\')" />');
        echo "<div id='new_comment_form'>";
		echo form_open_multipart('comments/add')
				.form_fieldset('new comment')
					."<div class='textfield'>"
						.form_label('content', 'comment_content')
						.form_textarea('comment_content')
					."</div>"
					.form_hidden('text_id', $text_id)
					."<div class='buttons'>"
						.form_submit('add', 'add')
					."</div>"
				.form_fieldset_close()
			.form_close();
        echo '</div>';
	}
?>
