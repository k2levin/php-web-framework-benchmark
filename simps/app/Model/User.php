<?php

declare(strict_types=1);

namespace App\Model;

use Simps\DB\BaseModel;

class User extends BaseModel
{
    public function getUser(int $id): array
    {
        $users = $this->select('users', [
            'name', 'email',
        ], [
            'id' => $id,
        ]);

        return $users[0];
    }
}

// DROP TABLE IF EXISTS `users`;
// CREATE TABLE `users` (
//   `id` bigint unsigned NOT NULL AUTO_INCREMENT,
//   `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
//   `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
//   `created_at` timestamp NULL DEFAULT NULL,
//   `updated_at` timestamp NULL DEFAULT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

// INSERT INTO `users` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
// (1,	'Paul',	'paul@email.com',	'2021-09-07 08:31:28',	'2021-09-07 08:31:28'),
// (2,	'Kevin',	'kevin@email.com',	'2021-09-07 08:31:43',	'2021-09-07 08:31:43');
