<?php

namespace Drupal\tableau_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Tableau' Block.
 *
 * @Block(
 *   id = "tableau_block",
 *   admin_label = @Translation("Tableau Block"),
 *   category = @Translation("Tableau Block"),
 * )
 */
class TableauBlockMod extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build(): array
  {

    return [
      '#theme' => 'tableau_block',
      '#attached' => [
        'library' => [
          'tableau_block/tableau_block',
        ],
      ],
    ];

  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge(): int {
    return 0;
  }
}
