<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$project_id = ltrim(stristr($actual_link, '?'), '?');
if (is_numeric($project_id)) {
    $project_id = intval($project_id);

    if ($project_id > 0 && $project_id < 41) {
        if ($lang == 'cs' || $lang == 'sk') {
            header("Location:cs/?" . $project_id);
        } else {
            header("Location:cs/?" . $project_id);
        }
    } else {
        if ($lang == 'cs' || $lang == 'sk') {
            header("Location:cs/");
        } else {
            header("Location:cs/");
        }
    }
} else {
    if ($lang == 'cs' || $lang == 'sk') {
        header("Location:cs/");
    } else {
        header("Location:cs/");
    }
}
