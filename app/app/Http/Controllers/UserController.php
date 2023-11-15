<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()->paginate(3);
        if ($request->ajax()) {
            $search = $request->get('search');
            $search = str_replace(" ", "%", $search);
            $users = User::query()
                ->orWhere('name', 'like', '%' . $search . '%')->paginate(3);
            return view('pagination_child', compact('users'))->render();
        }
        return view('welcome', compact('users'));
    }
}
