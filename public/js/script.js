$(document).ready(function () {
    const body = $("body");
    const sunIcon = $(".sun-icon");
    const moonIcon = $(".moon-icon");

    sunIcon.click(function () {
        body.removeClass("dark-mode");
        sunIcon.css("color", "#FFD700"); // تغيير لون الشمس
        moonIcon.css("color", "#888"); // لون القمر في وضع الليل
    });

    moonIcon.click(function () {
        body.addClass("dark-mode");
        sunIcon.css("color", "#fff"); // تغيير لون الشمس في وضع الليل
        moonIcon.css("color", "#000"); // تغيير لون القمر في وضع الليل
    });
});

// ----------------------------------------------
// Start script for Filter
$(document).ready(function () {
    $("#priceRange").slider({
        range: true,
        min: 0,
        max: 500,
        values: [50, 300],
        slide: function (event, ui) {
            $("#price").text("$" + ui.values[0] + " - $" + ui.values[1]);
        },
    });
    $("#price").text(
        "$" +
            $("#priceRange").slider("values", 0) +
            " - $" +
            $("#priceRange").slider("values", 1)
    );

    $("#startDate, #endDate").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        onSelect: function (selectedDate) {
            var option = this.id == "startDate" ? "minDate" : "maxDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(
                    instance.settings.dateFormat ||
                        $.datepicker._defaults.dateFormat,
                    selectedDate,
                    instance.settings
                );
            $("#startDate, #endDate")
                .not(this)
                .datepicker("option", option, date);
        },
    });

    $("#increaseGuests").click(function () {
        var currentValue = parseInt($("#guests").val());
        if (currentValue < 7) {
            $("#guests").val(currentValue + 1);
        }
    });
    $("#decreaseGuests").click(function () {
        var currentValue = parseInt($("#guests").val());
        if (currentValue > 1) {
            $("#guests").val(currentValue - 1);
        }
    });

    $("#increaseChildren").click(function () {
        var currentValue = parseInt($("#children").val());
        if (currentValue < 7) {
            $("#children").val(currentValue + 1);
        }
    });
    $("#decreaseChildren").click(function () {
        var currentValue = parseInt($("#children").val());
        if (currentValue > 0) {
            $("#children").val(currentValue - 1);
        }
    });
});

function searchRooms() {
    // يمكنك هنا إجراء البحث باستخدام القيم المحددة
    var minPrice = $("#priceRange").slider("values", 0);
    var maxPrice = $("#priceRange").slider("values", 1);
    var guests = $("#guests").val();
    var children = $("#children").val();
    var startDate = $("#startDate").val();
    var endDate = $("#endDate").val();

    // يمكنك هنا عرض نتائج البحث بطريقة معينة
    // في هذا المثال، ستظهر النتائج بشكل عشوائي فقط للتوضيح
    var results = "";
    for (var i = 1; i <= 5; i++) {
        results +=
            '<div class="card mb-2"><div class="card-body">نتيجة البحث #' +
            i +
            "</div></div>";
    }

    $("#results").html(results);
}

// End script for Filter

const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});
