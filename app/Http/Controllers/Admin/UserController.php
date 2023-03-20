<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepositoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryRepository $userRepository)
    {
      $this->userRepository = $userRepository;
    }

    public function index(Request $request) {
      $page = $request->query('page', 1);
      $users = DB::table('users')->paginate(5);
      return view('admin.user', compact('users', 'page'));
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function getAll()
    {

    }
}
