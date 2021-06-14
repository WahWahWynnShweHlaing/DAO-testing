<?php

namespace App\Contracts\Services;

interface AdminServiceInterface
{
    public function postNews($request);
    public function getHome();
    public function deleteNews($id);
    public function getEditPage($id);
    public function updateNews($request, $id);
}
