<?php

use Core\Response;

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($viewPath)
{
    return basePath("/View/" . $viewPath . ".view.php");
}

function controller($controllerPath)
{
    return basePath("/App/controllers/" .$controllerPath. ".php");
}

function css($cssPath)
{
    return "/static/css/{$cssPath}.styles.css";
}

function js($jsPath)
{
    return "/static/js/{$jsPath}.script.js";
}

function res($fileName)
{
    return "/resources/{$fileName}";
}

/*
 * @example
 * $attributes = array(
 *     'name' => 'John Doe',
 *     'age' => 25,
 *     'gender' => 'male'
 * );
 * 
 * echo arrayToAttributesString($attributes);
 * Output: "name=\"John Doe\" age=\"25\" gender=\"male\""
 */
function arrayToAttributesString(array $assocArray): string
{
    $attributes = '';

    foreach ($assocArray as $key => $value) {
        $attributes .= " $key=\"$value\"";
    }

    return trim($attributes);
}

function render($Content, $data)
{
    $mainLayoutContent = view($Content);
    extract($data);
    require view("mainLayout");
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}
function abort($code = 404)
{
    http_response_code($code);

    require view("errors/{$code}");

    die();
}
function authorize($condition, $status=Response::FORBIDDEN){
    if(! $condition){
        abort($status);
    }
}

function login($user){
    session_start();
    $_SESSION['$user']=$user;
}