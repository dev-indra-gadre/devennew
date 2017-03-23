<?php 
 echo $this->Html->script('custom'); /* Custom codes */
 
  ?>
  <?php  use Cake\Core\Configure;
         use Cake\ORM\TableRegistry;
       
  ?>

<h4></h4>
<div class="">
<!-- <input type="checkbox" id="submitDocCheckAll" class="submitDocCheckAll" /> -->
    <input type="checkbox" class= "allcheck" /> <span><strong> All(check / uncheck)</strong> </span>
<?php
 $array_menus = Configure::read('menus.Custom');
 //echo "<pre>"; print_r($array_menus); exit;

$i=0; 
foreach($array_menus  as $key1 => $array_menus){?>
  
    <div class="row">
    <div class="col-md-12">

    <div class="widget wred">
     <div class="widget-head">
     <div class="pull-left" style="margin-left:40px;"><h5><?php
//debug($key1);

      echo $key1; 
$key=$key1.'1';
//debug($key);
      ?></h5>

      </div>
    <div class="widget-icons pull-right">
    <a href="#" class="wminimize"><i class="icon-chevron-down"></i></a>
     </div>
     <div class="clearfix"></div></div>
                        <div class="widget-content-search" style="display:none; margin-left:40px;">
<table class="table table-bordered">
<thead>

<input type="checkbox"  class= "<?php echo $key;?>" />

 <tr><th><center>Functionality</center></th>
     <th><center>View</center></th>
    <!--<th><center>Add/Edit</center></th>-->
  </tr>
  </thead>
   <?php 
          $sr_no =1;
          foreach($array_menus as $key2 => $array_menus){
          foreach($array_menus  as $key3 => $array_menus){ 
            //debug($key2); 
            //debug($key3);
      
?>
 <tr>
                         

<?php 


echo $this->Form->input('Permission.'.$i.'.'.$key2.'.sidebar_link', ['value' => $array_menus['sidebar_link'],'type'=>'hidden','label'=>'form-control','class'=>'group' ]);

echo $this->Form->input('Permission.'.$i.'.'.$key2.'.title_link', ['value' => $array_menus['title_link'],'type'=>'hidden','label'=>'form-control','class'=>'group' ]);
echo $this->Form->input('Permission.'.$i.'.'.$key2.'.controller', ['value' => $array_menus['controller'],'type'=>'hidden','label'=>'form-control','class'=>'group' ]);
echo $this->Form->input('Permission.'.$i.'.'.$key2.'.action', ['value' => $array_menus['action'],'type'=>'hidden','label'=>'form-control','class'=>'group' ]); 
echo $this->Form->input('Permission.'.$i.'.'.$key2.'.module', ['value' => $array_menus['module'],'type'=>'hidden','label'=>'form-control','class'=>'group' ]);
if(!empty($array_menus['order'])){
echo $this->Form->input('Permission.'.$i.'.'.$key2.'.order', ['value' => $array_menus['order'],'type'=>'hidden','label'=>'form-control','class'=>'group' ]); 
}

 ?>
<script>
//$.noConflict();
$(document).ready(function () {
 $(".<?php echo $key;?>").click(function () {
  //alert('helloooo');
        $(".<?php echo $key1;?>").prop('checked', $(this).prop('checked'));
   });

    });
</script>
<script>
$(document).ready(function () {
 $(".allcheck").click(function () {


  //alert('dddgdgdgg');
        $(".allchecked").prop('checked', $(this).prop('checked'));
   });

    });
</script>
   <td><center> <?php  echo $array_menus['title_link']; ?></center></td>
                        <td> <center>
<?php 
  $Permission_assigned = TableRegistry::get('Permissions');
  $Permission_assigned = $Permission_assigned->find('all',
                            [
                                'conditions' => [
                                   'Permissions.designation_id'=>$designation_id,
                                   'Permissions.controller'=>$array_menus['controller'],
                                   'Permissions.action'=>$array_menus['action']
                                ],
                                'order' => ['Permissions.order_sequence'=>'ASC']
                            ]
            );
       $Permission_assigned =$Permission_assigned->toArray();

//debug($Permission_assigned); exit;
$company_id ='33';
$string1 =$company_id.'-'.$designation_id.'-'.$array_menus['controller'].'-'.$array_menus['action'].'1';
//debug($string1);
 $string2 =$company_id.'-'.$designation_id.'-'.$array_menus['controller'].'-'.$array_menus['action'].'2';
//condition for admin

if(!empty($array_menus['view'])){

    if(isset( $Permission_assigned[0]->view) && $Permission_assigned[0]->view ==1)
    { $checked =true;} else { $checked =false;}
  


echo $this->Form->checkbox('Permission.'.$i.'.'.$key2.'.view', ['value' => $array_menus['view'],'checked'=>$checked,'label'=>'form-control','class'=>
  [
    $array_menus['module'],
  'allchecked',
  $string1
  ]]);

}

?>
   </center></td>
  




                          
 
 <?php 
 $sr_no++;   
}} ?>
                           
                        </table>
                        </div>
                    </div>
            </div>
    </div> <?php  $i++;}?>
</div>



<hr>
<!-- Buttons -->
<div class="col-md-12">
    <div>
        <div class="pull-right">
            <input  type="submit" value="Submit" class = "btn btn-primary"></input>
            <?php //echo $this->Form->submit('Submit', array('div'=>true, 'class' => 'btn btn-primary')); ?>
            <?php //echo $this->Form->button('Reset', array('type' => 'reset', 'class' => 'btn btn-primary')); ?>
            <?php echo $this->Html->link('Cancel', array('controller' => 'permissions', 'action' => 'index'), array('class' => 'btn btn-primary', 'escape'=>false)); ?>
        </div>
        <div class="clearfix"></div> 
    </div>          
</div>
<script>
$(document).ready(function () {


     $(".submitDocCheckAll").click(function () {
         $(".submitDocCheckOne").prop('checked', $(this).prop('checked'));
    });
    
   
});
</script>
