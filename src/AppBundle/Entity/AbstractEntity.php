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
    }

    /**
     * {@inheritdoc}
     */
    public static function create(): EntityInterface
    {
        return new static();
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function updateTimestamp()
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }
}
