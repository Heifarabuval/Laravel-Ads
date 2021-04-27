<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Ad;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($id)
    {
        $ads=Ad::query()
            ->where('user_id','=',Auth::id())
            ->paginate(5);

        return view('profile', ['user' =>  Auth::user(),'ads'=>$ads]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = User::query()->find($request->input()['id']);
        if (Hash::check($request->input()['password'], $data->password)) {
            date_default_timezone_set('Europe/Paris');
            $data->lastname = $request->input()['lastname'];
            $data->firstname = $request->input()['firstname'];
            $data->email = $request->input()['email'];
            $data->updated_at = (new \DateTime())->format('Y-m-d H:i:s');
            $data->save();
            return redirect('/profile/' . $data->id);
        } else {
            return view('profile', ['user' => $data, 'updateError' => 'Mot de passe']);
        }
    }

    public function delete(Request $request)
    {
        $data = User::query()->find($request->input()['id']);
        $data->delete();
        return redirect('/');
    }
}
