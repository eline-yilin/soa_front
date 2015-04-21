<div class='center'>
<h2><?php echo $title;?><span style='font-size:0.6em;padding-left:1%;'><a href='../user/register'><?php echo $this->lang->line('register'); ?> >></a></<span></h2>

<?php echo validation_errors(); ?>
<?php if(isset($error)) var_dump($error);?>
<?php 
$attributes = array('class' => $router . '_' . $action , 'id' => $router . '_' . $action);
echo form_open("../$router/$action", $attributes);
 ?>

     <input type="hidden" id='_method' name="_method" value="CREATE">
	<input type='hidden' name='postback' value='1' />
	 
	<!-- Prod Info-->
    
    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="username"><?php echo $this->lang->line('username'); ?></label>
          <div class="controls">
            <input type="text"  class="input-xlarge required" name='username' id='username'  value=''>
          </div>
          <!-- category-->
		  <label class="control-label" for="phone"><?php echo $this->lang->line('password'); ?></label>
          <div class="controls ">
            <input type="password"  class="input-xlarge required" name='password' id='password' value=''>
          </div>

    <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button id='submit' class="btn btn-success"><i class="icon-white icon-hand-right"></i> <?php echo $this->lang->line('submit'); ?></button>
          </div>
        </div>
	</div>

</form>
</div>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>  
var validator_messages = {

        'username': {

            required: "<?php echo $this->lang->line('required_error') . $this->lang->line('username');?>"
        },
        'password': {

            required: "<?php echo $this->lang->line('required_error') . $this->lang->line('password');?>"
        }
};
       
       function validator_show_errors(errorMap,errorList, form){

    	   jQuery('label.ton-error').remove();
    	  
    	   for (var i in errorMap) {

    	       var rst = errorMap[i];

    	         console.log(i, ":", rst);

    	         var selector = i.replace(/\[/ig, '');

    	         selector = selector.replace(/\]/ig, '');

    	       

    	         switch (i)

    	         {    
    	               default:             
    	               $('#' + i).after('<label class="error my-error for_' + selector +  '">' + rst + '</label>');

    	                   break;

    	              }

    	   }

    	  }
       $(document).ready(function(){ 
    	   var add_validator = jQuery('#<?php echo $router . "_" . $action;?>').validate({

    	         ignore: "",

    	         onkeyup: false,//function(element) {},

    	         onfocusout: false,

    	         messages : validator_messages ,

    	         showErrors: function(errorMap, errorList)

    	         {           

    	          validator_show_errors(errorMap, errorList,'#<?php echo $router . "_" . $action;?>');            

    	         },

    	         submitHandler: function(form) {

    	             form.submit();

    	         },           

    	     });

       
           });
        </script>