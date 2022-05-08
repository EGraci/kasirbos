<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'profile';
    protected $primaryKey = 'id_profile';
    protected $fillable = [
        'nama_pemilik',
        'nama_usaha',
        'siu',
        'alamat_usaha',
        'telepon',
    ];
    public function data_profile(){
        return DB::table('profile')
            ->join('user', 'user.id_profile', '=', 'profile.id_profile')
            ->where('user.level','=','2')
            ->get(array(
                'profile.id_profile',
                'profile.nama_pemilik',
                'profile.nama_usaha',
                'profile.alamat_usaha',
                'profile.telepon'
            ));
    }
    public function data_akun($username = null){
        if(is_null($username)){
            return DB::table('profile')
            ->join('user', 'user.id_profile', '=', 'profile.id_profile')
            ->get(array(
                'user.username',
                'profile.nama_pemilik',
                'profile.nama_usaha',
                'profile.alamat_usaha',
                'profile.telepon',
                'profile.siup',
                'user.level'
            ));
        }else{
            return DB::table('profile')
            ->join('user', 'user.id_profile', '=', 'profile.id_profile')
            ->where('user.username','=',$username)
            ->first(array(
                'user.id_user',
                'profile.id_profile',
                'user.username',
                'profile.nama_pemilik',
                'profile.nama_usaha',
                'profile.alamat_usaha',
                'profile.telepon',
                'profile.siup',
                'user.level'
            ));
        }
    }
}
