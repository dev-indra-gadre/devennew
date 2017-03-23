<!-- <h1>Candidate's Name:<?php //echo $result['Candidate']['name']; ?></h1>

<p>Appeared On: <?php //echo $result['Quiz']['completed_date']; ?></p>

<p>Questions: <?php //echo $result['Quiz']['total_questions']; ?></p>
<p>Marks: <?php //echo $result['Quiz']['score']; ?></p> -->
<?php //echo "<pre>"; print_r($result); ?>


 <!-- Start menu tab -->
 <div>

<div class="row-fluid" >

  <div style="margin-left:6%;">
  <style>
  .btn-primary{ background-color: #49afcd;
    background-image: linear-gradient(to bottom, #5bc0de, #2f96b4);}
  .btn:hover{ background-color: #49afcd;}
  .queradio{  margin-top: -22px;
  margin-left: 18px;}
    </style>

    </div>
</div>
 <!-- End menu tab -->


<div id="panel1_content">
<div class="row-fluid" style="">
<div align="right" id="timeInterval" style="margin-right:3.5%;"></div>
<div class="span11 add-contact-box" style="margin-left:5.5%;">
     <h4 style="padding-left:391px;">Summary Of Exam Result</h4>
    </div>
     <div style="height:58px;"></div>  
    <div class="span11 add-contact-box" style="margin-left:5.5%;">
    <?php  //echo "<pre>"; print_r($result); exit; ?>
         
 <table width="82%" border="0" cellspacing="0" style="margin-left:226px;" cellpadding="0">
<tr><td width="" valign="top"> Exam Name</td> <td width="" valign="top"> <?php
$result=$result->toArray();
debug($result); exit;
 echo $result['Quiz']['quiz_name']; ?> &nbsp</td></tr>
<tr><td width="" valign="top"> Candidate Name</td> <td width="" valign="top"> <?php echo $candidates[$result['QuizCandidate'][0]['candidate_id']]; ?></td></tr>
<tr><td width="" valign="top"> Maximum Time</td> <td width="" valign="top"> <?php echo $result['Quiz']['quiz_time']; ?> &nbsp; MIN</td></tr>
<!-- <tr><td width="" valign="top"> Start Time</td> <td width="" valign="top"> Geography Exam</td></tr>
<tr><td width="" valign="top"> End Time</td> <td width="" valign="top"> Geography Exam</td></tr> -->
<tr><td width="" valign="top"> Elapsed Time</td> <td width="" valign="top"> <?php echo $result['QuizCandidate'][0]['elapsedTime']; ?>&nbsp; MIN</td></tr>
 </table>

    <div style="height:20px;"></div>  


    </div>
     <div style="height:93px;"></div>  
     <div class="span11 add-contact-box" style="margin-left:5.5%;">


<div style="width:100%;float:right;" class="row">
    <div class="col-md-12">
    <div class="widget wred">
    <!-- Enquiry1 start -->
         <!-- Parameter table start -->
                   <table  style="padding-top:2px;" class="table table-bordered table-hover table-striped table-striped-warning ">
        <thead>
        <th class="info" align="center"></th>
        <th class="info">Question</th>
         <th class="info">Mark</th>
        <th class="info">Candidate's Answer</th>
       
       <!--  <th class="info">Address</th> -->
        <th class="info">Correct Answer</th>
         
          <th class="info">Score</th> 
        </thead>
            <tbody>
          <?php if (count($result['QuizQuestion']) == 0) { ?>
            <tr>
                <td height="1" colspan="6" style="color:#FF0000;" align="center">
                    <b>No Record Found</b>
                </td>
            </tr>
            <?php } else {

   $srNo=1;
         foreach($result['QuizQuestion'] as $key=>$result){?>

       
            <tr>
            <td><?php echo $srNo; ?></td>
            <td><?php echo $result['Question']['name']; ?></td>
              <td><?php echo $result['Question']['mark']; ?></td>
             <?php 
            	if(isset($result['Option']['id'])): 
            		$color = ($result['Question']['CorrectOption']['id'] == $result['Option']['id']) ? 'green' : 'red'; 
            	else: $color = 'black';
            	endif;
            ?>  
            <td><font color=<?php echo $color; ?>><?php if(!empty($result['Option']['name'])){ echo $result['Option']['name'];} else{ ?> Not Attempt <?php } ?></font></td>
            <td><?php echo $result['Question']['CorrectOption']['name']; ?></td>
            <?php 
            	if(isset($result['Option']['id'])): 
            		$score = ($result['Question']['CorrectOption']['id'] == $result['Option']['id']) ? $result['Question']['mark'] : 0; 
            	else: $score = 0;
            	endif;
            ?>  
            <td><?php echo $score; ?></td>
            
            
            </tr>
            <?php $srNo++; } }?>
            </tbody>
            </table>
         <!-- Parameter table end -->
                    
    
   </div>
    </div>
    </div>















 </div>
</div>
</div>

</div> <!-- panel 1 content end -->
    
    </div>

  



