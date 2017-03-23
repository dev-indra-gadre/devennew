

 
 <!-- Start menu tab -->

<div class="row-fluid" >

  <div style="margin-left:6%;">
  <style>
  .btn-primary{ background-color: #49afcd;
    background-image: linear-gradient(to bottom, #5bc0de, #2f96b4);}
  .btn:hover{ background-color: #49afcd;}

.load {
 /* position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;*/
  z-index: 9999;
  background: url(/devencake2/img/load.gif) center no-repeat #fff;
}






    </style>
     <h3 style="padding-left:40px;">Update Question</h3>
    </div>
</div>
 <!-- End menu tab -->


<div id="panel1_content">
<div class="row-fluid" style="">
    <div class="span11 add-contact-box" style="margin-left:5.5%;">
         
<?php echo $this->Form->create('Question',['id'=>'UpdateQuestion']); ?>
  <table width="60%" border="0" cellspacing="0" cellpadding="0">
    
 <tr>
     <td width="" valign="top">
     Question <span style="color:red">*</span>
     <?php echo $this->Form->input('name', ['class'=>'input-xlarge','label'=>false,'id'=>'question_name','div'=>false, 'error'=>false, 'style'=>'width:220px;']); ?>
     <?php

 //debug($this->request->data);
      echo $this->Form->hidden('id', ['class'=>'input-xlarge','label'=>false,'id'=>'QuestionId','div'=>false,'value'=>$this->request->data['id'], 'error'=>false, 'style'=>'width:220px;']); ?>
       </td>
      <td width="" valign="top"> 
     
      </td> </tr>

      <tr>
     <td width="" valign="top">
     Number Of options <span style="color:red">*</span>
     
     <?php
         $number_of_option =array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,'10'=>10);
      echo $this->Form->input('number_of_option', ['class'=>'input-xlarge','label'=>false,'id'=>'OptionNumber','empty'=>'-- Select --','options'=>$number_of_option,'div'=>false, 'error'=>false,'required'=>'required', 'style'=>'width:220px;']); ?>
      </td>
      <td width="" valign="top">
      </td>
      </tr>


<table  style="padding-top:2px;width:100%;" class="table table-bordered table-hover table-striped table-striped-warning ">
        <thead>
             
        <th class="info" >Option Name</th>
        <th class="info">Mark</th>
       
        </thead>
         <div id="ParamBodyLoad"></div>
        <tbody id="ParamBody">
      </tbody>
</table>

<div id="abc"></div>


           <tr>
     <td width="" valign="top">
     <div id="correct_option_label">
     Answer <span style="color:red">*</span> </div>
     <?php
         $options =array('1'=>'Option 1','2'=>'Option 2','3'=>'Option 3','4'=>'Option 4');

          $optionsrequest =$this->request->data['Option'];
      //   debug( $this->request->data);
          $i=1;
          foreach($optionsrequest as $result){
            if($result['id']==$this->request->data['correct_option']){
              $this->request->data['correct_option'] =$i;
            }

          $optionslist[$result['id']]='Option '.$i;
          $i++;
          }
      echo $this->Form->input('correct_option', ['class'=>'input-xlarge','label'=>false,'id'=>'correct_option','empty'=>'-- Select --','options'=>$options,'div'=>false, 'error'=>false, 'style'=>'width:220px;']); ?>
       <?php
      

      echo $this->Form->hidden('hiddenvalue_correct_option', ['class'=>'input-xlarge','label'=>false,'id'=>'correct_option_hidden','div'=>false,'value'=>$this->request->data['correct_option'], 'error'=>false, 'style'=>'width:220px;']); ?>
      </td>
      <td width="" valign="top">
      </td>
      </tr>
   

        </table>





        <div class="form-actions" style="margin-left:-150px;">
            <input value="Save"  class="btn btn-info" type="submit" id="ApproveSubmit" name="ApproveSubmit">
            &nbsp;
      <!--   <input value="Reset"  class="btn btn-info" type="reset" id="ResetSubmit" name="ResetSubmit"> -->
      <?php echo $this->Html->link('Finish', ['controller' => $this->request->controller, 'action' => 'index'], ['style' => 'width:40px;','class'=>'btn btn-info']);?>
        </div>

        <?php $this->Form->end(); ?>
    </div>
    <div style="height:20px;"></div> 
</div>
</div>

</div> <!-- panel 1 content end -->
    </div>

<script>



$(document).ready(function(){


var OptionNumber = $("#OptionNumber").val();
         var QuestionId = $("#QuestionId").val();
        $.ajax({
        type:'POST',
       // url:"questions/ajax_option_dashboard",
        url: basePath+"ajax_option_dashboard",
         beforeSend: function() { 
         
        window.setTimeout(function() {
            $(".load").css('display','block');
           $('#correct_option').css('display','none');
           $('#correct_option_label').css('display','none');
             $('#ParamBodyLoad').html('<div class="vic" style="position: absolute; index-z: 9999;margin-left: 450px;margin-top: 45px;" align="center" ><?php echo $this->Html->image('load2.gif', array('alt' => 'CakePHP','style'=>'width:70px;height:70px;', 'border' => '0', 'data-src' => 'img/load2.gif')); ?></div>');

             $(".vic").fadeIn("slow");
              }, 1000);
      
         // return false;
           },
        success: function(response) {
            window.setTimeout(function() {
                // New content replaces the loading image
                  $(".vic").fadeOut("slow");
            $('#correct_option').css('display','block');
            $('#correct_option_label').css('display','block');
                $('#ParamBody').html(response);
            }, 5000);
        },
        data: ({ OptionNumber:OptionNumber,QuestionId:QuestionId })
        });

  $("#OptionNumber").on('change', function(){
        
        var OptionNumber = $("#OptionNumber").val();
         var QuestionId = $("#QuestionId").val();
        $.ajax({
        type:'POST',
         url: basePath+"ajax_option_dashboard",

         beforeSend: function() { 
         
        window.setTimeout(function() {
            $(".load").css('display','block');
             $('#correct_option').css('display','none');
            $('#correct_option_label').css('display','none');
            // $("#ParamBody").css('display','none');
                $('#ParamBodyLoad').html('<div class="vic" style="position: absolute; index-z: 9999;margin-left: 450px;margin-top: 60px;" align="center" ><?php echo $this->Html->image('load2.gif', array('alt' => 'CakePHP','style'=>'width:70px;height:70px;', 'border' => '0', 'data-src' => 'img/load2.gif')); ?></div>');
             $(".vic").fadeIn("slow");

            
              }, 1000);
     

           },
        success: function(response) {
            window.setTimeout(function() {
                // New content replaces the loading image
                 $(".vic").fadeOut("slow");
               $('#correct_option').css('display','block');
            $('#correct_option_label').css('display','block');
               
                $('#ParamBody').html(response);
            }, 5000);
        },
        data: ({ OptionNumber:OptionNumber,QuestionId:QuestionId })
        });
       // return false;   
    });

$("#UpdateQuestion").on('submit', function(){
 $.ajax({
       
         beforeSend: function() { 
         
        window.setTimeout(function() {
            $(".load").css('display','block');
             $('#correct_option').css('display','none');
            $('#correct_option_label').css('display','none');
            // $("#ParamBody").css('display','none');
                $('#ParamBodyLoad').html('<div class="vic" style="position: absolute; index-z: 9999;margin-left: 450px;margin-top: 60px;" align="center" ><?php echo $this->Html->image('load2.gif', array('alt' => 'CakePHP','style'=>'width:70px;height:70px;', 'border' => '0', 'data-src' => 'img/load2.gif')); ?></div>');
             $(".vic").fadeIn("slow");

            
              }, 1000);
        },
   
        
        });   
    });





      });

</script>