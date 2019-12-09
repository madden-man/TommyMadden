<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 1/8/18
 * Time: 5:11 PM
 */

include './numToBook.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <title>Online Bible!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <style>
        #content {
            margin-bottom: 200px;
        }

        .secret {
            display: none;
        }

        .form-holder {
            position: relative;
        }

        .note-form {
            position: absolute;
            top: 100%;
        }

        .note-form textarea {
            width: 600px;
            height: 200px;
        }

        .note-form button {
            position: absolute;
            top: 200px;
            width: 300px;
            height: 50px;
            left: 0;
        }

        .bible-note {
            border: 4px ridge darkorange;
            background-color: whitesmoke;
            color: midnightblue;
            position: absolute:
            top: 100%;
            width: 300px;
            height: 50px;
        }

        .bible-group__container {
            display: flex;
            align-content: space-evenly;
        }

        .bible-group {
            float: left;
        }

        .bible-group button {
            display: none;
        }

        .bible-group button:first-child {
            display: block;
        }

    </style>
    <script type="text/javascript" src="./numToBook.js"></script>
    <script type="text/javascript" src="./versionToText.js"></script>
</head>
<body>
    <div id="navbar_container">
        <div id="navbar">
            <div class="bible-group__container">
                <div class="bible-group">
                    <button name="Gen">Israel's Story</button>
                    <button name="Gen">Genesis</button>
                    <button name="Exod">Exodus</button>
                    <button name="Lev">Leviticus</button>
                    <button name="Num">Numbers</button>
                    <button name="Deut">Deuteronomy</button>
                    <button name="Josh">Joshua</button>
                    <button name="Judg">Judges</button>
                    <button name="Ruth">Ruth</button>
                    <button name="1Sam">1 Samuel</button>
                    <button name="2Sam">2 Samuel</button>
                    <button name="1Kgs">1 Kings</button>
                    <button name="2Kgs">2 Kings</button>
                    <button name="1Chr">1 Chronicles</button>
                    <button name="2Chr">2 Chronicles</button>
                    <button name="Ezra">Ezra</button>
                    <button name="Neh">Nehemiah</button>
                    <button name="Esth">Esther</button>
                </div>
                <div class="bible-group">
                    <button name="Job">Wisdom Literature</button>
                    <button name="Job">Job</button>
                    <button name="Ps">Psalms</button>
                    <button name="Prov">Proverbs</button>
                    <button name="Eccl">Ecclesiastes</button>
                    <button name="Song">Song of Songs</button>
                </div>
                <div class="bible-group">
                    <button name="Isa">Prophets</button>
                    <button name="Isa">Isaiah</button>
                    <button name="Jer">Jeremiah</button>
                    <button name="Lam">Lamentations</button>
                    <button name="Ezek">Ezekiel</button>
                    <button name="Dan">Daniel</button>
                    <button name="Hos">Hosea</button>
                    <button name="Joel">Joel</button>
                    <button name="Amos">Amos</button>
                    <button name="Obad">Obadiah</button>
                    <button name="Jonah">Jonah</button>
                    <button name="Mic">Micah</button>
                    <button name="Nah">Nahum</button>
                    <button name="Hab">Habakkuk</button>
                    <button name="Zeph">Zephaniah</button>
                    <button name="Hag">Haggai</button>
                    <button name="Zech">Zechariah</button>
                    <button name="Mal">Malachi</button>
                </div>
                <div class="bible-group">
                    <button name="Matt">Gospels & Acts</button>
                    <button name="Matt">Matthew</button>
                    <button name="Mark">Mark</button>
                    <button name="Luke">Luke</button>
                    <button name="John">John</button>
                    <button name="Acts">Acts</button>
                </div>
                <div class="bible-group">
                    <button name="Rom">Major Pauline Epistles</button>
                    <button name="Rom">Romans</button>
                    <button name="1Cor">1 Corinthians</button>
                    <button name="2Cor">2 Corinthians</button>
                    <button name="Gal">Galatians</button>
                    <button name="Eph">Ephesians</button>
                    <button name="Phil">Philippians</button>
                    <button name="Col">Colossians</button>
                </div>
                <div class="bible-group">
                    <button name="1Thess">Other Epistles & Revelation</button>
                    <button name="1Thess">1 Thessalonians</button>
                    <button name="2Thess">2 Thessalonians</button>
                    <button name="1Tim">1 Timothy</button>
                    <button name="2Tim">2 Timothy</button>
                    <button name="Titus">Titus</button>
                    <button name="Phlm">Philemon</button>
                    <button name="Heb">Hebrews</button>
                    <button name="Jas">James</button>
                    <button name="1Pet">1 Peter</button>
                    <button name="2Pet">2 Peter</button>
                    <button name="1John">1 John</button>
                    <button name="2John">2 John</button>
                    <button name="3John">3 John</button>
                    <button name="Jude">Jude</button>
                    <button name="Rev">Revelation<button>
                </div>
            </div>
        </div>
    </div>
    <button name="Prev">Prev</button>
    <button name="Next">Next</button>
    <select id="version-select">
        <option value="eng-AMP"><script>document.write(versionToText('eng-AMP'))</script></option>
        <option value="eng-CEV"><script>document.write(versionToText('eng-CEV'))</script></option>
        <option value="eng-CEVD"><script>document.write(versionToText('eng-CEVD'))</script></option>
        <option value="eng-CEVUK"><script>document.write(versionToText('eng-CEVUK'))</script></option>
        <option value="eng-GNTD"><script>document.write(versionToText('eng-GNTD'))</script></option>
        <option value="eng-GNTUK"><script>document.write(versionToText('eng-GNTUK'))</script></option>
        <option value="eng-KJV" selected="selected"><script>document.write(versionToText('eng-KJV'))</script></option>
        <option value="eng-KJVA"><script>document.write(versionToText('eng-KJVA'))</script></option>
        <option value="eng-MSG"><script>document.write(versionToText('eng-MSG'))</script></option>
        <option value="eng-NASB"><script>document.write(versionToText('eng-NASB'))</script></option>
    </select>
    <input class="secret" id="book-input" /><input class="secret" id="chapter-input" /><input class="secret" id="verse-input" />
    <div id="content"></div>
    <script>

        var currentBook = 'Gen';
        var fullName = 'Genesis';
        var currentChap = 1;
        var currentVersion = 'eng-KJV';

        if (location.search.includes('?')) {
            let parameters = location.search.substring(location.search.indexOf("?") + 1);

            if (parameters.indexOf('book=') !== -1) {
                let bookString = parameters.substring(parameters.indexOf('book=') + 5);

                if (bookString.indexOf('&') !== -1) {
                    bookString = bookString.substring(0, bookString.indexOf('&'));
                }

                currentBook = bookString;

                fullName = $('button[name="' + currentBook + '"').text();
            }
            if (parameters.indexOf('chapter=') !== -1) {
                let chapString = parameters.substring(parameters.indexOf('chapter=') + 8);
                let chapInt;

                if (chapString.indexOf('&') !== -1) {
                    chapInt = parseInt(chapString.substring(0, chapString.indexOf('&')));
                } else {
                    chapInt = parseInt(chapString);
                }

                currentChap = chapInt;
            }
            if (parameters.indexOf('version=') !== -1) {
                let versionString = parameters.substring(parameters.indexOf('version=') + 8);

                if (versionString.indexOf('&') !== -1) {
                    versionString = versionString.substring(0, versionString.indexOf('&'));
                }

                currentVersion = versionString;

                $('option[value="eng-KJV"]').removeAttr('selected');
                $('option[value="' + versionString + '"]').attr('selected', 'selected');
            }
        }

        $(document).ready(function() {
            getInfo(currentBook, fullName, currentChap, currentVersion);
        });

        $(":button").on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();

            var name = this.name;
            var full_name = this.innerHTML;

            if (name === 'Next') {
                getInfo(currentBook, fullName, currentChap + 1, currentVersion);
            } else if (name === 'Prev') {
                getInfo(currentBook, fullName, currentChap - 1, currentVersion);
            } else {
                getInfo(name, full_name, 1, currentVersion);
            }

        });

        $('#version-select').on('change', function (e) {
            var value = $('#version-select').find(':selected').attr('value');

            currentVersion = value;

            getInfo(currentBook, fullName, currentChap, value);
        })

        function getInfo(bookName, realName, chapNum, versionName) {
            currentBook = bookName;
            fullName = realName;
            currentChap = chapNum;
            currentVersion = versionName;

            $.ajax({
                type: 'get',
                url: 'get_chapter.php',
                data: {book_name: bookName, full_name: realName, chap_num: chapNum, version: versionName},
                success: function (response) {
                    let signature = response.substring(4, response.indexOf('</h2>'));

                    if (signature.indexOf(fullName) >= 0 && signature.indexOf(currentChap) >= 0)
                        $("#content").html(response);
                }
            });
        }

        var contentNode = document.getElementById('content');

        var config = { attributes: false, childList: true, subtree: true };

        var contentCallback = function(mutationsList, observer) {
            if ($('#content').html().indexOf('form-holder') === -1) {
                $.ajax({
                    url: 'get_notes.php',
                    method: 'POST',
                    data: {book_name: currentBook, chap_num: currentChap},
                    success: function (data) {
                        if (data.indexOf("Connection failed") !== -1) {
                            // Fix it!
                            document.write(data);
                        } else {
                            var dataDivs = data.split('|');

                            for (var i = 0; i < dataDivs.length - 1; ++i) {
                                var verseSig = dataDivs[i].substring(dataDivs[i].indexOf('secret ') + 7);
                                verseSig = verseSig.substring(0, verseSig.indexOf('\''));

                                const spanSig = findSpecificElement('span', verseSig);
                                const supSig = findSpecificElement('sup', verseSig);

                                if (spanSig) {

                                    spanSig.addClass('form-holder');

                                    supSig.css('background-color', 'yellow');
                                    spanSig.on('click', function (e) {
                                        var currentNote = '.bible-note.' + this.classList[0];

                                        $(currentNote).toggleClass('secret');

                                        var spanElement = findSpecificElement('span', this.classList[0]);

                                        if (spanElement.css('background-color') !== 'rgb(255, 255, 0)') {
                                            $(spanElement).css('background-color', 'yellow');
                                        } else {
                                            $(spanElement).css('background-color', '');
                                        }

                                    });

                                    if (spanSig.html().indexOf(dataDivs[i]) === -1) {
                                        spanSig.html(spanSig.html() + dataDivs[i]);
                                    }
                                }
                            }
                        }
                    }

                });
            }
        };

        var observer = new MutationObserver(contentCallback);

        observer.observe(contentNode, config);

        function findSpecificElement(elementName, className) {
            for (let i = 1; i < 200; ++i) {
                var specificElement = $(elementName + ':eq(' + (i-1) + ')');

                if (!specificElement[0]) {
                    return null;
                }

                if (specificElement[0].classList[0] === className) {
                    return specificElement;
                }
            }
            return null;
        }

        function cancelForm() {
            $('.note-form').remove();
            $('span.form-holder').css('background-color', '');
            $('.form-holder').removeClass('form-holder');
        }

        var currentTab = 0;

        function validateCode(codeKey) {
            var code = String.fromCharCode(codeKey);

            if (currentTab === 0 || currentTab === 2) {
                return (code >= 'a' && code <= 'z')
                || (code >= '0' && code <= '9')
                || (code === '-');
            } else {
                return (code >= '0' && code <= '9');
            }
        }

        $('body').keypress(function (e) {
            if (e.which === 32 && $('.note-form').length === 0) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
        });

        $('body').keyup(function (e) {

            if ($('.note-form').length > 0) return;

            const code = e.key.charCodeAt(0) || e.keyCode;

            if (code === 61 || e.which === 8) {
                $('#book-input').val('');
                $('#book-input').addClass('secret');

                $('#chapter-input').val('');
                $('#chapter-input').addClass('secret');

                $('#verse-input').val('');
                $('#verse-input').addClass('secret');

                currentTab = 0;
            } else if (code === 91 || e.which === 37) {
                $('button[name="Prev"]').click();
            } else if (code === 93 || e.which === 39) {
                $('button[name="Next"]').click();
            } else if (code === 32) {
                e.preventDefault();
                e.stopPropagation();

                if (currentTab === 0) {
                    $('#chapter-input').removeClass('secret');

                    if ($('#book-input').val() === '') {
                        $('#verse-input').removeClass('secret');

                        $('#book-input').val(currentBook.toLowerCase());
                        $('#chapter-input').val(currentChap);

                        currentTab = 2;
                    }
                    else
                    {
                        var bookValue = ignoreCap($('#book-input').val());
                        var fullName = $('button[name="' + bookValue + '"').text();

                        if (bookValue !== currentBook) {
                            getInfo(bookValue, fullName, 1);
                        }
                    }
                } else if (currentTab === 1) {
                    $('#verse-input').removeClass('secret');

                    var bookValue = ignoreCap($('#book-input').val());

                    if (bookValue === '') {
                        bookValue = currentBook;
                    }

                    var fullName = $('button[name="' + bookValue + '"').text();
                    var chapterValue = parseInt($('#chapter-input').val());

                    if (bookValue !== currentBook || chapterValue !== currentChap) {
                        getInfo(bookValue, fullName, chapterValue);
                    }
                } else {
                    var bookName = ignoreCap($('#book-input').val());
                    var bookValue = bookToNum(bookName);
                    if (bookValue > 2) {
                        bookValue++;
                    }

                    if (bookValue === '') {
                        bookValue = currentBook;
                    }

                    var chapterValue = parseInt($('#chapter-input').val());

                    if (chapterValue === '') {
                        chapterValue = currentChap;
                    }

                    var verseStr = $('#verse-input').val();

                    if (verseStr.indexOf('-') === -1) {

                        var verseValue = parseInt(verseStr);

                        var versesSpan = $('span.v' + bookValue + '_' + chapterValue + '_' + verseValue);

                        $('html,body').animate({scrollTop: versesSpan.inlineOffset().top}, 'fast');

                        versesSpan.css('background-color', 'yellow');
                        versesSpan.last().addClass('form-holder');

                        var formId = bookName + chapterValue + '_' + verseValue;

                        var note_form = "<form class='note-form' id='" + formId + "' action='submit_notes.php' method='post'>"
                            + "<input class='secret' name='book' value='" + bookName + "'>"
                            + "<input class='secret' name='chapter' value='" + chapterValue + "'>"
                            + "<input class='secret' name='verse' value='" + verseValue + "'>"
                            + "<input class='secret' name='version' value='" + currentVersion + "'>"
                            + "<textarea name='note' />"
                            + "<input type='submit' value='Submit Note!' id='form-submit' />"
                            + "<input type='button' value='Cancel!' onclick='cancelForm()' />"
                            + "</form>";

                        if (versesSpan.last().html().indexOf(note_form) === -1) {
                            versesSpan.last().html(versesSpan.last().html() + note_form);
                        }
                    } else {
                        var beginVerseVal = parseInt(verseStr.substring(0, verseStr.indexOf('-')));
                        var endVerseVal = parseInt(verseStr.substring(verseStr.indexOf('-') + 1));

                        var beginVersesSpan = $('span.v' + bookValue + '_' + chapterValue + '_' + beginVerseVal);

                        $('html,body').animate({scrollTop: beginVersesSpan.inlineOffset().top}, 'fast');

                        for (let i = beginVerseVal; i <= endVerseVal; ++i) {
                            var currVersesSpan = $('span.v' + bookValue + '_' + chapterValue + '_' + i);
                            currVersesSpan.css('background-color', 'yellow');
                        }

                        var endVersesSpan = $('span.v' + bookValue + '_' + chapterValue + '_' + endVerseVal);

                        var formId = bookName + chapterValue + '_' + beginVerseVal + '-' + endVerseVal;

                        var note_form = "<form class='note-form' id='" + formId + "' action='submit_notes.php' method='post'>"
                            + "<input class='secret' name='book' value='" + bookName + "'>"
                            + "<input class='secret' name='chapter' value='" + chapterValue + "'>"
                            + "<input class='secret' name='verse' value='" + beginVerseVal + "-" + endVerseVal + "'>"
                            + "<input class='secret' name='version' value='" + version + "'>"
                            + "<textarea name='note' />"
                            + "<input type='submit' value='Submit Note!' id='form-submit' />"
                            + "<input type='button' value='Cancel!' onclick='cancelForm()' />"
                            + "</form>";

                        endVersesSpan.last().addClass('form-holder');

                        if (endVersesSpan.last().html().indexOf(note_form) === -1) {
                            endVersesSpan.last().html(endVersesSpan.last().html() + note_form);
                        }
                    }
                }

                if ($('#book-input').hasClass('secret')) {
                    $('#book-input').removeClass('secret');
                } else {
                    currentTab = currentTab + 1 % 3;
                }
            } else if (code === 8) {
                if (currentTab === 0) {
                    $('#book-input').val($('#book-input').val().substring(0, $('#book-input').val().length - 1));
                } else if (currentTab === 1) {
                    $('#chapter-input').val($('#chapter-input').val().substring(0, $('#chapter-input').val().length - 1));
                } else {
                    $('#verse-input').val($('#verse-input').val().substring(0, $('#verse-input').val().length - 1));
                }
            } else if (validateCode(code)) {

                if ($('#book-input').hasClass('secret')) {
                    $('#book-input').removeClass('secret');
                    $('#book-input').val(String.fromCharCode(code));
                } else if (currentTab === 0) {
                    $('#book-input').val($('#book-input').val() + String.fromCharCode(code));
                } else if (currentTab === 1) {
                    $('#chapter-input').val($('#chapter-input').val() + String.fromCharCode(code));
                } else {
                    $('#verse-input').val($('#verse-input').val() + String.fromCharCode(code));
                }
            }
        });

        jQuery.fn.inlineOffset = function() {
            var el = $('<span/>').css('display','inline').insertBefore(this[0]);
            var pos = el.offset();
            el.remove();
            return pos;
        };

    </script>
</body>
</html>
