<?php

namespace Alura\Calisthenics\Domain\Video;

use InvalidArgumentException;

class Video
{
    private const PUBLIC = 1;
    private const PRIVATE = 2;

    private int $visibility = self::PRIVATE;
    private int $ageLimit;

    public function publish(): void
    {
        $this->visibility = self::PUBLIC;
    }

    public function isPublish(): bool
    {
        return $this->visibility === self::PUBLIC;
    }

    public function getVisibility(): int
    {
        return $this->visibility;
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
