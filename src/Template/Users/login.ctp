
<style>
.message{

	color:#FF0000;
}
</style>
<div id="loading"></div>
<div  id="page-content" class="col-sm-6 col-sm-offset-3">
   <?php //echo $this->Session->flash();?>
	<?php echo $this->Form->create('User',['url'=>['controller'=> 'users','action'=>'login'],'id'=>'LoginForm']); ?>
	  <?php //echo $this->Form->create('User',['controller'=> 'users','action'=>'login']); ?>
	    <fieldset>
	    	<div class="form-group">
				<?php echo $this->Form->label('email', 'Email Id');?>
				 <?php
                            echo $this->Form->input('username',['class' => 'form-control','placeholder' => 'Username','label' => false]);
                        ?>
	
			</div><!-- .form-group -->

			<div class="form-group">
				<?php echo $this->Form->label('password', 'Password');?>
				<?php echo $this->Form->input('password',['class' => 'form-control','placeholder' => 'Password','label' => false]); ?>
				
			</div><!-- .form-group -->
<div style="width:20px;"></div>
			<div>
				<?php echo $this->Html->link('Forgot password? Click here',array('controller'=>'customers','action'=>'forget')); ?>
					
			</div>
			<div>
				<?php echo $this->Html->link('Sign Up',array('controller'=>'customers','action'=>'registration')); ?>
					
			</div> 
			

	    </fieldset>
	   <div class="form-actions" width="100%">
     <input  type="submit" value="Login" class = "btn btn-info"></input>
	<?php //echo $this->Form->submit('Login',['div'=>false,'class'=>'btn btn-info']); ?>
	 <input  type="reset" value="Reset" class = "btn btn-danger btn-primary"></input>
	<?php //echo $this->Form->submit('Reset',['div'=>false,'class'=>'btn btn-info','type'=>'reset','class'=>'btn btn-danger btn-primary']); ?>
	

	<?php //echo $this->Html->link('Reset', array('action'=>'login'),array('style' => 'btn btn-danger btn-primary','class'=>'')); ?>
	
	</div>
	    <br />
	<?php echo $this->Form->end(); ?>
</div>

<script>
$(document).ready(function(){
    $("#LoginForm").on('submit', function(){

 $.ajax({
       
         beforeSend: function() { 
         
        window.setTimeout(function() {
           
                 $("#page-content").css('display','none'); 
                $("#loading").html('<div class="loadlogin" style="position: absolute; index-z: 9999;margin-left: 450px;margin-top: 60px;" align="center" ><?php echo $this->Html->image('load2.gif', array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'img/load2.gif')); ?></div>');
             $(".loadlogin").fadeIn("slow");

           
              }, 9000);
        },
   
        
        });
      

    });
    });
</script>