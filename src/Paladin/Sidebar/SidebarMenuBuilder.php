<?php

namespace Paladin\Crud\Sidebar;


use Maatwebsite\Sidebar\Menu;

/**
 * Class SidebarMenuBuilder
 * @package Paladin\Crud\Sidebar
 */
class SidebarMenuBuilder
{
    /**
     * @var Menu
     */
    private $menu;

    /**
     * SidebarMenuBuilder constructor.
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Add a menu group to the menu
     * @param Menu $menu
     */
    public function add(Menu $menu)
    {
        $this->menu->add($menu);
    }

    /**
     * Get the current Laravel-Sidebar menu
     * @return Menu
     */
    public function getMenu()
    {
        return $this->menu;
    }
}