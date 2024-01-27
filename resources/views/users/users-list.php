<?php
 $layout = 'layouts.app';
?>
<div class="my-3">
    <div class="row">
        <?php
         foreach($users as $u){
            echo ($u['id']);
            ?>
            <?php
         }
        ?>
    </div>
</div>