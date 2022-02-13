<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

function getUserGroups()
{
    $groups = Auth::user()->memberof;
    $cns = [];
    foreach ($groups as $group) {
        $ous = explode(',', $group);
        foreach ($ous as $ou) {
            if (Str::contains($ou, 'CN')) {
                $cns[] =  Str::after($ou, '=');
            }
        }
    }
    return $cns;
}

function checkIfUserIsIn($group)
{
    $groups = getUserGroups();
    $groupIn =  Arr::where($groups, function ($value, $key) use ($group) {
        return $value == $group;
    });
    if (count($groupIn) > 0) {
        return true;
    }
    return false;
}
