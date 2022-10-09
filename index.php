<?php
namespace App;

include_once(__DIR__ . '/balance.php');

$samples = [
    ['!!', '??'],
    ['!??', '?!!'],
    ['!?!!', '?!?'],
    ['!!???!????', '??!!?!!!!!!!'],
];

function test($samples)
{
    foreach ($samples as $sample) {
        echo $sample[0] . ' VS ' . $sample[1] . ' = ';
        echo \App\Balance::balance($sample[0], $sample[1]) . PHP_EOL;
    }
}

test($samples);