<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    static public function getAdmin()
    {
        $return = self::select('users.*')
            ->where('user_type', '=', 1)
            ->where('is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        $return = $return->orderBy('id')
            ->paginate(8);
        return $return;
    }

    static public function getStudent()
    {
        $return = self::select('users.*')
            ->where('users.user_type', '=', 2)
            ->where('users.is_delete', '=', 0);
        $return = $return->orderBy('users.id', 'desc')
            ->paginate(8);
        return $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getProfile()
    {
        if (!empty($this->profile_pic) && file_exists('upload/profile_student/'.$this->profile_pic)) {
            return url('upload/profile_student/'.$this->profile_pic);
        } else {
            return "";
        }
    }
}