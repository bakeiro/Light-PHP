<?php

/**
 * Console script, shows the console at the bottom of the page showing all
 * errors/warnings and exception along other messages, database queries and other useful data
 */

// Memory
$memory = $this->console->convert(memory_get_usage(true));

// Time
$time_script = microtime(true) - $this->console->max_execution_time;
$time_script = round($time_script, 4);

// Cache
$cache = $this->cache_version;
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div id="console-div" class='resizable'>

    <div id='error-console-top'>
        <button class="btn-console enable error-log-body active">Error log</button>
        <button class="btn-console enable info-log-body">System info</button>

        <div class="right-console-info">
            <span class="error-console-right"><?=$time_script;?> ms</span>
            <i class="material-icons console">access_time</i>
        </div>
        <div class="right-console-info">
            <span class="error-console-right"><?=$memory;?></span>
            <i class="material-icons console">storage</i>
            <span> | </span>
        </div>

    </div>

    <div id="console-body">
        <div class="console-body-seccion active" id="error-log-body">
            <?php
            foreach ($this->console::$console_execution_traces as $trace_message) {
                if ($trace_message["type"] === "error") {
                    echo "<p class='error'><i class='material-icons red-text'>error</i>" . $trace_message["message"] . "</p>";
                }
                if ($trace_message["type"] === "warning") {
                    echo "<p class='warning'><i class='material-icons lime-text'>warning</i>" . $trace_message["message"] . "</p>";
                }
                if ($trace_message["type"] === "query") {
                    echo "<p class='query'><i class='material-icons'>dns</i>" . $trace_message["message"] . "</p>";
                }
                if ($trace_message["type"] === "debug_info") {
                    if (gettype($trace_message["message"]) === "array" || gettype($trace_message["message"]) === "object") {
                        echo "<pre>";
                        print_r($trace_message["message"]);
                        echo "</pre>";
                    } else {
                        echo "<p class='message'>" . $trace_message["message"] . "</p>";
                    }
                }
            }
            ?>
            <br><br><br>
        </div>

        <div class="console-body-seccion" id="info-log-body">
            <?php
            $server_info = $this->console->getServerInfo();
            new Ospinto\dBug($server_info);
            ?>
            <br><br><br>
        </div>

    </div>
</div>

<script src="www/dist/console.js"></script>
<link rel="stylesheet" href="www/dist/console.css">
