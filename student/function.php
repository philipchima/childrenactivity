<?php

function GenPass() {
$genA = "ABCDEFGHIJKLMNOPQRSTUVWXYZ$*";
$genC = strtolower("ABCDEFGHIJKLMNOPQRSTUVWXYZ$*");
$genB = rand(0,9);
$genD = rand(10,999);
$genA_shuffle = str_shuffle($genA);
$genC_shuffle = str_shuffle($genC);
$genA_shuffle = substr($genA_shuffle, 0, 2);
$genC_shuffle = substr($genC_shuffle, 4, 2);
$password = "$genA_shuffle"."$genB"."$genC_shuffle"."$genD";
return $password;
}

function Gencode() {
$genA = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$genC = strtolower("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
$genB = rand(0,9);
$genD = rand(10,999);
$genA_shuffle = str_shuffle($genA);
$genC_shuffle = str_shuffle($genC);
$genA_shuffle = substr($genA_shuffle, 0, 2);
$genC_shuffle = substr($genC_shuffle, 4, 2);
$password = "$genA_shuffle"."$genB"."$genC_shuffle"."$genD";
return $password;
}

function GenVoucher(){
//$genRat = "0123456789";	
$genA = "0123456789";
$genC = strtolower("123456789");
$genB = rand(0,9);
$genD = rand(10,999);
$genA_shuffle = str_shuffle($genA);
$genC_shuffle = str_shuffle($genC);
$genA_shuffle = substr($genA_shuffle, 0, 2);
$genC_shuffle = substr($genC_shuffle, 4, 2);
$voucher = "$genA_shuffle"."$genB"."$genC_shuffle"."$genD" ;
//$voucher = "$genRat"."$genCat"."/"."LN";
return $voucher;	

}



?>