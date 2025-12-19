<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Sandbox;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use X402Sandbox\Sandbox\X402\SettlePayment;
use X402Sandbox\Sandbox\X402\V1\Request as PaymentRequest;

class SettleController extends Controller
{
    public function __construct(
        protected SettlePayment $settle,
    ) {}

    public function __invoke(Sandbox $sandbox, Request $request): JsonResponse
    {
        $request = new PaymentRequest($request->all());

        $result = $this->settle->handle($sandbox, $request);

        return $result->toResponse();
    }
}
