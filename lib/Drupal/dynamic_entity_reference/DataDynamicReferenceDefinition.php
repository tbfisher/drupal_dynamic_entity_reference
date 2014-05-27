<?php

/**
 * @file
 * Contains \Drupal\dynamic_entity_reference\DataDynamicReferenceDefinition.
 */

namespace Drupal\dynamic_entity_reference;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\TypedData\DataReferenceDefinition;

/**
 * A typed data definition class for defining dynamic references.
 */
class DataDynamicReferenceDefinition extends DataReferenceDefinition {

  /**
   * @var \Drupal\Core\TypedData\DataDefinitionInterface
   */
  protected $targetDefinition;

  /**
   * Creates a new data reference definition.
   *
   * @param string $target_data_type
   *   The data type of the referenced data.
   *
   * @return static
   */
  public static function create($target_data_type) {
    $definition['type'] = 'dynamic_' . $target_data_type . '_reference';
    $definition = new static($definition);
    return $definition->setTargetDefinition(\Drupal::typedDataManager()->createDataDefinition($target_data_type));
  }

}