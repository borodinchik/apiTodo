<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if ($this->isModel($e)) {
            return $this->modelResponse($e);
        }

        if($this->isTokenInvalid($e))
        {
            return $this->TokenInvalidResponse($e);
        }

        elseif ($this->isTokenExpired($e))
        {
            return $this->TokenExpiredResponse($e);
        }

        elseif ($this->isTokenJWT($e))
        {
            return $this->JWTResponse($e);
        }

        if ($this->isHttp($e)) {
            return $this->httpResponse($e);
        }
        return parent::render($request, $e);
    }
/*Exception function*/
    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function isTokenInvalid($e)
    {
        return $e instanceof TokenInvalidException;
    }

    protected function isTokenExpired($e)
    {
        return $e instanceof TokenExpiredException;
    }

    protected function isTokenJWT($e)
    {
        return $e instanceof JWTException;
    }

    /*Response Function*/
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

    protected function TokenInvalidResponse($e)
    {
        return response()->json([
            'error' => 'Token is Invalid'
        ], 400);
    }

    protected function TokenExpiredResponse($e)
    {
        return response()->json([
            'error' => 'Token is Expired'
        ], 400);
    }

    protected function JWTResponse($e)
    {
        return response()->json([
            'error' => 'There is problem with your token'
        ], 400);
    }
}