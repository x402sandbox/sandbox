<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Sandbox;
use Illuminate\Http\JsonResponse;

class SupportedController extends Controller
{
    public function __invoke(Sandbox $sandbox): JsonResponse
    {
        return $sandbox->supported()->toResponse();
    }
}
