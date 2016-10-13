<?php
abstract class AbstractController
{
    protected function render($file, $data = [])
    {
        $file = self::getViewPath() . DIRECTORY_SEPARATOR . $file;
        $view = new View($file, $data);
        echo $view;
    }
    protected static function getViewPath()
    {
        return realpath(__DIR__ . '/../View');
    }
}