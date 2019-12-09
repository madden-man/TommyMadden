<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 12/16/17
 * Time: 1:20 PM
 */

// GET date to begin, date to end, currency
$date_begin = $_GET['date-start'];
$date_end = $_GET['date-end'];
$currency = $_GET['currency'];

// Used to store the values
$prices = null;
$url = null;

if ($currency === "gold") {

    // Get HTML from gold page
    $url = 'https://www.investing.com/commodities/gold-historical-data';

} else if ($currency === "silver") {

    // Get HTML from silver page
    $url = 'https://www.investing.com/commodities/silver-historical-data';
}

$ch = curl_init();
$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
$data = curl_exec($ch);
curl_close($ch);

// Divide HTML code up by line breaks into an array
$pieces = explode("\n", $data);

// Initial values
$recordPrices = false;
$current_date = 0;
$current_value = 1;
$withinRange = false;

// Loop through array of lines of code
for ($i = 0; $i < sizeof($pieces); ++$i)
{
    // If the 'results_box' div is in the present line of code, begin recording prices
    if (strpos($pieces[$i], '<div id="results_box">') !== false)
    {
        $recordPrices = true;
    }

    // If recording prices and the line of HTML code contains ', 2017' it must have a date
    if ($recordPrices && strpos($pieces[$i], ', 2017') !== false)
    {
        // Parse through the line to find the date
        $date = substr($pieces[$i], strpos($pieces[$i], '">') + 2, strpos($pieces[$i], '</td>') - strpos($pieces[$i], '">') - 2);

        // Check if the date is the same as or after the beginning date, and that it is the same as or before the ending date
        if (strtotime($date) >= strtotime($date_begin) && strtotime($date) <= strtotime($date_end))
        {
            $prices[$current_date][0] = $date;

            // Begin capturing values for that date
            $withinRange = true;
        }
        // Otherwise it is not within range, so don't pick up values from this date
        else
        {
            $withinRange = false;
        }
    }

    // If recording prices and the line of HTML code contains a value, pick it up and keep going
    else if ($recordPrices && $withinRange && strpos($pieces[$i], 'data-real-value=') !== false)
    {
        $prices[$current_date][$current_value] = substr($pieces[$i], strpos($pieces[$i], '">') + 2, strpos($pieces[$i], '</td>')- strpos($pieces[$i], '">') - 2);
        $current_value++;
    }

    // If recording prices and the line of HTML code contains the end of a table row, that date is completed
    if ($recordPrices && $withinRange && strpos($pieces[$i], '</tr>') !== false)
    {
        $current_date++;
        $current_value = 1;
    }

    // If recording prices and the line of HTML code contains the end of a table body, the data is finished
    if ($recordPrices && strpos($pieces[$i], '</tbody>') !== false)
    {
        $recordPrices = false;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Historical Prices of
    <?php if ($currency === "gold") { ?>Gold<?php } ?>
    <?php if ($currency === "silver") { ?>Silver<?php } ?>
    Over <?php echo $date_begin . " - " . $date_end; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="css/gold_and_silver.css" />
    <link href="https://fonts.googleapis.com/css?family=Arvo|Roboto|Ubuntu" rel="stylesheet">
</head>
<body>
<div id="content_container">
    <div id="content">
        <h1 id="title">Historical Prices of
            <?php if ($currency === "gold") { ?>Gold<?php } ?>
            <?php if ($currency === "silver") { ?>Silver<?php } ?><br>
            Over <?php echo $date_begin . " --> " . $date_end; ?></h1><br>
        <table id="data">
            <tr>
                <td>Date</td><td>Price</td><td>Open</td><td>High</td><td>Low</td><td>Vol.</td>
            </tr>
            <tr>
                <td colspan="6" style="font-size: 3px"></td>
            </tr>
            <?php

            // For each date
            for ($i = 0; $i < sizeof($prices); ++$i) {

                // Make a table row
                echo "<tr>\n\t";

                // Loop through the values
                for ($j = 0; $j < sizeof($prices[$i]); ++$j) {
                    echo "<td>" . trim($prices[$i][$j]) . "</td>\n\t";      // Display each value
                }
                echo "</tr>\n";
            }
            ?>
        </table>
</div>
</div>
</div>
<div id="form_container">
    <h1 id="title">Date Range Calculation:</h1><br>
    <form action="date_range.php" method="GET" id="date_range_form">
        Date Start: <input type="text" name="date-start" /><br><br>
        Date End: <input type="text" name="date-end" /><br><br>
        Currency Type: <input type="text" name="currency" /><br><br>
        <input type="submit" value="Submit!" />
    </form>
</div>
</body>
</html>