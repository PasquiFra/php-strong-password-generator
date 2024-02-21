<?php 

$check_len = fn ($length) => is_numeric($length) && $length > 3 ;
   
$generate_psw = function ($length, $allowed_characters) {
    $elements = array_rand($allowed_characters, $length);
    $array = [];
    
    foreach ($elements as $key) {
        $array[] = $allowed_characters[$key];
    }
    
    $result = implode("", $array);
    return $result;
};
   
$set_characters = function ($allowed_numbers, $allowed_letters, $allowed_symbols) {
    if (isset($numbers) || isset($letters) || isset($symbols)) {
        if (isset($numbers)) {
            $allowed_characters = array_merge($allowed_numbers);
        } 
        if(isset($letters)) {
            $allowed_characters = array_merge($allowed_letters);
        } 
        if(isset($symbols)) {
            $allowed_characters = array_merge($allowed_symbols);
        }
        return $allowed_characters;
    } else {
        return array_merge($allowed_numbers, $allowed_letters, $allowed_symbols);
};

}
   
?>