<?php

/**
 * @file
 * Contains Drupal\tableau_block\Form\TableauBlockForm.
 */

namespace Drupal\tableau_block\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class TableauBlockForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'tableau_block.adminsettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'tableau_block_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('tableau_block.adminsettings');

    $form['key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Key'),
      '#description' => $this->t('Key for header authentication'),
      '#default_value' => $config->get('key'),
    ];

    $form['value'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('Value for header authentication'),
      '#default_value' => $config->get('value'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('tableau_block.adminsettings')
      ->set('key', $form_state->getValue('key'))
      ->save();

    $this->config('tableau_block.adminsettings')
      ->set('value', $form_state->getValue('value'))
      ->save();
  }

}
