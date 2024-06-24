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
    // $requiredProfileFeilds = $user["address"];
    // $isProfileComplete = TRUE;
    // foreach ($requiredProfileFeilds as $field) {
    //     if (is_null($user[$field])) {
    //         $isProfileComplete = FALSE;
    //         break;
    //     }
    // }
    $requiredProfileFeilds = $user["address"];
    $isProfileComplete = TRUE;

    if (is_null($requiredProfileFeilds)) {
        $isProfileComplete = FALSE;
    }



    $_SESSION['user'] = [
        'EmployeeID' => $user['EmployeeID'],
        'email' => $user['email'],
        'name' => $user['name'],
        'role' => $user['role'],
        'gender' => $user['gender'],
        'isProfileComplete' => $isProfileComplete
    ];
    session_regenerate_id(true);
    header('location: /dashboard');
}

function isDateGreater($date1, $date2) {
    // Convert the date strings into DateTime objects
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);

    // Compare the dates
    if ($datetime1 > $datetime2) {
        return true;
    } else {
        return false;
    }
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
function createPageLinks(int $page, string $pagename)
{
    $queryParams = mergeQueryParametes($_GET, [$pagename => $page]);
    $currentPath = parse_url($_SERVER['REQUEST_URI'])["path"];
    return $currentPath . '?' . $queryParams;
}
function getCurrentPage($totalPages, string $pagename)
{
    $currentPage = isset($_GET[$pagename]) ? (int)$_GET[$pagename] : 1;
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

function convertTimeFormat($time)
{
    $dateTime = DateTime::createFromFormat('H:i:s', $time);
    if ($time == NULL) {
        return "-----";
    } else {
        return $dateTime->format('g:i A');
    }
}

function WorkedHours($startTime, $endTime){
    // Check for null or empty values
    if (is_null($startTime) || is_null($endTime)) {
        return "-----";
    }

    // Detect the format of the time strings and create DateTime objects
    if (strpos($startTime, 'AM') !== false || strpos($startTime, 'PM') !== false) {
        // 12-hour format with AM/PM
        $format = 'g:i A';
    } else {
        // 24-hour format
        $format = 'H:i:s';
    }

    $startDateTime = DateTime::createFromFormat($format, $startTime);
    $endDateTime = DateTime::createFromFormat($format, $endTime);

    // Check if DateTime objects were created successfully
    if ($startDateTime === false || $endDateTime === false) {
        return "Invalid time format";
    }

    // Calculate the difference between the times
    $interval = $startDateTime->diff($endDateTime);

    // Convert the interval to total hours and minutes
    $hours = $interval->h;
    $minutes = $interval->i;

    // If the end time is earlier than the start time, adjust for the next day
    if ($interval->invert) {
        $hours += 24;
    }

    $formattedTotalHours = $hours . " hrs " . $minutes . " min";

    return $formattedTotalHours;
}