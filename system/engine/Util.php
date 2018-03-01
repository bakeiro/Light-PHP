<?php

class Util{
    
    public static function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
		
		$sort_col = array();
		
		foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }
}