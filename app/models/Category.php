<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Category extends Eloquent{
    protected $fillable = array('name');
    
    public static $rules = array(
        'name' => 'required|min:3'
    );
    
    public function products() {
         $this->hasMany('Product');
    }
}
