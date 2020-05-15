<?php

function persian_to_carbon($persian_date)
{
    return $persian_date ? Illuminate\Support\Carbon::createFromTimestamp(timestamp($persian_date)) : null;
}

function human_date($timestamp)
{
    return \Morilog\Jalali\Jalalian::forge($timestamp)->format('%d %B، %Y');
}

function date_picker_date($income)
{
    return $income ? \Morilog\Jalali\Jalalian::forge($income)->format('%Y/%m/%d') : null;
}

function user($p=null)
{
    $u = auth()->user();
    return $p ? $u->$p : $u;
}

function active($path)
{
    return request()->fullUrl() == url($path);
}

function expanded($array)
{
    $query = str_replace(request()->url(), '',request()->fullUrl());
    $path = request()->path();
    return in_array($path.$query,$array);
}

function short($string, $n=100)
{
    return strlen($string) > $n ? mb_substr($string, 0, $n).'...' : $string;
}

function class_name($input, $prefix='App\\')
{
    return $prefix.str_replace('_', '', ucwords($input, '_'));;
}

function rs($length = 10) {
    return substr(str_shuffle(str_repeat($x='123456789ABCDEFXYZ', ceil($length/strlen($x)) )),1,$length);
}

function upload($new_file, $old_file=null)
{
    delete_file($old_file);
    if ($new_file) {
        $relarive_path = "storage/app/public";
        $file_name = random_sha(20) . '.' . $new_file->getClientOriginalExtension();
        $result = $new_file->move(base_path($relarive_path),$file_name);
        return 'storage/' . $file_name;
    }else {
        return null;
    }
}

function delete_file($file)
{
    if ($file && file_exists($file)) {
        \File::delete($file);
    }
}

function prepare_multiple($inputs)
{
    $result = [];
    foreach ($inputs as $key => $array) {
        if(is_array($array) && count($array)){
            foreach ($array as $i => $value) {
                $result[$i][$key] = $value;
            }
        }
    }
    return $result;
}

function random_rgba($opacity=null)
{
    $opacity = $opacity ?? rand(0,10)/10;
    return "rgba(".rand(1,255).", ".rand(1,255).", ".rand(1,255).", $opacity)";
}
