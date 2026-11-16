<?php

namespace Moonsea\DevTools\Diagnostics\Security\Checks;

use Moonsea\DevTools\Diagnostics\Security\Check;
use Moonsea\DevTools\Diagnostics\Security\Severity;

final class BcryptRoundsCheck implements Check
{
    public function id(): string
    {
        return 'hashing.rounds';
    }

    public function title(): string
    {
        return 'Password hashing cost is too low';
    }

    public function severity(): Severity
    {
        return Severity::Low;
    }

    public function run(): array
    {
        $rounds = (int) config('hashing.bcrypt.rounds', 12);

        return $rounds < 10
            ? ['status' => 'fail', 'detail' => 'BCRYPT_ROUNDS='.$rounds, 'fix' => 'Use at least 10 rounds (12 recommended).']
            : ['status' => 'pass', 'detail' => 'BCRYPT_ROUNDS='.$rounds];
    }
}
