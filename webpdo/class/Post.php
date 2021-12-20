<?php

class Post{
    public $id;

    public $name;

    public $title;

    public $content;

    public $created_at;

    public function __construct()
    {
        if (is_int($this->created_at) || is_string($this->created_at)) {
            $this->created_at = new DateTime('@' . $this->created_at);
        }
    }

    public function getExcerpt():string
    {
        return substr($this->content, 0, 100);
    }
}
?>