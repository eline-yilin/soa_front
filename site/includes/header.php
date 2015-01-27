<?php 
include_once '../config/config.php';;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>吃心江湖</title>
<link rel="icon" href="<?php echo THEME_PATH;?>images/logo(2).ico" />
 <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo THEME_PATH;?>css/app.css"/>
     <script src="<?php echo THEME_PATH;?>js/jquery.js"></script> 
       
     <!-- Latest compiled and minified JavaScript -->
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script src="<?php echo THEME_PATH;?>js/utility.js"></script>
      <script src="<?php echo THEME_PATH;?>js/app.js"></script>
</head>
<body>
	<!-- Fixed navbar -->
    <div role="navigation" class="navbar my-navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
         
        </div>
        <div class="my-top-nav">
        <div class='my-pills-overlay'></div>
          <ul class="nav  nav-pills my-pills">
           <?php foreach($nav_array as $key => $nav_item):
            $text = isset( $nav_item['text']) ? $nav_item['text'] : $key;
            $href = isset( $nav_item['href']) ? $nav_item['href'] : $key;
            $href = '#' . $href;
           ?>
           		<li class='nav-item' id='nav-item-<?php echo $key;?>'><a href='<?php echo $href;?>'><?php echo $text;?></a></li>
           <?php endforeach;?>
           		
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class='page-content'>
    	
    
    
 	