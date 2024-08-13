import unittest
from math_operations import MathOperations

class TestMathOperations(unittest.TestCase):
    def setUp(self):
        self.math_ops = MathOperations()

    def test_add(self):
        self.assertEqual(self.math_ops.add(2, 3), 5)
        self.assertEqual(self.math_ops.add(-1, 1), 0)
        self.assertEqual(self.math_ops.add(-1, -1), -2)

    def test_subtract(self):
        self.assertEqual(self.math_ops.subtract(5, 3), 2)
        self.assertEqual(self.math_ops.subtract(-1, 1), -2)
        self.assertEqual(self.math_ops.subtract(-1, -1), 0)

    def test_multiply(self):
        self.assertEqual(self.math_ops.multiply(2, 3), 6)
        self.assertEqual(self.math_ops.multiply(-1, 1), -1)
        self.assertEqual(self.math_ops.multiply(-1, -1), 1)

    def test_divide(self):
        self.assertEqual(self.math_ops.divide(6, 3), 2)
        self.assertEqual(self.math_ops.divide(-6, 3), -2)
        self.assertEqual(self.math_ops.divide(-6, -3), 2)
        with self.assertRaises(ValueError):
            self.math_ops.divide(1, 0)

if __name__ == '__main__':
    unittest.main()
