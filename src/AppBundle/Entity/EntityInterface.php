<?php

namespace MuCr\AppBundle\Entity;

use MuCr\AppBundle\DTO\DTOInterface;
use Ramsey\Uuid\UuidInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
interface EntityInterface
{
    /**
     * @return EntityInterface
     */
    public static function create(): EntityInterface;

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime;

    /**
     * @return $this
     */
    public function updateTimestamp();

    /**
     * @return DTOInterface
     */
    public function createDTO(): DTOInterface;

    /**
     * @param DTOInterface $dto
     *
     * @return EntityInterface
     */
    public static function createFromDTO(DTOInterface $dto): EntityInterface;
}
