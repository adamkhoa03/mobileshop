<?php

namespace App\Http\Controllers\Admin;

/**
 * Handle action for dashboard flow
 *
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends BaseController
{
    /**
     * Get data from table
     *
     * @return array
     */
    final public function getDataTable(): array
    {
        return [];
    }

    /**
     * Defined index page name
     *
     * @return string
     */
    final public function getIndexPageName(): string
    {
        return 'backend.index';
    }
}
