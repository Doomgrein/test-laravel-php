<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profileStore(StoreRequest $request, UserService $userService)
    {
        $data = $request->all();
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/' . $filename ) );
            $data['avatar'] = $filename;
        }
        $userService->create($data);
        $nickname = array_get($data, 'nickname');
        return redirect()->route('currentUser', [
            'nickname' => $nickname
        ]);
    }
}
