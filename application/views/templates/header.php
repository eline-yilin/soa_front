<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>前端应用</title>
<link rel="icon" href="<?php echo $this->config->item( 'base_theme_url');?>images/fav1.ico" />
 <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo $this->config->item( 'base_theme_url');?>css/bootstrap.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo $this->config->item( 'base_theme_url');?>css/bootstrap_theme.css">
    <link rel="stylesheet" href="<?php echo $this->config->item( 'base_theme_url');?>css/app.css"/>
     <script src="<?php echo $this->config->item( 'base_theme_url');?>js/jquery.js"></script> 
       
     <!-- Latest compiled and minified JavaScript -->
      <script src="<?php echo $this->config->item( 'base_theme_url');?>js/bootstrap.js"></script>
      <script src="<?php echo $this->config->item( 'base_theme_url');?>js/validator.js"></script>
      <script src="<?php echo $this->config->item( 'base_theme_url');?>js/utility.js"></script>
      <script src="<?php echo $this->config->item('base_theme_url');?>js/app.js"></script>
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
           <?php foreach( $this->config->item( 'nav_arr') as $key => $nav_item):
            $text = isset( $nav_item['text']) ? $nav_item['text'] : $key;
            $href = isset( $nav_item['href']) ? $nav_item['href'] : $key;
            $href = $this->config->item('base_url') . $href;
           ?>
           <?php if($key == 'template'):?>
           		<li role="presentation" class='dropdown nav-item <?php if($router == $key) echo " active";?>' id='nav-item-<?php echo $key;?>'>
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			      <?php echo $text;?> <span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href='<?php echo $this->config->item( 'base_url');?>inquiry'>Inquiry Partials</a></li>
			      <li><a href='<?php echo $this->config->item( 'base_url');?>quote'>Quote Partials</a></li>
			      <li><a href='<?php echo $this->config->item( 'base_url');?>awb'>AWB Partials</a></li>
			  	  <li><a href='<?php echo $this->config->item( 'base_url');?>cost'>Cost Partials</a></li>
			  	  <li><a href='<?php echo $this->config->item( 'base_url');?>status'>Status Partials</a></li>
			  	  <li><a href='<?php echo $this->config->item( 'base_url');?>link'>Links</a></li>
			    </ul>
			  </li>
           <?php else:?>
           		<li class='nav-item <?php if($router == $key) echo " active";?>' id='nav-item-<?php echo $key;?>'>
           			<a href='<?php echo $href;?>'><?php echo $text;?></a>
           		</li>
           <?php endif;?>
           <?php endforeach;?>
           		<li role="presentation" class="dropdown operation pull-right" >
           		<?php if(isset($user) && $user) :?>
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				       <span  class='pull-left' style='margin-right:5px;margin-top:8px;font-size:0.7em;font-weight:normal;'><?php echo $user['name'];?></span>
				       <span class='pull-left' style='margin-right:3px;'><i class="icon-white icon-user"></i></span> 
				        <span class='pull-left' style='padding-top:12px;display:none;' >
				      		 <span class="icon-bar"></span>
				      		  <span class="icon-bar"></span>
				      		   <span class="icon-bar"></span>
				      	 </span>
				      	<span class="caret"></span>
				      	
				    </a>
				    <ul class="dropdown-menu dropdown-ul" role="menu">
				     	  <li role="presentation" class="create"><a href="<?php echo $this->config->item('base_url');?>user/logout/"><?php echo $this->lang->line('logout'); ?></a></li>
				    </ul>
				    <?php else :?>
				    <div class='account-operations'>
				    	<a href='user/login'><?php echo $this->lang->line('login'); ?> </a> | 
				    	<a href='user/register'><?php echo $this->lang->line('register'); ?> </a>
				    </div>
				    <?php endif;?>
				  </li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class='page-content'>
    	
    
 	