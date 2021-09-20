<?php declare(strict_types=1);

namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;

/**
 *
 * Class User
 *
 * @since 2.0
 *
 * @Entity(table="users")
 */
class User extends Model
{
    /**
     * @Id()
     *
     * @Column()
     *
     * @var int|null
     */
    private $id;

    /**
     * @Column()
     *
     * @var string
     */
    private $name;

    /**
     * @Column()
     *
     * @var string
     */
    private $email;

    /**
     * @param int|null $id
     *
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
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
// (1,	'K',	'k@email.com',	'2021-09-09 00:00:00',	'2021-09-09 00:00:00'),
// (2,	'KK',	'kk@email.com',	'2021-09-09 00:00:00',	'2021-09-09 00:00:00');
