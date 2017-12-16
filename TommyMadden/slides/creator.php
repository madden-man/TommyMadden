<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 10/4/17
 * Time: 4:34 PM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Worship Slides Creator</title>
    <link href="css/form.css" rel="stylesheet" />
    <link href="css/slide_creator.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script>

        $(document).ready(function() {
            updateData();

        });


        $(function () {

            $('form').on('submit', function (e) {

                e.preventDefault();

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

                $( '.form' ).each(function(){
                    this.reset();
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
              url: 'get_slides.php',
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
              if (currentLine.indexOf("Not Ready") !== -1) {
                  currentLine = currentLine.substr(11);
                  $("#ready").append(currentLine);
              } else if (currentLine.indexOf("Ready") !== -1) {
                  currentLine = currentLine.substr(7);
                  $("#not_ready").append(currentLine);
              }
          }

          $(".btn_remove").click(function(e) {
              e.preventDefault();
              var btn = this;
              $.ajax({
                  type: 'post',
                  url: 'remove_slides.php',
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
    <?php include("comodo_head_script.php"); ?>
</head>

<body>
<div class="form_successful">Your slides have been received!</div>
<div class="error">Your slides were not received. We may be having technical difficulties.</div>

<h1>Worship Slides Creator</h1>

<div id="form_container_container">
    <form method="post" class="form_container" enctype="multipart/form-data">
        <div id="text_container">
            <div class="form">Name: <br /><input type="text" name="user_name" placeholder="e. g. John Doe" class="form_input"/></div><br />
            <div class="form">Song Name: <br /><input type="text" name="song_name" placeholder="e. g. Pieces" class="form_input"/></div><br />
            <div class="form">Song Artist: <br /><input type="text" name="artist_name" placeholder="e. g. Bethel Music" class="form_input"/></div><br />

            <section class="press">
                <button type="submit">Add To Slides List!</button>

            </section>
        </div>
    </form>
</div>

<h2>Slides We Found</h2>

<table id="ready">


</table>
<br><br>
<h2>Slides You Need to Look Up</h2>
<table id="not_ready">


</table>
</body>
</html>
