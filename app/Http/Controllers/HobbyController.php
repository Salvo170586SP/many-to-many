<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hobby;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function showHobbies($id)
    {
        $user = User::find($id);
        $hobbies = User::find($id)->hobbies;

        $hobbiesOff = Hobby::whereDoesntHave('users', function (Builder $query) use ($id){
            $query->where('user_id', $id);
        })->get();

        return view('users.showHobbies', compact('hobbies', 'user','hobbiesOff'));
    }

    public function detachHobby($hobby_id, $user_id)
    {

        $user = User::findOrFail($user_id);
        $user->hobbies()->detach($hobby_id);

        return back();
    }

    /*  public function editHobby($id, $user){
        $hobbies = Hobby::whereNot('id', $id)->get();

        foreach($hobbies as $hobby){
            dd($hobby->id);
         
        }


        return view('users.editHobby');
    } */

    public function detachAllHobbies($user)
    {
        //elimino tutti gli hobbies
        $user = User::findOrFail($user);
        $hobby = $user->hobbies()->detach();


        return back();
    }

    public function addHobbies(Request $request)
    {   
        //aggiungo gli hobby dalla tendina all'elenco
        /* dd($request); */
        $user = User::findOrFail($request->user_id);
        $user->hobbies()->attach($request->hobby_id);
      
        return back();
    }
}
