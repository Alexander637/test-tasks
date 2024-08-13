package mathops

import "testing"

func TestAdd(t *testing.T) {
	result := Add(2, 3)
	expected := 5
	if result != expected {
		t.Errorf("Add(2, 3) = %d; want %d", result, expected)
	}
}

func TestSubtract(t *testing.T) {
	result := Subtract(5, 3)
	expected := 2
	if result != expected {
		t.Errorf("Subtract(5, 3) = %d; want %d", result, expected)
	}
}

func TestMultiply(t *testing.T) {
	result := Multiply(2, 3)
	expected := 6
	if result != expected {
		t.Errorf("Multiply(2, 3) = %d; want %d", result, expected)
	}
}

func TestDivide(t *testing.T) {
	result := Divide(6, 3)
	expected := 2
	if result != expected {
		t.Errorf("Divide(6, 3) = %d; want %d", result, expected)
	}

	result = Divide(6, 0)
	expected = 0
	if result != expected {
		t.Errorf("Divide(6, 0) = %d; want %d", result, expected)
	}
}
