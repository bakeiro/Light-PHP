<?php

namespace Library;

use Engine\Singleton;

/**
 * Library class, loads view templates, replaces the double brackets by the variable value,
 * and can add JS and CSS files to the end of a template.
 */
class Output extends Singleton
{
    protected $output_scripts = array();
    protected $output_styles = array();
    protected $cache_version = 0;
    protected $header_path;
    protected $footer_path;

    public function __construct($header_path, $footer_path, $cache_version)
    {
        $this->header_path = $header_path;
        $this->footer_path = $footer_path;
        $this->cache_version = $cache_version;
        $this->output_scripts = [];
        $this->output_styles = [];
    }

    /**
     * Loads a templates using the $route, and uses the $data Array (if exists) in the template.
     * this load also the header and the footer template
     *
     * @param string $route path of the template to load
     * @param string $data  array of data to use in the template (if any)
     *
     * @return void
     */
    public function load($route, $data = array())
    {
        $content = $this->loadFile($this->header_path, $data);

        $route_paths = explode("/", $route);
        $content .= $this->loadFile('src/' . $route_paths[0] . '/view/' . $route_paths[1] . 'View.php', $data);

        $content .= $this->loadFile($this->footer_path, $data);

        echo $content;
    }

    /**
     * Load a template, replaces the brackets for the variables in the array $data, and returns
     * the template as String
     *
     * @param string $route route of the template to load
     * @param array  $data  Array with values to print in the template
     *
     * @return string template
     */
    public function loadFile($route, $data)
    {
        extract($data);

        ob_start();
        include $route;

        return ob_get_clean();
    }

    /**
     * Adds a js file at the end of the html document
     *
     * @param string $js_route path of the js file (without extension)
     *
     * @return void
     */
    public function addJs($js_route)
    {
        $output_script = "<script src='src/view/www/dist/" . $js_route . ".js?v=" . $this->cache_version . "' > </script>";
        $this->output_scripts[] = $output_script;
    }

    /**
     * Adds a css file at the end of the html document
     *
     * @param string $css_route path of the css file (without extension)
     *
     * @return void
     */
    public function addCss($css_route)
    {
        $output_style = "<link href='src/view/www/dist/" . $css_route . ".css?v=" . $this->cache_version . "' rel='stylesheet'>";
        $this->output_styles[] = $output_style;
    }
}
