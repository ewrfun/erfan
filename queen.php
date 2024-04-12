<?php
class Queen {
    private $row;
    private $col;

    public function __construct($row, $col) {
        $this->row = $row;
        $this->col = $col;
    }

    public function getPosition() {
        return [$this->row, $this->col];
    }

    public function sharesRow(Queen $other) {
        return $this->row === $other->row;
    }

    public function sharesColumn(Queen $other) {
        return $this->col === $other->col;
    }

    public function sharesDiagonal(Queen $other) {
        return abs($this->row - $other->row) === abs($this->col - $other->col);
    }
}

class ChessBoard {
    private $queens = [];

    public function placeQueen(Queen $queen) {
        $this->queens[] = $queen;
    }

    public function canQueensAttack() {
        $totalQueens = count($this->queens);
        for ($i = 0; $i < $totalQueens; $i++) {
            for ($j = $i + 1; $j < $totalQueens; $j++) {
                if ($this->queens[$i]->sharesRow($this->queens[$j]) ||
                    $this->queens[$i]->sharesColumn($this->queens[$j]) ||
                    $this->queens[$i]->sharesDiagonal($this->queens[$j])) {
                    return true; // Queens can attack each other
                }
            }
        }
        return false; // Queens cannot attack each other
    }
}

// Example usage
$queen1 = new Queen(2, 3); // White queen
$queen2 = new Queen(5, 6); // Black queen

$board = new ChessBoard();
$board->placeQueen($queen1);
$board->placeQueen($queen2);

echo $board->canQueensAttack() ? "Yes, queens can attack each other.\n" : "No, queens cannot attack each other.\n";
