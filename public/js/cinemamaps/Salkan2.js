var firstSeatLabel = 1;
var control = 0;
var Selected_Seat = [];
var Sold = [];
var Sold_seats = [];
var rprice = 0;
var vprice = 0;
$(document).ready(function () {
    rprice = parseInt(document.getElementById("rprice").innerHTML);
    vprice = parseInt(document.getElementById("vprice").innerHTML);

    addseatno();
    var $cart = $("#selected-seats"),
        $counter = $("#counter"),
        $total = $("#total"),
        sc = $("#seat-map").seatCharts({
            map: [
                "eeee__e_",
                "eeee__ee",
                "eee___ee",
                "eeee__ee",
                "eeee__ee",
                "eee___e_",
                "eeee__ee",
                "eeee__ee",
                "eeee__ee",
                "eeee__ee",
                "eee___e_",
                "eeee____",
            ],
            seats: {
                f: {
                    price: vprice,
                    classes: "first-class", //your custom CSS class
                    category: "VIP",
                },
                e: {
                    price: rprice,
                    classes: "economy-class", //your custom CSS class
                    category: "Regular",
                },
            },
            naming: {
                top: false,
                getLabel: function (character, row, column) {
                    return firstSeatLabel++;
                },
            },
            legend: {
                node: $("#legend"),
                items: [
                    ["f", "available", "VIP Seat"],
                    ["e", "available", "Regular Seat"],
                    ["f", "unavailable", "Booked"],
                ],
            },
            click: function () {
                if (this.status() == "available") {
                    if (control <= 4) {
                        //let's create a new <li> which we'll add to the cart items
                        $(
                            "<li>" +
                                this.data().category +
                                " Seat # " +
                                this.settings.label +
                                ": <b>ETB" +
                                this.data().price +
                                '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>'
                        )
                            .attr("id", "cart-item-" + this.settings.id)
                            .attr("class", "item")
                            .data("seatId", this.settings.id)
                            .appendTo($cart);

                        Selected_Seat[control] = this.settings.label;

                        Sold[control] = this.settings.id;
                        /*
                         * Lets update the counter and total
                         *
                         * .find function will not find the current seat, because it will change its stauts only after return
                         * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                         */
                        $counter.text(sc.find("selected").length + 1);
                        $total.text(recalculateTotal(sc) + this.data().price);
                        control++;
                        return "selected";
                    } else {
                        var load = document.getElementById("werefaAlert");
                        load.style.display = "block";
                        $("#mesage").html("You can only select 5 seat!");
                        return "available";
                    }
                } else if (this.status() == "selected") {
                    //update the counter
                    $counter.text(sc.find("selected").length - 1);
                    //and total
                    $total.text(recalculateTotal(sc) - this.data().price);

                    //remove the item from our cart
                    $("#cart-item-" + this.settings.id).remove();
                    Selected_Seat.pop();
                    Sold.pop();
                    control--;
                    //seat has been vacated
                    return "available";
                } else if (this.status() == "unavailable") {
                    //seat has been already booked
                    return "unavailable";
                } else {
                    return this.style();
                }
            },
        });

    //this will handle "[cancel]" link clicks
    $("#selected-seats").on("click", ".cancel-cart-item", function () {
        //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
        sc.get($(this).parents("li:first").data("seatId")).click();
    });

    //let's pretend some seats have already been booked
    sc.get(Sold_seats).status("unavailable");
});

function recalculateTotal(sc) {
    var total = 0;

    //basically find every selected seat and sum its price
    sc.find("selected").each(function () {
        total += this.data().price;
    });

    return total;
}

function gotopayment() {
    if (control != 0) {
        var info = document.getElementById("userinfo");
        info.style.display = "block";
    } else {
        var load = document.getElementById("werefaAlert");
        load.style.display = "block";
        $("#mesage").html("You have to select a seat!");
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

function pay() {
    var load = document.getElementById("wrapper");
    var myJSONseat = JSON.stringify(Selected_Seat);
    var myJSONseatid = JSON.stringify(Sold);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    load.style.display = "block";
    $.ajax({
        type: "POST",
        url: "/payment?movie",
        data: {
            Selected_Seat: myJSONseat,
            Seat_id: myJSONseatid,
            quantity: control,
        },
        cache: false,

        success: function (html) {
            window.location = html;
        },
    });
}

function colose() {
    var load = document.getElementById("werefaAlert");
    load.style.display = "none";
}
