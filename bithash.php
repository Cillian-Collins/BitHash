<?php
function bithash($pass){
	//Convert pass to md5.
	$md5 = md5($pass);
	//Truncate md5 in several locations and combine them.
	$trun_md5 = substr($md5, 1, 5).substr($md5, 3, 14).substr($md5, 12, 13);
	//Append prefix.
	$bithash_md5 = '$Bh$'.$trun_md5;
	//Put it through bcrypt algorithm.
	$bcrypt = password_hash($bithash_md5, PASSWORD_BCRYPT);
	//Apply the bithash prefix of 6 bits (to make it a 32 bit hash).
	return $bcrypt;
}

function bithash_verify($pass, $hash){
	//Convert pass to md5.
	$md5 = md5($pass);
	//Truncate md5 in several locations and combine them.
	$trun_md5 = substr($md5, 1, 5).substr($md5, 3, 14).substr($md5, 12, 13);
	//Append prefix.
	$bithash_pass = '$Bh$'.$trun_md5;
	//Return a true or false value depending on whether the pass matches the hash.
	return password_verify($bithash_pass, $hash);
}
?>
