<?php

class M_Page extends Model
{
    public function text_get()
    {
        return file_get_contents('data/text.txt');
    }
    public function text_set($text)
    {
        file_put_contents('data/text.txt', $text);
    }
}