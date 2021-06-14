<?php

namespace App\Dao;

use App\Contracts\Dao\AdminDaoInterface;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminDao implements AdminDaoInterface
{
    /**
     * post news function
     *
     * @param Request $request
     */

    public function postNews($request)
    {
        $news = new News();
        $news->create($request->all());
    }

    /**
     * go Admin newfeed page function
     *
     * @return void
     */

    public function getHome()
    {
        return News::orderBy('created_at', 'DESC')->paginate(config('constant.PAGINATION_NUMBER'));
    }

    /**
     * Delete News function
     *
     * @param [int] $id
     */

    public function deleteNews($id)
    {
        News::find($id)->delete();
    }

    /**
     * Go News edit page function
     *
     * @param [int] $id
     * @return void
     */

    public function getEditPage($id)
    {
        return News::find($id);
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
        $news = News::find($id);
        $news->update($request->all());

        return News::orderBy('created_at', 'DESC')->paginate(config('constant.PAGINATION_NUMBER'));
    }
}