
               
<div class="container-fluid">
	    <div class='product-list'>
	    <?php 
	    if(isset($error)):
	    	var_dump($error);
	    
	    else:?>
	    
	    	<div class = 'row'>
			     <?php foreach($items as $item):?>
			      		<div class=" col-md-3 col-sm-4 col-xs-6 link-item">
							<a href = '<?php echo $item["content"];?>'  class="btn btn-success btn-mini"><i class="icon-white icon-hand-right"></i> <?php echo $item['name']; ?> </a>  		
						</div>
			       
			       <?php endforeach;?> 
			       
	       </div><!-- end row -->
	    <?php endif;?>	

	      
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
		data: { 'url':'<?php echo $router;?>/detail/id/' + id + '/format/json' ,
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
					$('#ending-list').append('<div><label><input type="checkbox" value="' + content + '" class="ending_id" name="ending_id" id="ending_' + 
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