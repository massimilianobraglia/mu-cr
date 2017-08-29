<?php declare(strict_types=1);

namespace MuCr\AppBundle\Utils\Timestampable;

use Carbon\Carbon;

trait TimestampableTrait
{
    /**
     * @var \DateTimeInterface
     */
    private $createdAt;

    /**
     * @var \DateTimeInterface
     */
    private $updatedAt;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function updateTimestamp(): TimestampableInterface
    {
        $this->updatedAt = new Carbon();

        return $this;
    }
}
