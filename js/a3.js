$(function(){
    var url1 = "includes/service-topCountries.php";
    var url2 = "includes/service-totals.php";
    var url3 = "includes/service-topAdoptedBooks.php";
    var url4 = "includes/service-countryVisits.php";
    //This function uses to output country name into each option in the select list
    $.get(url1, function(data, status){
        if(status == "success") {
            //var count = Object.keys(data).length;
            // for(var i=0; i<data.count; i++) {
            //     $(".countryName").append("<option value='" + data[i].CountryCode +"'>" + data[i].CountryName + "</option>");
            // }
         
            $.each(data, function(key, value) {
                $(".countryName").append("<option value='" + value.CountryCode +"'>" + value.CountryName + "</option>");
            });
        } else {
             $(".countryName").append("<option value=''>No Country</option>");
        }
    });
    
    //This function uses to output each number into 4 horizontal boxes;
    $.get(url2, function(data, status) {
        if (status == "success") {
            //Total number of visits
            $("div #totalNum1").append("<span>" + data[0][0].TotalNum + "</span>");
            //Total number of unique countries
            var count = Object.keys(data[1]).length;
            $("div #totalNum2").append("<span>" + count + "</span>");
            //Total number of employee to-dos
            $("div #totalNum3").append("<span>" + data[2][0].NumToDo + "</span>");
            //Total number of Employee Messages
            $("div #totalNum4").append("<span>" + data[3][0].NumMessages + "</span>");
            //console.log(data);
        } else {
            $("div #totalNum1").append("Error with database");
            $("div #totalNum2").append("Error with database");
            $("div #totalNum3").append("Error with database");
            $("div #totalNum4").append("Error with database");
        }
    });
    
    //This function uses to output Adopted Books 
    $.get(url3, function(data, status) {
        if (status == "success") {
            //console.log(data);
            $.each(data, function(key, value) {
                $(".tableBody").append("<tr id='everyBook'><td>" + "<img src='book-images/thumb/" + value.ISBN10 + ".jpg' alt='book'>" 
                + "</td><td>" + "<a href='single-book.php?ISBN10=" + value.ISBN10 + "'>" + value.Title + "</a></td><td>" + value.sumQ + "</td></tr>" );
            });
        } else {
            $(".tableBody").append("<p>Error with database</p>");
        }
    });
    
    //This function displays the country name and the number of visits for the selected country
    $(".countryName").change(function() {
        $.get(url4, {ccode: $(this).val()})
            .done(function(data) {
                console.log(data);
                $("#EachName").empty().append("CountryName: <span>" + data[0].CountryName + "</span>");
                $("#EachNum").empty().append("Number: <span>" + data[0].TotalVisits + "</span>");
            });
    });
});