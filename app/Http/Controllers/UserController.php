<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Services\StoreUserService;
use App\Services\UpdateUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        private StoreUserService  $storeUserService,
        private UpdateUserService $updateUserService,
        private UserRepositoryInterface $userRepository){
    }

    public function index()
    {
        return view('users.index',
            ['users' => $this->userRepository->index()]);
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->storeUserService->handle($request->validated());
        return redirect()->route('users.index')->with('message', 'Uspešno kreiran korisnik');
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $this->updateUserService->handle($user, $request->validated());
        return redirect()->route('users.index')->with('message', 'Uspešno ažuriran korisnik');

    }
}
