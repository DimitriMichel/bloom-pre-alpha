<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRole extends Enum
{
    const CommunityMember = 'community-member';
    const Client = 'client';
    const Staff = 'staff';
    const Admin = 'admin';
    const OrganizationAdmin = 'organization-admin';
    const SuperAdmin = 'super-admin';
}
