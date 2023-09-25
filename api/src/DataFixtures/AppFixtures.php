<?php

namespace App\DataFixtures;

use App\Tests\Story\ClubMemberStory;
use App\Tests\Story\ClubStory;
use App\Tests\Story\GameSessionStory;
use App\Tests\Story\GameStory;
use App\Tests\Story\UserStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * @codeCoverageIgnore
 */
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ClubStory::load();
        UserStory::load();
        ClubMemberStory::load();
        GameSessionStory::load();
        GameStory::load();

        $manager->flush();
    }
}
