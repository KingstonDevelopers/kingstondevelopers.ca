<?php

namespace App\Enum;

final class Permission
{
    const CREATE_ANY = 'create';
    const READ_ANY = 'read';
    const UPDATE_ANY = 'update';
    const DELETE_ANY = 'delete';

    const SENSOR_READING_READ = 'sensor_reading:read';
    const SENSOR_READING_WRITE = 'sensor_reading:write';

    public function __construct()
    {
        throw new \RuntimeException("You cannot instantiate this enum class.");
    }
}
