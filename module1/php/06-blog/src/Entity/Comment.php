<?php

final class Comment
{
  private int $id;
  private int $idArticle;
  private Article $article;
  private int $idUser;
  private User $user;
  private string $content;
  private int $rate;
  private DateTime $createdAt;

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
   * @return int
   */
  public function getIdArticle(): int
  {
    return $this->idArticle;
  }

  /**
   * @param int $idArticle
   */
  public function setIdArticle(int $idArticle): void
  {
    $this->idArticle = $idArticle;
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
  public function setArticle(Article $article): void
  {
    $this->article = $article;
  }

  /**
   * @return int
   */
  public function getIdUser(): int
  {
    return $this->idUser;
  }

  /**
   * @param int $idUser
   */
  public function setIdUser(int $idUser): void
  {
    $this->idUser = $idUser;
  }

  /**
   * @return User
   */
  public function getUser(): User
  {
    return $this->user;
  }

  /**
   * @param User $user
   */
  public function setUser(User $user): void
  {
    $this->user = $user;
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
   * @return int
   */
  public function getRate(): int
  {
    return $this->rate;
  }

  /**
   * @param int $rate
   */
  public function setRate(int $rate): void
  {
    $this->rate = $rate;
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

}