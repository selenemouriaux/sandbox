<?php

final class Article
{
  /** @var int */
  private int $id;
  /** @var string */
  private string $title;
  /** @var string */
  private string $content;
  /** @var DateTimeImmutable */
  private DateTimeImmutable $createdAt;
  /** @var int */
  private int $idCategory;
  /** @var string */
  private string $image;
  /** @var string */
  private string $categoryLabel;

  public function hydrate(array $aData): self
  {
    $this
      ->setId($aData['idArticle'])
      ->setTitle($aData['title'])
      ->setContent($aData['content'])
      ->setCreatedAt(new DateTimeImmutable($aData['createdAt']))
      ->setIdCategory($aData['categoryId'])
      ->setImage($aData['image'])
      ->setCategoryLabel($aData['category_label'])
      ;
    return $this;
  }

  /**
   * @return string
   */
  public function getCategoryLabel(): string
  {
    return $this->categoryLabel;
  }

  /**
   * @param string $categoryLabel
   * @return Article
   */
  public function setCategoryLabel(string $categoryLabel): Article
  {
    $this->categoryLabel = $categoryLabel;
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
  public function setId(int $id): self
  {
    $this->id = $id;
    return $this;
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
  public function setTitle(string $title): self
  {
    $this->title = $title;
    return $this;
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
  public function setContent(string $content): self
  {
    $this->content = $content;
    return $this;
  }

  /**
   * @return DateTimeImmutable
   */
  public function getCreatedAt(): DateTimeImmutable
  {
    return $this->createdAt;
  }

  /**
   * @param DateTimeImmutable $createdAt
   */
  public function setCreatedAt(DateTimeImmutable $createdAt): self
  {
    $this->createdAt = $createdAt;
    return $this;
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
  public function setIdCategory(int $idCategory): self
  {
    $this->idCategory = $idCategory;
    return $this;
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
  public function setImage(string $image): self
  {
    $this->image = $image;
    return $this;
  }

}