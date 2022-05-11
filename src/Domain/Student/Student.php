<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Video\Video;
use DateTimeImmutable;
use DateTimeInterface;
use Ds\Map;

class Student
{
    private Email $email;
    private DateTimeInterface $birthDate;
    private WatchedVideos $watchedVideos;
    private string $fName;
    private string $lName;
    public string $street;
    public string $number;
    public string $province;
    public string $city;
    public string $state;
    public string $country;

    public function __construct(
        Email $email,
        DateTimeInterface $birthDate,
        string $fName,
        string $lName,
        string $street,
        string $number,
        string $province,
        string $city,
        string $state,
        string $country) {
        $this->watchedVideos = new WatchedVideos();
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->street = $street;
        $this->number = $number;
        $this->province = $province;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function getFullName(): string
    {
        return "{$this->fName} {$this->lName}";
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->count() === 0) {
            return true;
        }

        return $this->firstVideoWasWatchedInLessThan90Days();
    }

    private function firstVideoWasWatchedInLessThan90Days(): bool
    {
        $firstDate = $this->watchedVideos->dateOfFirstVideo();
        $today = new DateTimeImmutable();

        return $firstDate->diff($today)->days < 90;
    }

    public function age(): int
    {
        $today = new DateTimeImmutable();
        $dateInterval = $this->birthDate->diff($today);

        return $dateInterval->y;
    }
}
