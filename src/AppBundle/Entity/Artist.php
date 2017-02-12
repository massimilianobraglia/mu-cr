<?php

namespace MuCr\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MuCr\AppBundle\DTO\DTOInterface;
use MuCr\AppBundle\DTO\Artist as DTOArtist;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="Artist")
 */
class Artist extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable="false")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable="true")
     */
    private $country;

    /**
     * @var int
     *
     * @ORM\Column(type="int", nullable="true")
     */
    private $creationYear;

    /**
     * @var RecordLabel
     */
    private $recordLabel;

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        if ("" === trim($this->name)) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Artist
     */
    public function setName(string $name): Artist
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     *
     * @return Artist
     */
    public function setCountry(?string $country): Artist
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCreationYear(): ?int
    {
        return $this->creationYear;
    }

    /**
     * @param int|null $creationYear
     *
     * @return Artist
     */
    public function setCreationYear(?int $creationYear): Artist
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    /**
     * @return RecordLabel|null
     */
    public function getRecordLabel(): ?RecordLabel
    {
        return $this->recordLabel;
    }

    /**
     * @param RecordLabel|null $recordLabel
     *
     * @return Artist
     */
    public function setRecordLabel(?RecordLabel $recordLabel = null): Self
    {
        $this->recordLabel = $recordLabel;

        return $this;
    }

    /**
     * @return DTOArtist|DTOInterface
     */
    public function createDTO(): DTOInterface
    {
        return DTOArtist::createFromEntity($this);
    }

    /**
     * @param DTOArtist|DTOInterface $dto
     *
     * @return Artist|EntityInterface
     */
    public static function createFromDTO(DTOInterface $dto): EntityInterface
    {
        return static::create()
            ->setName($dto->getName())
            ->setCountry($dto->getCountry())
            ->setCreationYear($dto->getCreationYear())
            ->setRecordLabel(RecordLabel::createFromDTO($dto->getRecordLabel()))
        ;
    }
}
