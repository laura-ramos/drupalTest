<?php

namespace Drupal\Tests\example\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\example\Calculator;

class CalculatorTest extends UnitTestCase {
    public function testSuma() {
        $calculator = new Calculator();

        $this->assertEquals(5, $calculator->suma(2, 3));
        $this->assertEquals(0, $calculator->suma(-1, 1));
        $this->assertEquals(-5, $calculator->suma(-2, -3));
    }
}
