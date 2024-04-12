<?php

class Robot
{
    private array $position;
    private string $direction;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->position = [$x, $y];
        $this->direction = $direction;
    }

    public function executeInstructions(string $instructions): void
    {
        $instructions = str_split($instructions);
        foreach ($instructions as $instruction) {
            switch ($instruction) {
                case 'R':
                    $this->turnRight();
                    break;
                case 'L':
                    $this->turnLeft();
                    break;
                case 'A':
                    $this->advance();
                    break;
                default:
                    throw new Exception("Invalid instruction: $instruction");
            }
        }
    }

    private function turnRight(): void
    {
        switch ($this->direction) {
            case 'N':
                $this->direction = 'E';
                break;
            case 'E':
                $this->direction = 'S';
                break;
            case 'S':
                $this->direction = 'W';
                break;
            case 'W':
                $this->direction = 'N';
                break;
        }
    }

    private function turnLeft(): void
    {
        switch ($this->direction) {
            case 'N':
                $this->direction = 'W';
                break;
            case 'W':
                $this->direction = 'S';
                break;
            case 'S':
                $this->direction = 'E';
                break;
            case 'E':
                $this->direction = 'N';
                break;
        }
    }

    private function advance(): void
    {
        switch ($this->direction) {
            case 'N':
                $this->position[1]++;
                break;
            case 'E':
                $this->position[0]++;
                break;
            case 'S':
                $this->position[1]--;
                break;
            case 'W':
                $this->position[0]--;
                break;
        }
    }

    public function getPosition(): array
    {
        return $this->position;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
}

// Example usage:
$robot = new Robot(7, 3, 'N');
$robot->executeInstructions("RAALAL");

$position = $robot->getPosition();
$direction = $robot->getDirection();

echo "Final position: {$position[0]}, {$position[1]} facing $direction\n"; // Output: Final position: 9, 4 facing W
