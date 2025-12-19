<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Sandbox;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use X402Sandbox\Sandbox\X402\V1\Request as PaymentRequest;
use X402Sandbox\Sandbox\X402\VerifyPayment;

class VerifyController extends Controller
{
    public function __construct(
        protected VerifyPayment $verify,
    ) {}

    public function __invoke(Sandbox $sandbox, Request $request): JsonResponse
    {
        $request = new PaymentRequest($request->only(
            'x402version',
            'paymentPayload',
            'paymentRequirements',
        ));

        $result = $this->verify->handle($sandbox, $request);

        return $result->toResponse();
    }
}
