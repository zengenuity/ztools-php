<?php

namespace Zengenuity\Tools;

trait StringManipulationTrait {

  /**
   * Remove the unicode empty space that Excel puts at the beginning of the first
   * row of a CSV file. From: https://stackoverflow.com/a/15423899
   * @param string $text
   *
   * @return string
   */
  public function removeBOM(string $text) : string {
    $bom = pack('H*','EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
  }
}
