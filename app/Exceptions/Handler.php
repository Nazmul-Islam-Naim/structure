<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            Log::error($e->getMessage());
        });
    }

    public function render($request, Throwable $exception) {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'status' => 'Faild',
                'code' => 422,
                'message' => $exception->getMessage(),
                'errors' => $exception->errors(),
            ]);
        }

        return parent::render($request, $exception);
    }
}
