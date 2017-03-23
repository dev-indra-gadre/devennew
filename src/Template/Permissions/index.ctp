  
<div class="row">
<div class="span5 offset3">
	<div><h3>User Access Right</h3></div>
	<?php echo $this->Form->create('Permission',['type'=>'file']); ?>
    <fieldset>
        <div>
        <table  class="table table-bordered">
            <div class="form-group">
		<tr>	
	
<td>
Role<span style="color:red">*</span>
<?php echo $this->Form->input('designation_id',['class'=>'input-xlarge','label'=>false,'options'=>$designation,'empty' => '--- Please Select ---']); ?></td>
</tr>
</div>
</table>
</div>
<div id="abc"></div>
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
</div>







<script>


</script>


