<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CreateCommunityMember()
 * @method static static UpdateCommunityMember()
 * @method static static DeleteCommunityMember()
 * @method static static CreateAdmin()
 * @method static static UpdateAdmin()
 * @method static static DeleteAdmin()
 * @method static static CreateOrganizationAdmin()
 * @method static static UpdateOrganizationAdmin()
 * @method static static DeleteOrganizationAdmin()
 * @method static static CreateGroup()
 * @method static static UpdateGroup()
 * @method static static DeleteGroup()
 * @method static static CreateOrganization()
 * @method static static UpdateOrganization()
 * @method static static DeleteOrganization()
 */
final class UserPermissions extends Enum
{
    const CreateCommunityMember = 'create-community-member';
    const UpdateCommunityMember = 'update-community-member';
    const DeleteCommunityMember = 'delete-community-member';
    const CreateAdmin = 'create-admin';
    const UpdateAdmin = 'update-admin';
    const DeleteAdmin = 'delete-admin';
    const CreateOrganizationAdmin = 'create-organization-admin';
    const UpdateOrganizationAdmin = 'update-organization-admin';
    const DeleteOrganizationAdmin = 'delete-organization-admin';
    const CreateGroup = 'create-group';
    const UpdateGroup = 'update-group';
    const DeleteGroup = 'delete-group';
    const CreateOrganization = 'create-organization';
    const UpdateOrganization = 'update-organization';
    const DeleteOrganization = 'delete-organization';
}
