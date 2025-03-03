<?php

require 'classes/threePieceSuit.php';

use _3_3_25\classes;

$suit1 = new threePieceSuit('Go Getter', 3999);
$suit2 = new threePieceSuit('Not to brag', 3000000);

echo $suit1->name;
echo $suit1->price;

echo $suit2->name;
echo $suit2->price;