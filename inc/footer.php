</div><!-- END: content -->
<div id="leftColumn">
	<div id='news_form'>
			<p>
<?php
			$data = array (
				'name' => 'news_content',
				'style' => 'width: 157px;',
			);
			echo form_open('news/add')
					.form_fieldset('news')
					."<div class='textfield'>"
						.form_label('name', 'news_name')
						.form_input('news_name', '')
					."</div>"
					."<div class='textfield' style='width: 160px;'>"
						.form_label('content', 'news_content')
						.form_textarea($data)
					."</div>"
					."<div class='buttons'>"
						.form_submit('submit', 'submit')
					."</div>"
					.form_fieldset_close()
				.form_close();
?>
			</p>
	</div>
    <input type="button" value="+" onClick="show_form('news_form')" />
	<div id='news'>
	<?php if(isset($news)) {
		if(is_array($news)) {
			foreach($news as $anews) {
				if(isset($anews['name']) and 
					isset($anews['content']) and isset($anews['id'])) 
				{
					echo("<a href='".site_url()."news/id/".$anews['id']."'>"
							. $anews['name']."</a> | "
							. "<a href='".site_url() . "news/remove/" . $anews['id'] . "'>remove</a>"
							. "<p>" . $anews['content'] . "</p>"
							);
				}
			}
		}
	}
	?>
	</div>
</div><!-- end: leftcolumn -->

<div id="footer">
<?php
if(isset($error)) {
	echo "<div class='error'>";
	echo $error;
	echo "</div>";
}
if(isset($info)) {
	echo "<div class='info'>";
	echo $info;
	echo "</div>";
}
?>
  <div id="footer_links">
<?php if(isset($pages)) {
	if(is_array($pages)) {
		foreach($pages as $page) {
			if(isset($page['name']) and isset($page['id'])) {
				echo("<a href='".site_url()."pages/id/".$page['id']."'>"
						.$page['name']." | ");
			}
		}
	}
}
?>
  </div>
  <div id="footer_copyright">
  <strong>copyright &copy; 2010-2011 tsite - all rights reserved</strong><br />
  </div>
</div>
</div><!-- END: contentWrapper -->
</body>
<script src="<?=site_url('js/jquery-1.4.2.min.js')?>"></script>
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
