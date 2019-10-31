<?php

namespace Paladin\Crud\Sidebar\Traits;

/**
 * Trait GetSidebarClass
 * @package Paladin\Crud\Sidebar\Traits
 */
trait GetSidebarClass
{
    /**
     * @param $module
     * @param $default
     * @return mixed
     */
    public function getSidebarClassForModule($module, $default)
    {
        if ($this->hasCustomSidebar($module)) {
            $class = package_config("{$module}.config.custom-sidebar");
            if (class_exists($class) === false) {
                return $default;
            }

            return $class;
        }

        return $default;
    }

    /**
     * @param $module
     * @return bool
     */
    private function hasCustomSidebar($module)
    {
        $config = package_config("{$module}.config.custom-sidebar");

        return $config !== null;
    }
}
