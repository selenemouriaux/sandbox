<?php
namespace App\Entity;

use \DateTimeImmutable;

final class User
{
  /** @var int */
  private int $id;
  /** @var string */
  private string $firstname;
  /** @var string */
  private string $lastname;
  /** @var string */
  private string $email;
  /** @var DateTimeImmutable */
  private DateTimeImmutable $createdAt;
  /** @var string */
  private string $password;
  /** @var string */
  private string $role;

  public function hydrate(array $aData): self
  {
    $this
      ->setId($aData['idUser'])
      ->setEmail($aData['email'])
      ->setFirstname($aData['firstname'])
      ->setLastname($aData['lastname'])
      ->setPassword($aData['password'])
      ->setRole($aData['role'])
      ->setCreatedAt(new DateTimeImmutable($aData['createdAt']))
      ;
    return $this;
  }

  /**
   * Fonction d'affichage appelée lors du "echo"
   * @return string
   */
  public function __toString(): string
  {
    return $this->lastname . ' ' . $this->firstname;
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
  public function getFirstname(): string
  {
    return $this->firstname;
  }

  /**
   * @param string $firstname
   */
  public function setFirstname(string $firstname): self
  {
    $this->firstname = $firstname;
    return $this;
  }

  /**
   * @return string
   */
  public function getLastname(): string
  {
    return $this->lastname;
  }

  /**
   * @param string $lastname
   */
  public function setLastname(string $lastname): self
  {
    $this->lastname = $lastname;
    return $this;
  }

  /**
   * @return string
   */
  public function getEmail(): string
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail(string $email): self
  {
    $this->email = $email;
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
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword(string $password): self
  {
    $this->password = $password;
    return $this;
  }

  /**
   * @return string
   */
  public function getRole(): string
  {
    return $this->role;
  }

  /**
   * @param string $role
   */
  public function setRole(string $role): self
  {
    $this->role = $role;
    return $this;
  }

}