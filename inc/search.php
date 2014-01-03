<?php
/*
 * TODO: Turn this mysql into wp style query. (get_results())
 */
define('HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DATABASE', 'wordpress38');
$link = mysql_connect(constant('HOSTNAME'), constant('DB_USERNAME'), constant('DB_PASSWORD')) or die("Database connection error, please check!");
mysql_select_db(constant('DATABASE'), $link) or die("Connection to the defined database not possible, please check!");
//global $wpdb;

if (isset($_POST['kw']) && $_POST['kw'] != '') {
    $kws = $_POST['kw'];
    $kws = mysql_real_escape_string($kws);
    $query = "select * from wp38_users where user_nicename like '%" . $kws . "%' and (user_status = '0') limit 10";
    $res = mysql_query($query);
    $count = mysql_num_rows($res);
    $i = 0;

    if ($count > 0) {
        echo "<ul>";
        while ($row = mysql_fetch_array($res)) {
            echo "<li class='found-users'>";
            echo $row['user_nicename'];
            echo "</li>";
            $i++;
            if ($i == 5) break;
        }
        echo "</ul>";
        if ($count > 5) {
            echo "<div id='view_more'><a href='#'>View more results</a></div>";
        }
    } else {
        //echo "<div id='no_result'>No result found !</div>";
    }
}
?>