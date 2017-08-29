<?php declare(strict_types=1);

namespace MuCr\AppBundle\Entity;

use Carbon\Carbon;
use MuCr\AppBundle\Utils\Timestampable\TimestampableInterface;
use MuCr\AppBundle\Utils\Timestampable\TimestampableTrait;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
abstract class AbstractEntity implements EntityInterface, TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @var UuidInterface
     */
    protected $id;

    /**
     * AbstractEntity constructor.
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->createdAt = new Carbon();
        $this->updatedAt = $this->createdAt;
    }

    /**
     * @inheritDoc
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
