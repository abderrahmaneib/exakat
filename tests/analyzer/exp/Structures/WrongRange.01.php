<?php

$expected     = array('$a1 > 1 || $a1 < 1000',
                      '$a13 >= 1 or $a13 <= 1000',
                      '$a2 < 1000 || $a2 > 1',
                      '$a14 <= 1000 or $a14 >= 1',
                      '$a3 >= 1 || $a3 <= 1000',
                      '$a11 > 1 or $a11 < 1000',
                      '$a4 <= 1000 || $a4 >= 1',
                      '$a12 < 1000 or $a12 > 1',
                     );

$expected_not = array('$b1 <= 1000 || $b2 >= 1',
                      '$b3 <= 1000 && $b3 >= 1',
                      '$b3 <= 1000 || $b3 != 1',
                      '$b3 <= 1000 || $b3 <= 1',
                     );

?>