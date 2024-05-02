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
    return basePath("/App/controllers/" . $controllerPath . ".php");
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
        // Use htmlspecialchars to escape HTML special characters
        $attributes .= " $key=\"" . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . "\"";
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
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function login($user)
{
    $_SESSION['user'] = [
            'email' => $user['email'],
            'name' => $user['name'],
            'role' => $user['role']
    ];
    
    session_regenerate_id(true);
    header('location: /dashboard');
}

function logout(){
    
$_SESSION=[];
session_destroy();

$params = session_get_cookie_params();

setcookie('PHPSESSID','',time()-3600,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
}

function photo($photoPath){
    return "/Data/images/{$photoPath}";
}