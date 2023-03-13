<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepositoryRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index() {
        $users = array(
            array('name' => 'Trần Văn Trường 1', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            array('name' => 'Trần Văn Trường 2', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            array('name' => 'Trần Văn Trường 3', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            array('name' => 'Trần Văn Trường 4', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            array('name' => 'Trần Văn Trường 5', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            // array('name' => 'Trần Văn Trường 5', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            // array('name' => 'Trần Văn Trường 5', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            // array('name' => 'Trần Văn Trường 5', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            // array('name' => 'Trần Văn Trường 5', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            // array('name' => 'Trần Văn Trường 5', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            // array('name' => 'Trần Văn Trường 5', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
            // array('name' => 'Trần Văn Trường 5', 'phoneNumber' => '0123456789', 'address' => 'Cần Thơ', 'role' => 'Admin'),
        );
        return view('admin.user', ['users' => $users]);
    }

    public function register(RegisterRequest $request)
    {
        dd($request);
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
