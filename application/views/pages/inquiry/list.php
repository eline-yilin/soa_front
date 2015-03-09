<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.2.0/ZeroClipboard.js"></script>
<div id="inquiry_content" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Choose content</h4>
            </div>
            <div class="modal-body">
               <div>Choose greeting</div>
               <div id='greeting-list'></div>
                <div>Choose questions</div>
               <div id='question-list'></div>
               <div>Choose ending</div>
               <div id='ending-list'></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"onclick='javascript:generateTemplate();'><i class="icon-white icon-hand-right"></i> <?php echo $this->lang->line('submit'); ?></button>
            </div>
        </div>
    </div>
</div>
                              
<div id="template_content" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Template content</h4>
            </div>
            <div class="modal-body">
              
               <div id='template-content'></div>
              
            </div>
            <div class="modal-footer">
            
            	<button id='copy-button' type="button" class="btn btn-primary"><i class="icon-white icon-hand-right"></i> <?php echo $this->lang->line('copy'); ?></button>
                <button id='copy-button_text' type="button" class="btn btn-primary hidden"><i class="icon-white icon-hand-right"></i> <?php echo $this->lang->line('copyword'); ?></button>
               
                <a href='mailto:clientemail?subject=query'><button type="button" class="btn btn-primary" ><i class="icon-white icon-hand-right"></i> <?php echo $this->lang->line('sendemail'); ?></button></a>
           		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
               
<div class="container-fluid">
	    <div class='product-list'>
	    <?php 
	    if(isset($error)){
	    	//var_dump($error);
	    }
	    else{
	    	
	    	
$html = '
 <div class="list-item ">' .  $this->lang->line('choose') .  $this->lang->line('product_type')

.'</div>' .
    		'<div class="list-item ">' .  $this->lang->line('choose') .  $this->lang->line('product_type')

.'</div>'
 		. '  <div class="list-item panel panel-warning">
	       		<div class="panel-body">';
	
	    	
	    foreach($items as $product):?>   
				   <?php  $html .= '<div><label><input type="radio" name="product_type" id="type_' . 
						   $product['id']
				   .'"  onclick="javascript: showContent(' .  $product['id'] . ')" />' .  $product['name'] . '</label></div>';?>
	       <?php endforeach;}
	       $html .= '</div>
	       </div>';
	       echo $html;
	       ?>
	      
	    </div>
   		
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
function showContent(id){
	$.ajax({
		url: "ajax",
		type: "POST",
		data: { 'url':'inquiry/detail/id/' + id + '/format/json' ,
			'method': 'get'},
		dataType: "json"
		}).done(function(data){
			$('#question-list').html('');
			$('#greeting-list').html('');
			$('#ending-list').html('');
			if(!data)
				return false;
			var questions =  data.questions;
			var greetings =  data.greetings;
			var endings =  data.endings;
			if(questions)
			{
				$.each(questions,function(index,value){
					var question = value['question'];
					var qid = value['id'];
					$('#question-list').append('<div><label><input type="checkbox" value="' + question + '" class="question_id" name="question_id_' + qid + '" id="question_' + 
							qid
					   + '"  />' + question +  '</label></div>');
					})
					
			}
			if(greetings)
			{
				$.each(greetings,function(index,value){
					var greeting = value['content'];
					var gid = value['id'];
					$('#greeting-list').append('<div><label><input type="radio" value="' + greeting + '" class="greeting_id" name="greeting_id" id="greeting_' + 
							gid
					   + '"  />' + greeting +  '</label></div>');
					})
					
			}
			if(endings)
			{
				$.each(endings,function(index,value){
					var content = value['content'];
					var id = value['id'];
					$('#ending-list').append('<div><label><input type="radio" value="' + content + '" class="ending_id" name="ending_id" id="ending_' + 
							id
					   + '"  />' + content +  '</label></div>');
					})
					
			}
			$("#inquiry_content").modal('show');
		});	
		
	
}

function generateTemplate(){
	var rows = 5;
var greeting = $('input.greeting_id:checked').val();
var newline = '<br>';
if(greeting && typeof greeting != undefined)
{
	rows++;
	greeting +=newline;
}
else
{
	greeting = '';
}
var questions = '<ul style="font-weight:bold;">';
$('input.question_id:checked').each(function(){
	
	var value = $(this).val();
	if(value){
		rows++;
		questions +=  '<li>' + value + '</li>';
	}
});
questions += '</ul>';

var endings =  newline;
$('input.ending_id:checked').each(function(){
	
	var value = $(this).val();
	if(value){
		rows++;
		endings +=  ' ' + value + '';
	}
});
var html = '' + greeting  + questions + endings;
$('#template-content').html(html);
//.attr('rows',rows);
 $('#inquiry_content').modal('hide');
$("#template_content").modal('show');
}

	
	ZeroClipboard.config( { swfPath: "<?php echo $this->config->item( 'base_theme_url');?>js/ZeroClipboard.swf" } );
	var client_text = new ZeroClipboard( document.getElementById("copy-button_text"));
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

	client_text.on( "ready", function( readyEvent ) {
		   //alert( "ZeroClipboard SWF is ready!" );

			client_text.on( 'copy', function(event) {
				alert('Copied text to clipboard');
		          event.clipboardData.setData('text/plain', $('#template-content').html());
		          //client.setRichText("application/rtf" , $('#template-content').html());
		        } );
		} );
	       </script>