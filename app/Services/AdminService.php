<?php

namespace App\Services;

use App\Contracts\Dao\AdminDaoInterface;
use App\Contracts\Services\AdminServiceInterface;

class AdminService implements AdminServiceInterface
{
    private $adminDao;

    /**
     * Constructor
     *
     * @param AdminDaoInterface $NewsDao
     */
    public function __construct(AdminDaoInterface $adminDao)
    {
        $this->adminDao = $adminDao;
    }

    /**
     * post news function
     *
     * @param Request $request
     */

    public function postNews($request)
    {
        $this->newsDao->postNews($request);
    }

    /**
     * go Admin newfeed page function
     *
     * @return void
     */

    public function getHome()
    {
        return $this->adminDao->getHome();
    }

    /**
     * Delete News function
     *
     * @param [int] $id
     */

    public function deleteNews($id)
    {
        $this->adminDao->deleteNews($id);
    }

    /**
     * Go News edit page function
     *
     * @param [int] $id
     * @return void
     */

    public function getEditPage($id)
    {
        return $this->adminDao->getEditPage($id);
    }

    /**
     * Update news function
     *
     * @param Request $request
     * @param [int] $id
     * @return void
     */

    public function updateNews($request, $id)
    {
        return $this->adminDao->updateNews($request, $id);
    }
}
