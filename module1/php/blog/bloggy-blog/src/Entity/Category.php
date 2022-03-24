<?php

final class Category
{
  private int $id;
  private string $label;

  public function hydrate(array $aCategory) :Category {
    $this->id = $aCategory['idCategory'];
    $this->label = $aCategory['label'];
    //fluent
    return $this;
  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id) :Category
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getLabel() :string
  {
    return $this->label;
  }

  /**
   * @param string $label
   */
  public function setLabel(string $label) :Category
  {
    $this->label = $label;
    return $this;
  }
}