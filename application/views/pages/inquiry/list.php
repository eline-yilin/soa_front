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
   
   		<div class='product-list' id='question-container' style='display:none'>
   		<div>Inquiry</div>
   		<div id='question-list'></div>
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
			if(!data)
				return false;
			var questions = data['questions'];
			questions = data.questions;
			if(questions)
			{
				$.each(questions,function(index,value){
					var question = value['question'];
					var qid = value['id'];
					$('#question-list').append('<div><label><input type="radio" name="question_id" id="question_' + 
							qid
					   + '"  />' + question +  '</label></div>');
					})
					$('#question-container').fadeIn();
			}
		});
			
	
}
	       </script>