<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        if ($user->role === 'seller') {
            return redirect()->route('products.index');
        } elseif ($user->role === 'admin') {
            return redirect()->route('admin.users.index');
        }
        
        // For regular customers/buyers
        return view('dashboard');
    }
}
