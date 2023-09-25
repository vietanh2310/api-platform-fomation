<?php

namespace App\Tests\Factory;

use App\Entity\ClubMember;
use App\Entity\ClubMemberRole;
use App\Repository\ClubMemberRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<ClubMember>
 *
 * @method        ClubMember|Proxy                     create(array|callable $attributes = [])
 * @method static ClubMember|Proxy                     createOne(array $attributes = [])
 * @method static ClubMember|Proxy                     find(object|array|mixed $criteria)
 * @method static ClubMember|Proxy                     findOrCreate(array $attributes)
 * @method static ClubMember|Proxy                     first(string $sortedField = 'id')
 * @method static ClubMember|Proxy                     last(string $sortedField = 'id')
 * @method static ClubMember|Proxy                     random(array $attributes = [])
 * @method static ClubMember|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ClubMemberRepository|RepositoryProxy repository()
 * @method static ClubMember[]|Proxy[]                 all()
 * @method static ClubMember[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static ClubMember[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static ClubMember[]|Proxy[]                 findBy(array $attributes)
 * @method static ClubMember[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static ClubMember[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ClubMemberFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'club' => ClubFactory::random(),
            'member' => UserFactory::random(), // TODO add App\Entity\User type manually
            'role' => self::faker()->randomElement(ClubMemberRole::cases()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(ClubMember $clubMember): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ClubMember::class;
    }
}
