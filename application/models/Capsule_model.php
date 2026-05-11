<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capsule_model extends CI_Model {

    /*
    |--------------------------------------------------------------------------
    | AMBIL SEMUA CAPSULE
    |--------------------------------------------------------------------------
    */

    public function getAllCapsules($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->get('capsules')
            ->result();
    }

    /*
    |--------------------------------------------------------------------------
    | ACTIVE CAPSULE
    |--------------------------------------------------------------------------
    */

    public function getActiveCapsules($user_id)
    {
        $this->db->where('user_id', $user_id);

        $this->db->where('open_date >', date('Y-m-d'));

        return $this->db->get('capsules')->result();
    }

    /*
    |--------------------------------------------------------------------------
    | HISTORY CAPSULE
    |--------------------------------------------------------------------------
    */

    public function getHistoryCapsules($user_id)
    {
        $this->db->where('user_id', $user_id);

        $this->db->where('open_date <=', date('Y-m-d'));

        return $this->db->get('capsules')->result();
    }

    /*
    |--------------------------------------------------------------------------
    | INSERT CAPSULE
    |--------------------------------------------------------------------------
    */

    public function insertCapsule($data)
    {
        return $this->db->insert('capsules', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE CAPSULE
    |--------------------------------------------------------------------------
    */

    public function deleteCapsule($id)
    {
        return $this->db->delete(
            'capsules',
            ['id' => $id]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | GET CAPSULE BY ID
    |--------------------------------------------------------------------------
    */

    public function getCapsuleById($id)
    {
        return $this->db
                    ->get_where(
                        'capsules',
                        ['id' => $id]
                    )
                    ->row();
    }

    /*
    |--------------------------------------------------------------------------
    | GET CAPSULE BY ID AND USER
    |--------------------------------------------------------------------------
    */

    public function getCapsuleByIdAndUser($id, $user_id)
    {
        return $this->db
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->get('capsules')
            ->row();
    }

}