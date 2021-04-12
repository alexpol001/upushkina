<?php

namespace frontend\components;

use common\models\Close;
use common\models\Offer;
use common\models\setting\Setting;
use Yii;
use yii\base\Component;

class Frontend extends Component
{
    public static function getGallery()
    {
        $files_add = [];
        $path = Yii::getAlias("@gallery");
        if (is_dir($path)) {
            $files = \yii\helpers\FileHelper::findFiles($path);
            foreach ($files as $file) {
                $files_add[] = '/uploads/gallery/' . basename($file);
            }
        }
        return $files_add;
    }

    public static function getScriptCalendar()
    {
        $closes = json_encode(Close::getCloseDates());
        $offers = json_encode(Offer::getOffers());
        $price = Setting::take()->price;
        $script = <<< JS
var dates = initCloseDates($closes);
$('body').data('dates', dates);
$('body').data('offers', $offers);
$('body').data('price', $price);
var orderDate = $('#order .date');
var calendarLeft = $('#availability .col-left');
var calendarRight = $('#availability .col-right');
var selectDate = new Date();
var today = new Date();
var nextDate = new Date(selectDate);
nextDate.setMonth(nextDate.getMonth() + 1);
calendarUpdate();
$(orderDate.find('.head .arrow')).add(calendarLeft.find('.head .arrow')).add(calendarRight.find('.head .arrow')).click(function(e) {
    e.preventDefault();
  var arrow = $(this).find('.fa');
  if (arrow.is('.fa-long-arrow-left')) {
      if (selectDate.getMonth() === today.getMonth()) {
          return;
      }
      selectDate.setMonth(selectDate.getMonth() - 1);
  }
  if (arrow.is('.fa-long-arrow-right')) {
      selectDate.setMonth(selectDate.getMonth() + 1);
  }
  nextDate.setMonth(selectDate.getMonth() + 1);
  calendarUpdate();
});

function calendarUpdate() {
    getCalendar(selectDate, orderDate);
    getCalendar(selectDate, calendarLeft);
    getCalendar(nextDate, calendarRight);
}

function ucFirst(str) {
  if (!str) return str;

  return str[0].toUpperCase() + str.slice(1);
}

          function getCalendar(date, dateContainer) {
    
    var months = ['январь', 'февраль', 'март', 'апрель','май', 'июнь', 'июль', 'август','сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
              var title = ucFirst(months[Math.floor(date.getMonth())]) + ' ' + date.getFullYear();
              var head = dateContainer.find('.head h4');
              var table = dateContainer.find('table');
              head.html(title);
              
              var iterationDate = new Date(date);
              iterationDate.setDate(0);
              iterationDate.setDate(iterationDate.getDate() - getCorrectDay(iterationDate.getDay()));
              var i = 2;
              var j = 1;
              var td = null;
              for (i = 2;i <= 7;i++) {
                  for (j = 1;j<=7;j++) {
                      iterationDate.setDate(iterationDate.getDate() + 1);
                      td = getCell(table, i, j);
                      td.removeData();
                      td.removeClass();
                      if (iterationDate.getMonth() != date.getMonth()) {
                          td.addClass('empty');
                          td.html('');
                      } else {
                          if (isClose(iterationDate)) {
                              td.addClass('disabled');
                              if (isOnlyTo(iterationDate)) {
                                  td.data('date', iterationDate.getDate() + '.' + (iterationDate.getMonth() + 1) + '.' + String(iterationDate.getFullYear()).substr(2,2));
                                  td.data('isOnlyTo', true);
                                  if ($('#order .date-range .to').hasClass('active')) {
                                      td.removeClass('disabled');
                                  }
                              }
                          } else {
                              td.data('date', iterationDate.getDate() + '.' + (iterationDate.getMonth() + 1) + '.' + String(iterationDate.getFullYear()).substr(2,2));
                              if (isOnlyFrom(iterationDate)) {
                                  td.data('isOnlyFrom', true);
                                  if ($('#order .date-range .to').hasClass('active')) {
                                      td.addClass('disabled');
                                  }
                              }
                          }
                          td.html(iterationDate.getDate());
                      }
                  }
              }
          }
          
          function getCell(table, i, j) {
              return table.find('tr:nth-child('+i+')').find('td:nth-child('+j+')');
          }
          
          function getCorrectDay(day) {
              return day;
          }
          
          function initCloseDates(close) {
            var dates = [];
            var date = null;
            close.forEach(function(item, i, arr) {
               
                date = new Date();
                date.setFullYear(item['year'], item['month']-1, item['day']);
              dates.push(date);
            });
            return dates;
          }
          
          function isClose(date) {
            var item = null;
            for (var i = 0; i < dates.length; i++) {
                item = dates[i];
                if (item.getFullYear() == date.getFullYear() && item.getMonth() == date.getMonth() && item.getDate() == date.getDate()) {
                    return true;
                }
            }
            return isFewerToday(date);
          }
          
          function isFewerToday(date) {
            return (today.getFullYear() > date.getFullYear()) ||
             (today.getFullYear() == date.getFullYear() && today.getMonth() > date.getMonth()) ||
             (today.getFullYear() == date.getFullYear() && today.getMonth() == date.getMonth() && today.getDate() > date.getDate());
          }
          
          function isOnlyTo(date) {
            var pastDate = new Date(date);
            pastDate.setDate(pastDate.getDate() - 1);
            if (!isClose(pastDate)) {
                return true;
            }
            return false;
          }
          
          function isOnlyFrom(date) {
            var pastDate = new Date(date);
            pastDate.setDate(pastDate.getDate() - 1);
            if (isClose(pastDate)) {
                return true;
            }
            return false;
          }
JS;
        return $script;
    }
}