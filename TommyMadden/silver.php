<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 12/15/17
 * Time: 5:05 PM
 */

$url = 'https://www.investing.com/commodities/silver-historical-data';
$headers = @get_headers($url);

/*if(strpos($headers[0],'200')===false) {
    header('Location: index.php');
}*/

$ch = curl_init();
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
$data = curl_exec($ch);
curl_close($ch);

$pieces = explode("\n", $data);

$silver_prices;
$recordPrices = false;
$current_date = 0;
$current_value = 1;
for ($i = 0; $i < sizeof($pieces); ++$i)
{
    if (strpos($pieces[$i], '<div id="results_box">') !== false)
    {
        $recordPrices = true;
    }
    if ($recordPrices && strpos($pieces[$i], ', 2017') !== false)
    {
        $silver_prices[$current_date][0] = substr($pieces[$i], strpos($pieces[$i], '">') + 2, strpos($pieces[$i], '</td>') - strpos($pieces[$i], '">') - 2);
    }
    else if ($recordPrices && strpos($pieces[$i], 'data-real-value=') !== false)
    {
        $silver_prices[$current_date][$current_value] = substr($pieces[$i], strpos($pieces[$i], '">') + 2, strpos($pieces[$i], '</td>')- strpos($pieces[$i], '">') - 2);
        $current_value++;
    }
    if ($recordPrices && strpos($pieces[$i], '</tr>') !== false)
    {
        $current_date++;
        $current_value = 1;
    }
    if ($recordPrices && strpos($pieces[$i], '</tbody>') !== false)
    {
        $recordPrices = false;
    }
}
?>
<html>
<head>
    <title>Historical Prices of Silver</title>
    <link rel="stylesheet" type="text/css" href="css/gold_and_silver.css" />
</head>
<body>
<div id="content_container">
    <div id="content">
        <h1 id="title">Historical Prices of Silver</h1>
        <div id="data">
            <?php
            echo "<br>Date\t\t\tPrice\t\tOpen\t\tHigh\t\tLow\t\t\tVol.";
            for ($i = 0; $i < sizeof($silver_prices); ++$i) {
                for ($j = 0; $j < sizeof($silver_prices[$i]); ++$j) {
                    echo  trim($silver_prices[$i][$j]) . "\t" . "\t";
                }
                echo "\n";
            }

            ?>
        </div>
    </div>
</div>
<div id="form_container">
    <h1>Date Range Calculation:</h1><br>
    <form action="date_range.php" method="GET" id="date_range_form">
        Date Start: <input type="text" name="date-start" /><br>
        Date End: <input type="text" name="date-end" /><br>
        Currency Type: <input type="text" name="currency" /><br>
        <input type="submit" value="Submit!" />
    </form>
</div>
</body>
</html>