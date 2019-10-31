<?php
/**
 * -----------------------------------------------------------------------------------------------------------
 *      General Library Functions
 * -----------------------------------------------------------------------------------------------------------
 */
if (!function_exists('pm')) {
    /**
     * General Print Function
     *
     * @param $var
     * @param int $exit
     * @param int $new_line
     */
    function pm($var, $exit = 0, $new_line = 0)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';

        if ($new_line) {
            echo '<br/>';
        }
        if ($exit) {
            exit();
        }
    }
}

if (!function_exists('pc')) {
    /**
     * General Print Function for Terminal.
     *
     * @param $var
     * @param int $exit
     * @param null $msgName
     * @param int $new_line
     */
    function pc($var, $exit = 0, $msgName = null, $new_line = 0)
    {
        echo "\n";
        if (!empty($msgName)) {
            echo "$msgName: \n";
        }
        print_r($var);
        echo "\n";

        if ($new_line) {
            echo "\n\n";
        }
        if ($exit) {
            exit();
        }
    }
}

if (!function_exists('pj')) {
    /**
     * Print with json response.
     *
     * @param $var
     * @return \Illuminate\Http\JsonResponse
     */
    function pj($var)
    {
        return response()->json($var);
    }
}

if (!function_exists('pqs')) {
    /**
     * Enable the Laravel Database Query Log.
     */
    function pqs()
    {
        DB::enableQueryLog();
    }
}
if (!function_exists('pq')) {
    /**
     * Fetch the Laravel Database Last Query Log.
     */
    function pq()
    {
        pm(DB::getQueryLog());
    }
}

if (!function_exists('abort_404')) {
    /**
     * Print with json response.
     *
     * @param string $msg
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function response_404($msg = 'Page not found.')
    {
        return response($msg, 404);
    }
}

if (!function_exists('canAccess')) {
    /**
     * This function return the permission access status.
     *
     * @param $permission
     * @return mixed
     */
    function canAccess($permission)
    {
        return \Illuminate\Support\Facades\Auth::user()->can($permission);
    }
}

if (!function_exists('canAccessFail')) {
    /**
     * This function return the fail permission access status.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function canAccessFail()
    {
        return pj(array('api_call' => false));
    }
}

if (!function_exists('canAccessPass')) {
    /**
     * This function return the fail permission access status.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function canAccessPass()
    {
        return pj(array('api_call' => true));
    }
}

/**
 * Parse/Order the array with the requested key.
 *
 * @param array $data The array list.
 * @param string $select_as_key The field which to be used as new array key.
 * @return array with the new specified key value for same data;
 */
function parseArrayToKey($data = array(), $select_as_key = '')
{
    $items = array();
    if (is_array($data) && count($data)) :
        foreach ($data as $val) {
            $items[$val[$select_as_key]] = $val;
        }
    endif;

    return $items;
}

/**
 * Get the first letters of each words and as a uppercase string format.
 *
 * @param string $string Pass the parsing string
 * @return string $abbreviatedString
 */
function getStringAbbreviation($string)
{
    // Match the first letters of each words using regular expression.
    $matchFound = preg_match_all('/(\w)(\w+)/', $string, $matches);

    // Concatenate all the matched first letters as a string in upper case.
    $abbreviatedString = strtoupper(implode('', $matches[1]));

    return $abbreviatedString;
}

/**
 * Generates the random password string of any length specified.
 *
 * @param int $length
 * @return string
 */
function generatePassword($length = 16)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

if (!function_exists('asset_path')) {
    /**
     * Handle asset path according to the request.
     *
     * @param $path
     * @return string
     */
    function asset_path($path)
    {
        if (Request::server('HTTP_X_FORWARDED_PROTO') == 'https') {
            return secure_asset($path);
        } else {
            return asset($path);
        }
    }
}

if (!function_exists('client_path')) {
    /**
     * Get the database path.
     *
     * @param  string $path
     * @return string
     */
    function client_path($path = '')
    {
        return app()->basePath() . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('is_db_connected')) {
    /**
     * Checks if the database is connected and returns the connected database name.
     */
    function is_db_connected()
    {
        if (DB::connection()->getDatabaseName()) {
            echo "You are connected to the database: " . DB::connection()->getDatabaseName();
        }
    }
}

if (!function_exists('slugify')) {
    /**
     * Creates the slug for the given text similar to Str::slug() function.
     *
     * @param $text
     * @return mixed|string
     */
    function slugify($text)
    {
        // replace non letter or digits by _
        $text = preg_replace('~[^\pL\d]+~u', '_', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '_');

        // remove duplicate -
        $text = preg_replace('~-+~', '_', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n_a';
        }

        return $text;
    }
}
