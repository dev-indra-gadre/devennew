
 
 <!-- Start menu tab -->

<div class="row-fluid" >

  <div style="margin-left:6%;">
  <style>
  .btn-primary{ background-color: #49afcd;
    background-image: linear-gradient(to bottom, #5bc0de, #2f96b4);}
  .btn:hover{ background-color: #49afcd;}
    </style>
     <h3 style="padding-left:40px;"><?php 
if(!$addedit)
    echo "Add User";


else
    echo "Edit User"; ?></h3>
    </div>
</div>
 <!-- End menu tab -->


<div id="panel1_content">
<div class="row-fluid" style="">
    <div class="span11 add-contact-box" style="margin-left:5.5%;">
         


        <?php 
    echo $this->Form->create('User',['id'=>'addUser'],['url'=>['controller'=>'Users', 'action'=>'edit']]); ?>

        <table width="82%" border="0" cellspacing="0" cellpadding="0">
     <tr>
     <td width="" valign="top">
     <?php
     if(!empty($addedit)){
   $required ='false';
   $star='';
     }else{
            $required ='required';
            $star='*';
     } 
        echo $this->Form->input('candidate_id',['class'=>'input-xlarge','label'=>'Candidate Name.<span style="color:red">*</span>','empty'=>'--- Select ---','options'=>$candidates,'required'=>'required']); ?>
       </td>
      <td width="" valign="top"> 

      </td> </tr>
 <tr>
     <td width="" valign="top">
     <?php echo $this->Form->input('username', ['class'=>'input-xlarge','label'=>'Name<span style="color:red">*</span>','id'=>'name','div'=>false, 'error'=>false, 'style'=>'width:220px;']); ?>
       </td>
      <td width="" valign="top"> 
      <?php echo $this->Form->input('password', ['class'=>'input-xlarge','type'=>'Password','label'=>'Password<span style="color:red">'.$star.'</span>','id'=>'password','div'=>false, 'error'=>false, 'style'=>'width:220px;','value'=>'','required'=>$required]); ?>

      </td> </tr>
     
   

        </table>

        <div class="form-actions" style="margin-left:-150px;">
            <input value="Save"  class="btn btn-info" type="submit" id="ApproveSubmit" name="ApproveSubmit">
            &nbsp;
        
        </div>

        <?php $this->Form->end(); ?>
    </div>
    <div style="height:20px;"></div> 
</div>
</div>

</div> <!-- panel 1 content end -->
    </div>

