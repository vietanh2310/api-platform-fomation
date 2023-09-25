<?php

namespace App\Tests\Factory;

use App\Entity\GameSession;
use App\Entity\GameSessionStatus;
use App\Repository\GameSessionRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<GameSession>
 *
 * @method        GameSession|Proxy                     create(array|callable $attributes = [])
 * @method static GameSession|Proxy                     createOne(array $attributes = [])
 * @method static GameSession|Proxy                     find(object|array|mixed $criteria)
 * @method static GameSession|Proxy                     findOrCreate(array $attributes)
 * @method static GameSession|Proxy                     first(string $sortedField = 'id')
 * @method static GameSession|Proxy                     last(string $sortedField = 'id')
 * @method static GameSession|Proxy                     random(array $attributes = [])
 * @method static GameSession|Proxy                     randomOrCreate(array $attributes = [])
 * @method static GameSessionRepository|RepositoryProxy repository()
 * @method static GameSession[]|Proxy[]                 all()
 * @method static GameSession[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static GameSession[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static GameSession[]|Proxy[]                 findBy(array $attributes)
 * @method static GameSession[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static GameSession[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class GameSessionFactory extends ModelFactory
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
            'day' => \DateTimeImmutable::createFromMutable(self::faker()->dateTimeBetween('-3 days', 'now')),
            'iteration' => 0,
            'status' => self::faker()->randomElement(GameSessionStatus::cases()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
             ->afterInstantiate(function(GameSession $gameSession): void {
                 static $sequences = [];
                 $sequences[$gameSession->day->format(('Ymd'))] ??= 0;
                 $gameSession->iteration = ++$sequences[$gameSession->day->format('Ymd')];
             })
        ;
    }

    protected static function getClass(): string
    {
        return GameSession::class;
    }
}
