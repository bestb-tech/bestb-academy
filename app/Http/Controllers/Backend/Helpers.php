<?php


namespace App\Http\Controllers\Backend;


use Carbon\Carbon;

class Helpers
{

    /**
     * @param $old_img
     * @param $image
     * @param $base_path
     * @return string|null
     */
    public static function saveImage($old_img, $image, $base_path){
        if(!is_null($old_img)){
            $old_file_path = public_path('storage/'.$base_path.'/'.$old_img);
            if (file_exists($old_file_path) ){
                unlink($old_file_path);
            }
        }
        $filename=null;
        if(!is_null($image)){
            $time = Carbon::now()->format('Y-m-d-h-i-s');
            $filename = $time . uniqid() .'.'. pathinfo($image->getClientOriginalName(),PATHINFO_EXTENSION ) ;
            $image->storeAs($base_path.'/', $filename, 'public');
        }
        return $filename;
    }

    /**
     *  use App\Http\Requests\Backend\CourseOfflineRequest
     *  use App\Http\Controllers\Backend\Helper
     *  Helpers::ruleToMessage(CourseOfflineRequest::rules())
     *
     * @param $map
     * @return array
     */
    public static function ruleToMessage($map){
        $data =[];
        foreach($map as $key => $value){
            $rules = explode ('|',$value);
            foreach($rules as $rule){
                $rule = explode(':',$rule)[0];
                if($rule == 'nullable'){
                    continue;
                }
                $data_rule = $key.'.'.$rule;
                $data_message = '';
                $data[$data_rule] = $data_message;
            }
        }
        return $data;
    }
}
