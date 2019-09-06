<?php declare(strict_types=1);

namespace Swag\PHPMagazin\Controller;

use Psr\Container\ContainerInterface;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Sorting\FieldSorting;
use Shopware\Storefront\Controller\StorefrontController;
use Swag\PHPMagazin\Entity\PHPMagazinEntity;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PHPMagazinController extends StorefrontController
{
    /**
     * @var EntityRepositoryInterface
     */
    private $repository;

    public function __construct(EntityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /** @Route("/phpMagazin") */
    public function index(): Response
    {
        $this->installDemoData();

        /** @var PHPMagazinEntity[] $PHPMagazins */
        $PHPMagazins = $this->repository->search(
            (new Criteria())->addSorting((new FieldSorting('title', 'ASC'))),
            Context::createDefaultContext()
        );

        return $this->renderStorefront('index.html.twig', ['PHPMagazins' => $PHPMagazins]);
    }

    private function installDemoData(): void
    {
        $this->repository->upsert(
            [
                [
                    'id' => 'c3ec803c274f4f5e82e48078b31f27e7',
                    'title' => 'PHP Magazin - 06.2019 - PHP-Frameworks',
                    'cover' => 'https://s3.eu-west-1.amazonaws.com/redsys-prod/issues/a955aa08ed585ec43884a317/images/cover_xxx_issues/a955aa08ed585ec43884a317/images/cover.jpg',
                    'buyLink' => 'https://kiosk.entwickler.de/php-magazin/php-magazin-6-2019-2/',
                ],
                [
                    'id' => 'c56116dbe3c34fd4a101b69da06129da',
                    'title' => 'PHP Magazin - 05.2019 - WordPress 2024',
                    'cover' => 'https://s3.eu-west-1.amazonaws.com/redsys-prod/issues/a0bf40edd41d9422951e85e1/images/cover_xxx_PM5_19_cover@2x_1563547525181.jpg',
                    'buyLink' => 'https://kiosk.entwickler.de/php-magazin/php-magazin-5-2019/',
                ],
                [
                    'id' => '1c3d675bc2bb4fc3915c5d6635b093ad',
                    'title' => 'PHP Magazin - 04.2019 - Micro Frontends',
                    'cover' => 'https://s3.eu-west-1.amazonaws.com/redsys-prod/issues/f7a8d4dab460c7c2d2b340a6/images/cover_xxx_PM4_19_cover@2x_1558967446771.jpg',
                    'buyLink' => 'https://kiosk.entwickler.de/php-magazin/php-magazin-4-2019/',
                ],
                [
                    'id' => 'f54baab3a63a48a6903c1c1f909a90ea',
                    'title' => 'PHP Magazin - 03.2019 - PHP 5.x und PHP 7.x',
                    'cover' => 'https://s3.eu-west-1.amazonaws.com/redsys-prod/issues/73fa1b8489299037708407d7/images/cover_xxx_PM3_19_cover@2x.jpg',
                    'buyLink' => 'https://kiosk.entwickler.de/php-magazin/php-magazin-3-2019/',
                ],
            ],
            Context::createDefaultContext()
        );
    }
}
