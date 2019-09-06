<?php declare(strict_types=1);

namespace Swag\PHPMagazin\Entity;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class PHPMagazinDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'php_magazin';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return PHPMagazinEntity::class;
    }

    public function getCollectionClass(): string
    {
        return PHPMagazinCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection(
            [
                (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
                (new StringField('title', 'title'))->addFlags(new Required()),
                new StringField('cover', 'cover'),
                (new StringField('buy_link', 'buyLink'))->addFlags(new Required()),
            ]
        );
    }
}
