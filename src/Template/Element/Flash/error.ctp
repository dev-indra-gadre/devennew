<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div> -->

<div class="row">
<div class="span8 offset3">
<div class="col-md-6">
    <div class="box box-danger">
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin: -2px 10px;">&times;</button>
            <?= h($message) ?>
        </div>
        
    </div><!-- /.box -->
</div><!-- /.col -->
    </div><!-- /.box -->
</div><!-- /.col -->
<!-- <div class="message success"><?= h($message) ?></div> -->