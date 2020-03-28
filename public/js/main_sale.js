//for printing Invoice
function printInvoice() {
    window.print();
}

$(function () {
    // initializing select 2
    $('.select2').select2();

    //initializing datatable
    $('#myTable').DataTable({});

    //showing report
    $("#reportStartDate").datepicker({
        changeDate:true,
        changeMonth:true,
        changeYear:true,
        yearRange:'1970:+0',
        dateFormat:'yy-mm-dd',
        onSelect:function(dateText){
            var DateCreated = $('#reportStartDate').val();
            var data = {DateCreated:DateCreated};
            var url = "/reports/getdailyreport";
            var appendId = "daily-report";
            getReports(data, url, appendId);
        }
    });

    // for export data to ms excel format
    $(".excel").click(function(){
        $("#list-sale-report").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Salereport" + new Date().toISOString().replace(/[\-\:\.]/g, "")+'.xls',
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs:true
        });
    });

    // for export data to ms word format
    $(".word").click(function () {
        $("#list-of-sale").wordexport("Daily Report");
    });

    // for export data to pdf format
    $('.pdf').on('click', function(e){
        var doc = new jsPDF('p', 'pt');
        doc.setFontSize(10);
        doc.text("Sales Report "+ new Date(), 40, 50);
        var res = doc.autoTableHtmlToJson(document.getElementById("list-sale-report"));
        doc.autoTable(res.columns, res.data, {
            theme : 'grid',
            startY:60
        });
        doc.save("Salereport" + new Date().toISOString().replace(/[\-\:\.]/g, "")+'.pdf')
    });

    // for date wise vehicles filtering
    $("#StartDate, #EndDate").datepicker({
        changeMonth:true,
        changeYear:true,
        yearRange:'1970:+0',
        dateFormat:'yy-mm-dd',
        onSelect:function(dateText){
            var DateCreated = $('#StartDate').val();
            var EndDate = $('#EndDate').val();
            var inputData = {DateCreated:DateCreated,EndDate:EndDate};
            var url = "/reports/getvehiclereport";
            getReports(inputData, url, "list-of-vehicle")
        }
    });

    // for date wise accidents filtering
    $("#aStartDate, #aEndDate").datepicker({
        changeMonth:true,
        changeYear:true,
        yearRange:'1970:+0',
        dateFormat:'yy-mm-dd',
        onSelect:function(dateText){
            var DateCreated = $('#aStartDate').val();
            var EndDate = $('#aEndDate').val();
            var inputData = {DateCreated:DateCreated,EndDate:EndDate};
            var url = "/reports/getaccidentreport";
            getReports(inputData, url, "list-of-accident")
        }
    });

       // for date wise maintenance filtering
       $("#bStartDate, #bEndDate").datepicker({
        changeMonth:true,
        changeYear:true,
        yearRange:'1970:+0',
        dateFormat:'yy-mm-dd',
        onSelect:function(dateText){
            var DateCreated = $('#bStartDate').val();
           // console.log(DateCreated);
            var EndDate = $('#bEndDate').val();
            var inputData = {DateCreated:DateCreated,EndDate:EndDate};
            var url = "/reports/getmaintenancereport";
            getReports(inputData, url, "list-of-maintenance")
        }
    });

        // for date wise sales filtering
        $("#gStartDate, #gEndDate").datepicker({
            changeMonth:true,
            changeYear:true,
            yearRange:'1970:+0',
            dateFormat:'yy-mm-dd',
            onSelect:function(dateText){
                var DateCreated = $('#gStartDate').val();
                var EndDate = $('#gEndDate').val();
                var inputData = {DateCreated:DateCreated,EndDate:EndDate};
                var url = "/reports/getgeneralreports";
                getReports(inputData, url, "list-general-report")
            }
        });
    
   

    // for date wise sales filtering
    $("#lStartDate, #lEndDate").datepicker({
        changeMonth:true,
        changeYear:true,
        yearRange:'1970:+0',
        dateFormat:'yy-mm-dd',
        onSelect:function(dateText){
            var DateCreated = $('#lStartDate').val();
            var EndDate = $('#lEndDate').val();
            var inputData = {DateCreated:DateCreated,EndDate:EndDate};
            var url = "/reports/getsales";
            getReports(inputData, url, "list-sale-report")
        }
    });

});



/*

$(".monthPicker").datepicker({
    dateFormat: 'mm-dd',
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,

    onClose: function(dateText, inst) {
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
        console.log(month)
        console.log(year)
    }

    
});


$(".monthPicker").focus(function () {
    $(".ui-datepicker-calendar").hide();
    $("#ui-datepicker-div").position({
        my: "center top",
        at: "center bottom",
        of: $(this)
    });
});

*/

function getReports(inputData, url, appendId)
{
    $.ajax({
        type : 'get',
        url : site_url + url,
        data : inputData,
        success:function(data)
        {
            $('#' + appendId).empty().html(data);
        }
    });
}

function saleReportFilter()
{
    $('Form#saleReportFilterForm').submit();
}

$("#holdSale").on("click", function(){
    var formData = $("#saleForm").serialize();
    $.ajax({
        url: site_url + "/sales",
        type: "post",
        data: formData + "&action=" + "hold-sale",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            console.log(response);
            if (!response.success) {
                alert(response.message);
            } else if (response.success) {
                alert(response.message);
                location.reload();
            }
        // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});