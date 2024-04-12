<?php
class Bookshop {
    private $bookPrices = [8, 8, 8, 8, 8]; // Array representing the price of each book
    private $discounts = [0, 0.05, 0.10, 0.20, 0.25]; // Discount percentages based on number of different books

    public function calculatePrice($basket) {
        $totalPrice = 0;
        $uniqueBooks = count(array_unique($basket));

        while ($uniqueBooks > 0) {
            $discount = min($uniqueBooks, 5); // Maximum discount is for buying all 5 books
            $totalPrice += (count($basket) * $this->bookPrices[0]) * (1 - $this->discounts[$discount]);

            // Remove one of each unique book from the basket
            foreach (array_unique($basket) as $book) {
                $key = array_search($book, $basket);
                unset($basket[$key]);
            }

            $uniqueBooks = count(array_unique($basket));
        }

        return $totalPrice;
    }
}

// Example usage
$basket = [1, 1, 2, 2, 3, 3, 4, 5]; // Example basket of books
$bookshop = new Bookshop();
$totalPrice = $bookshop->calculatePrice($basket);
echo "Total price: $" . number_format($totalPrice, 2);
