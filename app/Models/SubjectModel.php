<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {
        $return = self::select('subject.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subject.created_by');
        if (!empty(Request::get('name'))) {
            $return = $return->where('subject.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('type'))) {
            $return = $return->where('subject.type', 'like', '%' . Request::get('type') . '%');
        }
        $return = $return->where('subject.is_delete', '=', 0)
            ->orderBy('subject.id')
            ->paginate(3);
        return $return;
    }
    static public function getSubject()
    {
        $return = SubjectModel::select('subject.*')
            ->join('users', 'users.id', 'subject.created_by')
            ->where('subject.is_delete', '=', 0)
            ->where('subject.status', '=', 0)
            ->orderBy('subject.name')
            ->get();
        return $return;
    }
}
