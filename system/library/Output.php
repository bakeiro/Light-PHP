<?php

namespace Library;

/**
 * Library class, loads templates, replaces the double brackets by the variable value,
 * and can add JS and CSS files to the end of a template.
 */
class Output
{
    public static $output_scripts = array();
    public static $output_styles = array();

    /**
     * Loads a templates using the $route, and uses the $data Array (if exists) in the template.
     * this load also the header and the footer template
     *
     * @param $route String path of the template to load
     * @param $data String array of data to use in the template (if any)
     *
     * @return void
     */
    public static function load($route, $data = array())
    {
        $content = Output::loadFile(VIEW . 'template/common/Header.php', $data);
        $content .= Output::loadFile(VIEW . 'template/' . $route . '.php', $data);
        $content .= Output::loadFile(VIEW . 'template/common/Footer.php', $data);

        echo $content;
    }

    /**
     * Load a template, replaces the brackets for the variables in the array $data, and returns
     * the template as String
     *
     * @param $route String route of the template to load
     * @param $data Array Array with values to print in the template
     * @return String template
     */
    public static function loadFile($route, $data)
    {
        ob_start();
        require $route;
        $template = ob_get_clean();

        $template = Output::compile($template, $data);
        return $template;
    }


    /**
     * Adds a js file at the end of the html document
     *
     * @param $js_route String path of the js file (without extension)
     * @return void
     */
    public static function addJs($js_route)
    {
        $output_script = "<script src='src/view/www/dist/" . $js_route . ".js?v=" . Config::Get("cache_version") . "' > </script>";
        Output::$output_scripts[] = $output_script;
    }

    /**
     * Adds a css file at the end of the html document
     *
     * @param $css_route String path of the css file (without extension)
     * @return void
     */
    public static function addCss($css_route)
    {
        $output_style = "<link href='src/view/www/dist/" . $css_route . ".css?v=" . Config::Get("cache_version") . "' rel='stylesheet'>";
        Output::$output_styles[] = $output_style;
    }

    /**
     * Replaces the double brackets by the value in the $data Array
     *
     * @param $template String path of the template to import
     * @param $data Array Array of data to replace in the template
     * @return String
     */
    public static function compile($template, $data)
    {
        $keys = array();
        foreach ($data as $key => $value) {
            $keys[] = "{{" . $key . "}}";
        }

        return str_replace($keys, array_values($data), $template);
    }
}
