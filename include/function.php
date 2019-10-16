<?php
include ('function-db.php');

function show_info($info) {
    echo('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 1rem; right: 1rem; opacity:1;z-index: 1000;">
        <div class="toast-header">
            <img style="width:25px;height:25px;" src="https://yt3.ggpht.com/a/AGF-l7_SntL3IWr9XpL6kUPdciXXf8-OqcbvgAfS0A=s900-c-k-c0xffffffff-no-rj-mo" class="rounded mr-2" alt="toast">
            <strong class="mr-auto">Up to us</strong>
            <small class="text-muted"></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">'.$info.'</div>
    </div>');
}

function is_admin() {
    // is admin ?
    if ((isset($_SESSION['is_admin'])) and ($_SESSION['is_admin'] != "")) {
        return true;
    } else {
        return false;
    }
}

function getCategorie($id) {
    $sql = "SELECT article_categorie_nom from article_categorie where id_article_categorie = '$id'";
    $result = execute($sql);
    return $result['article_categorie_nom'];
}

function changeDate($date,$separator) {
    if ($separator == "") {
        $separator = "/";
    }
    $year = substr($date,0,4);
    $month = substr($date,4,2);
    $day = substr($date,6,2);

    $date = $day.$separator.$month.$separator.$year;
    return $date;
}

function changeDateInput($date,$separator) {
    if ($separator == "") {
        $separator = "/";
    }
    $year = substr($date,0,4);
    $month = substr($date,4,2);
    $day = substr($date,6,2);

    $date = $year.$separator.$month.$separator.$day;
    return $date;
}

function changeTime($time,$separator) {
    if ($separator == "") {
        $separator = "/";
    }
    $hour = substr($time,0,2);
    $min = substr($time,2,2);

    $time = $hour.$separator.$min;
    return $time;
}

function dateFormat($date) {
    $year = substr($date,0,4);
    $month = substr($date,5,2);
    $day = substr($date,8,2);

    $date = $year.$month.$day;
    return $date;
}

function timeFormat($time) {
    $hour = substr($time,0,2);
    $min = substr($time,3,2);

    return $hour.$min;
}

function getCreateur($id) {
    $sql = "SELECT user_username from user where id_user = '$id'";
    $result = execute($sql);

    if ($result["user_username"] == NULL) {
        $result["user_username"] = "Administrateur";
    }
    return $result['user_username'];
}
?>