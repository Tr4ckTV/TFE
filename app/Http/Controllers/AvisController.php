<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Avis;

class AvisController extends Controller
{
    public function create()
    {
        return view('avis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $userId = Auth::id();

        $avis = new Avis();
        $avis->comment = $request->input('comment');

        $avis->user_id = $userId;

        $avis->save();

        return redirect()->route('avis')->with('success', 'Votre avis a été ajouté avec succès !');
    }
}
