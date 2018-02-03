<?php

class Functions{
    
    //sort array by a column
    static function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }

    static function formatQuantity($quantity){

        //Only string and with 2 decimal always! (to check the '0')

        if(is_string($quantity)){

            /* validate quantity */
            $decimals = substr($quantity,strpos($quantity,'.')+1);

            if($decimals === ""){

            }else{
                if($decimals === '00'){
                    $quantity = number_format($quantity ,0,',','.');
                }else{
                    if(substr($decimals,1) === '0'){
                        $quantity  = number_format($quantity ,1,',','.');
                    }else{
                        $quantity  = number_format($quantity ,2,',','.');
                    }
                }
            }
        }

        return $quantity;
	}

}