
<div class="container-fluid ">
	    <div class='product-list'>
	    <?php 
	    if(isset($error)){
	    	//var_dump($error);
	    }
	    else{ foreach($items as $item):?>
	       <div class="panel panel-warning" id = "item-<?php echo $item['id'];?>">
	       		<div class="panel-heading"><?php echo $item['name']?></div>
	       		<div class="panel-body">
				    <div class = 'row'>
				    	<div class=" col-md-12 col-sm-12 col-xs-12">
				    	 <pre><?php echo $item["content"];?></pre>  
				    	
				    	</div>
				    	<div class="hidden col-md-0 col-sm-0 col-xs-0 ">
						    		<a href = '<?php echo $router;?>/update/id/<?php echo $item['id'] ;?>'  class="btn btn-success btn-mini"><i class="icon-white icon-pencil"></i> <?php echo $this->lang->line('edit') ; ?> </a>  	
				    	 			<button type='button' class="btn btn-danger btn-mini" onclick="javascript:removeItem(<?php echo $item['id'];?>);"><i class="icon-white icon-remove"></i>
          		 						<?php echo $this->lang->line('delete') ; ?> 
          		 					</button>
				    	</div>
				    </div>
				</div>

	       </div>
	       <?php endforeach;}?>
	    </div>
    </div>
<script>
	    function removeItem(id){
			var yes = confirm("Are you sure you want to delete?");
			if(!yes)
			{
 				return false;
			}
		    $.ajax({
				url: "ajax",
				type: "POST",
				data: { 'url':'<?php echo $router;?>/detail/id/' + id + '/format/json' ,
					'method': 'delete'},
				dataType: "json"
				}).done(function(data){
					if(data)
					{
						$('#item-' + data).fadeOut().remove();
						}
					});
	    }
</script>