<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $(".submit").click(function() {

                var name = $("#name").val();
                var comment = $("#comment_txt").val();
                var datastring = 'name=' + name + '&comment=' + comment;

                if (name == '' || comment == '') {

                } else {

                    $.ajax({
                        type: "POST",
                        url: "submit_comments.php",
                        data: datastring,
                        success: function() {

                        }
                    });
                }

                return false;
            });
        });
    </script>
</head>

<body>
<form method="post" name="form" enctype="multipart/form-data">
    <label for="name">Name: </label><input id="name" type="text" name="name" value="" />
    <label for="comment">Comment: </label><input id="comment" type="text" name="comment" value="" />
    <input type="submit" class="submit" value="Submit!" />
</form>
</body>