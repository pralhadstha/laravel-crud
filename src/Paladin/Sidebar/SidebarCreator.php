<?php

namespace Paladin\Crud\Sidebar;

use Maatwebsite\Sidebar\Presentation\SidebarRenderer;

/**
 * Class SidebarCreator
 * @packagePaladin\Crud\Sidebar
 */
class SidebarCreator
{
    /**
     * @var AdminSidebar
     */
    protected $sidebar;

    /**
     * @var SidebarRenderer
     */
    protected $renderer;

    /**
     * SidebarCreator constructor.
     * @param AdminSidebar $sidebar
     * @param SidebarRenderer $renderer
     */
    public function __construct(AdminSidebar $sidebar, SidebarRenderer $renderer)
    {
        $this->sidebar  = $sidebar;
        $this->renderer = $renderer;
    }

    /**
     * @param $view
     */
    public function create($view)
    {
        $view->sidebar = $this->renderer->render($this->sidebar);
    }
}
