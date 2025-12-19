<?php

namespace App;

use Carbon\CarbonImmutable;
use Illuminate\Database\Connection;
use X402Sandbox\Sandbox\Sandbox as Contract;
use X402Sandbox\Sandbox\X402\PaymentKind;
use X402Sandbox\Sandbox\X402\PaymentResult;
use X402Sandbox\Sandbox\X402\Request;
use X402Sandbox\Sandbox\X402\Scheme;
use X402Sandbox\Sandbox\X402\Supported;

class Sandbox implements Contract
{
    public function __construct(
        protected Connection $db,
    ) {}

    public function log(Request $request, PaymentResult $result): void
    {
        $this->db->table('sandbox_requests')->insert([
            'payment_hash' => hash('sha256', $request->signature()),
            'payer' => $request->payer(),
            'transaction' => $result->transaction(),
            'type' => $result->type(),
            'ok' => $result->ok(),
            'payload' => json_encode($request->body()),
            'received_at' => CarbonImmutable::now(),
        ]);
    }

    public function supported(): Supported
    {
        $supported = Supported::make();

        $supported->signers('eip155:*', [
            '0x1234567890123456789012345678901234567890',
        ]);

        $supported->kinds(
            new PaymentKind(
                x402Version: 1,
                scheme: Scheme::EXACT,
                network: 'base-sepolia',
            ),
        );

        return $supported;
    }
}
