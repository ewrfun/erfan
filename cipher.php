<?php
class AtbashCipher {
    private $plainAlphabet = 'abcdefghijklmnopqrstuvwxyz';
    private $cipherAlphabet = 'zyxwvutsrqponmlkjihgfedcba';
    private $groupSize = 5;

    public function encode($plaintext) {
        $plaintext = strtolower($plaintext);
        $ciphertext = '';
        for ($i = 0; $i < strlen($plaintext); $i++) {
            $char = $plaintext[$i];
            if (ctype_alpha($char)) {
                $index = strpos($this->plainAlphabet, $char);
                $ciphertext .= $this->cipherAlphabet[$index];
            } elseif (ctype_digit($char)) {
                $ciphertext .= $char;
            }
        }
        return implode(' ', str_split($ciphertext, $this->groupSize));
    }

    public function decode($ciphertext) {
        $ciphertext = strtolower($ciphertext);
        $plaintext = '';
        for ($i = 0; $i < strlen($ciphertext); $i++) {
            $char = $ciphertext[$i];
            if (ctype_alpha($char)) {
                $index = strpos($this->cipherAlphabet, $char);
                $plaintext .= $this->plainAlphabet[$index];
            } elseif (ctype_digit($char)) {
                $plaintext .= $char;
            }
        }
        return $plaintext;
    }
}

// Example usage
$cipher = new AtbashCipher();
$encodedText = $cipher->encode("test");
echo "Encoded text: $encodedText\n";  // Output: gvhg
$decodedText = $cipher->decode("gvhg");
echo "Decoded text: $decodedText\n";  // Output: test
$decodedTextLong = $cipher->decode("gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt");
echo "Decoded long text: $decodedTextLong\n";  // Output: thequickbrownfoxjumpsoverthelazydog
