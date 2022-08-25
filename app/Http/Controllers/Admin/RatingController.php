<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rateuser(Request $request, $id)
    {
        // dd($request->all());
        $data=new Rating();
        $data->user_id=$id;
        $data->rated_user_id=auth()->user()->id;
        $data->stars_rated=$request->user_rating;
        $data->save();
        return redirect()->back();
    }
    public function updaterating(Request $request, $id)
    {
        // dd($request->all());
        $data=Rating::find($id);
        // dd($id);
        $data->user_id=$data->user_id;
        $data->rated_user_id=auth()->user()->id;
        if ($request->has('user_rating')) {
            $data->stars_rated=$request->user_rating;
        }
        else
        $data->stars_rated=$data->user_rating;

        $data->save();
        return redirect()->back();
    }
}
