function removeDir(context)
{
    (function( $ ) {
        var dir = $(context).closest('tbody').attr('id');

        $('#delete_form input[name="dir_name"]').val(dir);
        $('#delete_form_submitter').click();
    })( jQuery );
}

function uploadFile(context)
{
    (function( $ ) {
        var file = $(context).closest('tr').attr('id');
    })( jQuery );
}

function editFile(context)
{
    (function( $ ) {
        var file = $(context).closest('tr').attr('id');
        $.ajax({
            type: "GET",
            url: file,
            dataType: "xml",
            success: function(response) {

                $('input[name="curr_articleid"]').val($(response).find('ARTICLEID').text());
                $('input[name="curr_dateline"]').val($(response).find('DATELINE').text());
                $('input[name="curr_headline"]').val($(response).find('HEADLINE').text());
                $('input[name="curr_summary"]').val($(response).find('SUMMARY').text());
                $('input[name="curr_newsline"]').val($(response).find('NEWSLINETEXT').text());
                $('input[name="curr_byline"]').val($(response).find('BYLINE').text());
                $('input[name="curr_source"]').val($(response).find('SOURCE').text());
                $('input[name="curr_keywords"]').val($(response).find('KEYWORDS').text());

                // Different for attachment: just pass in URL
                var attachment = 'https://tommymadden.com/xml_form/files/' + $('input[name="curr_attachment"]').val($(response).find('attachment1').text());
                $('input[name="curr_attachment"]').val(attachment);
                $('#edit_form').submit();
            }
        });

    })( jQuery );
}

function selectCurrentArticle(context)
{
    (function( $ ) {
        $('#curr_ftp_article_form').submit();
    })( jQuery )
}

function printArray(data)
{
    (function( $ ) {
        for (var i in data)
        {
            alert(i + ":  " + data[i]);
        }
    })( jQuery );
}

function addToFTP(context)
{
	(function( $ ) {

	    $('#msg_progress').css('display', 'block');
	    $('#msg_progress').html("Contacting FTP Server...");

        var dir = $(context).closest('tbody').attr('id');

        var file = 'add_ftp.php';

		jQuery.ajax({
			type: "POST",
			url: file,
            data: { directory: dir },
			success: function(response) {
				// Do this in a sec
                if (response === 'success') {

                    $(context).closest('tbody').addClass('current');

                    $(context).closest('td').html("This is currently available for Ericsson! Remove here: <div class='btn_sub' onclick='removeFromFTP(this)'></div>");

                    showSuccess('Success! Your files are loaded on the FTP Server.');

                }
                else {
                    showError('Something went wrong! Please contact Tommy at 408-355-0639 to figure out what it is.');
                }
            },

            error: function(response) {
                showError('Something went wrong! Please contact Tommy at 408-355-0639 to figure out what it is.');
            }
		});
	})( jQuery );
}

function removeFromFTP(context)
{
    (function( $ ) {
        $('#msg_progress').css('display', 'block');
        $('#msg_progress').html('Contacting FTP Server...');

        var dir = $(context).closest('tbody').attr('id');

        var file = 'remove_ftp.php';

        jQuery.ajax({
            type: "POST",
            url: file,
            data: { directory: dir },
            success: function(response) {

                if (response === 'success') {
                    $(context).closest('tbody').removeClass('current');

                    $(context).closest('td').html("This is not available for Ericsson. Add here: <div class='btn_add' onclick='addToFTP(this)'></div>");

                    showSuccess('Success! Your files have been removed from the FTP Server.');
                }
                else {
                    showError('Something went wrong! Please contact Tommy at 408-355-0639 to figure out what it is.');
                }
            },

            error: function(response) {
                showError('Something went wrong! Please contact Tommy at 408-355-0639 to figure out what it is.');
            }
        });
    })( jQuery );
}

function showSuccess(message) {
    (function( $ ) {
        $('#msg_progress').css('display', 'none');

        $('#msg_success').html(message);

        $('#msg_success').fadeIn(200).show();
        setTimeout(function() {
            $('#msg_success').fadeOut(1000).show();

        }, 2000);

    })( jQuery );

}

function showError(message) {
    (function( $ ) {
        $('#msg_progress').css('display', 'none');

        $('#msg_error').css('display', 'block');
        $('#msg_error').html(message);

        $('#msg_error').fadeIn(200).show();
        setTimeout(function() {
            $('#msg_error').fadeOut(1000).show();

        }, 5000);

    })( jQuery );

}