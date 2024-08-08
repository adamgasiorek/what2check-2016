$(document).ready(function(){

$('.menu .item').tab();


$('a.ocenionne').click(function(){
    var alphabeticallyOrderedDivs = $(this).parent().siblings('.GRIDZIKI').children("div.sortujace").sort(function (a, b) {
        return $(a).find("span.ocenadopor").text() < $(b).find("span.ocenadopor").text();
    });
    console.log( $(this).parent().siblings('.GRIDZIKI').attr("class") );
    $(this).parent().siblings('.GRIDZIKI').html(alphabeticallyOrderedDivs);
});

$('a.popularne').on('click', function () {
    var alphabeticallyOrderedDivs = $(this).parent().siblings('.GRIDZIKI').children("div.sortujace").sort(function (a, b) {
        return $(a).find("span.wysdopor").text() < $(b).find("span.wysdopor").text();
    });
    $(this).parent().siblings('.GRIDZIKI').html(alphabeticallyOrderedDivs);
});

$('a.newest').on('click', function () {
    var alphabeticallyOrderedDivs = $(this).parent().siblings('.GRIDZIKI').children("div.sortujace").sort(function (a, b) {
        var date1  = $(a).find("span.dokladnadata").text();
        date1 = date1.split('-');
        date1 = new Date(date1[2], date1[1] -1, date1[0]);

        var date2  = $(b).find("span.dokladnadata").text();
        date2= date2.split('-');
        date2= new Date(date2[2], date2[1] -1, date2[0]);

        return date1 < date2 ? 1 : -1;
    });
    $(this).parent().siblings('.GRIDZIKI').html(alphabeticallyOrderedDivs);
});

$('a.oldest').on('click', function () {
    var alphabeticallyOrderedDivs = $(this).parent().siblings('.GRIDZIKI').children("div.sortujace").sort(function (a, b) {
        var date1  = $(a).find("span.dokladnadata").text();
        date1 = date1.split('-');
        date1 = new Date(date1[2], date1[1] -1, date1[0]);

        var date2  = $(b).find("span.dokladnadata").text();
        date2= date2.split('-');
        date2= new Date(date2[2], date2[1] -1, date2[0]);

        return date1 > date2 ? 1 : -1;
    });
    $(this).parent().siblings('.GRIDZIKI').html(alphabeticallyOrderedDivs);
});

$('a.thebest').on('click', function () {
    var alphabeticallyOrderedDivs = $(this).parent().siblings('.GRIDZIKI').children("div.sortujace").sort(function (a, b) {
        return $(a).find("span.ilosc").text() < $(b).find("span.ilosc").text();
    });
    $(this).parent().siblings('.GRIDZIKI').html(alphabeticallyOrderedDivs);
});


    //$('.kliki').children().eq(0).click();
});