<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.2.0/ZeroClipboard.js"></script>
 <div id="template_content" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cost Details</h4>
            </div>
            <div class="modal-body">
              
               <div id='template-content' style='height:85%;'></div>
              
            </div>
            <div class="modal-footer">
            
            	<button id='copy-button' type="button" class="btn btn-primary"><i class="icon-white icon-hand-right"></i> <?php echo $this->lang->line('copy'); ?></button>
                <button id='copy-button_text' type="button" class="btn btn-primary hidden"><i class="icon-white icon-hand-right"></i> <?php echo $this->lang->line('copyword'); ?></button>
               	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>            
<div class="container-fluid">
	    <div class='product-list'>
	    <?php 
	    if(isset($error)):?>
	    <?php else:?>
			<div class="list-item ">  <?php echo $this->lang->line('please') ,  $this->lang->line('select') , $this->lang->line($router . '_name');  ?> </div>
			 	<div class="list-item panel panel-warning">
				      <div class="panel-body">
				         	<div class="form-group">
					         	 <label class="control-label" for="agent"><?php echo $this->lang->line('site');?> </label>
					             <select class="form-control required"  name= "agent" id="agent">
										<option><?php echo $this->lang->line('please') ,  $this->lang->line('select') ;?></option>
										<?php foreach($items as $product):?>   
											  <option value="<?php echo $product['id'] ; ?>">
													<?php echo $product['name'];?>
											 </option>
								       <?php endforeach;?>
						      	</select>
					      </div><!-- close agent -->
					      <div class="form-group">
					         	 <label class="control-label" for="agent"><?php echo $this->lang->line('vendor');?>  </label>
					             <select class="form-control required"  name= "client" id="client">
										<option><?php echo $this->lang->line('please') ,  $this->lang->line('select') ;?></option>
						      	</select>
					      </div><!-- close client -->
				     </div>
			  	</div>
			  	
		  </div>
		<?php endif;?>

	    </div>
   		
	</div>
	

<script>
(function($) {
	  var proto = $.fn.modal.Constructor.prototype;
	  // Aggregious hack
	  proto.enforceFocus = function () {
	    var that = this;
	    $(document).on('focusin.modal', function (e) {
	      if (that.$element[0] !== e.target &&
	          !that.$element.has(e.target).length &&
	          !$(e.target).closest('.global-zeroclipboard-container').length) {
	        that.$element.focus();
	      }
	    });
	  };
	})(window.jQuery);  
$(document).ready(function(){
	$('#agent').change(function(){
			var id = $(this).val();
			showClient(id);
		});
	$('#client').change(function(){
		var id = $(this).val();
		showContent(id);
	});
	$('#template_content').on('show.bs.modal', function () {
 	   
   	    $('.modal .modal-body').css('overflow-y', 'auto'); 
   	    $('.modal .modal-body').css('max-height', $(window).height() *0.7);
   	 	$('.modal .modal-body').css('height', $(window).height() *0.7);
   	 	
   	});
});	
var content_arr = {};
function showClient(id){
	$.ajax({
		async:false,
		url: "ajax",
		type: "POST",
		data: { 'url': '<?php echo $router;?>/detail/id/' + id + '/format/json' ,
			'method': 'get'},
		dataType: "json"
		}).done(function(data){
			if(!data)
				return false;
			var html = '<option><?php echo $this->lang->line('please') ,  $this->lang->line('select') ;?></option>';
			$.each(data['clients'],function(index,item){
				html += "<option value='" + item['id'] + "'>" + item['name'] + "</option>";
				});
			$('#client').html(html);
			content_arr = data['clients'];
			});
}  
function showContent(id){
	$.each(content_arr,function(index,item){
			if(item['id'] == id)
			{
				$('#template-content').html('<pre>' + item['content'] + '</pre>');
				$("#template_content").modal('show');
				return false;
			}
		});
			
	
}



	
	ZeroClipboard.config( { swfPath: "<?php echo $this->config->item( 'base_theme_url');?>js/ZeroClipboard.swf" } );
	//var client_text = new ZeroClipboard( document.getElementById("copy-button_text_out"));
	var client = new ZeroClipboard( document.getElementById("copy-button"),{
		//swfPath: "https://cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.2.0/ZeroClipboard.swf" 
		} );

	client.on( "ready", function( readyEvent ) {
	   //alert( "ZeroClipboard SWF is ready!" );

		client.on( 'copy', function(event) {
			alert('Copied text to clipboard');
			//alert('copying');
	          event.clipboardData.setData('text/html', $('#template-content').html());
	          //client.setRichText("application/rtf" , $('#template-content').html());
	        } );

	        client.on( 'aftercopy', function(event) {
		       // alert('Copied text to clipboard');
	          //console.log('Copied text to clipboard: ' + event.data['text/plain']);
	        } );
	} );

	/* client_text.on( "ready", function( readyEvent ) {
		   //alert( "ZeroClipboard SWF is ready!" );

			client_text.on( 'copy', function(event) {
				alert('Copied text to clipboard');
		          event.clipboardData.setData('text/plain', $('#content').val());
		          //client.setRichText("application/rtf" , $('#template-content').html());
		        } );
		} ); */
	       </script>

	       