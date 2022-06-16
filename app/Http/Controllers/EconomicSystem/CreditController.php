<?php

namespace App\Http\Controllers\EconomicSystem;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(User $user)
    {
        return view('getcredit',[
            'user'=>$user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'userCredit'=>'required|numeric',
        ]);

        $newCredit = $user->userCredit;
        $newCredit += $request->userCredit;
        $user->update([
            'userCredit' => $newCredit,
        ]);
        
        return back();
    }
}
