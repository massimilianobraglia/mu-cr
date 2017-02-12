<?php

namespace MuCr\Tests\Unit\AppBundle\Entity;

use MuCr\AppBundle\DTO\Artist as DTOArtist;
use MuCr\AppBundle\DTO\RecordLabel as DTORecordLabel;
use MuCr\AppBundle\Entity\Artist;
use MuCr\AppBundle\Entity\EntityInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
class ArtistTest extends \PHPUnit_Framework_TestCase
{
    public function testEntityShouldImplementEntityInterface(): void
    {
        $artist = new Artist();
        $this->assertInstanceOf(EntityInterface::class, $artist);
    }

    public function testArtistIsNotValidWithoutName(): void
    {
        $artist = new Artist();
        $this->assertFalse($artist->isValid());
    }

    public function testArtistIsValidWithName(): void
    {
        $artist = new Artist();

        $artist->setName("Anabasi Road");

        $this->assertTrue($artist->isValid());
    }

    public function testCreateShouldReturnAnInstanceOfArtist(): void
    {
        $artist = Artist::create();

        $this->assertInstanceOf(Artist::class, $artist);
    }

    public function testCreateDTOShouldReturnItsDTOVersion(): void
    {
        $artistName = "Crollo Verticale";
        $artistCountry = "Italia";
        $artistCreationYear = 1990;

        /** @var Artist|EntityInterface $artist */
        $artist = Artist::create()
            ->setName($artistName)
            ->setCountry($artistCountry)
            ->setCreationYear($artistCreationYear)
        ;

        $dtoArtist = $artist->createDTO();

        $this->assertInstanceOf(DTOArtist::class, $dtoArtist);
        $this->assertEquals($artistName, $dtoArtist->getName());
        $this->assertEquals($artistCountry, $dtoArtist->getCountry());
        $this->assertEquals($artistCreationYear, $dtoArtist->getCreationYear());
        $this->assertTrue($dtoArtist->isValid());
    }

    public function testCreateFromDTOShouldReturnItsEntityVersion(): void
    {
        $artistName = "Blind Guardian";
        $artistCountry = "Germania";
        $artistCreationYear = 1986;
        $artistDTORecordLabel = DTORecordLabel::create()
            ->setName('Nuclear Blast')
        ;

        $dtoArtist = DTOArtist::create()
            ->setName($artistName)
            ->setCountry($artistCountry)
            ->setCreationYear($artistCreationYear)
            ->setRecordLabel($artistDTORecordLabel)
        ;

        $artist = Artist::createFromDTO($dtoArtist);

        $this->assertInstanceOf(Artist::class, $artist);
        $this->assertEquals($artistName, $artist->getName());
        $this->assertEquals($artistCountry, $artist->getCountry());
        $this->assertEquals($artistCreationYear, $artist->getCreationYear());
        $this->assertEquals($artistDTORecordLabel->getName(), $artist->getRecordLabel()->getName());
        $this->assertTrue($artist->isValid());
    }
}
