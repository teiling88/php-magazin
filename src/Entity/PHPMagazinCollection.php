<?php declare(strict_types=1);

namespace Swag\PHPMagazin\Entity;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void add(PHPMagazinEntity $entity)
 * @method void set(string $key, PHPMagazinEntity $entity)
 * @method PHPMagazinEntity[] getIterator()
 * @method PHPMagazinEntity[] getElements()
 * @method PHPMagazinEntity|null get(string $key)
 * @method PHPMagazinEntity|null first()
 * @method PHPMagazinEntity|null last()
 */
class PHPMagazinCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return PHPMagazinEntity::class;
    }
}
