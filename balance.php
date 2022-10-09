<?php
namespace App;

abstract class Balance // не вижу смысла ООП тут разводить - просто статический метод подсчета веса
{
    const QUESTION_MARK = '?';
    const QUESTION_WEIGHT = 3;

    const EXCLAMATION_MARK = '!';
    const EXCLAMATION_WEIGHT = 2;

    private static $chars = [
        self::QUESTION_MARK => self::QUESTION_WEIGHT,
        self::EXCLAMATION_MARK => self::EXCLAMATION_WEIGHT,
    ];

    private static function weight($side): int
    {
        $total = 0;
        foreach (self::$chars as $char => $weight) {
            $total += substr_count($side, $char) * $weight;
        }

        return $total;
    }

    public static function balance($left, $right): string
    {
        $leftWeight = self::weight($left);
        $rightWeight = self::weight($right);
        if ($leftWeight > $rightWeight) {
            return 'Left';
        }
        if ($leftWeight < $rightWeight) {
            return 'Right';
        }

        return 'Balance';
    }
}