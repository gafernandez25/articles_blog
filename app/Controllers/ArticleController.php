<?php

namespace App\Controllers;

class ArticleController
{

    public function index()
    {
        echo "Articles' index";
    }

    public function show()
    {
        echo "Article " . $_GET["id"];
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }
}