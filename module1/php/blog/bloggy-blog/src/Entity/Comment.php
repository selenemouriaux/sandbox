<?php
namespace App\Entity;

use \DateTimeImmutable;

final class Comment
{
  private int $id;
  private Article $article;
  private User $user;
  private string $content;
  private int $rate;
  private DateTimeImmutable $createdAt;

  public function hydrate(array $aData): self
  {
    $this
      ->setId($aData['idComment'])
      ->setContent($aData['content'])
      ->setRate($aData['rate'])
      ->setCreatedAt(new DateTimeImmutable($aData['createdAt']));
    return $this;
  }

  /**
   * @param User $user
   */
  public function setUser(User $user): self
  {
    $this->user = $user;
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
   * @return Article
   */
  public function getArticle(): Article
  {
    return $this->article;
  }

  /**
   * @param Article $article
   */
  public function setArticle(Article $article): self
  {
    $this->article = $article;
    return $this;
  }

  /**
   * @return User
   */
  public function getUser(): User
  {
    return $this->user;
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
   * @return int
   */
  public function getRate(): int
  {
    return $this->rate;
  }

  /**
   * @param int $rate
   */
  public function setRate(int $rate): self
  {
    $this->rate = $rate;
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
}