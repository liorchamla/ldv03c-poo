<?php

namespace App\Expense;

use App\User\User;
use DateTime;

class Expense
{
    public const STATUS_PENDING = "PENDING";
    public const STATUS_ACCEPTED = "ACCEPTED";
    public const STATUS_DENIED = "DENIED";

    public function __construct(
        public string $subject,
        public int $amount,
        public User $author,
        public ?DateTime $createdAt = null,
        public string $status = self::STATUS_PENDING,
        public ?int $id = null
    ) {
        if (!$createdAt) {
            $this->createdAt = new DateTime();
        }
    }
}
