<?php

namespace App\Contracts\Dao;

interface AdminDaoInterface
{
    public function postNews($request);
    public function getHome();
    public function deleteNews($id);
    public function getEditPage($id);
    public function updateNews($request, $id);
}
