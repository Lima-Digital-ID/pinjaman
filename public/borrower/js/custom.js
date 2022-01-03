$(document).ready(function() {
    // $(".datatable").DataTable();

    var d = new Date();
    var currDate = d.getDate();
    var currMonth = d.getMonth();
    var currYear = d.getFullYear();
    var startDate = new Date(currYear, currMonth, currDate);

    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $(".select2").select2();

    $(".datepicker").datepicker({
        format: "yyyy-mm-dd"
    });

    $(".datepicker").datepicker("setDate", startDate);

    $(".datepickerDate").datepicker({
        format: "yyyy-mm-dd",
    });

    $("form").submit(function() {
        $(".loading").addClass("show");
    });

    function indoDate(date){
        var year = date.substr(0,4);
        var month = date.substr(5,2);
        var day = date.substr(8,2);
        var newFormat = day+"-"+month+"-"+year 

        return newFormat;
    }
    
});
