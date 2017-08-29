<?php declare(strict_types=1);

namespace MuCr\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MuCr\AppBundle\DTO\DtoInterface;
use Ramsey\Uuid\UuidInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
interface EntityInterface
{
    /**
     * @return UuidInterface
     *
     * @ORM\Id()
     * @ORM\Column(type="string", nullable="false")
     */
    public function getId(): UuidInterface;

    /**
     * @return \DateTimeInterface
     *
     * @ORM\Column(type="datetime", nullable="false")
     */
    public function getCreatedAt(): \DateTimeInterface;

    /**
     * @return \DateTimeInterface
     *
     * @ORM\Column(type="datetime", nullable="false")
     */
    public function getUpdatedAt(): \DateTimeInterface;

    public function createDto(): DtoInterface;

    public static function createFromDTO(DtoInterface $dto): self;
}
