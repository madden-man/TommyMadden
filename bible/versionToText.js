var versionsList = {
    "eng-AMP": "Amplified Bible",
    "eng-CEV": "Contemporary English Version",
    "eng-CEVD": "Contemporary English Version (US)",
    "eng-CEVUK": "Contemporary English Version (UK)",
    "eng-GNTD": "Good News Translation (US)",
    "eng-GNTUK": "Good News Translation (UK)",
    "eng-KJV": "King James Version",
    "eng-KJVA": "King James Version, American, w/ Apocrypha",
    "eng-MSG": "Message Version",
    "eng-NASB": "New American Standard Bible",
};

function versionToText(version, versions = versionsList) {

    return versions[version];
}

function textToVersion(text, versions = versionsList)
{
    for (var key in versionsList) {
        if (versionsList[key] === text) {
            return key;
        }
    }

    return "";
}
