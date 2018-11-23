<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminAccessController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::once($credentials)) {
            $user = Auth::user();
            $user->access_token =  substr(uniqid(base64_encode(str_random(255))),0,255);
            $user->save();
            // Authentication passed...
            return response()->json(['status' => 'success', 'access_token' => $user->access_token ]);
        } else {
            return response()->json(['error' => 'Not authorized.'],403);
        }
    }

    /**
     * 
     */
    public function logout(Request $request)
    {
        $user = User::where('access_token', $request->header('x-api-key'))->first();
        if($user !== null) {
            $user->access_token = null;
            $user->save();
            $message = 'logged out';
        } else {
            $message = 'nothing to do';
        }

        return response()->json(['status' => $message]);
    }

    /**
     *  if pass the AdminAccess middlewase then is allowed!
     */
    public function adminStatus()
    {
        return response()->json(['status' => 'Authorized']);
    }
}
