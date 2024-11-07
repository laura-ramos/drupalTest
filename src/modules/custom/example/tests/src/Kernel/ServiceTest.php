<?php

namespace Drupal\Tests\example\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Prueba del servicio personalizado.
 *
 * @group example
 */
class ServiceTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['example'];

  /**
   * Prueba de un servicio.
   */
  public function testService() {
    $service = \Drupal::service('example.api_consumer');

    // Verifica que el servicio no sea nulo.
    $this->assertNotNull($service);

    // Llama a un método del servicio y verifica su salida.
    #$resultado = $service->hacerAlgo();
    #$this->assertEquals('Esperado', $resultado);
  }
}
