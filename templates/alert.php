<?php 

if (isset($length)) { 
    $is_valid_len = $check_len($length);
} else {
    $alerts=['length'];
}

?>