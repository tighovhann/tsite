<?php include_once './inc/header.php'; ?>

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

<div id='new_text_form'>
<?php 
	if(isset($page_id)) {
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
	}
?>
</div>

<div id='new_comment_form'>
<?php 
	if(isset($text_id)) {
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
	}
?>
</div>

<?php include_once './inc/footer.php'; ?>
