TRUNCATE `ecenter`;
TRUNCATE `epupils`;
TRUNCATE `eschoolyear_by_worker`;
TRUNCATE `eschoolyear_by_worker_students`;
TRUNCATE `eworkers`;
DELETE FROM `aauth_users` WHERE id <> 1;
DELETE FROM `aauth_user_to_group` WHERE user_id <> 1;