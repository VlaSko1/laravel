<?php

namespace App\Http\Controllers\Aggregator;

use App\Http\Controllers\Controller;
use App\Http\Requests\AggregatorAdminProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('aggregator.admin.profileList', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('aggregator.admin.profileEdit', [
            'user' => $user
        ]);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->input('id'));

        if($user->delete()) {
            return redirect()->route('adminProfileIndex')
                ->with('success', 'Пользователь успешно удален.');
        }
        return back()->with('error', 'Не удалось удалить пользователя');
    }

    public function update(AggregatorAdminProfileRequest $request)
    {
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');


        if($user->save()) {
            return redirect()->route('adminProfileIndex')
                ->with('success', 'Профиль успешно изменен.');
        }

        return back()->with('error', 'Не удалось изменить профиль.');
    }
}
