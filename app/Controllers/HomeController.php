<?php

class HomeController
{
    public function index()
    {
    //     $data['title']= "Home Page";
    //     $data['content']="Content of home page";
    //    View::load('home',$data);
     // echo " this class is : ".__CLASS__." and method " .__METHOD__;
     View::load('home');
    }

}