<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CommunityMember()
 * @method static static Client()
 * @method static static Staff()
 * @method static static Admin()
 * @method static static OrganizationAdmin()
 * @method static static SuperAdmin()
 */
final class UserRoles extends Enum
{
    const CommunityMember = 'community-member';
    const Client = 'client';
    const Staff = 'staff';
    const Admin = 'admin';
    const OrganizationAdmin = 'organization-admin';
    const SuperAdmin = 'super-admin';
}
