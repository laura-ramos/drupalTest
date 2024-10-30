<?php

//namespace Drupal\example\Tests\Unit;
namespace Drupal\Tests\example\Unit;

use Drupal\Tests\UnitTestCase;

/**
 * Prueba unitaria para la funcionalidad de mi módulo.
 *
 * @group example
 */
class UnitTest extends UnitTestCase {

  /**
   * Prueba que suma dos números correctamente.
   */
  public function testSuma() {
    $resultado = $this->suma(2, 3);
    $this->assertEquals(5, $resultado);
  }


  /**
   * Función que suma dos números.
   */
  private function suma($a, $b) {
    return $a + $b;
  }

}
