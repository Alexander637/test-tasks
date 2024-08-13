<?php
namespace Admin\PhpTests;

use PHPUnit\Framework\TestCase;
class PersonAnalysisTest extends TestCase {

    public function testCalculateBMI() {
        $person = new PersonAnalysis("John Doe", 30, 175, 70);
        $bmi = $person->calculateBMI();
        $this->assertEquals(22.8571, round($bmi, 4), "BMI calculation is incorrect");
    }

    public function testGetHealthStatusUnderweight() {
        $person = new PersonAnalysis("John Doe", 30, 175, 50);
        $status = $person->getHealthStatus();
        $this->assertEquals("Underweight", $status, "Health status for underweight is incorrect");
    }

    public function testGetHealthStatusNormalWeight() {
        $person = new PersonAnalysis("John Doe", 30, 175, 70);
        $status = $person->getHealthStatus();
        $this->assertEquals("Normal weight", $status, "Health status for normal weight is incorrect");
    }

    public function testGetHealthStatusOverweight() {
        $person = new PersonAnalysis("John Doe", 30, 175, 80);
        $status = $person->getHealthStatus();
        $this->assertEquals("Overweight", $status, "Health status for overweight is incorrect");
    }

    public function testGetHealthStatusObesity() {
        $person = new PersonAnalysis("John Doe", 30, 175, 100);
        $status = $person->getHealthStatus();
        $this->assertEquals("Obesity", $status, "Health status for obesity is incorrect");
    }

public function testToString() {
    $person = new PersonAnalysis("John Doe", 30, 175, 70);
    $expectedString = "Name: John Doe, Age: 30, Height: 175, Weight: 70, BMI: 22.857142857143, Health Status: Normal weight";
    $this->assertEquals($expectedString, (string)$person, "__toString method output is incorrect");
    }

}
