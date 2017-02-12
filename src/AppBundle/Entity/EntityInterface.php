<?php

namespace MuCr\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
    public static function create(): self;

    /**
     * @return UuidInterface
     *
     * @ORM\Id()
     * @ORM\Column(type="string", nullable="false")
     */
    public function getId(): UuidInterface;

    /**
     * @return \DateTime
     *
     * @ORM\Column(type="datetime", nullable="false")
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @return \DateTime
     *
     * @ORM\Column(type="datetime", nullable="false")
     */
    public function getUpdatedAt(): \DateTime;

    /**
     * @return EntityInterface
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
    public static function createFromDTO(DTOInterface $dto): self;
}
