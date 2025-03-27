<?php


namespace App\Enum;

enum accountStatusEnum: string
{
    case active = 'active';
    case inactive = 'inactive';
    case banned = 'banned';
}