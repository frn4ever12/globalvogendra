function engToNepDateYMD(dateString) {
    if (dateString != null && dateString != "") {
        var values =
            dateString.indexOf("-") > 0
                ? dateString.split("-")
                : dateString.split("-");
        var year = Number(values[0]);
        var month = Number(values[1]);
        var day = Number(values[2]);

        var res = NepaliFunctions.AD2BS({ year: year, month: month, day: day });

        var bsDate = res.year + '-' + String(res.month).padStart(2, '0') + '-' + String(res.day).padStart(2, '0');
        return bsDate;
    }
}
function getDayNepali(ad) {
    let dateObj = new Date(ad);
    let daysArray = [
        "आइतवार",
        "सोमवार",
        "मंगलवार",
        "बुधवार",
        "विहिवार",
        "शुक्रवार",
        "शनिवार",
    ];
    // Check if the date is valid
    if (isNaN(dateObj)) {
        return "Invalid date";
    }
    return daysArray[dateObj.getDay()];
}
function NepFullDate(miti) {
    let nepdate = {
        year: miti.year,
        month: miti.month,
        day: miti.day,
    };

    let nepMonths = [
        "वैशाख",
        "जेठ",
        "असार",
        "सावन",
        "भदौ",
        "अशोज",
        "कार्तिक",
        "मंसिर",
        "पुष",
        "माघ",
        "फागुन",
        "चैत",
    ];
    let fullDate =
        nepdate.day +
        " " +
        nepMonths[nepdate.month - 1] +
        ", " +
        " " +
        nepdate.year;
    return fullDate;
}
function getArthikBarsha(dateString) {
    const date = new Date(dateString);

    const year = date.getFullYear();
    const nextYear = year + 1;
    const formattedDate = `${year}/${nextYear.toString().slice(-2)}`;
    return formattedDate;
}
