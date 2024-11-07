<?php
namespace Drupal\Tests\example\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\Url;

/**
 * Test para la ruta personalizada.
 *
 * @group example
 */
class RouteTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['example'];

  /**
   * Test para verificar una ruta.
   */
  public function testRuta() {
    // Define la URL de la ruta personalizada.
    $url = Url::fromRoute('example.mi_form');

    // Verifica que la ruta sea válida
    $this->assertNotNull($url);
    $this->assertEquals('/mi-formulario', $url->toString());
  }
}
