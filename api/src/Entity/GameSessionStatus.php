<?php

declare(strict_types=1);

namespace App\Entity;

enum GameSessionStatus: string
{
    CASE RUNNING = 'running';
    CASE COMPLETED = 'completed';
}
