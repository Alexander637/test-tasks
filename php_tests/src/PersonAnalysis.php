<?php
namespace Admin\PhpTests;

class PersonAnalysis {
    private $name;
    private $age;
    private $height;
    private $weight;
    public function __construct($name, $age, $height, $weight) {
        $this->name = $name;
        $this->age = $age;
        $this->height = $height;
        $this->weight = $weight;
    }
    public function calculateBMI() {
        return $this->weight / (($this->height / 100) ** 2);
    }
    public function getHealthStatus() {
        $bmi = $this->calculateBMI();
        if ($bmi < 18.5) {
            return "Underweight";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            return "Normal weight";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            return "Overweight";
        } else {
            return "Obesity";
        }
    }
    public function __toString() {
        return "Name: $this->name, Age: $this->age, Height: $this->height, Weight: $this->weight, BMI: " . $this->calculateBMI() . ", Health Status: " . $this->getHealthStatus();
    }
}
// Приклад використання
$person = new PersonAnalysis("John Doe", 30, 175, 70);
echo $person;
