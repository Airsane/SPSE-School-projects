<?php

class Sort {

	private $itemsToSort;

	public function __construct($itemsToSort){
		$this->itemsToSort = $itemsToSort;
	}

 	private static function merge_arrays($left_arr, $right_arr){
		$res = array();
		while (count($left_arr) > 0 && count($right_arr) > 0){
			if($left_arr[0] > $right_arr[0]){
				$res[] = $right_arr[0];
				$right_arr = array_slice($right_arr , 1);
			}else{
				$res[] = $left_arr[0];
				$left_arr = array_slice($left_arr, 1);
			}
		}
		while (count($left_arr) > 0){
			$res[] = $left_arr[0];
			$left_arr = array_slice($left_arr, 1);
		}
		while (count($right_arr) > 0){
			$res[] = $right_arr[0];
			$right_arr = array_slice($right_arr, 1);
		}
		return $res;
	}

    private static function merge_sort($itemsToSort) {
		if(count($itemsToSort) == 1 ) {
			return $itemsToSort;
		}
		$mid = count($itemsToSort) / 2;

    	$left_arr = array_slice($itemsToSort, 0, $mid);
    	$right_arr = array_slice($itemsToSort, $mid);
		
		$left_arr = self::merge_sort($left_arr);
		$right_arr = self::merge_sort($right_arr);

		return self::merge_arrays($left_arr, $right_arr);
	}

	private static function quick_sort($itemsToSort){
		if(count($itemsToSort) <= 1){
			return $itemsToSort;
		}else{
			$pivot = $itemsToSort[0];

			$left = $right = array();

			for ($i=1; $i < count($itemsToSort); $i++) { 
				if($itemsToSort[$i] < $pivot){
					$left[] = $itemsToSort[$i];
				}else{
					$right[] = $itemsToSort[$i];
				}
			}
			return array_merge(self::quick_sort($left), array($pivot), self::quick_sort($right));
		}
	}

	public function get_original_items() {
		return $this->itemsToSort;
	}

	public function sort_by_merge_sort() {
		return self::merge_sort($this->itemsToSort);
	}

	public function sort_by_quick_sort() {
		return self::quick_sort($this->itemsToSort);
	}
}