<?php
class PangramChecker {
    private $sentence;

    public function __construct($sentence) {
        $this->sentence = strtolower($sentence);
    }

    public function isPangram() {
        $alphabet = range('a', 'z');
        $missingLetters = array_diff($alphabet, str_split($this->sentence));
        return empty($missingLetters);
    }
}

// Example usage
$sentence1 = "The quick brown fox jumps over the lazy dog.";
$checker1 = new PangramChecker($sentence1);
$isPangram1 = $checker1->isPangram();
echo "$sentence1 is " . ($isPangram1 ? "a pangram." : "not a pangram.") . "\n";

$sentence2 = "Pack my box with five dozen liquor jugs.";
$checker2 = new PangramChecker($sentence2);
$isPangram2 = $checker2->isPangram();
echo "$sentence2 is " . ($isPangram2 ? "a pangram." : "not a pangram.") . "\n";
