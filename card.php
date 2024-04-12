<?php
class CreditCardMasker {
    public static function maskify($creditCardNumber) {
        if (empty($creditCardNumber) || strlen($creditCardNumber) < 6) {
            return '';
        }

        $length = strlen($creditCardNumber);
        $maskedNumber = $creditCardNumber[0]; // Keep the first digit

        for ($i = 1; $i < $length - 4; $i++) {
            if (ctype_digit($creditCardNumber[$i])) {
                $maskedNumber .= '#'; // Mask digits
            } else {
                $maskedNumber .= $creditCardNumber[$i]; // Keep non-digit characters
            }
        }

        // Add the last four digits
        $maskedNumber .= substr($creditCardNumber, -4);

        return $maskedNumber;
    }
}

// Example usage
$creditCardNumber1 = '1234-5678-9012';
$masked1 = CreditCardMasker::maskify($creditCardNumber1);
echo "$creditCardNumber1 converts to $masked1\n";

$creditCardNumber2 = '123456789012';
$masked2 = CreditCardMasker::maskify($creditCardNumber2);
echo "$creditCardNumber2 converts to $masked2\n";
