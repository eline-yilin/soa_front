<div id="template_content" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">News Details</h4>
            </div>
            <div class="modal-body">
              
               <div id='template-content'></div>
              
            </div>
           
        </div>
    </div>
</div>
<div class="container-fluid ">
	    <div class='product-list'>
	    <?php 
	    if(isset($error)){
	    	//var_dump($error);
	    }
	    else{ foreach($items as $item):?>
	       <div class="panel panel-warning" id = "item-<?php echo $item['id'];?>">
	       		
	       		<div class="panel-body">
				    <div class = 'row'>
				    	<div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
				    	<?php echo $item['name']?>
				    	<div class='hidden hidden-content'><pre><?php echo $item["content"];?></pre> </div>
				    	  
				    	
				    	</div>
				    	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
						    		<button type='button' class="btn btn-success btn-mini" onclick="javascript:showContent(<?php echo $item['id'];?>);"><i class="icon-white icon-remove"></i>
          		 						<?php echo $this->lang->line('view_detail') ; ?> 
          		 					</button>
				    	</div>
				    </div>
				</div>

	       </div>
	       <?php endforeach;}?>
	    </div>
    </div>
<script>
$(document).ready(function(){
	
	$('#template_content').on('show.bs.modal', function () {
 	   
   	    $('.modal .modal-body').css('overflow-y', 'auto'); 
   	    $('.modal .modal-body').css('max-height', $(window).height() *0.7);
   	 	$('.modal .modal-body').css('height', $(window).height() *0.7);
   	 	
   	});
});	
function showContent(id){
	var content = $('#item-' + id + ' .hidden-content').html();
	$('#template_content #template-content').html(content);
	$("#template_content").modal('show');
	
}
</script>