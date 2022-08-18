<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
        'credit_card',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (QueryException $e) {
           
            if ($e->getCode() === '23000') {
                Log::channel('sql')->warning($e->getMessage());
                return false;
            }

            return true;
        });

        $this->renderable(function (QueryException $e, Request $request) {
            if ($e->getCode() == 23000) {
                $message = 'Foreign key constraint failed';
            } else {
                $message = $e->getMessage();
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => $message,
                ], 400);
            }

            return redirect()
                ->back()
                ->withInput()->withErrors([
                    'message' => $e->getMessage(),
                ])
                ->with('info', $message);
        });
    }
}
