<?php
namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\User;
use App\Traits\ApiResponseTrait;

class AuthenticationController extends Controller {
    use  ApiResponseTrait;
    /**
     * user registration or signup
     * @param  $data
     * @return  response
     */
    public function signup(SignupRequest $request) {
        try {
            $user = User::create($request->all());
            return $this->setMessage('User Created.')->successResponse($user);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }

    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        logger('login-56');
        if ($token = auth('api')->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        logger('me-56');
        return response()->json([
            'message' => 'Profile fetched.',
            'code' => 200,
            'data' => auth('api')->user()
        ]);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        logger('logout-56');
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

     /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'code' => 200,
            'message' => 'Login success.',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
