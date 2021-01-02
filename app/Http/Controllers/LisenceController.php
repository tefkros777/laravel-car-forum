<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LisenceController extends Controller
{
    public function show($id)
    {
        if (!Auth::user()->isAdmin() || Auth()->user()->id != $id){
            abort(403);
        }

        $user = User::find($id);

        return view('lisence.show', ['lisence' => $user->lisence]);
    }
}
