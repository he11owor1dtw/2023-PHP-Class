<?php

// for(起始值;條件式;增減值){程式碼} //

$sum=0;

    for($i=1;$i<=10000;$i=$i+1){
        $sum=$sum+$i;
}

echo "1加到10000為" . $sum;