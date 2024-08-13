from person_analysis import PersonAnalysis
import unittest

class TestPersonAnalysis(unittest.TestCase):

    def test_calculate_bmi(self):
        person = PersonAnalysis("John Doe", 30, 175, 70)
        self.assertAlmostEqual(person.calculate_bmi(), 22.8571, places=4)

    def test_get_health_status_underweight(self):
        person = PersonAnalysis("John Doe", 30, 175, 50)
        self.assertEqual(person.get_health_status(), "Underweight")

    def test_get_health_status_normal_weight(self):
        person = PersonAnalysis("John Doe", 30, 175, 70)
        self.assertEqual(person.get_health_status(), "Normal weight")

    def test_get_health_status_overweight(self):
        person = PersonAnalysis("John Doe", 30, 175, 80)
        self.assertEqual(person.get_health_status(), "Overweight")

    def test_get_health_status_obesity(self):
        person = PersonAnalysis("John Doe", 30, 175, 100)
        self.assertEqual(person.get_health_status(), "Obesity")

    def test_to_string(self):
        person = PersonAnalysis("John Doe", 30, 175, 70)
        expected_string = ("Name: John Doe, Age: 30, Height: 175, Weight: 70, "
                           "BMI: 22.857142857142858, Health Status: Normal weight")
        self.assertEqual(str(person), expected_string)

if __name__ == '__main__':
    unittest.main()