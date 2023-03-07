<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
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

    public function create() {

    }

    public function update() {
        
    }

    public function delete() {
        
    }

    public function getAll() {
        
    }
}
