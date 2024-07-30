<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Permissions extends Enum
{
    const MANAGE_EMPLOYEE = 'manage_employee';
    const VIEW_EMPLOYEE = 'view_employee';
    const MANAGE_DEPARTMENT = 'manage_department';
    const VIEW_DEPARTMENT = 'view_department';
    const MANAGE_POSITION = 'manage_position';
    const VIEW_POSITION = 'view_position';
    const MANAGE_ATTENDANCE = 'manage_attendance';
    const VIEW_ATTENDANCE = 'view_attendance';
    const MANAGE_LEAVE = 'manage_leave';
    const VIEW_LEAVE = 'view_leave';
}
