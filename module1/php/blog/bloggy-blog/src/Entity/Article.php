<?php
namespace App\Entity;

use \DateTimeImmutable;

final class Article
{
  /** @var string */
  public const DB_TABLE = 'article';

  /** @var int */
  private int $id;
  /** @var string */
  private string $title;
  /** @var string */
  private string $content;
  /** @var DateTimeImmutable */
  private DateTimeImmutable $createdAt;
  /** @var string */
  private string $image;
  /** @var Category */
  private Category $category;


  public function hydrate(array $aData): self
  {
    $this
      ->setId($aData['idArticle'])
      ->setTitle($aData['title'])
      ->setContent($aData['content'])
      ->setCreatedAt(new DateTimeImmutable($aData['createdAt']))
      ->setImage($aData['image'])
      ;
    return $this;
  }

  /**
   * @return Category
   */
  public function getCategory(): Category
  {
    return $this->category;
  }

  /**
   * @param Category $category
   * @return Article
   */
  public function setCategory(Category $category): Article
  {
    $this->category = $category;
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

  /**
   * @param int $iLength
   *
   * @return string
   */
  public function getSummary(int $iLength = 150): string
  {
    $sSummary = mb_substr($this->content, 0, $iLength);

    if (mb_strlen($this->content) > $iLength) {
      $sSummary .= '...';
    }

    return $sSummary;
  }
}