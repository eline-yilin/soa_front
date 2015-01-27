<div class="container-fluid">
		<div class='subnav'>
			<ul class="nav navbar nav-pills">
			  <li role="presentation" class="create"><a href="<?php echo $this->config->item('base_url');?>user/login/"><?php echo $this->lang->line('login'); ?></a></li>
			  <li role="presentation" class="create"><a href="<?php echo $this->config->item('base_url');?>user/register/"><?php echo $this->lang->line('register'); ?></a></li>
			  <li role="presentation" class="create"><a href="<?php echo $this->config->item('base_url');?>user/logout/"><?php echo $this->lang->line('logout'); ?></a></li>
			
			</ul>
		</div>
	    <div class='product-list'>
	    <?php 
	    if(isset($error)){
	    	//var_dump($error);
	    }
	    else if(0){
	    foreach($items as $product):?>
	       <div class="list-item panel panel-warning">
	            <div class="panel-heading"><?php echo $product['name']?></div>
	       		<div class="panel-body">
				    <div class = 'row'>
				    	<div class=" col-md-4 col-sm-4 col-xs-4">
				    	<img style='max-width:100%' src="<?php echo isset($product['img']) ?
				    	 $this->config->item( 'cdn_url_upload_img') .'product/' .  $product['img'] 
				    	: '';?>"></div>
				    	<div class=" col-md-8 col-sm-8 col-xs-8 list-main">
					    	  <div class = 'row price'>
						    	  	<div class=" col-md-2 col-sm-3 col-xs-4">
						    	  		<span class="label label-primary">
						    	  			<span class="glyphicon glyphicon-usd"></span>价格
						    	  		</span>
						    	  	</div>
					    			<div class=" col-md-10 col-sm-9 col-xs-8 ">
					    				<?php echo $product['price']?>
					    			</div>
					    	  </div>
					    	  <div class = 'row address'>
						    	  	<div class=" col-md-2 col-sm-3 col-xs-4">
						    	  		<span class="label label-primary">
						    	  			<span class="glyphicon glyphicon-road"></span>产地
						    	  		</span>
						    	  	</div>
					    			<div class=" col-md-10 col-sm-9 col-xs-8 ">
					    				<?php echo isset($product['address']) ? $product['address'] : ''; ?>
					    			</div>
					    	  </div>
					    	  <div class = 'row tag'>
						    	  	<div class=" col-md-2 col-sm-3 col-xs-4">
						    	  		<span class="label label-primary">
						    	  			<span class="glyphicon glyphicon-tag"></span>标签
						    	  		</span>
						    	  	</div>
					    			<div class=" col-md-10 col-sm-9 col-xs-8 ">
					    				<?php echo isset($product['tag']) ? $product['tag'] : '';?>
					    			</div>
					    	  </div>
				    	</div>
				    </div>
				</div>
 		   		<div class="panel-footer">邮费根据地址不同 敬请自理。需要请微信留言。谢谢。</div>
	       </div>
	       <?php endforeach;}?>
	    </div>
    </div>
