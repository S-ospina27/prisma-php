<?php

namespace App\Models;

use Database\Class\ReadUsers;
use Database\Class\Users;
use LionSql\Drivers\MySQL as DB;

class UsersModel {

	public function __construct() {
		
	}

	public function createUsersDB(Users $users) {
		return DB::call('create_users', [
			$users->getIdroles(),
			$users->getIddocumentTypes(),
			$users->getUsersIdentification(),
			$users->getUsersName(),
			$users->getUsersLastname(),
			$users->getUsersPhone(),
			$users->getUsersAddress(),
			$users->getIdcities(),
			$users->getUsersEmail(),
			$users->getUsersPassword(),
			$users->getUsersContactName(),
			$users->getUsersContactPhone(),
			$users->getIdstatus()
		])->execute();
	}

	public function readUsersDB() {
		return DB::table('read_users')
            ->select()
            ->getAll();
	}

    public function readUsersByIdDB(ReadUsers $readUsers): ReadUsers {
        return DB::fetchClass(ReadUsers::class)
            ->table('read_users')
            ->select()
            ->where(DB::equalTo('idusers'), $readUsers->getIdusers())
            ->get();
    }

	public function updateUsersDB(Users $users) {
		return DB::call('update_users', [
			$users->getIdroles(),
			$users->getUsersName(),
			$users->getUsersLastname(),
			$users->getUsersPhone(),
			$users->getUsersAddress(),
			$users->getIdcities(),
			$users->getUsersEmail(),
			$users->getUsersContactName(),
			$users->getUsersContactPhone(),
			$users->getIdstatus(),
			$users->getIdusers()
		])->execute();
	}

}