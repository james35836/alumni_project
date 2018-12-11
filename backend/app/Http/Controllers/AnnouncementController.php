<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
class AnnouncementController extends Controller
{
    public function index()
    {
    	return Announcement::all();
    }

    public function show(Announcement $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = Announcement::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, Announcement $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
