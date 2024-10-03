<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserNameResource;
use App\Models\UserName;
use Illuminate\Http\Request;

class UserNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserNameResource::collection(UserName::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Age' => 'required|integer|min:0',
        ]);

        // إنشاء كائن جديد من UserName
        $userName = UserName::create($validatedData);

        return response()->json(new UserNameResource($userName), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userName = UserName::find($id);

        if (!$userName) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return new UserNameResource($userName);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'Name' => 'sometimes|required|string|max:255',
            'Age' => 'sometimes|required|integer|min:0',
        ]);

        $userName = UserName::find($id);

        if (!$userName) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // تحديث الكائن
        $userName->update($validatedData);

        return response()->json(new UserNameResource($userName), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userName = UserName::find($id);

        if (!$userName) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $userName->delete();

        return response()->json(['message' => 'User successfully deleted'], 200);
    }
}
