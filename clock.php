
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <style>

        html, body {
            height: 100%;
        }
        html {
            background-image: url('../img/sample.jpg');
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body {
            background-color: rgba(44,62,80 , 0.6 );
            background-image: url('../img/pattern.png');
            background-position: center;
            background-repeat: repeat;
            font-family: 'Raleway', 'Arial', sans-serif;
        }
        .countdown-container {
            position: relative;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .clock-item .inner {
            height: 0px;
            padding-bottom: 100%;
            position: relative;
            width: 100%;
        }
        .clock-canvas {
            background-color: rgba(255, 255, 255, .1);
            border-radius: 50%;
            height: 0px;
            padding-bottom: 100%;
        }
        .text {
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            margin-top: -50px;
            position: absolute;
            top: 50%;
            text-align: center;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 1);
            width: 100%;
        }
        .text .val {
            font-size: 50px;
        }
        .text .type-time {
            font-size: 20px;
        }
        @media (min-width: 768px) and (max-width: 991px) {
            .clock-item {
                margin-bottom: 30px;
            }
        }
        @media (max-width: 767px) {
            .clock-item {
                margin: 0px 30px 30px 30px;
            }
        }

    </style>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <title>jQuery Final Countdown Demo</title>
</head>

<body>
<div id="jquery-script-menu">
    <div class="jquery-script-center">
        <ul>
            <li><a href="//www.jqueryscript.net/time-clock/Modern-Circular-jQuery-Countdown-Timer-Plugin-Final-Countdown.html">Download This Plugin</a></li>
            <li><a href="//www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
        </ul>
        <div class="jquery-script-ads"><script type="text/javascript"><!--
                google_ad_client = "ca-pub-2783044520727903";
                /* jQuery_demo */
                google_ad_slot = "2780937993";
                google_ad_width = 728;
                google_ad_height = 90;
                //-->
            </script>
            <script type="text/javascript"
                    src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script></div>
        <div class="jquery-script-clear"></div>
    </div>
</div>
<div class="countdown-container container">
    <div class="clock row">
        <div class="clock-item clock-days countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas_days" class="clock-canvas"></div>
                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-days type-time">DAYS</p>
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.wrap -->
        </div>
        <!-- /.clock-item -->

        <div class="clock-item clock-hours countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas_hours" class="clock-canvas"></div>
                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-hours type-time">HOURS</p>
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.wrap -->
        </div>
        <!-- /.clock-item -->

        <div class="clock-item clock-minutes countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas_minutes" class="clock-canvas"></div>
                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-minutes type-time">MINUTES</p>
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.wrap -->
        </div>
        <!-- /.clock-item -->

        <div class="clock-item clock-seconds countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas_seconds" class="clock-canvas"></div>
                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-seconds type-time">SECONDS</p>
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.wrap -->
        </div>
        <!-- /.clock-item -->
    </div>
    <!-- /.clock -->
</div>
<!-- /.countdown-wrapper -->

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/kinetic.js"></script>
<script type="text/javascript" src="jquery.final-countdown.js"></script>
<script type="text/javascript">
    $('.countdown').final_countdown({});
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

</body>
</html>