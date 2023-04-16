<?php

declare(strict_types=1);

namespace Allekslar\SliderPlugin\Entity;

use Sylius\Component\Core\Model\ImagesAwareInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface SliderInterface extends ResourceInterface, ImagesAwareInterface, CodeAwareInterface
{
    public function getName(): ?string;

    public function setName(?string $name): void;
}
