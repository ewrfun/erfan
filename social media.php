<?php
class ExtremeSocialMedia {
    public static function truncate($input) {
        // Truncate the input to 5 characters
        $truncated = mb_substr($input, 0, 5, 'UTF-8');
        return $truncated;
    }
}

// Example usage
$input1 = "Hello";
$truncated1 = ExtremeSocialMedia::truncate($input1);
echo "Truncated input 1: $truncated1\n"; // Output: "Hello"

$input2 = "🙂🙃😀😃😄😁";
$truncated2 = ExtremeSocialMedia::truncate($input2);
echo "Truncated input 2: $truncated2\n"; // Output: "🙂🙃😀😃😄"
