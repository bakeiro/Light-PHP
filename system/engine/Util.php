<?php

class Util
{
    //Useful functions
    public static function arraySortByColumn(&$arr, $col, $dir = SORT_ASC)
    {
        $sort_col = array();

        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }

    public static function getMimeType($mime_type)
    {
        $all_mime_types = array(
            'csv' => array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain'),
            'lha' => 'application/octet-stream',
            'exe' => array('application/octet-stream', 'application/x-msdownload'),
            'pdf' => array('application/pdf', 'application/force-download', 'application/x-download', 'binary/octet-stream'),
            'ps' => 'application/postscript',
            'ppt' => array('application/powerpoint', 'application/vnd.ms-powerpoint', 'application/vnd.ms-office', 'application/msword'),
            'gzip' => 'application/x-gzip',
            'php' => array('application/x-httpd-php', 'application/php', 'application/x-php', 'text/php', 'text/x-php', 'application/x-httpd-php-source'),
            'phtml' => 'application/x-httpd-php',
            'js' => array('application/x-javascript', 'text/plain'),
            'sit' => 'application/x-stuffit',
            'tar' => 'application/x-tar',
            'tgz' => array('application/x-tar', 'application/x-gzip-compressed'),
            'xhtml' => 'application/xhtml+xml',
            'zip' => array('application/x-zip', 'application/zip', 'application/x-zip-compressed', 'application/s-compressed', 'multipart/x-zip'),
            'rar' => array('application/x-rar', 'application/rar', 'application/x-rar-compressed'),
            'mp3' => array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
            'wav' => array('audio/x-wav', 'audio/wave', 'audio/wav'),
            'gif' => 'image/gif',
            'jpeg' => array('image/jpeg', 'image/pjpeg'),
            'jpg' => array('image/jpeg', 'image/pjpeg'),
            'jpe' => array('image/jpeg', 'image/pjpeg'),
            'png' => array('image/png', 'image/x-png'),
            'css' => array('text/css', 'text/plain'),
            'html' => array('text/html', 'text/plain'),
            'txt' => 'text/plain',
            'text' => 'text/plain',
            'log' => array('text/plain', 'text/x-log'),
            'xml' => array('application/xml', 'text/xml', 'text/plain'),
            'xsl' => array('application/xml', 'text/xsl', 'text/xml'),
            'mpeg' => 'video/mpeg',
            'mov' => 'video/quicktime',
            'avi' => array('video/x-msvideo', 'video/msvideo', 'video/avi', 'application/x-troff-msvideo'),
            'movie' => 'video/x-sgi-movie',
            'doc' => array('application/msword', 'application/vnd.ms-office'),
            'docx' => array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip', 'application/msword', 'application/x-zip'),
            'dot' => array('application/msword', 'application/vnd.ms-office'),
            'xlsx' => array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip'),
            'word' => array('application/msword', 'application/octet-stream'),
            'json' => array('application/json', 'text/json'),
            'crt' => array('application/x-x509-ca-cert', 'application/x-x509-user-cert', 'application/pkix-cert'),
            'crl' => array('application/pkix-crl', 'application/pkcs-crl'),
            'csr' => 'application/octet-stream',
            'mp4' => 'video/mp4',
            'm4a' => 'audio/x-m4a',
            'm4u' => 'application/vnd.mpegurl',
            'vlc' => 'application/videolan',
            'ics' => 'text/calendar',
            'ical' => 'text/calendar',
            '7z' => array('application/x-7z-compressed', 'application/x-compressed', 'application/x-zip-compressed', 'application/zip', 'multipart/x-zip'),
            '7zip' => array('application/x-7z-compressed', 'application/x-compressed', 'application/x-zip-compressed', 'application/zip', 'multipart/x-zip'),
            'svg' => array('image/svg+xml', 'application/xml', 'text/xml'),
        );

        return $all_mime_types[$mime_type];
    }

    public static function convert($size)
    {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }

    public static function isAjaxRequest()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
            return true;
        }
        return false;
    }

    public function ipAddress()
    {
        //Get IP address - if proxy lets get the REAL IP address
        if (!empty($_SERVER['REMOTE_ADDR']) and !empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = '0.0.0.0';
        }
        return $ip;
    }

    //Input
    public static function escape($value)
    {
        return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
    }

    public static function cleanInput()
    {
        function arrayClean(&$value)
        {
            $value = trim($value); //Duplicated values
            $value = strip_tags($value); //Avoid XSS attacks
            $value = Util::escape($value); //SQL injections
        }

        array_walk_recursive($_GET, 'arrayClean');
        array_walk_recursive($_POST, 'arrayClean');
        //array_walk_recursive($_COOKIE, 'arrayClean');
    }

    public static function sanitizeText($text)
    {
        return trim(htmlentities(preg_replace("/([^a-z0-9!@#$%^&*()_\-+\]\[{}\s\n<>:\\/\.,\?;'\"]+)/i", '', $text), ENT_QUOTES, 'UTF-8'));
    }

    //Tokens
    public static function generateSimpleToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }

    public static function generateCSRFToken()
    {
        return bin2hex(random_bytes(32));
    }

    public static function checkPostCSRFToken()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["csrf_token"])) {
                if (!hash_equals(Session::get("csrf_token"), $_POST["csrf_token"])) {
                    throw new Exception('The CSRF token doesn\'t match!');
                }
            } else {
                throw new Exception('The CSRF token was not defined');
            }
        }
    }
}
