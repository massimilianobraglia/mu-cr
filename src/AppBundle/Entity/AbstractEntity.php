<?php

namespace MuCr\AppBundle\Entity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
abstract class AbstractEntity implements EntityInterface
{
    /**
     * @var UuidInterface
     */
    protected $id;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * AbstractEntity constructor.
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->createdAt = new \DateTime();
        $this->updatedAt = $this->createdAt;
    }

    /**
     * @inheritDoc
     */
    public static function create(): EntityInterface
    {
        return new static();
    }

    /**
     * @inheritDoc
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @inheritDoc
     */
    public function updateTimestamp()
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }
}
