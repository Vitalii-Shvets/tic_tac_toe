<?php


namespace App\Services;

use Illuminate\Support\Arr;

/**
 * Class WinnerService
 * @package App\Services
 */
class GameService
{
    /**
     * @param $field
     * @param $mark
     * @return bool
     */
    private function checkWinnerByMark($field, $mark)
    {
        $winRow = array_fill(0, 3, $mark);
        for ($i = 0; $i < 3; $i++) {
            if ($field[$i] === $winRow) {
                return true;
            }
        }
        for ($i = 0; $i < 3; $i++) {
            if ([$field[0][$i], $field[1][$i], $field[2][$i]] === $winRow) {
                return true;
            }
        }
        return [$field[0][0], $field[1][1], $field[2][2]] === $winRow ||
            [$field[2][0], $field[1][1], $field[0][2]] === $winRow;
    }

    /**
     * @param $field
     * @param $player1Mark
     * @param $player2Mark
     * @return bool|int
     */
    public function getWinner($field, $player1Mark, $player2Mark)
    {
        if (in_array(null, $field)) {
            return 'draw';
        }
        if ($this->checkWinnerByMark($field, $player1Mark)) {
            return $player1Mark;
        }
        if ($this->checkWinnerByMark($field, $player2Mark)) {
            return $player2Mark;
        }
        return false;
    }

    /**
     * @param $field
     * @param $player1Mark
     * @param $player2Mark
     * @return mixed
     */
    public function getHit($field, $player1Mark, $player2Mark)
    {

        $arr = Arr::flatten($field);
        $hit = $player1Mark;
        $countPlayer1Mark = count(array_filter($arr,
            function ($element) use ($player1Mark) {
                return $element === $player1Mark;
            }));

        $countPlayer2Mark = count(array_filter($arr,
            function ($element) use ($player2Mark) {
                return $element === $player2Mark;
            }));

        if ($countPlayer1Mark === $countPlayer2Mark){
            $hit = $player1Mark;
        }
        else{
            $hit = $player2Mark;
        }
            return $hit;
    }

}
