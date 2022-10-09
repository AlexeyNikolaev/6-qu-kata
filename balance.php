<?php
namespace App;

abstract class Balance // не вижу смысла ООП тут разводить - просто статический метод подсчета веса
{
    // определяем символы и их вес (для красоты:)), можно обойтись и без этого)
    const QUESTION_MARK = '?';
    const QUESTION_WEIGHT = 3;

    const EXCLAMATION_MARK = '!';
    const EXCLAMATION_WEIGHT = 2;

    // определяем массив символов с весами
    private static $chars = [
        self::QUESTION_MARK => self::QUESTION_WEIGHT,
        self::EXCLAMATION_MARK => self::EXCLAMATION_WEIGHT,
    ];

    /**
     * Метод подсчета веса строки
     *
     * @param string $side
     * @return int
     */
    private static function weight(string $side): int
    {
        $total = 0;
        foreach (self::$chars as $char => $weight) {
            $total += substr_count($side, $char) * $weight;
        }

        return $total;
    }

    /**
     * Определение "превосходства" стороны
     *
     * @param string $left
     * @param string $right
     * @return string
     */
    public static function balance(string $left, string $right): string
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