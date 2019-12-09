<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 4/5/18
 * Time: 2:37 PM
 */

?>
<html>
<head>

</head>
<body>
<div contenteditable="true" onclick='$(this).focus();' onchange="updateMyFile()" style="width: 100%; height: 100%;"></div>
</body>
<script type="text/javascript">
    function updateMyFile()
    {
        $.ajax({
            type: 'post',
            url: 'submit_slides.php',
            data: $('form').serialize(),
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
    }
</script>

</html>
