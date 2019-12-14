<?php

class Output
{
    public static $output_scripts = array();
    public static $output_styles = array();

    public static function load($route, $data = array())
    {
        $content = Output::loadFile(VIEW . 'template/common/Header.php', $data);
        $content .= Output::loadFile(VIEW . 'template/' . $route . '.php', $data);
        $content .= Output::loadFile(VIEW . 'template/common/Footer.php', $data);

        echo $content;
    }

    public static function rawLoad($route, $data = array())
    {
        $content = Output::loadFile(VIEW . 'template/' . $route . '.php', $data);
        echo $content;
    }

    public static function loadFile($route, $data)
    {
        ob_start();
        require $route;
        $template = ob_get_clean();

        $template = Output::compile($template, $data);
        return $template;
    }


    public static function addJs($js_route)
    {
        $output_script = "<script src='src/view/www/dist/" . $js_route . ".js?v=" . Config::Get("cache_version") . "' > </script>";
        Output::$output_scripts[] = $output_script;
    }

    public static function addCss($css_route)
    {
        $output_style = "<link href='src/view/www/dist/" . $css_route . ".css?v=" . Config::Get("cache_version") . "' rel='stylesheet'>";
        Output::$output_styles[] = $output_style;
    }

    public static function compile($template, $data)
    {
        $keys = array();
        foreach ($data as $key => $value) {
            $keys[] = "{{" . $key . "}}";
        }

        return str_replace($keys, array_values($data), $template);
    }
}
