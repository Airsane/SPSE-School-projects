<?php
class Sort
{
    public static function MergeSort(array $pole) : array
    {
    }

    public static function QuickSort(array $pole) : array
    {
        $length = count($pole);
        if ($length <= 1)
            return $pole;
        else {
            $pivot = $pole[0];
            $left = $right = array();
            for ($i = 1; $i < $length; $i++) {
                if ($pole[$i] < $pivot) {
                    $left[] = $pole[$i];
                } else {
                    $right[] = $pole[$i];
                }
            }
            return array_merge(self::QuickSort($left), array($pivot), self::QuickSort($right));
        }
    }
}

?>