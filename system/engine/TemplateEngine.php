<?php

class templateLoader
{
    public function getContent($route, $data)
    {
        
    }

    public function load($route, $data = array())
    {
        ob_start();
        require $route;
        $template = ob_get_clean();

        $template = $this->compile($template, $data);
        return $template;
    }

    public function compile($template, $data)
    {
        //Variables
        $keys = array();
        foreach ($data as $key => $value) {
            $keys[] = "{{" . $key . "}}";
        }

        //If
        $template = str_replace("@if", "<?php if", $template);
        $template = str_replace("@endif", "?>", $template);
        return str_replace($keys, array_values($data), $template);
    }
}
