<?php
namespace App\Enums;

enum UserRole: string
{
    case USER = 'user';
    case VENDOR = 'vendor';
    case ADMIN = 'admin';
}
?>