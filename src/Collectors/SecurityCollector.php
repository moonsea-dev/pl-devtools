<?php

namespace Moonsea\DevTools\Collectors;

use Moonsea\DevTools\Diagnostics\Security\SecurityAuditor;

final class SecurityCollector implements Collector
{
    public function __construct(private readonly SecurityAuditor $auditor) {}

    public function key(): string
    {
        return 'security';
    }

    public function label(): string
    {
        return 'Security';
    }

    public function collect(array $profile): array
    {
        return $this->auditor->report();
    }

    public function view(): string
    {
        return 'pl-devtools::panels.security';
    }
}
