<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if ($this->isModel($e)) {
            return $this->modelResponse($e);
        }
        if ($this->isHttp($e)) {
            return $this->httpResponse($e);
        }
        return parent::render($request, $e);
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function modelResponse($e)
    {
        return response()->json([
            'error' => 'Product Model not found'
        ], 404);
    }

    protected function httpResponse($e)
    {
        return response()->json([
            'error' => 'Incorrect route'
        ], 404);
    }
}