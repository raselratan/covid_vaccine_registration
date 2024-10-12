<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @return array
     */
    public function index() : array
    {
        return User::get()->toArray();
    }

    /**
     * @param string $email
     * @return object| null
     */
    public function userByEmail(string $email) : object | null
    {
        return User::whereEmail($email)->first();
    }

        /**
     * @param string $nid
     * @return object| null
     */

    public function userByNid(string $nid) : object | null
    {
        return DB::table('users')
        ->leftJoin('schedules', 'users.id', '=', 'schedules.user_id')
        ->leftJoin('venues', 'users.venue_id', '=', 'venues.id')
        ->select('users.name', 'users.email', 'users.nid', 'users.status', 
            DB::raw("DATE_FORMAT(schedules.scheduled_date, '%W, %d-%M-%Y') as scheduled_date"), 
            'schedules.dosage', 'venues.name as venue')
        ->where('users.nid',$nid)
        ->first();
    }

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data) : object
    {
        return User::create($data);
    }

     /**
     * @param int $id
     * @param array $data
     * @return object
     */
    public function update(int $id, array $data) : object
    {
        return User::where('id', $id)->update($data);
    }
}
