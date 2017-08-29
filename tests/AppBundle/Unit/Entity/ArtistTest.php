<?php declare(strict_types=1);

namespace MuCr\Tests\Unit\AppBundle\Entity;

use MuCr\AppBundle\DTO\Artist as DtoArtist;
use MuCr\AppBundle\DTO\RecordLabel as DtoRecordLabel;
use MuCr\AppBundle\Entity\Artist;
use MuCr\AppBundle\Entity\EntityInterface;
use MuCr\AppBundle\Entity\RecordLabel;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
class ArtistTest extends TestCase
{
    public function testEntityShouldImplementEntityInterface(): void
    {
        $artist = new Artist('Anabasi Road');
        $this->assertInstanceOf(EntityInterface::class, $artist);
    }

    public function testArtistIsWellFormedOnConstruction(): void
    {
        $artist = new Artist('Rhapsody');

        $this->assertTrue($artist->isValid());
    }

    public function testCreateShouldReturnAnInstanceOfArtist(): void
    {
        $artist = Artist::create('Edguy');

        $this->assertInstanceOf(Artist::class, $artist);
    }

    public function testCreateDtoShouldReturnItsDtoVersion(): void
    {
        $artistName = "Crollo Verticale";
        $artistCountry = "Italia";
        $artistCreationYear = 1990;

        /** @var Artist|EntityInterface $artist */
        $artist = Artist::create($artistName)
            ->setCountry($artistCountry)
            ->setCreationYear($artistCreationYear)
        ;

        $dtoArtist = $artist->createDTO();

        $this->assertInstanceOf(DtoArtist::class, $dtoArtist);
        $this->assertEquals($artistName, $dtoArtist->name);
        $this->assertEquals($artistCountry, $dtoArtist->country);
        $this->assertEquals($artistCreationYear, $dtoArtist->creationYear);
        $this->assertTrue($dtoArtist->isValid());
    }

    public function testCreateFromDTOShouldReturnItsEntityVersion(): void
    {
        $artistName = "Blind Guardian";
        $artistCountry = "Germania";
        $artistCreationYear = 1986;
        $recordLabelName = 'Nuclear Blast';

        /** @var RecordLabel|ObjectProphecy $recordLabel */
        $recordLabel = $this->prophesize(RecordLabel::class);
        $recordLabel->getName()->willReturn($recordLabelName);

        $dtoArtist = DtoArtist::create();
        $dtoArtist->name = $artistName;
        $dtoArtist->country = $artistCountry;
        $dtoArtist->creationYear = $artistCreationYear;
        $dtoArtist->recordLabel = $recordLabel->reveal();

        $artist = Artist::createFromDTO($dtoArtist);

        $this->assertInstanceOf(Artist::class, $artist);
        $this->assertEquals($artistName, $artist->getName());
        $this->assertEquals($artistCountry, $artist->getCountry());
        $this->assertEquals($artistCreationYear, $artist->getCreationYear());
        $this->assertEquals($recordLabelName, $artist->getRecordLabelName());
        $this->assertTrue($artist->isValid());
    }
}
