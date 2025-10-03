<?php

/*
File para editar!

En $data_source escribes el source de la data en SQL. OBDC Data Sources en Control Panel > Administrative Tools
En $user el username de SQL
En $password el password de SQL
En $database el nombre de la base de datos
En $page_title el titulo de la pagina o nombre del Motel
*/

$data_source = 'MotelDB';
$user = '';
$password = '';
$database = 'Divridb';
$page_title = "Mottech Live View";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="clip: rect(auto, auto, auto, auto)">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="30; url=index.php" http-equiv="refresh">
    <title><?php

        echo($page_title);

        ?></title>

    <style type="text/css">
        body, td, th {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            color: #000;

        }

        .RoomNumber {
            font-size: 20px;
            font-weight: bold;
            padding-top: 15px;

        }

        .status1 {
            background-color: #808080;
        }


        .status2 {
            background-color: #97D159;
        }

        .status3 {
            background-color: #5382C6;
        }

        .status4 {
            background-color: #A27959;
        }

        .status7 {
            background-color: #FF0000;
        }

        .Icon-Style {
            text-align: right;
            font-size: x-small;
            color: #FFFFFF;
            font-size: 18px;
        }

        .auto-style2 {
            font-size: medium;
            background-image: url('../header/MenuHeader.png');
        }

        .auto-style3 {
            font-size: 15px;
            color: #FFFFFF;
        }

        .auto-style4 {
            text-align: center;
            font-size: medium;
        }

        .Table-style {
            font-family: "Comic Sans MS";
        }
    </style>


    </style>
</head>
</head>

<div class="auto-style5" style="width: 99.5%">
    <table cellspacing="1" class="auto-style2" style="width: 99.5%">
        <tr>
            <td class="auto-style4" style="height: 50px; width: 167px">
                <img alt="" height="58" src="../Icon.png" style="float: left" width="86"><br>
                <span class="auto-style3">Real Time Viewer</span>
            <td class="Icon-Style" style="height: 50px">
                <?php

                date_default_timezone_set('America/Puerto_Rico');
                echo "&nbsp;&nbsp;&nbsp;".date("g:i A");
                echo "<br />";
                echo "&nbsp;&nbsp;&nbsp;".date("m-d-Y");

                ?>
            </td>
        </tr>
    </table>
</div>


<body style="position: relative; left: 5px; top: -9px; background-color: #FFFFCC;">
<div class="Icon-Style">
</div>

<body class="RoomNumber" style="position: relative; left: 14px; top: -9px; background-color: #FFFFCC;">

<?php

$row_number = 0;

$space_num = 0;


$connect = odbc_connect($data_source, $user, $password);

if (!$connect) {
    if (phpversion() < '4.0') {
        exit("Connection Failed: . $php_errormsg");
    } else {
        exit("Connection Failed ODBC:".odbc_errormsg());
    }
}


$sqlAllRows_Motel_Php_Module = "SELECT * FROM ".$database.".dbo.Motel_Php_Module ORDER BY id";
$sqlCountStatusBaysRented = "SELECT COUNT(*) AS Counter FROM ".$database.".dbo.Motel_Php_Module where status >= 2 and status < 5";
$sqlExecUpdatePrices = "EXEC updateprices";
$sqlExecUpdateStatus = "EXEC updatestatus";
$sqlExecUpdateCleanStatus = "EXEC updatecleanstatus";
$sqlCountStatusBaysFree = "SELECT  COUNT(*) AS Counter FROM ".$database.".dbo.Motel_Room_Configuration where Room_status = 0";
$sqlCountAllRows_Motel_Room_Configuration = "SELECT COUNT(*) AS Counter FROM ".$database.".dbo.Motel_Room_Configuration";

$resultAllRows_Motel_Php_Module = odbc_exec($connect, $sqlAllRows_Motel_Php_Module);
$resultCountStatusBaysRented = odbc_exec($connect, $sqlCountStatusBaysRented);
$resultExecUpdatePrices = odbc_exec($connect, $sqlExecUpdatePrices);
$resultExecUpdateStatus = odbc_exec($connect, $sqlExecUpdateStatus);
$resultExecUpdateCleanStatus = odbc_exec($connect, $sqlExecUpdateCleanStatus);
$resultCountStatusBaysFree = odbc_exec($connect, $sqlCountStatusBaysFree);
$resultCountAllRows_Motel_Room_Configuration = odbc_exec($connect, $sqlCountAllRows_Motel_Room_Configuration);

if (!$resultAllRows_Motel_Php_Module) {
    exit("Error in SQL");
}
if (!$resultCountStatusBaysRented) {
    exit("Error in SQL");
}

$rented = null;
$rowcount = null;

echo 'Motel Neuvo Mejico';

while ($row = odbc_fetch_array($resultCountStatusBaysRented)) {
    echo "<font color='blue' face='Comic Sans MS' font size='4' >&nbsp;Rentadas: ".
            $row['Counter'].'</font>';
    $rented = $row['Counter'];
}

