<?php

function menuTree($arr_data,$id='id',$pid='pid',$top=0)
    {
        if ( !is_array($arr_data)|| empty($arr_data)){
            return false;
        }

        $tree= array();
        $key_arr = array();

        foreach ( $arr_data as $key=>$val){
            $key_arr[$val[$id]] = &$arr_data[$key_arr];
        }

        foreach ($arr_data as $key=>$data){
            if ($data[$pid]===$top){
                $tree[] = &$arr_data[$key];
            }
            if (isset($key_arr[$data[$pid]])){
                $key_arr[$data[$pid]]['child'][] = &$arr_data[$key];
            }
        }
        return $tree;
    }
