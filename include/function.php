<?php
require ('function-db.php');

function show_info($info) {
return('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">Up to us</strong>
        <small class="text-muted"></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="toast-body">'.$info.'</div>
</div>');
}

?>