<?php

namespace Paladin\Crud\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\Abstracts\AbstractAdminSidebarExtender;

/**
 * Class CoreSidebar
 * @package Paladin\Crud\Sidebar
 */
class CoreSidebar extends AbstractAdminSidebarExtender
{
    /**
     * Method used to define your sidebar menu groups and items
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('Core'), function (Group $group) {
        });

        return $menu;
    }
}