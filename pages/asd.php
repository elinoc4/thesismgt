<div class="panel panel-default">
  <div class="panel-body"><?php if(isset($msg)){echo $msg;}?></div>
	<div class="progress">
  <div class="progress-bar progress-bar-success" id="paste"role="progressbar" aria-valuenow="<?php if(isset($stage)){echo $stage;}?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php if(isset($stage)){echo $stage;}?>%">
    <?php if(isset($stage)){echo 'you are in stage '.$rstage.' with '.$stage ;}?>% Completion (success)
  </div>
</div>
</div>
</div>
