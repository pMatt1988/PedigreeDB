<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Dog
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $sireid
 * @property int $damid
 * @property string $sex
 * @property string $dob
 * @property string $pretitle
 * @property string $posttitle
 * @property string $reg
 * @property string $color
 * @property string $markings
 * @property int $fss
 * @property int $rat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Dog $dam
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dog[] $offspring
 * @property-read \App\Dog $sire
 * @property-read \App\Models\Auth\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereDamid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereFss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereMarkings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog wherePosttitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog wherePretitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereRat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereReg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereSireid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereUserId($value)
 */
	class Dog extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\User
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string $avatar_type
 * @property string|null $avatar_location
 * @property string|null $password
 * @property string|null $password_changed_at
 * @property bool $active
 * @property string|null $confirmation_code
 * @property bool $confirmed
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dog[] $Dogs
 * @property-read string $action_buttons
 * @property-read string $change_password_button
 * @property-read string $clear_session_button
 * @property-read string $confirmed_button
 * @property-read string $confirmed_label
 * @property-read string $delete_button
 * @property-read string $delete_permanently_button
 * @property-read string $edit_button
 * @property-read string $full_name
 * @property-read string $login_as_button
 * @property-read string $name
 * @property-read string $permissions_label
 * @property-read mixed $picture
 * @property-read string $restore_button
 * @property-read string $roles_label
 * @property-read string $show_button
 * @property-read string $social_buttons
 * @property-read string $status_button
 * @property-read string $status_label
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\PasswordHistory[] $passwordHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\SocialAccount[] $providers
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Session[] $sessions
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User active($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User confirmed($confirmed = true)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User uuid($uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereAvatarLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereAvatarType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User wherePasswordChangedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class Role.
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $action_buttons
 * @property-read string $delete_button
 * @property-read string $edit_button
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class PasswordHistory.
 *
 * @property int $id
 * @property int $user_id
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory whereUserId($value)
 * @mixin \Eloquent
 */
	class PasswordHistory extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class SocialAccount.
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $token
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
	class SocialAccount extends \Eloquent {}
}

namespace App\Models\System{
/**
 * Class Session
 * package App.
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereUserId($value)
 * @mixin \Eloquent
 */
	class Session extends \Eloquent {}
}

namespace App{
/**
 * App\r
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\r newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\r newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\r query()
 * @mixin \Eloquent
 */
	class r extends \Eloquent {}
}

