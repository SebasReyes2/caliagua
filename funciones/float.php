<?php
function decimales($str)
{
    $legalChars = "%[^0-9\-\, ]%";
    $str = preg_replace($legalChars,"",$str);
    return $str;
}
?>
