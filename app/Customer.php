<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Customer extends Model
{
    public function scopecheckLogin($query, $email, $password)
    {
        $data = $query->where('email', $email)->get();
        $response = ["status" => false, "data" => [] ];
        if($data->count() > 0) {
            if(Hash::check($password, $data[0]->password)) {
                $response['status'] = true;
                $response['data'] = $data[0];
            }
        }
        return $response;
    }
}
