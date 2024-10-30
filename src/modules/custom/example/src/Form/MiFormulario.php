<?php

namespace Drupal\example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class MiFormulario extends FormBase {
    public function getFormId() {
        return 'mi_formulario';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['nombre'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Nombre'),
            '#required' => TRUE,
        ];

        $form['correo'] = [
            '#type' => 'email',
            '#title' => $this->t('Correo electrónico'),
            '#required' => TRUE,
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Enviar'),
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        $nombre = $form_state->getValue('nombre');
        $correo = $form_state->getValue('correo');

        \Drupal::messenger()->addMessage($this->t('Gracias por enviar su información: @nombre, @correo', [
            '@nombre' => $nombre,
            '@correo' => $correo,
        ]));
    }
}
