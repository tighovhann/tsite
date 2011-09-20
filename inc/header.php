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
  </ul>
</div><!-- end: navigationtop -->

<div id="contentWrapper">

<div id="content">


