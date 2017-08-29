<?php declare(strict_types=1);

namespace MuCr\AppBundle\EventListener\Timestampable;

use Doctrine\ORM\Event\PreUpdateEventArgs;
use MuCr\AppBundle\Utils\Timestampable\TimestampableInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@fazland.com>
 */
class UpdateTimestampEventListener
{
    /**
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $object = $args->getObject();

        if (! $object instanceof TimestampableInterface) {
            return;
        }

        $object->updateTimestamp();
    }
}
