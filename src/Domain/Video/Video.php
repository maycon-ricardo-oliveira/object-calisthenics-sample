<?php

namespace Alura\Calisthenics\Domain\Video;

use InvalidArgumentException;

class Video
{
    public const PUBLIC = 1;
    public const PRIVATE = 2;

    private int $visibility = self::PRIVATE;
    private int $ageLimit;

    public function publish(): void
    {
        $this->visibility = self::PUBLIC;
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
