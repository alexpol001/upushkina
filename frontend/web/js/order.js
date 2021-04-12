$(document).ready(function () {
    var orderTo = $('#order .date-range .to');
    var orderFrom = $('#order .date-range .from');

    var orderTd = $('#order .date td');
    var orderAvailabilityTd = $('#availability.date-select td');

    var orderDateRanger = $().add(orderTo).add(orderFrom);

    var fromText = 'Прибытие';

    var toText = 'Выезд';

    var guest = 1;

    var orderResult = $('#order .result');

    orderFrom.html(fromText);
    orderTo.html(toText);

    setResult();

    $('#order .order-button').click(function (e) {
        e.preventDefault();
        if (orderTo.html() == toText || orderFrom.html() == fromText) {
            toSelectDateRange();
        } else {
            var phone = $('#phone-input');
            if (phone.val() == '') {
                phone.focus();
            } else {
                var data = {
                    phone : phone.val(),
                    from : orderFrom.html(),
                    to : orderTo.html(),
                    guest: guest,
                    result: orderResult.html()
                };
                $.ajax({
                    url: '/site/send',
                    type: 'POST',
                    data: data,
                    success: function(res){
                        alert('Ваше сообщение успешно отправлено!');
                    },
                    error: function(){
                        alert('Сожалеем, но при отправки сообщения возникли проблемы. Попробуйте позже!');
                    }
                });
            }
        }
    });

    $('#order .clear').click(function (e) {
        e.preventDefault();
        orderFrom.html(fromText);
        orderTo.html(toText);
        hideCalendar();
    });

    orderTd.click(function (e) {
        toSelectDateRange(undefined, $(this).data('date'));
    });

    orderAvailabilityTd.click(function (e) {
        if (!orderFrom.hasClass('active') && !orderTo.hasClass('active')) {
            toSelectDateRange(orderTo, $(this).data('date'));
        } else {
            toSelectDateRange(undefined, $(this).data('date'));
        }
        $("html,body").scrollTop($('#order').offset().top);
    });

    orderDateRanger.click(function (e) {
        toSelectDateRange($(this).hasClass('from') ? orderFrom : orderTo);
    });

    function toSelectDateRange(elem, date) {
        if (typeof (elem) == "undefined") {
            if (orderFrom.hasClass('active')) {
                setDate(orderFrom, date);
                if (orderTo.html() == toText) {
                    toSelectDateRange(orderTo);
                } else {
                    hideCalendar();
                }
                return;
            } else if (orderTo.hasClass('active')) {
                setDate(orderTo, date);
                if (orderFrom.html() == fromText) {
                    toSelectDateRange(orderFrom);
                } else {
                    hideCalendar();
                }
                return;
            } else {
                activePeriod(orderFrom);
            }
        } else {
            orderDateRanger.removeClass("active");
            activePeriod(elem)
            if (typeof (date) != "undefined") {
                setDate(orderFrom, date);
            }
        }
        showCalendar();
    }

    function activePeriod(elem) {
        changeTd(orderTd, elem);
        changeTd(orderAvailabilityTd, elem);
        elem.addClass('active');
    }

    function changeTd(td, elem) {
        if (elem == orderTo) {
            td.each(function () {
                if ($(this).data('isOnlyTo')) {
                    $(this).removeClass('disabled');
                }
                if ($(this).data('isOnlyFrom')) {
                    $(this).addClass('disabled');
                }
            })
        } else {
            td.each(function () {
                if ($(this).data('isOnlyFrom')) {
                    $(this).removeClass('disabled');
                }
                if ($(this).data('isOnlyTo')) {
                    $(this).addClass('disabled');
                }
            })
        }
    }

    function setDate(elem, date) {
        if (elem == orderFrom && orderTo.html() != toText) {
            if (!checkDates(date, orderTo.html())) {
                orderTo.html(toText);
            }
        }
        if (elem == orderTo && orderFrom.html() != toText) {
            if (!checkDates(orderFrom.html(), date)) {
                orderFrom.html(fromText);
            }
        }
        elem.html(date);
    }

    function checkDates(fromDate, toDate) {
        if (!compare(fromDate, toDate)) {
            return false;
        }
        var dates = $('body').data('dates');
        var item;
        for (var i = 0; i < dates.length; i++) {
            item = dates[i];
            item = item.getDate() + '.' + (item.getMonth() + 1) + '.' + String(item.getFullYear()).substr(2,2);
            if (compare(fromDate, item) && compare(item, toDate)) {
                return false;
            }
        }
        return true;
    }

    function compare(fromDate, toDate) {
        fromDate = fromDate.split('.');
        toDate = toDate.split('.');
        fromDate[1] *= 100;
        fromDate[2] *= 10000;
        toDate[1] *= 100;
        toDate[2] *= 10000;

        fromDate = Number(fromDate[0]) + fromDate[1] + fromDate[2];
        toDate = Number(toDate[0]) + toDate[1] + toDate[2];
        return fromDate < toDate;
    }

    function showCalendar() {
        $('#order .order').hide();
        $('#order .date').show();
    }

    function hideCalendar() {
        orderDateRanger.removeClass("active");
        $('#order .date').hide();
        $('#order .order').show();
        if (orderFrom.html() != fromText && orderTo.html() != toText) {
            setResult(orderFrom.html(), orderTo.html());
        }
    }

    $('#order .guest-select .plus').click(function (e) {
        e.preventDefault();
        if (guest < 2) {
            guest++;
        }
        setGuest();
    });

    $('#order .guest-select .minus').click(function (e) {
        e.preventDefault();
        if (guest > 1) {
            guest--;
        }
        setGuest();
    });

    function setGuest() {
        var string;
        if (guest == 1) {
            string = ' гость'
        } else {
            string = ' гостя'
        }
        $('#order .guest-select span').html(guest + string);
    }

    function setResult(fromDate, toDate) {
        var price = $('#order .price .price-value').html();
        var i_price = 0;
        if (typeof (fromDate) != "undefined" && typeof (toDate) != "undefined") {
            price = 0;
            fromDate = getJsDate(fromDate);
            toDate = getJsDate(toDate);
            while (fromDate < toDate) {
                i_price = $('body').data('price');
                $.each($('body').data('offers'), function(i, item) {
                    if (getJsDate(item.from) <= fromDate && getJsDate(item.to) >= fromDate) {
                        i_price = item.price;
                        return false;
                    }
                });
                fromDate.setDate(fromDate.getDate()+1);
                price+=i_price;
            }
        }
        orderResult.html(price + ' Р');

        orderResult.html(price + ' Р');
    }

    function declOfNum(number, titles) {
        var cases = [2, 0, 1, 1, 1, 2];
        return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
    }

    function getJsDate(date) {
        date = date.split('.');
        var date1 = new Date();
        date1.setTime(0);
        date1.setFullYear('20' + date[2], date[1] - 1, date[0]);
        return date1;
    }
});