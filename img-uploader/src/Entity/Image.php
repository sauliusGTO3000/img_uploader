<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Image(
     *     maxSize = "20M",
     *     mimeTypes = {"image/jpeg", "image/png", "image/gif"},
     *     maxHeight = "2000",
     *     maxWidth = "2000",
     *     minHeight="100",
     *     minWidth = "100",
     *     mimeTypesMessage = "Please upload a valid image, allowed types: .jpg, .png, .gif"
     *     )
     */
    private $filename;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Image
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     *
     * @return Image
     */
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }
}
