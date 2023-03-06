<?php

namespace App\Models\Auth;

use Database\Class\Users;
use LionSQL\Drivers\MySQL as DB;

class LoginModel {

	public function __construct() {

	}

    public function accountExistenceDB(Users $users): object {
        return DB::table('users')
            ->select(DB::as(DB::count('*'), "cont"))
            ->where(DB::equalTo("users_email"), $users->getUsersEmail())
            ->get();
    }

    public function authDB(Users $users): Users {
        return DB::fetchClass(Users::class)
            ->table('users')
            ->select("idusers", "idroles", "users_name", "users_lastname", "idstatus", "users_password")
            ->where(DB::equalTo("users_email"), $users->getUsersEmail())
            ->get();
    }

    public function updateStatusDB(Users $users) {
        return DB::table('users')->update([
            'idstatus' => $users->getIdstatus()
        ])->where(
            DB::equalTo('idusers'), $users->getIdusers()
        )->execute();
    }

}