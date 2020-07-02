<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
* @ORM\Entity(repositoryClass="App\Repository\UserRepository")
* @UniqueEntity(
*fields={"email"},
*message="L'émail que vous avez tapé est déjà utilisé !"
* )
*/
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
    * @ORM\Column(type="string", length=255)
    * @Assert\Length(
    * min = 8,
    * minMessage = "Votre mot de passe doit comporter au minimum {{ limit }} caractères")
    * @Assert\EqualTo(propertyPath = "confirm_password",
    * message="Vous n'avez pas saisi le même mot de passe !" )
    */

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
    /**
    * @Assert\EqualTo(propertyPath = "password",
    * message="Vous n'avez pas saisi le même mot de passe !" )
    */
    private $confirm_password;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    public function getConfirmPassword()
    {
    return $this->confirm_password;
    }
    public function setConfirmPassword($confirm_password)
    {
    $this->confirm_password = $confirm_password;
    return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getusername(): ?string
    {
        return $this->username;
    }

    public function setusername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
