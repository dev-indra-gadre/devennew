<!-- File: /app/View/Posts/add.ctp -->

<h1><!-- Generate Quiz --></h1>
<?php
  ?>

  

 
 <!-- Start menu tab -->

<div class="row-fluid" >

  <div style="margin-left:6%;">
  <style>
  .btn-primary{ background-color: #49afcd;
    background-image: linear-gradient(to bottom, #5bc0de, #2f96b4);}
  .btn:hover{ background-color: #49afcd;}
  .queradio{  margin-top: -22px;
  margin-left: 18px;}
  .questionselect{
  	width:100%;
  }
   .questionselecttbl{
    width:36% !important;
  }
    </style>
     <h3 style="padding-left:40px;">Generate Quiz</h3>
    </div>
</div>
 <!-- End menu tab -->


<div id="panel1_content">
<div class="row-fluid" style="">
    <div class="span11 add-contact-box" style="margin-left:5.5%;">
         


        <?php 
    echo $this->Form->create('Quiz',array('id'=>'addQuiz'), array('url'=>array('controller'=>'Quizzes', 'action'=>'generate'))); ?>

        <table width="82%" border="0" cellspacing="0" cellpadding="0">
    
 <tr>
     <td width="70%" valign="top">
     Quiz Name<span style="color:red">*</span>
     <?php echo $this->Form->input('quiz_name', ['class'=>'input-xlarge','label'=>false,'id'=>'quiz_name','div'=>false, 'error'=>false, 'style'=>'width:220px;','required'=>'required']); ?>
       </td>
      <td  valign="top"> 
      Quiz Time( in minute)<span style="color:red">*</span>
      <?php
       
       echo $this->Form->input('quiz_time', ['class'=>'input-xlarge','type'=>'text','label'=>false,'id'=>'quiz_time','div'=>false, 'error'=>false, 'style'=>'width:220px;','required'=>'required']); ?>

      </td> </tr>
      <tr>
     <td colspan="2" width="" valign="top">
     <div style="display:none;">
      <?php  echo $this->Form->input('candidate', ['class'=>'input-xlarge','label'=>'Candidate <span style="color:red">*</span>','id'=>'candidate_id','empty'=>'-- Select --','options'=>$candidates,'name'=>'data[Quiz][candidate_id]','value'=>5,'div'=>false, 'error'=>false, 'style'=>'width:220px;']); ?></div>
      <div style="display:block;">

       Candidates<span style="color:red">*</span><br>
      
      <?php 
//       $i=0;
//      foreach ($candidates as $key=>$result){
// 	 echo $this->Form->input('candidate'.$i,array('class'=>'input-xlarge','type'=>'checkbox','label'=>$result,'name'=>'data[Quiz][Candidate]['.$i.'][candidate_id]', 'id'=>'check'.$i,'value'=>$key));
// $i++;
//     } ?> </div>
       </td>
       </tr>
       <tr><td colspan="2">

     <!--   <div style="width:50%;float:right;" class="row"> -->
    <div class="col-md-12">
    <div class="widget wred">
    <!-- Enquiry1 start -->
         <!-- Parameter table start -->

                   <table  style="padding-top:2px;" width="50%" class="table table-bordered table-hover table-striped table-striped-warning ">
        <thead>
             
        <th class="info" align="center"></th>
       
        <th class="info">List Of Candidates</th>
        </thead>
            <tbody>
             <?php 
      $i=0;
     foreach ($candidates as $key=>$result){ ?>
            <tr>
           <td style="text-align:center;" ><?php echo $i+1; ?></td>
            <td style="text-align:left;">
              
          <?php  echo $this->Form->input('candidate'.$i,array('class'=>'input-xlarge','type'=>'checkbox','label'=>$result,'name'=>'data[Quiz][Candidate]['.$i.'][candidate_id]', 'id'=>'check'.$i,'value'=>$key));
$i++; //echo $result;  ?>
            </td> 
           <!--  <td align="left"><?php //echo $result; ?></td> -->
            </tr> <?php  } ?>
            </tbody>
            </table>
            </div></div>
         <!--    </div>
 -->
       </td>
       </tr>
       <tr>
 
    <td width="" valign="top"> 
    <div class="questionselect">
      <input type="radio" checked="checked"  name="data[Quiz][question_selection]" id="question_selection_random" class="input-xlarge" style="height:25px;" value="random"> Number Of Questions
      &nbsp;&nbsp;<input type="radio"   name="data[Quiz][question_selection]" id="question_selection_specified" class="input-xlarge" style="height:25px;" value="specified"> Specified Questions
     </div>
      </td>
       <td>

     
       </td>
       </tr>

       <tr class="table table-bordered table-hover table-striped table-striped-warning">
     <td  width="" valign="top">
      <div id="randomQue">
      Questions <span style="color:red">*</span>
 <?php  echo $this->Form->input('totalQuestion', array('class'=>'input-xlarge','name'=>'data[Quiz][total_questions]','label'=>false,'id'=>'total_questions','empty'=>'-- Select --','options'=>$questions,'div'=>false, 'error'=>false, 'style'=>'width:220px;')); ?>
 </div>
     <div id="specifiedQue">

       Question List<span style="color:red">*</span><br>
      
      <?php 
      $i=11;
     foreach ($question_list as $key=>$result){
	 echo $this->Form->input('question'.$i,array('class'=>'input-xlarge','type'=>'checkbox','label'=>$result,'name'=>'data[Quiz][Question]['.$i.'][question_id]', 'id'=>'check'.$i,'value'=>$key));
$i++;
    } ?> </div>
   

      </td>
      <td width="" valign="top">  <script>
       $(document).ready(function(){
         //('#randomQue').setAttribute("style","display:block;");
         document.getElementById("randomQue").style.display = "block";
         document.getElementById("specifiedQue").style.display = "none";
        //$('#specifiedQue').setAttribute("style","display:none;");
        	$("#question_selection_random").click(function(){
    var value = $('#question_selection_random').val();
         document.getElementById("randomQue").style.display = "block";
         document.getElementById("specifiedQue").style.display = "none";
  // alert(value);
});	
       	$("#question_selection_specified").click(function(){
    var value = $('#question_selection_specified').val();
         document.getElementById("randomQue").style.display = "none";
         document.getElementById("specifiedQue").style.display = "block";
 //  alert(value);
});

       });
       </script> </td> 
      </tr>
   

        </table>

        <div class="form-actions" style="margin-left:-150px;">
            <input value="Generate Quiz"  class="btn btn-info" type="submit" id="ApproveSubmit" name="ApproveSubmit">
            &nbsp;
        
        </div>

        <?php $this->Form->end(); ?>
    </div>
    <div style="height:20px;"></div> 
</div>
</div>

</div> <!-- panel 1 content end -->
    </div>

