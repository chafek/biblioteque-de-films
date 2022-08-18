<?php

if(!empty($msgSuccess)){
    echo "
    <div class='alert alert-success' role='alert'>
    $msgSuccess
</div>";
}

if(!empty($msgError)){
    echo "
    <div class='alert alert-danger' role='alert'>
    $msgError
</div>";
}