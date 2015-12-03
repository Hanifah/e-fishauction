<!DOCTYPE HTML>
<head>
<title>E-Fishauction</title>
<meta charset="utf-8">
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>template/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>template/menu/css/simple_menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/js/fancybox/jquery.fancybox.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/boxes/css/style5.css">

<!--JS FILES -->
<script src="<?php echo base_url();?>template/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>template/js/jquery.tools.min.js"></script>
<script src="<?php echo base_url();?>template/js/twitter/jquery.tweet.js"></script>
<script src="<?php echo base_url();?>template/js/modernizr/modernizr-2.0.3.js"></script>
<script src="<?php echo base_url();?>template/js/easing/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url();?>template/js/kwicks/jquery.kwicks-1.5.1.pack.js"></script>
<script src="<?php echo base_url();?>template/js/swfobject/swfobject.js"></script>
<!-- FancyBox -->
<script src="<?php echo base_url();?>template/js/fancybox/jquery.fancybox-1.2.1.js"></script>

<script>
$(function () {
    $("#prod_nav ul").tabs("#panes > div", {
        effect: 'fade',
        fadeOutSpeed: 400
    });
});
</script>
<script>
$(document).ready(function () {
    $(".pane-list li").click(function () {
        window.location = $(this).find("a").attr("href");
        return false;
    });
});
function get_filename(val) {
  $("#file_name").val(val.value);
  };
</script>
</head>
<body>
<div class="header">
  <!-- Logo/Title -->
  <div id="site_title">
  <a href="<?php echo base_url()?>"> 
    <img src="<?php echo base_url();?>template/img/logo.png" alt="" width="250px">
  </a> </div>
  <!-- Main Menu -->
  <?php print $menu; ?>
</div>
<!-- END header -->
<div id="container">
  <!-- tab panes -->
  <?php print $content; ?>
</div>
<!-- END container -->
<div id="footer">
  <!-- First Column -->
  <div class="one-fourth">
    <h3>Useful Links</h3>
    <ul class="footer_links">
      <li><a href="#">Lorem Ipsum</a></li>
      <li><a href="#">Ellem Ciet</a></li>
      <li><a href="#">Currivitas</a></li>
      <li><a href="#">Salim Aritu</a></li>
    </ul>
  </div>
  <!-- Second Column -->
  <div class="one-fourth">
    <h3>Terms</h3>
    <ul class="footer_links">
      <li><a href="#">Lorem Ipsum</a></li>
      <li><a href="#">Ellem Ciet</a></li>
      <li><a href="#">Currivitas</a></li>
      <li><a href="#">Salim Aritu</a></li>
    </ul>
  </div>
  <!-- Third Column -->
  <div class="one-fourth">
    <h3>Information</h3>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet enim id dui tincidunt vestibulum rhoncus a felis.
    <div id="social_icons"> Theme by <a href="http://www.csstemplateheaven.com">CssTemplateHeaven</a><br>
      Photos © <a href="http://dieterschneider.net">Dieter Schneider</a> </div>
  </div>
  <!-- Fourth Column -->
  <div class="one-fourth last">
    <h3>Socialize</h3>
    <img src="<?php echo base_url();?>template/img/icon_fb.png" alt=""> <img src="<?php echo base_url();?>template/img/icon_twitter.png" alt=""> <img src="<?php echo base_url();?>template/img/icon_in.png" alt=""> </div>
  <div style="clear:both"></div>
</div>
<!-- END footer -->
</body>
</html>