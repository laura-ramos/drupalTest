<?php

namespace Drupal\Tests\example\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests the existence of the form route.
 */
class FormularioTest extends BrowserTestBase {

    /**
   * Theme to enable.
   *
   * @var string
   */
  protected $defaultTheme = 'stark';

    /**
     * {@inheritdoc}
     */
    protected static $modules = ['example'];

    /**
     * Test that the form route exists.
     */
    public function testFormRouteExists() {
        // Define la ruta que deseas comprobar.
        $route_name = 'example.mi_form';
        $url = '/mi-formulario'; // La URL del formulario.

        // Verifica si la ruta se puede acceder.
        $this->drupalGet($url);
        $this->assertSession()->statusCodeEquals(200);
        $this->assertSession()->pageTextContains('Mi Formulario');
    }
}
