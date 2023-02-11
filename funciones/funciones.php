<?php 
/*
 * Imprime una cadena, similar a echo().
*/
function say($cad){
	echo $cad . "\n";
}
/*
 * Construye un mensaje en una tabla, le debemos
 * pasar el titulo y el mensaje.
*/
function fnShowMsg($title,$msg){
    say("<table width='250'>");
    say("<tr>");
    say("<th align=center valign=middle>$title</th>");
    say("</tr>");
    say("<tr>");
	say("<td align=left valign=middle>$msg</td>");    
    say("</tr>");
    say("</table>");
}
/*
 * Construye un enlace utilizando la etiqueta A.
*/
function fnLink($link,$target,$msg){
	$cad = "<A href='$link' target='$target'>$msg</A>";
	return $cad;
}
?>
