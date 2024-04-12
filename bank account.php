<?php
class BankAccount {
    private $balance;
    private $isOpen;

    public function __construct() {
        $this->balance = 0;
        $this->isOpen = true;
    }

    public function isOpen() {
        return $this->isOpen;
    }

    public function deposit($amount) {
        if (!$this->isOpen) {
            return false; // Account is closed, deposit failed
        }
        $this->balance += $amount;
        return true; // Deposit successful
    }

    public function withdraw($amount) {
        if (!$this->isOpen || $this->balance < $amount) {
            return false; // Account is closed or insufficient balance, withdrawal failed
        }
        $this->balance -= $amount;
        return true; // Withdrawal successful
    }

    public function close() {
        $this->isOpen = false;
    }

    public function getBalance() {
        return $this->balance;
    }
}

// Example usage
$account = new BankAccount();
$account->deposit(100);
echo "Balance: $" . $account->getBalance() . "\n"; // Output: Balance: $100

$account->withdraw(50);
echo "Balance after withdrawal: $" . $account->getBalance() . "\n"; // Output: Balance after withdrawal: $50

$account->close();
$account->deposit(50); // Deposit to closed account fails
echo "Balance after closing: $" . $account->getBalance() . "\n"; // Output: Balance after closing: $50
