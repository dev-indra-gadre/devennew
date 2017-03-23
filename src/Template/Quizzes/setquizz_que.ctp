
 <!-- Start menu tab -->
 <div id="quiz_question">

<div class="row-fluid" >

  <div style="margin-left:6%;">
  <style>
  .btn-primary{ background-color: #49afcd;
    background-image: linear-gradient(to bottom, #5bc0de, #2f96b4);}
  .btn:hover{ background-color: #49afcd;}
  .queradio{  margin-top: -22px;
  margin-left: 18px;}
    </style>

      <?php //debug($quiz_question_attempt); 
    //  exit;
        $quiz_question_attempt =$quiz_question_attempt['quizz_questions'];
      // echo "<pre>"; print_r($quiz_question_attempt);
    //   echo "<pre>"; print_r($question['Quiz']['quiz_time']);
    echo $this->Form->create('Quiz',array('id'=>'apperQuiz')); ?>
     
    </div>
</div>
 <!-- End menu tab -->
<div style="height:33px;">
<div align="right" id="timeInterval" style="margin-right:3.5%;"></div>
</div>
<div id="panel1_content">
<div class="row-fluid" style="">

<div class="span11 add-contact-box" style="margin-left:5.5%;">
     <h5 style="padding-left:0px;"><?php $question =$question->toArray();

       echo $question['question']['name']; ?></h5>
     <div  align="right"><?php  echo $question['question']['mark'].'&nbsp; mark'; ?></div>
    </div>
     <div style="height:78px;"></div>  
    <div class="span11 add-contact-box" style="margin-left:5.5%;">
         
 <table width="82%" border="0" cellspacing="0" cellpadding="0">
    <?php 

 $quiztimedate = $this->request->session()->read('form.params.quiztime');

$radio_options = array();
$i=1;

debug($question);
foreach($question['question']['options'] as $option){

	$radio_options[$option['id']] = $option['name'];
	$attributes = array();
if($question['option_id']){
	$attributes['value'] = $question['option_id'];	
}
if($question['option_id']==$option['id']){
    $checked=1;
   } else{ $checked=0; }
if($i%2==1){ ?><tr><td width="" valign="top"> <?php 
//echo $question['Quiz']['QuizQuestion'][0]['option_id'].'=='.$option['id'];
	//echo $this->Form->radio('options',array($option['id']=>$option['name'])); ?>

<input type="radio"<?php  if($checked==1){ ?>checked="checked" <?php } ?> name="data[Quiz][options]" class="input-xlarge" style="height:25px;" value="<?php echo $option['id']; ?>"> &nbsp;&nbsp;<div class="queradio"><?php echo $option['name']; ?></div>
</td> <?php } else{?><td width="" valign="top">
<?php 
//echo $question['Quiz']['QuizQuestion'][0]['option_id'].'=='.$option['id'];
	//echo $this->Form->radio('options',array($option['id']=>$option['name'])); ?>
	<input type="radio" <?php  if($checked==1){ ?>checked="checked" <?php } ?> name="data[Quiz][options]" class="input-xlarge" style="height:25px;" value="<?php echo $option['id']; ?>"> &nbsp;&nbsp;<div class="queradio"><?php echo $option['name']; ?></div></td></tr><?php } 

$i++;
}
?> </table>
<input type="hidden" name="data[Quiz][elapsedTime]" id="elapsedTime">

    <div style="height:20px;"></div>  


    </div>
     <div style="height:93px;"></div>  
     <div class="span11 add-contact-box" style="margin-left:5.5%;">

<?php 

  if($question['position'] != 1){   
    echo '<div class="span2">'.$this->Form->submit('Previous',array('name' => 'previous','class' => 'btn btn-info')).'</div>';
  }
   echo '<div class="span2">';
  if($question['total_questions'] > $question['position']){     
     echo $this->Form->submit('Next',array('name' => 'next','class' => 'btn btn-info'));    
    }else{
      echo $this->Form->submit('Submit',array('name' => 'submit_quiz','class' => 'btn btn-info'));
    }
  echo '</div>';
?>
 <?php $this->Form->end(); ?>
 </div>
 <div style="height:93px;"></div>  
     <div class="span11 add-contact-box" style="margin-left:5.5%;">

 <?php
//  debug($quiz_question_attempt);
// debug($question);
  foreach($quiz_question_attempt as $result){

  if($question['position']!=$result['position']){
 if(!empty($result['option_id'])){ ?>
  
  <?php echo $this->Html->link($result['position'], ['controller' => $this->request->controller, 'action' => 'setquizz_que',$result['position']], ['class'=>'btn btn-success btn-mini']);?>
  <?php 
}else{

echo $this->Html->link($result['position'], ['controller' => $this->request->controller, 'action' => 'setquizz_que',$result['position']], ['class'=>'btn btn-default btn-sm btn-danger toolTip btn-mini']);
 }
 
 }else
 {

  echo $this->Html->link($result['position'], ['controller' => $this->request->controller, 'action' => 'setquizz_que',$result['position']], ['class'=>'btn btn-default btn-sm btn-warning toolTip btn-mini']);
 }


}
?>
</div>
   
</div>
</div>

</div> <!-- panel 1 content end -->
    <div id="abc"></div>
    </div>

  




<script>
// Set the date we're counting down to
 var now = new Date();
 var countDownDate = new Date("<?php echo $quiztimedate['date']; ?>");
 var min=<?php echo $quiztimedate['min']; ?>;
 var countDownDate = countDownDate.setMinutes(countDownDate.getMinutes() + min);
 // Update the count down every 1 second
 var x = setInterval(function() {
 // Get todays date and time
 var now = new Date().getTime();
 // Find the distance between now an the count down date
 var distance =countDownDate - now;
 // Time calculations for days, hours, minutes and seconds
 var days = Math.floor(distance / (1000 * 60 * 60 * 24));
 var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
 var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
 var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Output the result in an element with id="timeInterval"
 document.getElementById("timeInterval").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    var elapsedTime = minutes+'.'+seconds;
    document.getElementById("elapsedTime").setAttribute("value", elapsedTime);
    // If the count down is over, write some text 
  if (distance < 0) {

    	var quiz_id=<?php echo $question['quiz_id']; ?>;
      var elapsedTime = <?php echo $question['Quiz']['quiz_time']; ?>
      
    $.ajax({
        type:'POST',
        async: true,
        cache: false,
          url:"ajax_result",
        
        success: function(response) {
        	  $('#quiz_question').css('display','none');
        
         $('#abc').html(response);
          },  
        data: ({quiz_id: quiz_id,elapsedTime,elapsedTime})
    });


    	
        clearInterval(x);
        document.getElementById("timeInterval").innerHTML = "EXPIRED";
    }
}, 1000);
</script>