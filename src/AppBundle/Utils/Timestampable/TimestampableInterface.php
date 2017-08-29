<?php declare(strict_types=1);

namespace MuCr\AppBundle\Utils\Timestampable;

interface TimestampableInterface
{
    public function getCreatedAt(): \DateTimeInterface;

    public function getUpdatedAt(): \DateTimeInterface;

    public function updateTimestamp(): TimestampableInterface;
}
