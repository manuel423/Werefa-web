var control = 0;
var Selected_Seat = [];
var Sold = [];
var Sold_seats = [];
var price = 0;
//price
$(document).ready(function () {
    price = document.getElementById("price").innerHTML;

    addseatno();

    var $cart = $("#selected-seats"), //Sitting Area
        $counter = $("#counter"), //Votes
        $total = $("#total"); //Total money

    var sc = $("#seat-map").seatCharts({
        map: [
            //Seating chart
            "a[,1]a[,2]_a[,3]a[,4]",
            "a[,5]a[,6]_a[,7]a[,8]",
            "a[,9]a[,10]_a[,11]a[,12]",
            "a[,13]a[,14]_a[,15]a[,16]",
            "a[,17]a[,18]_a[,19]a[,20]",
            "a[,21]a[,22]_a[,13]a[,24]",
            "a[,25]a[,26]_a[,27]a[,28]",
            "a[,29]a[,30]_a[,31]a[,32]",
            "a[,33]a[,34]_a[,35]a[,36]",
            "a[,37]a[,38]_a[,39]a[,40]",
            "a[,41]a[,42]_a[,43]a[,44]",
            "a[,45]a[,46]_a[,47]a[,48]",
            "a[,49]a[,50]a[,51]a[,52]a[,53]",
        ],
        naming: {
            top: false,
            getLabel: function (character, row, column) {
                return column;
            },
        },
        legend: {
            //Definition legend
            node: $("#legend"),
            items: [
                ["a", "available", "Available"],
                ["a", "unavailable", "Sold"],
                ["a", "selected", "Selected"],
            ],
        },
        click: function () {
            //Click event

            if (this.status() == "available") {
                //optional seat

                if (control <= 4) {
                    $(
                        "<li>Row" +
                            (this.settings.row + 1) +
                            " Seat" +
                            this.settings.label +
                            "</li>"
                    )
                        .attr("id", "cart-item-" + this.settings.id)
                        .data("seatId", this.settings.id)
                        .appendTo($cart);
                    //Selected_Row=this.settings.row+1;
                    Selected_Seat[control] = this.settings.label;

                    Sold[control] = this.settings.id;
                    $counter.text(sc.find("selected").length + 1);
                    $total.text((sc.find("selected").length + 1) * price);
                    control++;
                    //recalculateTotal(sc);
                    return "selected";
                } else {
                    var load = document.getElementById("werefaAlert");
                    load.style.display = "block";
                    $("#mesage").html("You can only select 5 seat!");
                    return "available";
                }
            } else if (this.status() == "selected") {
                //Checked
                //Update Number
                $counter.text(sc.find("selected").length - 1);
                //update totalnum
                $total.text((sc.find("selected").length - 1) * price);

                //Delete reservation
                $("#cart-item-" + this.settings.id).remove();
                //optional
                control = control - 1;
                return "available";
            } else if (this.status() == "unavailable") {
                //sold
                return "unavailable";
            } else {
                return this.style();
            }
        },
    });
    //sold seat
    sc.get(Sold_seats).status("unavailable");
});
//sum total money
function recalculateTotal(sc) {
    var total = 0;
    sc.find("selected").each(function () {
        total += price;
    });

    return total;
}

function gotopayment() {
    if (Sold.length != 0) {
        var info = document.getElementById("userinfo");
        info.style.display = "block";
    } else {
        var load = document.getElementById("werefaAlert");
        load.style.display = "block";
        $("#mesage").html("You have to select a seat!");
    }
}

function colose() {
    var load = document.getElementById("werefaAlert");
    load.style.display = "none";
}

function pay() {
    var btn = document.getElementById("second");

    var phoneRGEX = /^[0][9][0-9]{8}$/;
    var Nameval = document.getElementById("name").value;
    var Name = document.getElementById("name");
    var lablename = document.getElementById("nameval");
    var lablephone = document.getElementById("phoneval");
    var phoneval = document.getElementById("phone").value;
    var phone = document.getElementById("phone");
    var load = document.getElementById("wrapper");
    var myJSONseat = JSON.stringify(Selected_Seat);
    var myJSONseatid = JSON.stringify(Sold);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    if (Nameval == "" && phoneval == "") {
        lablename.style.visibility = "visible";
        $("#nameval").html("Requierd!");
        lablephone.style.visibility = "visible";
        $("#phoneval").html("Requierd!");
    } else if (Nameval == "") {
        lablename.style.visibility = "visible";
        $("#nameval").html("Requierd!");
    } else if (phoneval == "") {
        lablephone.style.visibility = "visible";
        $("#phoneval").html("Requierd!");
    } else if (Nameval.length < 2 && !phoneRGEX.test(phoneval)) {
        lablename.style.visibility = "visible";
        $("#nameval").html("Invalid Name");
        lablephone.style.visibility = "visible";
        $("#phoneval").html("Invalid Phone");
    } else if (Nameval.length < 2) {
        lablename.style.visibility = "visible";
        $("#nameval").html("Invalid Name");
    } else if (!phoneRGEX.test(phoneval)) {
        lablephone.style.visibility = "visible";
        $("#phoneval").html("Invalid Phone");
    } else {
        btn.disabled = "true";
        load.style.display = "block";
        $.ajax({
            type: "POST",
            url: "/payment?bus",
            data: {
                Selected_Seat: myJSONseat,
                Seat_id: myJSONseatid,
                name: Nameval,
                phone: phoneval,
                quantity: control,
            },
            cache: false,

            success: function (html) {
                window.location = html;
            },
        });
    }
}

function addseatno() {
    var select = document.getElementById("seatno");
    var size = document.getElementById("seatno").options.length;
    //alert(select.options[0].value);
    for (var i = 0; i < size; i++) {
        Sold_seats[i] = select.options[i].value;
    }
}
