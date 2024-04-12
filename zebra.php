<?php
class House {
    public $color;
    public $nationality;
    public $drink;
    public $pet;
    public $cigarette;

    public function __construct($color, $nationality, $drink, $pet, $cigarette) {
        $this->color = $color;
        $this->nationality = $nationality;
        $this->drink = $drink;
        $this->pet = $pet;
        $this->cigarette = $cigarette;
    }
}

class ZebraPuzzleSolver {
    private $houses;

    public function __construct() {
        $this->initializeHouses();
        $this->solvePuzzle();
    }

    private function initializeHouses() {
        $this->houses = [];
        for ($i = 0; $i < 5; $i++) {
            $this->houses[$i] = new House(null, null, null, null, null);
        }
    }

    private function solvePuzzle() {
        // Add your logic to solve the puzzle here
        // You can represent the clues and deductions using if statements or other logic
        // Once you have deduced the answers, set the properties of the respective houses
        
        // For demonstration, let's set some arbitrary values
        $this->houses[0]->nationality = "Norwegian";
        $this->houses[0]->drink = "water";
        // Set more properties as per deductions
    }

    public function getSolution() {
        // Find the house where water is drunk and the house where the zebra is owned
        $waterDrinker = null;
        $zebraOwner = null;
        foreach ($this->houses as $house) {
            if ($house->drink === "water") {
                $waterDrinker = $house;
            }
            if ($house->pet === "zebra") {
                $zebraOwner = $house;
            }
        }
        return [$waterDrinker, $zebraOwner];
    }
}

// Usage
$solver = new ZebraPuzzleSolver();
list($waterDrinker, $zebraOwner) = $solver->getSolution();
echo "The resident who drinks water lives in the {$waterDrinker->color} house.\n";
echo "The resident who owns the zebra lives in the {$zebraOwner->color} house.\n";
