<?php

final class Article
{
  /** @var int */
  private int $id;
  /** @var string */
  private string $title;
  /** @var string */
  private string $content;
  /** @var DateTime */
  private DateTime $createdAt;
  /** @var int */
  private int $idCategory;
  /** @var string */
  private string $image;

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
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getTitle(): string
  {
    return $this->title;
  }

  /**
   * @param string $title
   */
  public function setTitle(string $title): void
  {
    $this->title = $title;
  }

  /**
   * @return string
   */
  public function getContent(): string
  {
    return $this->content;
  }

  /**
   * @param string $content
   */
  public function setContent(string $content): void
  {
    $this->content = $content;
  }

  /**
   * @return DateTime
   */
  public function getCreatedAt(): DateTime
  {
    return $this->createdAt;
  }

  /**
   * @param DateTime $createdAt
   */
  public function setCreatedAt(DateTime $createdAt): void
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @return int
   */
  public function getIdCategory(): int
  {
    return $this->idCategory;
  }

  /**
   * @param int $idCategory
   */
  public function setIdCategory(int $idCategory): void
  {
    $this->idCategory = $idCategory;
  }

  /**
   * @return string
   */
  public function getImage(): string
  {
    return $this->image;
  }

  /**
   * @param string $image
   */
  public function setImage(string $image): void
  {
    $this->image = $image;
  }

}