while ($row = odbc_fetch_array($resultCountStatusBaysFree)) {
    echo "&nbsp;Disponibles: ".$row['Counter'];
}
while ($row = odbc_fetch_array($resultCountAllRows_Motel_Room_Configuration)) {
    $rowcount = $row['Counter'];
}
$Total = $rented / $rowcount * 100;

echo "<font color='red';>&nbsp;Utilización: ".number_format($Total)."%".
        "<br />".'</font>';
echo("<table style='border-color: #FF0000; border-bottom-style: solid;text-decoration: blink'; width=\"99.5%\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\">");
echo("<tr>");


echo("<table align=\"center\" width=\"99.5%x\" border=\"0\">");

echo "<br />";

echo("<tr>");


function getTimeDifference($start, $end)
{
    $uts['start'] = strtotime($start);
    $uts['end'] = strtotime($end);
    if ($uts['start'] !== -1 && $uts['end'] !== -1) {
        if ($uts['end'] >= $uts['start']) {
            $diff = $uts['end'] - $uts['start'];
            if ($days = intval((floor($diff / 86400)))) $diff = $diff % 86400;
            if ($hours = intval((floor($diff / 3600)))) $diff = $diff % 3600;
            if ($minutes = intval((floor($diff / 60)))) $diff = $diff % 60;
            $diff = intval($diff);
            return (array(
                    'days' => $days,
                    'hours' => $hours,
                    'minutes' => $minutes,
                    'seconds' => $diff));

        } else {
            trigger_error("Ending date/time is earlier than the start date/time",
                    E_USER_WARNING);

        }
    } else {
        trigger_error("Invalid date/time data detected", E_USER_WARNING);
    }

    return (false);
}

function createRoomTable($status, $price, $roomNum, $checkInTime, $checkOutTime)
{

    $status = $status;
    $BadSensor = 7;
    $price = $price;
    $roomNum = $roomNum;
    $checkInTime = $checkInTime;
    $checkOutTime = $checkOutTime;

    $message = "";

    switch ($status) {

        case 0: // Vacant
            $message = "$".( int )$price;
            break;
        case 1: // Checking in
            $message = "<strong>".date("g:i A", strtotime(substr($checkInTime, 11, 8))).
                    "</strong>";
            break;

            break;
        case 2: // Occupied
        case 3: // Occupied
        case 4: // Occupied
            $current_time = date("Y-m-j H:i:s");

            $check_in_time = $checkInTime;


            if ($diff = @getTimeDifference($check_in_time, $current_time)) {
                $message = $diff["days"]."d:".$diff["hours"]."h:".$diff["minutes"]."m";
            } else {
                $message = "Error in Time";
            }

            if ($checkInTime == "") $message = "NULL";
            break;

        case 5: // Checking out
            $message = "<strong>".date("g:i A", strtotime(substr($checkOutTime, 11, 8))).
                    "</strong>";
            break;

        case 6: // Vacant
            $message = "<strong>Inactiva</strong>";
            break;
    }

    switch ($BadSensor) { // Bad sensor
        case 7:
            if ($diff = @getTimeDifference($check_in_time, $current_time)) {

            }
            break;
    }

    echo("<table width=\"98\" border=\"0\" cellpadding=\"1\" cellspacing=\"0\">");
    echo("<tr>");
    if ($diff = @getTimeDifference($check_in_time, $current_time)) ;
    if ($diff["days"] >= 1) {

        echo("<td height=\"75\" background=\"images/".$BadSensor.".gif\"><div align=\"center\" class=\"RoomNumber\">".
                $roomNum."</div></td>");
        echo("</tr>");
        echo("<tr><td>");
        echo("<div align=\"center\" class=\"status".$BadSensor."\">".$message.
                "</div>");
        echo("</td></tr></table>");
    } else {
        echo("<td height=\"75\" background=\"images/".$status.".gif\"><div align=\"center\" class=\"RoomNumber\">".
                $roomNum."</div></td>");
        echo("</tr>");
        echo("<tr><td>");
        echo("<div align=\"center\" class=\"status".$status."\">".$message.
                "</div>");
        echo("</td></tr></table>");
    }
}

while ($row = odbc_fetch_array($resultAllRows_Motel_Php_Module)) {
    $row_number++;
    $space_num++;

    if ($row_number == 9) {
        $row_number = 1;

        echo("</tr>");

        if ($space_num == 32 || $space_num == 62 || $space_num == 91) echo("<tr><td> &nbsp; </td></tr>");

        echo("<tr><td>");

        createRoomTable($row["status"], $row["price"], $row["roomNumber"], $row["checkInTime"],
                $row["checkOutTime"]);

        echo("</td>");

    } else {

        echo("<td>");

        createRoomTable($row["status"], $row["price"], $row["roomNumber"], $row["checkInTime"],
                $row["checkOutTime"]);

        echo("</td>");
    }
}

echo("</tr>");

echo("</table>");

odbc_close($connect);

?>

</body>


</html>
