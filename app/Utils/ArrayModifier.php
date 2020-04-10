<?php

namespace App\Utils;

class ArrayModifier
{
    /**
     * replace empty array keys to value
     *
     * @param array $array
     * @param string $value
     * 
     * @return array
     */
    public static function replaceEmptyArrayKeysToValue(array $array, $valueToReplace = '[]'): array
    {
        foreach ($array as $key => $singlePart) {
            foreach ($singlePart as $attributeName => $value) {
                if (is_array($value)) {
                    if (!empty(array_filter($value))) {
                        $array[$key][$attributeName] = json_encode($value, true);
                    } else {
                        $array[$key][$attributeName] = $valueToReplace;
                    }
                }
            }
        }

        return $array;
    }
}
