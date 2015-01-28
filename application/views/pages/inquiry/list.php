<div class="container-fluid">
	    <div class='product-list'>
	    <?php 
	    if(isset($error)){
	    	//var_dump($error);
	    }
	    else{
	    	
	    	
$html = '<div class="list-item ">' . $this->lang->line('createinquiry') .
	    		
'</div>
 <div class="list-item ">' .  $this->lang->line('choose') .  $this->lang->line('product_type')

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
   
   		<div class='product-list' id='greeting-container' style='display:none'>
   			<div>Greeting</div>
   			<div id='greeting-list'></div>
   		</div>
   		
   		<div class='product-list' id='question-container' style='display:none'>
   			<div>Inquiry</div>
   			<div id='question-list'></div>
   		</div>
   		
   		<div class='product-list' id='template-container' style='display:none'>
   			<div>Template</div>
   			<textarea  cols='60' rows='20' id='template-content'></textarea>
   		</div>
   		
   		<div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button id='submit' type='button' class="btn btn-success" onclick='javascript:generateTemplate();'><i class="icon-white icon-hand-right"></i> <?php echo $this->lang->line('submit'); ?></button>
          </div>
        </div>
	</div>
	
    </div>
<script>
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
			if(!data)
				return false;
			var questions =  data.questions;
			var greetings =  data.greetings;
			if(questions)
			{
				$.each(questions,function(index,value){
					var question = value['question'];
					var qid = value['id'];
					$('#question-list').append('<div><label><input type="checkbox" value="' + question + '" class="question_id" name="question_id_' + qid + '" id="question_' + 
							qid
					   + '"  />' + question +  '</label></div>');
					})
					$('#question-container').fadeIn();
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
					$('#greeting-container').fadeIn();
			}
		});	
		
	
}

function generateTemplate(){
var greeting = $('input.greeting_id:checked').val();
var questions = '';
$('input.question_id:checked').each(function(){
	questions +=  $(this).val() + '&#13';
});
var html = '' + greeting + '&#13' + questions ;
$('#template-content').html(html);
$('#template-container').fadeIn();
}
	       </script>