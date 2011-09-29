<?php include_once './inc/header.php'; ?>

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

<?php include_once './inc/footer.php'; ?>
