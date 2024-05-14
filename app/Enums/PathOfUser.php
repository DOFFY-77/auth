<?php

namespace App\Enums;

enum PathOfUser
{
    case admin;
    case manager;

    public function getPaths(): array
    {
        return match ($this) {
            self::admin => [
                'classes' => [
                    'index' => 'accounts.admin.classes.index',
                    'create' => 'accounts.admin.classes.create',
                    'edit' => 'accounts.admin.classes.edit'
                ],
                'establishments' => [
                    'index' => 'accounts.admin.establishments.index',
                    'create' => 'accounts.admin.establishments.create',
                    'edit' => 'accounts.admin.establishments.edit'
                ],
                'devices' => [
                    'index' => 'accounts.admin.devices.index',
                    'create' => 'accounts.admin.devices.create',
                    'edit' => 'accounts.admin.devices.edit'
                ],
                'marques' => [
                    'index' => 'accounts.admin.marques.index',
                    'create' => 'accounts.admin.marques.create',
                    'edit' => 'accounts.admin.marques.edit'
                ],
                'types' => [
                    'index' => 'accounts.admin.types.index',
                    'create' => 'accounts.admin.types.create',
                    'edit' => 'accounts.admin.types.edit'
                ],
                // Ajoutez d'autres contrôleurs ici si nécessaire...
            ],
            self::manager => [
                'classes' => [
                    'index' => 'accounts.manager.classes.index',
                    'create' => 'accounts.manager.classes.create',
                    'edit' => 'accounts.manager.classes.edit'
                ],
                'establishments' => [
                    'index' => 'accounts.manager.establishments.index',
                    'create' => 'accounts.manager.establishments.create',
                    'edit' => 'accounts.manager.establishments.edit'
                ],
                'devices' => [
                    'index' => 'accounts.manager.devices.index',
                    'create' => 'accounts.manager.devices.create',
                    'edit' => 'accounts.manager.devices.edit'
                ],
                'marques' => [
                    'index' => 'accounts.manager.marques.index',
                    'create' => 'accounts.manager.marques.create',
                    'edit' => 'accounts.manager.marques.edit'
                ],
                'types' => [
                    'index' => 'accounts.manager.types.index',
                    'create' => 'accounts.manager.types.create',
                    'edit' => 'accounts.manager.types.edit'
                ],
                'users' => [
                    'index' => 'accounts.manager.users.index',
                    'create' => 'accounts.manager.users.create',
                    'edit' => 'accounts.manager.users.edit'
                ],
                // Ajoutez d'autres contrôleurs ici si nécessaire...
            ]
        };
    }
}
