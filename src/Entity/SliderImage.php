<?php

declare(strict_types=1);

namespace Allekslar\SliderPlugin\Entity;

use Sylius\Component\Core\Model\Image;

class SliderImage extends Image implements SliderImageInterface
{
    private $title;

    private $description;

    private $anchor;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getAnchor(): ?string
    {
        return $this->anchor;
    }

    public function setAnchor(?string $anchor): void
    {
        $this->anchor = $anchor;
    }

    public function hasLink(): bool
    {
        return !empty($this->type);
    }

    public function getLink(): ?string
    {
        return $this->type;
    }
}
