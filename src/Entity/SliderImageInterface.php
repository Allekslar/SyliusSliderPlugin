<?php

declare(strict_types=1);

namespace Allekslar\SliderPlugin\Entity;

use Sylius\Component\Core\Model\ImageInterface;

interface SliderImageInterface extends ImageInterface
{
    public function getDescription(): ?string;

    public function setDescription(?string $description): void;

    public function getTitle(): ?string;

    public function setTitle(?string $title): void;

    public function getAnchor(): ?string;

    public function setAnchor(?string $title): void;

    public function hasLink(): bool;

    public function getLink(): ?string;
}
