<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product extends Eloquent{
    protected $fillable = array('category_id', 'title', 'description', 'price', 'availability', 'image');
    
    public static $rules = array(
        'category_id'=>'required|integer',
        'title'=>'required|min:2',
        'description'=>'required|min:20',
        'price'=>'required|numeric',
        'availability'=>'integer',
        'image'=>'required|image|mimes:jpeg,jpg,png,bmp,png,gif'
    );
    
    public function category() {
        $this->belongsTo('Category');
    }
}

