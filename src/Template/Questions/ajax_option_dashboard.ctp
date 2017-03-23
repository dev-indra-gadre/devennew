
  <?php
   $ii=1;
  foreach($OptionNumberArrayResponse as $key=>$result){  
?>
<span id="opt<?php echo $ii; ?>" class="opt">
 <tr>
<td width="" valign="top"> 
<!-- <div class="optionClasslabel" id="optionClasslabel<?php //echo $ii; ?>">
 <?php //echo 'Option'.$ii; ?> <span style="color:red">*</span></div> -->
     <?php echo $this->Form->input('option'.$ii, ['class'=>'input-xlarge optionClass','name'=>'Option['.$ii.'][name]','placeholder'=>'enter option '.$ii,'label'=>false,'id'=>'optionRow'.$ii,'div'=>false, 'value'=>$result['name'], 'error'=>false, 'style'=>'width:220px;']);

     	echo $this->Form->hidden('id'.$ii, ['class'=>'input-xlarge optionClass','name'=>'Option['.$ii.'][id]','label'=>false,'div'=>false, 'value'=>$result['id'], 'error'=>false]);

      ?>
     
</td>
 <td valign="top">
 <!-- <div class="markClasslabel" id="markClasslabel<?php //echo $ii; ?>">
     Mark <span style="color:red">*</span></div> -->
     <?php echo $this->Form->input('mark'.$ii, ['class'=>'input-xlarge markClass','name'=>'Option['.$ii.'][mark]','label'=>false,'id'=>'markRow'.$ii,'div'=>false, 'error'=>false, 'value'=>$result['mark'], 'style'=>'width:55px;']); ?>
       </td>
</tr>
</span>
<?php  $ii++; } 


            ?>

