
<style>
.table-striped tbody tr > td:last-child a {
    color: #ffffff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}

</style>


<div class="row">
<div class="span8 offset3">
    <div><h3>User List</h3></div>
    <fieldset>
        <div><?php echo $this->Form->create('User',array('type'=>'file')); ?>
        <table  class="table table-bordered">
            <div class="form-group">
        <tr>    
    <td>
    Name<span style="color:red"></span>
    <?php 
   echo $this->Form->input('name',array('class'=>'input-xlarge','label'=>false,'id'=>'name','type'=>'text')); ?>
   </td>
    
<td>
Score<span style="color:red"></span>
<?php 
   echo $this->Form->input('score',array('class'=>'input-xlarge','label'=>false,'id'=>'score','type'=>'text')); ?>
</td>
</tr>
</div>
</table>
<?php echo $this->Form->end(); ?>
</div>
 <div style="float:right;margin-right:0%;">
              
             <?php echo $this->Html->link('Add Candidate', ['controller' => $this->request->controller, 'action' => 'edit'], ['style' => 'width:120px;','class'=>'submit btn btn-info save']);?>
            </div>



 <div style="width:100%;float:right;" class="row">
    <div class="col-md-12">
    <div class="widget wred">
    <!-- Enquiry1 start -->
         <!-- Parameter table start -->
                   <table  style="padding-top:2px;" class="table table-bordered table-hover table-striped table-striped-warning ">
        <thead>
        <th class="info" align="center"></th>
        <th class="info">Name</th>
        <!-- <th class="info">Address</th> -->
       <!--   <th class="info">Action</th> -->
       <!--  <th class="info">Address</th> -->
        <th class="info">Status</th>
        <th class="info">Action</th>
        </thead>
            <tbody>
          <?php if (count($users) == 0) { ?>
            <tr>
                <td height="1" colspan="6" style="color:#FF0000;" align="center">
                    <b>No Record Found</b>
                </td>
            </tr>
            <?php } else {

  
           $page =$this->Paginator->params();
         // echo "<pre>"; print_r($page);
           $srNo = ($page['page'] * $page['perPage']) - $page['perPage'] + 1;
         foreach($users as $key=>$result){?>

       
            <tr>
            <td><?php echo $srNo; ?></td>
            <td><?php echo $result->username; ?></td>
            <!-- <td><?php //echo $result->address; ?></td> -->
            <td><?php //echo $result['Driver']['sim_no']; ?></td>
            
            <td>
         

            <?php echo $this->Html->link('<i class="icon-edit"></i>',['controller' => 'Users', 'action' => 'edit',$result->id, '_full'=>true],['escape' => false,'class'=>'btn btn-success btn-mini']); ?>
             <?php echo $this->Form->postLink('<i class = "icon-remove"></i>', ['controller'=>'Users','action' => 'delete',$result->id], ['class' => 'btn btn-default btn-sm btn-danger toolTip btn-mini','escape' => false,'confirm'=>'Are you sure you want to delete Candidate'.$result->id]); ?>
    

            </td>
            </tr>
            <?php $srNo++;
             } }?>
            </tbody>
            </table>
         <!-- Parameter table end -->
          <div class="pagination pagination-right pagination-mini">
    <ul>
    <?php if($page['perPage'] <$page['count']){  ?>
    <?php echo $this->Paginator->prev('Prev'); ?>
    <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2));?>
    <?php echo $this->Paginator->next('Next'); ?> <?php } ?>
    </ul>
  </div>
                    
    
   </div>
    </div>
    </div>
    

</div>
</div>










