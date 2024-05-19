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
    $requiredProfileFeilds = $user["address"];
    $isProfileComplete = TRUE;
    foreach ($requiredProfileFeilds as $field) {
        if (!isset($user[$field])) {
            $isProfileComplete = FALSE;
            break;
        }
    }
    $_SESSION['user'] = [
        'email' => $user['email'],
        'name' => $user['name'],
        'role' => $user['role'],
        'isProfileComplete' => $isProfileComplete
    ];

    session_regenerate_id(true);
    header('location: /dashboard');
}

function logout()
{

    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

function photo($photoPath)
{
    return "/Data/images/{$photoPath}";
}

function generatePagination(int $totalPages, int $currentPage): array
{
    if ($totalPages <= 7) return createArray($totalPages);

    if ($currentPage <= 3) return array_merge(createArray(4), ['...', $totalPages - 1, $totalPages]);

    if ($currentPage >= $totalPages - 2) return [1, 2, '...', $totalPages - 3, $totalPages - 2, $totalPages - 1, $totalPages];

    return [1, '...', $currentPage - 1, $currentPage, $currentPage + 1, '...', $totalPages];
}
function createPageLinks(int $page)
{
    $queryParams = mergeQueryParametes($_GET, ['p' => $page]);
    $currentPath=parse_url($_SERVER['REQUEST_URI'])["path"];
    return $currentPath . '?' . $queryParams;
}
function getCurrentPage($totalPages){
    $currentPage=isset($_GET['p'])?(int)$_GET['p']:1;
    $currentPage = (int)min(max($currentPage, 1), $totalPages);
    return $currentPage;
}
function createArray(int $length): array
{
    $arr = [];
    for ($i = 0; $i < $length; $i++) {
        $arr[] = $i + 1;
    }

    return $arr;
}
function mergeQueryParametes(array ...$params): string
{
    return http_build_query(array_merge(...$params));
}