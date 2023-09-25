<?php

declare(strict_types=1);

namespace App\Entity;

enum GameStatus: string
{
    CASE RUNNING = 'running';
    CASE COMPLETED = 'completed';
}
