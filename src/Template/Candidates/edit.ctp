
 
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
    echo "Add Candidate";
else
    echo "Edit Candidate"; ?></h3>
    </div>
</div>
 <!-- End menu tab -->


<div id="panel1_content">
<div class="row-fluid" style="">
    <div class="span11 add-contact-box" style="margin-left:5.5%;">
   
<?php $concat_url='';
    if(!empty($this->request->data['id'])){ $concat_url='/'.$this->request->data['id'];}
 echo $this->Form->create('Candidates',['url'=>['controller'=>'Candidates','action'=>'edit'.$concat_url],'id'=>'addCandidate']); ?>

        <table width="82%" border="0" cellspacing="0" cellpadding="0">
    
 <tr>
     <td width="" valign="top">
     Name<span style="color:red">*</span>
     <?php echo $this->Form->input('name', ['class'=>'input-xlarge','label'=>false,'id'=>'name','div'=>false, 'error'=>false, 'style'=>'width:220px;']); ?>
       </td>
      <td width="" valign="top"> 
      Email<span style="color:red">*</span>
      <?php echo $this->Form->input('email', ['class'=>'input-xlarge','type'=>'email','label'=>false,'id'=>'email','div'=>false, 'error'=>false, 'style'=>'width:220px;']); ?>

      </td> </tr>
      <tr>
     <td width="" valign="top">
     Address<span style="color:red"></span>
     <?php echo $this->Form->input('address', ['class'=>'input-xlarge','type'=>'textarea','rows'=>2,'label'=>false,'id'=>'address','div'=>false, 'error'=>false, 'style'=>'width:220px;']); ?>
       </td>
      <td width="" valign="top"> 

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

