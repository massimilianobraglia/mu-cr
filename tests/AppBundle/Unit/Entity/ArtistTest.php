<?php

namespace MuCr\Tests\Unit\AppBundle\Entity;

use MuCr\AppBundle\DTO\Artist as DTOArtist;
use MuCr\AppBundle\Entity\Artist;
use MuCr\AppBundle\Entity\EntityInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
class ArtistTest extends \PHPUnit_Framework_TestCase
{
    public function testEntityShouldImplementEntityInterface()
    {
        $artist = new Artist();
        $this->assertInstanceOf(EntityInterface::class, $artist);
    }

    public function testArtistIsNotValidWithoutName()
    {
        $artist = new Artist();
        $this->assertFalse($artist->isValid());
    }

    public function testArtistIsValidWithName()
    {
        $artist = new Artist();

        $artist->setName("Anabasi Road");

        $this->assertTrue($artist->isValid());
    }

    public function testCreateShouldReturnAnInstanceOfArtist()
    {
        $artist = Artist::create();

        $this->assertInstanceOf(Artist::class, $artist);
    }

    public function testCreateDTOShouldReturnItsDTOVersion()
    {
        $artistName = "Crollo Verticale";

        $artist = Artist::create()
            ->setName($artistName)
        ;

        $dtoArtist = $artist->createDTO();

        $this->assertInstanceOf(DTOArtist::class, $dtoArtist);
        $this->assertEquals($artistName, $dtoArtist->getName());
        $this->assertTrue($dtoArtist->isValid());
    }

    public function testCreateFromDTOShouldReturnItsEntityVersion()
    {
        $artistName = "Blind Guardian";

        $dtoArtist = DTOArtist::create()
            ->setName($artistName)
        ;

        $artist = Artist::createFromDTO($dtoArtist);

        $this->assertInstanceOf(Artist::class, $artist);
        $this->assertEquals($artistName, $artist->getName());
        $this->assertTrue($artist->isValid());
    }
}
