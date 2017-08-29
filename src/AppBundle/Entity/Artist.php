<?php declare(strict_types=1);

namespace MuCr\AppBundle\Entity;

use AppBundle\Exception\Dto\MalformedDtoException;
use Doctrine\ORM\Mapping as ORM;
use MuCr\AppBundle\Dto\DtoInterface;
use MuCr\AppBundle\Dto\Artist as DtoArtist;

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
     * @var null|string
     *
     * @ORM\Column(type="string", nullable="true")
     */
    private $country;

    /**
     * @var null|int
     *
     * @ORM\Column(type="int", nullable="true")
     */
    private $creationYear;

    /**
     * @var null|RecordLabel
     */
    private $recordLabel;

    public function __construct(string $name)
    {
        parent::__construct();

        $this->name = $name;
    }

    /**
     * @param string $name
     *
     * @return EntityInterface|self
     */
    public static function create(string $name): EntityInterface
    {
        return new static($name);
    }

    public function isValid(): bool
    {
        if ("" === trim($this->name)) {
            return false;
        }

        return true;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCreationYear(): ?int
    {
        return $this->creationYear;
    }

    public function setCreationYear(?int $creationYear): self
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    public function getRecordLabel(): ?RecordLabel
    {
        return $this->recordLabel;
    }

    public function setRecordLabel(?RecordLabel $recordLabel = null): self
    {
        $this->recordLabel = $recordLabel;

        return $this;
    }

    public function getRecordLabelName(): ?string
    {
        return null !== $this->recordLabel ? $this->recordLabel->getName() : null;
    }

    /**
     * @return DtoInterface|DtoArtist;
     */
    public function createDto(): DtoInterface
    {
        return DtoArtist::createFromEntity($this);
    }

    /**
     * @param DtoArtist|DtoInterface $dto
     *
     * @return EntityInterface|self
     *
     * @throws MalformedDtoException
     */
    public static function createFromDto(DtoInterface $dto): EntityInterface
    {
        if (! $dto->isValid()) {
            throw new MalformedDtoException('Could not create Artist entity. Missing mandatory name.');
        }

        /** @var self $artist */
        $artist = static::create($dto->name);
        $artist
            ->setCountry($dto->country)
            ->setCreationYear($dto->creationYear)
            ->setRecordLabel($dto->recordLabel)
        ;

        return $artist;
    }
}
