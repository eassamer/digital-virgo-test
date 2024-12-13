<?php

// Function to count leading zeros
function countLeadingZerosMath($x) {
    $exponent = floor(log10(abs($x)));
    return -$exponent;
}

// Function to perform the magic increment
function magicInc($x, $inc) {
    $floor = floor(log10($x));
    $a = pow(10, $floor);
    return $a * (floor($x / $a) + $inc);
}

// Main logic for magic_inc
function magic_inc($x, $inc) {
    if (($x > 9 && $x < 20 && $inc === -1) || ($x < -9 && $x > -20 && $inc === 1)) {
        return ($inc === -1 ? 9 : -9);
    } elseif ($x > 9 || $x < -9) {
        if ($x < 0) {
            $x = -$x;
            $x = magicInc($x, $inc * -1);
            $x = -$x;
        } else {
            $x = magicInc($x, $inc);
        }
        return floor($x);
    } elseif (($x >= 1 && $x <= 9) || ($x <= -1 && $x >= -9)) {
        $x = $x + $inc;
        return floor($x);
    } elseif ($x < 1 && $x > -1) {
        $exponent = countLeadingZerosMath($x);
        $x = floor($x * pow(10, $exponent));
        $addDec = 0;
        if (($x === 1 && $inc === -1) || ($x === -1 && $inc === 1)) {
            $x = 0.9 * $x;
            $addDec = 1;
        } else {
            $x = $x + $inc;
        }
        $x = $x / pow(10, $exponent);
        if ($x === 1 || $x === -1) {
            return floor($x);
        } else {
            return number_format($x, $exponent + $addDec);
        }
    }
}
?>
