<?php

// remove dollar sign
function removeDollar($amount){

    $amount = (float ) str_replace(['$'] , '',$amount );   

    return $amount;
}

// add Dollar sign on floats
function addDollar($amount){

    $is_negative = $amount < 0;

    return ($is_negative ? '-' : '' ).'$'.number_format(abs($amount),2);
}

// create class name according to the amount
function textColor($amount){

    $color = '';

    if(removeDollar($amount) > 0){

        $color ='text-green';

    }elseif(removeDollar($amount) < 0){
        $color ='text-red';
    }

    return $color;
    
}