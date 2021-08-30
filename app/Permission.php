<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission{
   protected $fillable = ['name','display_name','description'];
    public static function arrayForSeletePermission(){
        $arr = [];
        $permission = Permission::all();
        foreach ($permission as $list){
           $arr[$list->id] = $list->name;
        }
        return $arr;
    }
}
