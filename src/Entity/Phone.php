<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PhoneRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PhoneRepository::class)
 * @ApiResource(
 *      paginationItemsPerPage=5,
 *      collectionOperations={
 *         "post",
 *         "get"={
 *             "normalization_context"={"groups"={"phones-list:read"}}
 *         }
 *     },
 *     itemOperations={
 *         "delete",
 *         "put",
 *         "get"={
 *             "normalization_context"={"groups"={"phone:read"}}
 *         }
 *     },
 * )
 */
class Phone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"phones-list:read", "phone:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"phones-list:read", "phone:read"})
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"phones-list:read", "phone:read"})
     */
    private $color;

    /**
     * @ORM\Column(type="text")
     * @Groups({"phone:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"phone:read"})
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}
