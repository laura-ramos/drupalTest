<?php

namespace Drupal\example\Tests\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Pruebas de navegador para mi módulo.
 *
 * @group example
 */
class BrowserTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = ['node', 'rules'];

  /**
   * El nombre de la cuenta de administrador.
   *
   * @var string
   */
  protected $adminUser;

    /**
   * Theme to enable.
   *
   * @var string
   */
  protected $defaultTheme = 'stark';

  /**
   * Configuración inicial.
   */
  protected function setUp(): void {
    parent::setUp();

    // Create an article content type that we will use for testing.
    $type = $this->container->get('entity_type.manager')->getStorage('node_type')
      ->create([
        'type' => 'article',
        'name' => 'Article',
      ]);
    $type->save();
    $this->container->get('router.builder')->rebuild();
  }

  /**
   * Tests that the reaction rule listing page works.
   */
  public function testReactionRulePage() {
    $account = $this->drupalCreateUser(['administer rules']);
    $this->drupalLogin($account);

    $this->drupalGet('admin/config/workflow/rules');
    $this->assertSession()->statusCodeEquals(200);

    // Test that there is an empty reaction rule listing.
    $this->assertSession()->pageTextContains('There are no enabled reaction rules.');
  }

  /**
   * Tests if a user has the specified permission.
   */
  public function testUserPermissions() {
    // Crear un usuario con permisos.
    $admin_user = $this->drupalCreateUser(['administer site configuration']);
    
    // Verificar que el usuario tiene el permiso.
    $this->assertTrue($admin_user->hasPermission('administer site configuration'), 'El usuario tiene el permiso para administrar la configuración del sitio.');

    // Crear un usuario sin permisos.
    $regular_user = $this->drupalCreateUser([]);

    // Verificar que el usuario no tiene el permiso.
    $this->assertFalse($regular_user->hasPermission('administer site configuration'), 'El usuario no tiene el permiso para administrar la configuración del sitio.');
  }
}
