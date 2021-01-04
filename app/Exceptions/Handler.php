<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if (
            $exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ||
            $exception instanceof NotFoundHttpException
        ){
            return response()->json([
                'error' => 'Không tìm thấy nội dung'
            ],JsonResponse::HTTP_NOT_FOUND);
        }
        return response()->json([
            $exception
        ],JsonResponse::HTTP_BAD_REQUEST);
//        return parent::render($request, $exception);
    }
}
