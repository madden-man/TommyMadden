<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 11/12/17
 * Time: 4:09 PM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Thanksgiving Food Plans</title>
    <link href="css/food_plans.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="form_successful">Your food request is in the database! Thank you for your time!</div>
<div class="error">Your food request was not received. We may be having technical difficulties.</div>

    <div id="content">
        <p class="title">Appetizers</p>
        <table class="items" id="appetizers">
            <tr id="new_appetizer">
                <td><p class="item">Enter your appetizer here!</p></td><td class="item">Enter your name here!</td><td><button class="btn_submit" id="appetizer-submit">Submit</button></td>
            </tr>
        </table>

        <p class="title">Dishes</p>
        <table class="items" id="dishes">
            <tr id="new_dish">
                <td><p class="item">Enter your dish here!</p></td><td class="item">Enter your name here!</td><td><button class="btn_submit" id="dish-submit">Submit</button></td>
            </tr>
        </table>

        <p class="title">Sides</p>
        <table class="items" id="sides">
            <tr id="new_side">
                <td><p class="item">Enter your side here!</p></td><td class="item">Enter your name here!</td><td><button class="btn_submit" id="side-submit">Submit</button></td>
            </tr>
        </table>


        <p class="title">Desserts</p>
        <table class="items" id="desserts">
            <tr id="new_dessert">
                <td><p class="item">Enter your dessert here!</p></td><td class="item">Enter your name here!</td><td><button class="btn_submit" id="dessert-submit">Submit</button></td>
            </tr>
        </table>
    </div>

<script type="text/javascript">

    $(".item").each(function() {
        $(this).click(function() {
            $(this).attr('contenteditable', 'true');
        });
    });

</script>
<script>

    $(document).ready(function() {
        updateData();

    });


        $('.btn_submit').each(function() {
            $(this).on('click', function (e) {
                if ($(this).id === "appetizer-submit") {
                    $category = "appetizer";
                    $user
                } else if ($(this).id === "dish-submit") {
                    $category = "dish";
                } else if ($(this).id === "side-submit") {
                    $category = "dish";
                } else if ($(this).id === "dessert-submit") {
                    $category = "dessert";
                }

                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: 'submit_food.php',
                    data: {
                        category: $category,
                        user:
                    }
                    success: function (msg) {
                        if (msg === "Didn't work!") {
                            failure();
                        } else {
                            success();
                            updateData();
                            $(".newRow").css('display', 'none');
                        }
                    }
            });
        });

    });

    function success() {
        $('.form_successful').fadeIn(200).show();
        $('.error').fadeOut(200).hide();

        setTimeout(function() {
            $('.form_successful').fadeOut(1000).show();

        }, 2000);

    }

    function failure() {
        $('.error').fadeIn(200).show();
        $('.form_successful').fadeOut(200).hide();

        setTimeout(function() {
            $('.error').fadeOut(1000).show();

        }, 2000);
    }

    function updateData() {
        $(".row").attr('class', 'newRow');

        $.ajax({
            url: 'get_food_info.php',
            success: function (data) {
                if (data.indexOf("Connection failed") !== -1) {
                    failureSelect();
                    document.write(data);
                } else {
                    successSelect(data);
                }
            }

        });

    }

    function successSelect(data) {
        var arr = data.split("\n");
        for (var i = 0; i < arr.length; ++i) {
            var currentLine = arr[i];
            if (currentLine.indexOf("Appetizer: ") !== -1) {
                currentLine = currentLine.substr(11);
                $("#appetizers").append(currentLine);
            } else if (currentLine.indexOf("Dish: ") !== -1) {
                currentLine = currentLine.substr(6);
                $("#dishes").append(currentLine);
            } else if (currentLine.indexOf("Side: ") !== -1) {
                currentLine = currentLine.substr(6);
                $("#sides").append(currentLine);
            } else if (currentLine.indexOf("Dessert: ") !== -1) {
                currentLine = currentLine.substr(9);
                $("#desserts").append(currentLine);
            }
        }

        $(".btn_remove").click(function(e) {
            e.preventDefault();
            var btn = this;
            $.ajax({
                type: 'post',
                url: 'remove_food.php',
                data: {
                    id: btn.id
                },

                success: function(msg) {
                    if (msg === "Didn't work!") {
                        document.write(msg);
                    } else {
                        $("#row" + btn.id).remove();
                    }

                }
            });

        });

    }


    function failureSelect() {

    }



</script>
</body>
</html>
