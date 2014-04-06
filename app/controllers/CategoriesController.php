<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoriesController extends BaseController{

    public function __construct() {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
    }
    
    public function getIndex() {
        return View::make('categories.index')
            ->with('categories', Category::all());
    }
    
    public function postCreate() {
        $validation = Validator::make(Input::all(), Category::$rules);
        
        if($validation->passes()){
            $category = new Category;
            $category->name = Input::get('name');
            $category->save();
            
            return Redirect::to('admin/categories/index')
                ->with('message', 'Category created');
        }
        
        return Redirect::to('admin/categories/index')
            ->with('message', 'Something went wrong')
            ->withErrors($validation)
            ->withInput();
    }
    
    public function postDestroy() {
        $category = Category::find(Input::get('id'));
        
        if($category){
            $category->delete();
            return Redirect::to('admin/categories/index')
                ->with('message', 'Category deleted');
        }
        
        return Redirect::to('admin/categories/index')
            ->with('message', "Something went wrong. Please try again.");
    }
}