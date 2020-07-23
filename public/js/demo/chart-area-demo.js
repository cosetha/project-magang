// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});







//Calender

/** code by webdevtrick ( https://webdevtrick.com ) **/
var month = [
	"January",
	"February",
	"March",
	"April",
	"May",
	"June",
	"July",
	"August",
	"September",
	"October",
	"November",
	"December"
];
var weekday = [
	"Sunday",
	"Monday",
	"Tuesday",
	"Wednesday",
	"Thursday",
	"Friday",
	"Saturday"
];
var weekdayShort = [
	"sun",
	"mon",
	"tue",
	"wed",
	"thu",
	"fri",
	"sat"
];
var monthDirection = 0;

function getNextMonth() {
	monthDirection++;
	var current;
	var now = new Date();
	if (now.getMonth() == 11) {
		current = new Date(now.getFullYear() + monthDirection, 0, 1);
	} else {
		current = new Date(now.getFullYear(), now.getMonth() + monthDirection, 1);
	}
	initCalender(getMonth(current));
}

function getPrevMonth() {
	monthDirection--;
	var current;
	var now = new Date();
	if (now.getMonth() == 11) {
		current = new Date(now.getFullYear() + monthDirection, 0, 1);
	} else {
		current = new Date(now.getFullYear(), now.getMonth() + monthDirection, 1);
	}
	initCalender(getMonth(current));
}
Date.prototype.isSameDateAs = function (pDate) {
	return (
		this.getFullYear() === pDate.getFullYear() &&
		this.getMonth() === pDate.getMonth() &&
		this.getDate() === pDate.getDate()
	);
};

function getMonth(currentDay) {
	var now = new Date();
	var currentMonth = month[currentDay.getMonth()];
	var monthArr = [];
	for (i = 1 - currentDay.getDate(); i < 31; i++) {
		var tomorrow = new Date(currentDay);
		tomorrow.setDate(currentDay.getDate() + i);
		if (currentMonth !== month[tomorrow.getMonth()]) {
			break;
		} else {
			monthArr.push({
				date: {
					weekday: weekday[tomorrow.getDay()],
					weekday_short: weekdayShort[tomorrow.getDay()],
					day: tomorrow.getDate(),
					month: month[tomorrow.getMonth()],
					year: tomorrow.getFullYear(),
					current_day: now.isSameDateAs(tomorrow) ? true : false,
					date_info: tomorrow
				}
			});
		}
	}
	return monthArr;
}

function clearCalender() {
	$("table tbody tr").each(function () {
		$(this).find("td").removeClass("active selectable currentDay between hover").html("");
	});
	$("td").each(function () {
		$(this).unbind('mouseenter').unbind('mouseleave');
	});
	$("td").each(function () {
		$(this).unbind('click');
	});
	clickCounter = 0;
}

function initCalender(monthData) {
	var row = 0;
	var classToAdd = "";
	var currentDay = "";
	var today = new Date();

	clearCalender();
	$.each(monthData,
		function (i, value) {
			var weekday = value.date.weekday_short;
			var day = value.date.day;
			var column = 0;
			var index = i + 1;

			$(".sideb .header .month").html(value.date.month);
			$(".sideb .header .year").html(value.date.year);
			if (value.date.current_day) {
				currentDay = "currentDay";
        classToAdd = "selectable";
				$(".right-wrapper .header span").html(value.date.weekday);
				$(".right-wrapper .day").html(value.date.day);
				$(".right-wrapper .month").html(value.date.month);
			}
			if (today.getTime() < value.date.date_info.getTime()) {
				classToAdd = "selectable";

			}
			$("tr.weedays th").each(function () {
				var row = $(this);
				if (row.data("weekday") === weekday) {
					column = row.data("column");
					return;
				}
			});
			$($($($("tr.days").get(row)).find("td").get(column)).addClass(classToAdd + " " + currentDay).html(day));
			currentDay = "";
			if (column == 6) {
				row++;
			}
		});
	$("td.selectable").click(function () {
		dateClickHandler($(this));
	});
}
initCalender(getMonth(new Date()));

var clickCounter = 0;
$(".fa-angle-double-right").click(function () {
	$(".right-wrapper").toggleClass("is-active");
	$(this).toggleClass("is-active");
});

function dateClickHandler(elem) {

	var day1 = parseInt($(elem).html());
	if (clickCounter === 0) {
		$("td.selectable").each(function () {
			$(this).removeClass("active between hover");
		});
	}
	clickCounter++;
	if (clickCounter === 2) {
		$("td.selectable").each(function () {
			$(this).unbind('mouseenter').unbind('mouseleave');
		});
		clickCounter = 0;
		return;
	}
	$(elem).toggleClass("active");
	$("td.selectable").hover(function () {

		var day2 = parseInt($(this).html());
		$(this).addClass("hover");
		$("td.selectable").each(function () {
			$(this).removeClass("between");

		});
		if (day1 > day2 + 1) {
			$("td.selectable").each(function () {
				var dayBetween = parseInt($(this).html());
				if (dayBetween > day2 && dayBetween < day1) {
					$(this).addClass("between");
				}
			});
		} else if (day1 < day2 + 1) {
			$("td.selectable").each(function () {
				var dayBetween = parseInt($(this).html());
				if (dayBetween > day1 && dayBetween < day2) {
					$(this).addClass("between");
				}
			});
		}
	}, function () {
		$(this).removeClass("hover");
	});
}
$(".fa-angle-left").click(function () {
	getPrevMonth();
	$(".main").addClass("is-rotated-left");
	setTimeout(function () {
		$(".main").removeClass("is-rotated-left");
	}, 195);
});

$(".fa-angle-right").click(function () {
	getNextMonth();
	$(".main").addClass("is-rotated-right");
	setTimeout(function () {
		$(".main").removeClass("is-rotated-right");
	}, 195);
});