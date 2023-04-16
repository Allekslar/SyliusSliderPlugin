<?php

declare(strict_types=1);

namespace Allekslar\SliderPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $catalogMenu = $menu->getChild('catalog');

        $catalogMenu
            ->addChild('slider', [
                'route' => 'allekslar_slider_admin_slider_index',
            ])
            ->setLabel('allekslar_slider.ui.sliders')
            ->setLabelAttribute('icon', 'images outline')
        ;
    }
}
