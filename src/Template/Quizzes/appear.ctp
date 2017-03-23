<h1>Appear for Quiz</h1>
<?php
	echo $this->Form->create(false);	
	echo $this->Form->input('code',['label'=>'Enter code:']);	
	$options = array(
      'label' => 'Start Quiz',
      'class' => 'btn btn-large'        
  ); 
  ?>
  <input value="Start Quiz"  class="btn btn-info" type="submit" id="ApproveSubmit" name="ApproveSubmit">
  <?php 
  echo $this->Form->end($options); ?>