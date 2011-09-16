</div><!-- END: content -->
<div id="leftColumn">
	<div id='news_form'>
	</div>
	<div id='news'>
	<?php if(isset($news)) {
		if(is_array($news)) {
			foreach($anews as $news) {
				if(isset($anews['subject']) and isset($anews['content'])
							and isset($anews['id'])) 
				{
					echo("<a href='".site_url()."news/id/".$anews['id']."'>"
							.$anews['subject']." | ");
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

</html>
