<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->friend_id = $request->friend_id;
        $wishlist->save();
        return redirect()->back();
    }

    public function list()
    {
        $user = Wishlist::where('user_id',Auth::user()->id)->get();
        return view('wishlist',compact('user'));
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back();
    }
}
