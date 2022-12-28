<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if ($e instanceof \Throwable) {
                return response()->json(['error' => 'Something went wrong.'], 500);
            }
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Throwable) {
            if($exception instanceof NotFoundHttpException){
                return response()->json(['error' => 'Something went wrong.'], 500);
            }elseif($exception instanceof MethodNotAllowedException){
                return response()->json(['error' => 'Something went wrong.'], 500);
            }elseif($exception instanceof RouteNotFoundException){
                return response()->json(['error' => 'Something went wrong.'], 500);
            }
            else {
                return response()->json(['error' => $exception], 500);
            }
        }
        return parent::render($request, $exception);
    }
}
