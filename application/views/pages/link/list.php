
               
<div class="container-fluid">
	    <div class='product-list'>
	    <?php 
	    if(isset($error)):
	    	var_dump($error);
	    
	    else:?>
	    
	    	<div class = 'row'>
			     <?php foreach($items as $item):?>
			      		<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 link-item">
							<a href = '<?php echo $item["content"];?>'  class="btn btn-success btn-mini full-width"><i class="icon-white icon-hand-right"></i> <?php echo $item['name']; ?> </a>  		
						</div>
			       
			       <?php endforeach;?> 
			       
	       </div><!-- end row -->
	    <?php endif;?>	

	      
	    </div>
   		
	</div>
	
    </div>
