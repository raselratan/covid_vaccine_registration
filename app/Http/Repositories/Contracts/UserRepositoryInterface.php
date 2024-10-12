<?php

namespace App\Http\Repositories\Contracts;

interface UserRepositoryInterface
{
    /**
     * @return array
     */
    public function index() : array;

    /**
     * @param string $email
     * @return object| null
     */
    public function userByEmail(string $email) : object | null;

        /**
     * @param string $nid
     * @return object| null
     */
    public function userByNid(string $nid) : object | null;

    /**
     * @param array $data
     * @return object
    */
    public function create(array $data) : object;

         /**
     * @param int $id
     * @param array $data
     * @return object
     */
    public function update(int $id, array $data) : object;
}
