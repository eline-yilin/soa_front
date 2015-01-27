<?php
include '../includes/header.php';
include '../config/products.php';
?>

<div id='about-content' class='page-section' >
 	 <div class='my-bg'>
    		<img src="<?php echo THEME_PATH;?>images/nav-bg.jpg" />
    </div>
    <div class="container-fluid" style='margin-top:10px;'>
    <p style='text-align:center;'>
    我就是我　不一样的烟火。。。
    <br>
    敬请关注后续更新。。</p>
	    <div class='row bussiniess-list' style='display:none;'>
	    	<div class="col-md-4 col-sm-4 col-xs-4"><div class='my-circle my-red'>bussiness</div></div>
	    	<div class="col-md-4  col-sm-4  col-xs-4"><div class='my-circle my-orange'>bussiness</div></div>
	    	<div class="col-md-4  col-sm-4  col-xs-4"><div class='my-circle my-blue'>bussiness</div></div>
	    </div>
    </div>
</div>
<div id='bussiness-content' class='page-section' >
	<div class='my-bg'>
    		<img src="<?php echo THEME_PATH;?>images/2.jpg" />
    </div>
    <div class="container-fluid">
	    <div class='product-list'>
	    <?php foreach($_products as $product):?>
	       <div class="product-item list-item panel panel-warning">
	            <div class="panel-heading"><?php echo $product['name'];?></div>
	       		<div class="panel-body">
				    <div class = 'row'>
				    	<div class="img col-md-4 col-sm-4 col-xs-4"><img src='<?php echo THEME_PATH . 'images/products/' .  $product['img'];?>' /></div>
				    	<div class="description col-md-8 col-sm-8 col-xs-8 ">
					    	  <div class = 'row price'>
						    	  	<div class=" col-md-2 col-sm-3 col-xs-4">
						    	  		<span class="label label-primary">
						    	  			<span class="glyphicon glyphicon-usd"></span> 价格
						    	  		</span>
						    	  	</div>
					    			<div class=" col-md-10 col-sm-9 col-xs-8 ">
					    				<?php echo $product['price']?>
					    			</div>
					    	  </div>
					    	  <div class = 'row size'>
						    	  	<div class=" col-md-2 col-sm-3 col-xs-4">
						    	  		<span class="label label-primary">
						    	  			<span class="glyphicon glyphicon-briefcase"></span> 规格
						    	  		</span>
						    	  	</div>
					    			<div class=" col-md-10 col-sm-9 col-xs-8 ">
					    				<?php echo $product['size']?>
					    			</div>
					    	  </div>
					    	  <div class = 'row address'>
						    	  	<div class=" col-md-2 col-sm-3 col-xs-4">
						    	  		<span class="label label-primary">
						    	  			<span class="glyphicon glyphicon-road"></span> 产地
						    	  		</span>
						    	  	</div>
					    			<div class=" col-md-10 col-sm-9 col-xs-8 ">
					    				<?php echo $product['address']?>
					    			</div>
					    	  </div>
					    	  <div class = 'row tag'>
						    	  	<div class=" col-md-2 col-sm-3 col-xs-4">
						    	  		<span class="label label-primary">
						    	  			<span class="glyphicon glyphicon-tag"></span> 标签
						    	  		</span>
						    	  	</div>
					    			<div class=" col-md-10 col-sm-9 col-xs-8 ">
					    				<?php echo $product['tag']?>
					    			</div>
					    	  </div>
				    	</div>
				    </div>
				</div>
 		   		<div class="panel-footer"><?php echo $product['disclaimer'] ? $product['disclaimer'] : "邮费根据地址不同 敬请自理。需要请微信留言。谢谢。";?></div>
	       </div>
	       <?php endforeach;?>
	    </div>
    </div>
</div>
<div id='portfolio-content' class='page-section' style='display:none;'>
	<div class='my-bg'>
    		<img src="<?php echo THEME_PATH;?>images/nav-bg.jpg" />
    </div>
c</div>
<div id='contact-content' class='page-section' >
	<div class='my-bg'>
    		<img src="<?php echo THEME_PATH;?>images/nav-bg.jpg" />
    </div>
    <div style='margin-top:10px'>
    	<div class="row contact-item list-item">
			<div class=" col-md-2 col-sm-3 col-xs-4">
					<span class="label label-primary">
						<span class="glyphicon glyphicon-envelope"></span> qq
					</span>
			</div>
			<div class=" col-md-10 col-sm-9 col-xs-8 ">
					   303528861					    			</div>
			</div>
 		</div>
 		<div class="row contact-item list-item">
			<div class=" col-md-2 col-sm-3 col-xs-4">
					<span class="label label-primary">
						<span class="glyphicon glyphicon-credit-card"></span> 淘宝店铺
					</span>
			</div>
			<div class=" col-md-10 col-sm-9 col-xs-8 ">
				<a href='http://shop72691117.taobao.com/?spm=a230r.7195193.1997079397.2.SbRzl8'>吃心江湖</a> 					    			</div>
			</div>
		</div>
    </div>
    <div class='form-container' style='display:none;'>
    	<form class="form-horizontal" role="form">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Remember me
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Sign in</button>
		    </div>
		  </div>
		</form>
    </div>
</div>
<?php
include '../includes/footer.php';
?>