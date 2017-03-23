<option value="">--- Please Select ---</option>	
<?php
$i=1;
 foreach ($OptionNumberArray as $key => $value): ?>
<option value="<?php echo $i; ?>"  <?php if($correct_option==$i){ ?> selected="selected" <?php } ?>><?php echo 'Option '.$i; ?></option>
<?php $i++; endforeach; ?>