<?php

declare (strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
    ];
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
// (1,	'K',	'k@email.com',	'2021-09-09 00:00:00',	'2021-09-09 00:00:00'),
// (2,	'KK',	'kk@email.com',	'2021-09-09 00:00:00',	'2021-09-09 00:00:00');
