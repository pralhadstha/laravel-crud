<?php

namespace Paladin\Crud\Sidebar\Abstracts;


use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender;
use Paladin\Crud\Sidebar\SidebarMenuBuilder;

/**
 * Class AbstractAdminSidebarExtender
 * @package Paladin\Crud\Sidebar\Abstracts
 */
abstract class AbstractAdminSidebarExtender implements SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth; //@ToDO:: add authentication method to the constructor.

    /**
     * @param SidebarMenuBuilder $sidebar
     */
    public function handle(SidebarMenuBuilder $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * Method used to define your sidebar menu groups and items
     * @param Menu $menu
     * @return Menu
     */
    abstract public function extendWith(Menu $menu);
}