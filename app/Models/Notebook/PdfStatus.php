<?php

namespace App\Models\Notebook;

use Illuminate\Database\Eloquent\Model;

class PdfStatus extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'pdf_status';

    protected $fillable = [
        'job_id',
        'link',
        'user_id'
    ];

    public static function changeStatus($job_id)
    {
        $item = self::where('job_id', $job_id)->firstOrFail();
        $item->update(['status' => 'success']);
    }

    public static function store($data)
    {

        return self::create($data);
    }

    public static function getStatus($job_id, $user_id)
    {

        $item = self::where([
            ['job_id', '=', $job_id],
            ['user_id', '=', $user_id]])
            ->get(['job_id', 'status']);
        if (count($item) > 0) {
            return $item->toArray()[0];
        } else {
            return null;
        }
    }

    public static function show($job_id, $user_id)
    {
        $item = self::where([
            ['job_id', '=', $job_id],
            ['user_id', '=', $user_id],
        ])->get(
            ['job_id', 'status', 'link']
        );
        if (count($item) > 0){
            if($item->toArray()[0]['status'] == 'success') {
                return $item->toArray()[0];
            }else{
                return 'not success';
            }
        } else {
            return null;
        }
    }
}
