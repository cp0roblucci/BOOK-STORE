<?php

namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepositoryRepository.
 *
 * @package namespace App\Repositories;
 */
interface UserRepositoryRepository extends RepositoryInterface
{
    public function register(User $user);

    public function getUserByEmail(String $email);
}
