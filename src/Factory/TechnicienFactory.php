<?php

namespace App\Factory;

use App\Entity\Technicien;
use App\Repository\TechnicienRepository;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Technicien>
 */
final class TechnicienFactory extends PersistentProxyObjectFactory{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Technicien::class;
    }
    

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'email' => self::faker()->email(),
            'nom' => self::faker()->lastname(),
            'prenom' => self::faker()->firstname(),
            'matricule' => self::faker()->text(5),
            'motdepasse' => self::faker()->text(5),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
        // ->afterInstantiate(function(Technicien $technicien): void {
        //     $technicien->setPassword($this->hasher->hashPassword($technicien,'123456'));
        // })
        ;
    }
}
