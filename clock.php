<?php

class Clock
{
    private DateTime $time;

    public function __construct(int $hour = 0, int $minutes = 0)
    {
        $this->time = new DateTime();
        $this->time->setTime($hour, $minutes);
    }

    public function __toString(): string
    {
        return $this->time->format('H:i');
    }

    public function add(int $minutes): Clock
    {
        $this->time->modify("+$minutes minutes");
        return $this;
    }

    public function sub(int $minutes): Clock
    {
        $this->time->modify("-$minutes minutes");
        return $this;
    }

    public function getTime(): DateTime
    {
        return clone $this->time;
    }

    public function setTime(int $hour, int $minutes): void
    {
        $this->time->setTime($hour, $minutes);
    }
}

// Example usage:
$clock = new Clock(10, 30);
echo $clock . "\n"; // Output: 10:30

$clock->add(15);
echo $clock . "\n"; // Output: 10:45

$clock->sub(60);
echo $clock . "\n"; // Output: 09:45

$clock->setTime(12, 0);
echo $clock . "\n"; // Output: 12:00
