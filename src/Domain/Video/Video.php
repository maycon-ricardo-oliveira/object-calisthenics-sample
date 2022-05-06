<?php

namespace Alura\Calisthenics\Domain\Video;

use InvalidArgumentException;

class Video
{
    private bool $visible = false;
    private int $ageLimit;

    public function publish(): void
    {
        $this->visible = true;
    }

    public function isPublish(): bool
    {
        return $this->visible;
    }

    public function getAgeLimit(): int
    {
        return $this->ageLimit;
    }

    public function setAgeLimit(int $ageLimit): void
    {
        $this->ageLimit = $ageLimit;
    }
}
