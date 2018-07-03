<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = ['ROLE_USER', 'ROLE_ADMINISTRATOR', 'ROLE_MODERATOR'];

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        if ($request->has('is_banned')) {
            $isBanned = 1;
        } else {
            $isBanned = 0;
        }

        $user->update(array_merge($request->all(), ['is_banned' => $isBanned]));

        return redirect()->route('users.index')
            ->with('message', 'Pomyślnie zaktualizowano użytkownika.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('message', 'Pomyślnie usunięto użytkownika.');
    }
}
