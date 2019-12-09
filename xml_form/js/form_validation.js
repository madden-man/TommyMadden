// On document load
function onLoad()
{
    (function( $ ) {

        $("input[name='dateline']").datepicker();
        $(".hasDatepicker").datepicker("option", "dateFormat", "yy-mm-dd");
        $(".hasDatepicker").each(function() {
            var date = $(this).attr('value');
            if (date !== "") {
                $(this).datepicker('setDate', new Date(date));
            }
        });

        $('#ui-datepicker-div').css('display', 'none');


        $('#articleid_prompt input').focus(function(e) {
            $('#articleid_info').css('display', 'block');
        });

        $('#articleid_prompt input').blur(function(e) {
            $('#articleid_info').css('display', 'none');
            var msg = validateItem($(this));
            var errorSelector = '#articleid_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#dateline_prompt input').focus(function(e) {
            $('#dateline_info').css('display', 'block');
        });

        $('#dateline_prompt input').blur(function(e) {
            $('#dateline_info').css('display', 'none');
            var msg = validateItem($(this));
            var errorSelector = '#dateline_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#dateline_prompt input').change(function(e) {
            var msg = validateItem($(this));
            var errorSelector = '#dateline_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#headline_prompt input').focus(function(e) {
            $('#headline_info').css('display', 'block');
        });

        $('#headline_prompt input').blur(function(e) {
            $('#headline_info').css('display', 'none');
            var msg = validateItem($(this));
            var errorSelector = '#headline_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#summary_prompt textarea').focus(function(e) {
            $('#summary_info').css('display', 'block');
        });

        $('#summary_prompt textarea').blur(function(e) {
            $('#summary_info').css('display', 'none');
            var msg = validateItem($(this));
            var errorSelector = '#summary_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#newsline_prompt textarea').focus(function(e) {
            $('#newsline_info').css('display', 'block');
        });

        $('#newsline_prompt textarea').blur(function(e) {
            $('#newsline_info').css('display', 'none');
            var msg = validateItem($(this));
            var errorSelector = '#newsline_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#byline_prompt input').focus(function(e) {
            $('#byline_info').css('display', 'block');
        });

        $('#byline_prompt input').blur(function(e) {
            $('#byline_info').css('display', 'none');
            var msg = validateItem($(this));
            var errorSelector = '#byline_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#source_prompt input').focus(function(e) {
            $('#source_info').css('display', 'block');
        });

        $('#source_prompt input').blur(function(e) {
            $('#source_info').css('display', 'none');
            var msg = validateItem($(this));
            var errorSelector = '#source_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#keywords_prompt textarea').focus(function(e) {
            $('#keywords_info').css('display', 'block');
        });

        $('#keywords_prompt textarea').blur(function(e) {
            $('#keywords_info').css('display', 'none');
            var msg = validateItem($(this));
            var errorSelector = '#keywords_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#attachment1_prompt input').focus(function(e) {
        });

        $('#attachment1_prompt input').blur(function(e) {
            var msg = validateItem($(this));
            var errorSelector = '#attachment1_error';
            if (msg !== "")
            {
                $(errorSelector).css('display', 'block');
                $(errorSelector).html(msg);
            }
            else
            {
                $(errorSelector).css('display', 'none');
                $(errorSelector).html('');
            }
        });

        $('#fake_download').click(function(e) {
            e.preventDefault();
        });

    })( jQuery );
}

function validateInput(context)
{
    (function( $ ) {
        var msgs = [];

        msgs["articleid_error"] = validateItem($("input[name='articleid']"));
        msgs["dateline_error"] = validateItem($("input[name='dateline']"));
        msgs["headline_error"] = validateItem($("input[name='headline']"));
        msgs["summary_error"] = validateItem($("textarea[name='summary']"));
        msgs["newsline_error"] = validateItem($("textarea[name='newsline']"));
        msgs["byline_error"] = validateItem($("input[name='byline']"));
        msgs["source_error"] = validateItem($("input[name='source']"));
        msgs["keywords_error"] = validateItem($("textarea[name='keywords']"));

        var isValid = true;
        for (var i in msgs) {
            if (msgs[i] === "") {
                $('#' + i).css('display', 'none');
            }
            else {
                $('#' + i).html(msgs[i]);
                $('#' + i).css('display', 'block');
                isValid = false;
            }
        }

        if (isValid === true && $(context).attr('id') === 'fake_download') {
            $('#xml_form').submit();
        }
        else if (isValid === true && $(context).attr('id') === 'fake_upload') {
            $('#xml_form').attr('action', 'files/upload_xml.php?NOTHING');
            $('#xml_form').submit();
        }
        else if (isValid === true && $(context).attr('id') === 'fake_update') {
            $('#xml_form').attr('action', 'files/update_xml.php?NOTHING');
            $('#xml_form').submit();
        }
        else
        {
            alert('At least one of your fields has an error! Check you inputted everything correctly.');
        }

    })( jQuery );
}

function validateItem(context)
{
    var response = "";
    (function( $ ) {

        if ($(context).attr('name') == undefined)
        {
            // Shouldn't get here
            response = null;
            return response;
        }

        if ($(context).val() === '')
        {
            response = "You did not fill in a required field! Check every field is finished.";
        }

        if ($(context).attr('name') === 'articleid')
        {
            if ($(context).val().indexOf(' ') !== -1)
            {
                response = "There is a space in your article ID! That is bad practice.";
            }
        }
        else if ($(context).attr('name') === 'dateline')
        {
            if (checkDate($(context).val()) === false)
            {
                response = "Your date of publication is not a date, or is in an incorrect format! Try 'yyyy-mm-dd'.";
            }
        }
        else if ($(context).attr('name') === 'headline')
        {
            if ($(context).val().length > 250)
            {
                response = "Your headline is too long! Try shortening it down a little.";
            }
        }
        else if ($(context).attr('name') === 'summary')
        {
            if ($(context).val().length > 250)
            {
                response = "Your summary is too long! Try shortening it down a little.";
            }
        }
        else if ($(context).attr('name') === 'newsline')
        {

        }
        else if ($(context).attr('name') === 'byline')
        {
            if ($(context).val().length > 100)
            {
                response = "Careful adding too many authors! Try honing it down to two or three.";
            }
        }
        else if ($(context).attr('name') === 'source')
        {
            if ($(context).val().length > 100)
            {
                response = "This doesn't look right. Make sure you're putting the name of the company down.";
            }
        }
        else if ($(context).attr('name') === 'keywords')
        {
            var unusualChar = hasUnusualChar($(context).val());
            if (unusualChar !== false)
            {
                response = "We got an unusual character that shouldn't show up as a keyword..Check " + unusualChar;
            }
        }
    })( jQuery );
    return response;
}

function checkDate(inputString)
{
    var matches = inputString.match('\\d{4}-\\d{2}-\\d{2}');
    return matches !== null;
}

function hasUnusualChar(inputString)
{
    for (var i = 0; i < inputString.length; ++i) {
        if ( ((inputString.charAt(i) >= 'A') && (inputString.charAt(i) <= 'Z')
            || ( (inputString.charAt(i) >= 'a') && (inputString.charAt(i) <= 'z') )
            || ( (inputString.charAt(i) >= '0') && (inputString.charAt(i) <= '9')))
            || (inputString.charAt(i) === ' ') || (inputString.charAt(i) === '.')
            || (inputString.charAt(i) === '-'))
        {
            // Valid
        }
        else {
            return inputString.charAt(i);
        }
    }
    return false;
}

// Updates character count for Summary on key press
function updateCharacterCount(elem)
{
	(function( $ ) {

	    $('#character_counter').css('display', 'block');
		
		// Javascript -> jQuery variable
		var element = $(elem);
		
		var summaryLength = element.val().length;

		// Calculate characters remaining in 280-character post		
		var characterCount = 256 - summaryLength;		

		// Set text in proper field to the value
		$('#character_counter').html(characterCount.toString() + ' characters remaining..');
	})( jQuery );
}
