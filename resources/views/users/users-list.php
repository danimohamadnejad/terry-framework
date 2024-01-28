<!-- needs $user variable -->
<?php
 $layout = 'layouts.app';
?>
<div class="card">
    <div class="card-body">
        <?php
         echo include_view('users.user-details', ['name'=>$name,]);
        ?>
    </div>
</div>