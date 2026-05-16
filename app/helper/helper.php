<?php

function getName($name)
{

    // $words = explode(' ', $name);

    // $first = $words[0][0];
    // $last = $words[count($words) - 1][0];

    // $initials = $first . ' ' . $last;

    $words = preg_split('/\s+/', trim($name));

$initials = strtoupper(
    $words[0][0] . ' ' . $words[count($words) - 1][0]
);

    return $initials;
}
