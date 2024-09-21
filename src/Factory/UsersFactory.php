<?php

namespace App\Factory;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Users>
 */
final class UsersFactory extends PersistentProxyObjectFactory{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
   public function __construct(private UserPasswordHasherInterface $hasher)
    { 
    }
 
 
    public static function class(): string
    {
        return Users::class;
    }
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'noms' => self::faker()->lastname(),
            'prenoms' => self::faker()->firstname(),
            'email' => self::faker()->email(),
            'nom_utilisateur' => self::faker()->Username(),
            'roles' => [],
            'fonction' => self::faker()->jobTitle(),
            'matricule' => self::faker()->text(5),
            //'matricule' => self::faker()->NumeroMatricule('MTR' . str_pad(4, '0', STR_PAD_LEFT)),
            'service' => self::faker()->text(5),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this->afterInstantiate(function(Users $users): void {
            $users->setPassword($this->hasher->hashPassword($users,'123456'));

        })
        ;
    }
}
