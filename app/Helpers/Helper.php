<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = ''){
        $html = '';
        foreach ($menus as $key=>$menu){
                if($menu->parent_id == $parent_id){
                    $html .= '
                      <tr>
                        <td>'. $menu->id .'</td>
                        <td>'. $char. $menu->name .'</td>
                        <td>'. $char. $menu->parent_id .'</td>
                        <td>'. $char. $menu->description .'</td>
                        <td>'. $char. $menu->tag .'</td>
                        <td>'. self::active($menu->active) .'</td>
                        <td>'. $menu->updated_at .'</td>
                        <td>
                               <a class="btn btn-warning btn-sm" href="/admin/menus/preview/'. $menu->id.'">
                                    <i class="fa fa-eye"></i>
                                </a>
                               <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'. $menu->id.'">
                                    <i class="fa fa-edit"></i>
                                </a>
                               <a href="" class="btn btn-danger btn-sm" onclick="removeRow('.$menu->id.',\'/admin/menus/destroy/\')">
                                    <i class="fa fa-trash"></i>
                               </a>
                        </td>
                      </tr>
                    ';
                    unset($menus[$key]);

                    $html .= self::menu($menus, $menu->id, $char.'--');
                }
        }

        return $html;
    }

    public static function active($active = 0){
        return $active==0 ? "<input type='radio'>" : "<input type='radio' checked>";
    }

    public static function menus($menus, $parent_id = 0){
        $html = '';
        foreach ($menus as $key => $menu) {
            if($menu->parent_id == $parent_id){
                $html .= '
                <li>
                    <a href="/danh-muc/'.$menu->id.'-'.$slug = Str::slug($menu->name, '-').'">
                        '.$menu->name.'
                    </a>';
                    if(self::isChild($menus, $menu->id)){
                        $html .= '<ul class = "ml-2">';
                        $html .= self::menus($menus, $menu->id);
                        $html .= '</ul>';
                    }
                    $html .= '</li>';
            }
        }
        return $html;
    }

    public static function isChild($menus, $id){
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $id){
                return true;
            }
        }
        return false;
    }
}
