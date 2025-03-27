<?php


namespace App\Enum;

enum mediaTypeStatusEnum: string
{
    case active = 'active';
    case inactive = 'inactive';
    case banned = 'banned';
}