<html>
<head>
    <title>Cru Slides</title>
    <link href="css/form.css" rel="stylesheet" />
</head>

<body>
    <h1>Worship Slides!</h1>

    <div id="form_container_container">
        <form method="get" class="form_container" enctype="multipart/form-data" action="slides_request.php">
            <div id="text_container">
                <div class="form">Name: <br /><input type="text" name="user_name" placeholder="e. g. John Doe" class="form_input"/></div><br />
                <div class="form">Song Name: <br /><input type="text" name="song_name" placeholder="e. g. Pieces" class="form_input"/></div><br />
                <div class="form">Song Artist: <br /><input type="text" name="artist_name" placeholder="e. g. Bethel Music" class="form_input"/></div><br />

                <section class="press">
                    <button type="submit">Submit!</button>

                </section>
            </div>
        </form>
    </div>
</body>
</html>