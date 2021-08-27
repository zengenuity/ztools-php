<?php

namespace Zengenuity\Tools;

trait ArrayManipulationTrait {

  /**
   * Flatten an array that has sub-arrays with a value key, such as:
   * [
   *   0 => [
   *     'value' => '123',
   *   ],
   *   1 => [
   *    'value' => '456',
   *   ],
   * ]
   * to this:
   * [
   *   0 => '123',
   *   1 => '456',
   * ]
   *
   * @param array $array
   * @param string $key
   *
   * @return array
   */
  public function flattenArrayWithValueKey(array $array, string $key = 'value') : array {
    return array_map(function($item) use ($key) {
      return $item[$key];
    }, $array);
  }

  /**
   * Implode an array of unknown length in an English language friendly way.
   * Adapted from: https://stackoverflow.com/a/8586179
   *
   * @param array $array
   * @param string $separator
   * @param string $joinWord
   * @param bool $oxford
   *
   * @return string
   */
  public function friendlyImplode(array $array, string $separator = ', ', string $joinWord = 'and', bool $oxford = TRUE)  {
    $last  = array_slice($array, -1);
    $first = implode(', ', array_slice($array, 0, -1));
    $both  = array_filter(array_merge([$first], $last), 'strlen');
    return implode(($oxford ? $separator : ' ') . $joinWord . ' ', $both);
  }

}
