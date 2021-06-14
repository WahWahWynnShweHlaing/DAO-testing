<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AdminServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * go Admin newfeed page function
     *
     * @return void
     */

    public function getHome()
    {
        $news = $this->adminService->getHome();
        return view('admin.newfeed.newfeed', compact('news'));
    }

    /**
     * go create new page function
     *
     * @return void
     */

    public function createNewsPage()
    {
        return view('admin.newfeed.createnews');
    }

    /**
     * Create news function
     *
     * @param Request $request
     * @return void
     */

    public function createNews(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|max:255',
            'title' => 'required|max:200',
        ]);

        $this->newsService->postNews($request);
        Session::flash('success', config('constant.CREATE_MSG'));
        return redirect()->route('admin.home');
    }

    /**
     * Delete News function
     *
     * @param [int] $id
     */

    public function deleteNews($id)
    {
        $this->adminService->deleteNews($id);
        Session::flash('success', config('constant.DELETE_MSG'));
        return redirect()->back();
    }

    /**
     * Go News edit page function
     *
     * @param [int] $id
     * @return void
     */

    public function getEditPage($id)
    {
        $new = $this->adminService->getEditPage($id);

        return view('admin.newfeed.editNews', compact('new'));
    }

    /**
     * Update news function
     *
     * @param Request $request
     * @param [int] $id
     * @return void
     */

    public function updateNews(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'max:255|required',
            'title' => 'max:200|required',
        ]);

        $news = $this->adminService->updateNews($request, $id);

        Session::flash('success', config('constant.UPDATE_MSG'));

        return redirect()->route('admin.home')->with(['news' => $news]);
    }

    /**
     * go user lists function
     *
     * @return void
     */

    public function usersList()
    {
        $users = $this->adminService->usersList();
        return view('admin.users.usersList', compact('users'));
    }

    /**
     * delete users function
     *
     * @param [int] $id
     * @return void
     */

    public function usersDelete($id)
    {
        $this->adminService->usersDelete($id);
        Session::flash('success', config('constant.DELETE_MSG'));
        return redirect()->back();
    }

    /**
     * go to create user page function
     *
     * @return void
     */

    public function usersCreatePage()
    {
        return view('admin.users.createuser');
    }

    /**
     * create users function
     *
     * @param Request $request
     * @return void
     */

    public function usersCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email|max:255|string',
            'password' => 'required|confirmed|min:6',
        ]);

        $this->adminService->usersCreate($request);
        Session::flash('success', config('constant.CREATE_MSG'));
        return redirect()->route('admin.users.list');
    }

    /**
     * go user edit page function
     *
     * @param [int] $id
     * @return void
     */

    public function getUserEditPage($id)
    {
        $user = $this->adminService->getUserEditPage($id);

        return view('admin.users.editUser', compact('user'));
    }

    /**
     * update users function
     *
     * @param [int] $id
     * @param Request $request
     * @return void
     */

    public function updateUser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|string',
        ]);

        $this->adminService->updateUser($request, $id);

        Session::flash('success', config('constant.UPDATE_MSG'));
        return redirect()->route('admin.users.list');
    }

    /**
     * get admin list page function
     *
     * @return void
     */

    public function adminsList()
    {
        $users = $this->adminService->adminsList();
        return view('admin.admins.adminlist', compact('users'));
    }

    /**
     * delete admin function
     *
     * @param [int] $id
     * @return void
     */

    public function adminsDelete($id)
    {
        $this->adminService->adminsDelete($id);

        Session::flash('success', config('constant.DELETE_MSG'));
        return redirect()->back();
    }

    /**
     * go to create admin page function
     *
     * @return void
     */

    public function adminsCreatePage()
    {
        return view('admin.admins.createadmin');
    }

    /**
     * create admin function
     *
     * @param Request $request
     * @return void
     */

    public function adminsCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email|max:255|string',
            'password' => 'required|confirmed|min:6',
        ]);

        $this->adminService->adminsCreate($request);
        Session::flash('success', config('constant.CREATE_MSG'));
        return redirect()->route('admin.list');
    }

    /**
     * go edit page for admin function
     *
     * @param [int] $id
     * @return void
     */

    public function getAdminEditPage($id)
    {
        $user = $this->adminService->getAdminEditPage($id);

        return view('admin.admins.editadmin', compact('user'));
    }

    /**
     * update admin function
     *
     * @param Request $request
     * @param [int] $id
     * @return void
     */

    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|string',
        ]);

        $this->adminService->updateAdmin($request, $id);

        Session::flash('success', config('constant.UPDATE_MSG'));
        return redirect()->route('admin.list');
    }

    /**
     * search admin function
     *
     * @param Request $request
     * @return void
     */

    public function adminSearch(Request $request)
    {
        $users = $this->adminService->adminSearch($request);

        return view('admin.admins.adminlist', compact('users'));
    }

    /**
     * search user function
     *
     * @param Request $request
     * @return void
     */

    public function userSearch(Request $request)
    {
        $users = $this->adminService->userSearch($request);

        return view('admin.users.userslist', compact('users'));
    }

    /**
     * search news function
     *
     * @param Request $request
     * @return void
     */

    public function newsSearch(Request $request)
    {
        $news = $this->adminService->newsSearch($request);

        return view('admin.newfeed.newfeed', compact('news'));
    }

    /**
     * go to admin profile page function
     *
     * @return void
     */

    public function adminProfile()
    {
        return view('admin.setting.profile');
    }

    /**
     * update admin profile function
     *
     * @param Request $request
     * @param [int] $id
     * @return void
     */

    public function adminProfileUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|string',
        ]);

        $this->adminService->adminProfileUpdate($request, $id);

        Session::flash('success', config('constant.UPDATE_MSG'));
        return redirect()->back();
    }

    /**
     * go to admin password page function
     *
     * @return void
     */

    public function adminPassword()
    {
        return view('admin.setting.password');
    }

}
