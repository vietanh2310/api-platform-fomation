<?php

namespace App\Tests\Story;

use App\Tests\Factory\ClubMemberFactory;
use Zenstruck\Foundry\Story;

final class ClubMemberStory extends Story
{
    public function build(): void
    {
        ClubMemberFactory::createMany(10);
    }
}
