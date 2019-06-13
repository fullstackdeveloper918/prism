/* flatpickr v4.5.7,, @license MIT */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self).flatpickr=t()}(this,function(){"use strict";var e=function(){return(e=Object.assign||function(e){for(var t,n=1,a=arguments.length;n<a;n++)for(var i in t=arguments[n])Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i]);return e}).apply(this,arguments)},t=["onChange","onClose","onDayCreate","onDestroy","onKeyDown","onMonthChange","onOpen","onParseConfig","onReady","onValueUpdate","onYearChange","onPreCalendarPosition"],n={_disable:[],_enable:[],allowInput:!1,altFormat:"F j, Y",altInput:!1,altInputClass:"form-control input",animate:"object"==typeof window&&-1===window.navigator.userAgent.indexOf("MSIE"),ariaDateFormat:"F j, Y",clickOpens:!0,closeOnSelect:!0,conjunction:", ",dateFormat:"Y-m-d",defaultHour:12,defaultMinute:0,defaultSeconds:0,disable:[],disableMobile:!1,enable:[],enableSeconds:!1,enableTime:!1,errorHandler:function(e){return"undefined"!=typeof console&&console.warn(e)},getWeek:function(e){var t=new Date(e.getTime());t.setHours(0,0,0,0),t.setDate(t.getDate()+3-(t.getDay()+6)%7);var n=new Date(t.getFullYear(),0,4);return 1+Math.round(((t.getTime()-n.getTime())/864e5-3+(n.getDay()+6)%7)/7)},hourIncrement:1,ignoredFocusElements:[],inline:!1,locale:"default",minuteIncrement:5,mode:"single",nextArrow:"<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z' /></svg>",noCalendar:!1,now:new Date,onChange:[],onClose:[],onDayCreate:[],onDestroy:[],onKeyDown:[],onMonthChange:[],onOpen:[],onParseConfig:[],onReady:[],onValueUpdate:[],onYearChange:[],onPreCalendarPosition:[],plugins:[],position:"auto",positionElement:void 0,prevArrow:"<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z' /></svg>",shorthandCurrentMonth:!1,showMonths:1,static:!1,time_24hr:!1,weekNumbers:!1,wrap:!1},a={weekdays:{shorthand:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],longhand:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]},months:{shorthand:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],longhand:["January","February","March","April","May","June","July","August","September","October","November","December"]},daysInMonth:[31,28,31,30,31,30,31,31,30,31,30,31],firstDayOfWeek:0,ordinal:function(e){var t=e%100;if(t>3&&t<21)return"th";switch(t%10){case 1:return"st";case 2:return"nd";case 3:return"rd";default:return"th"}},rangeSeparator:" to ",weekAbbreviation:"Wk",scrollTitle:"Scroll to increment",toggleTitle:"Click to toggle",amPM:["AM","PM"],yearAriaLabel:"Year"},i=function(e){return("0"+e).slice(-2)},o=function(e){return!0===e?1:0};function r(e,t,n){var a;return void 0===n&&(n=!1),function(){var i=this,o=arguments;null!==a&&clearTimeout(a),a=window.setTimeout(function(){a=null,n||e.apply(i,o)},t),n&&!a&&e.apply(i,o)}}var l=function(e){return e instanceof Array?e:[e]};function c(e,t,n){if(!0===n)return e.classList.add(t);e.classList.remove(t)}function d(e,t,n){var a=window.document.createElement(e);return t=t||"",n=n||"",a.className=t,void 0!==n&&(a.textContent=n),a}function s(e){for(;e.firstChild;)e.removeChild(e.firstChild)}function u(e,t){var n=d("div","numInputWrapper"),a=d("input","numInput "+e),i=d("span","arrowUp"),o=d("span","arrowDown");if(-1===navigator.userAgent.indexOf("MSIE 9.0")?a.type="number":(a.type="text",a.pattern="\\d*"),void 0!==t)for(var r in t)a.setAttribute(r,t[r]);return n.appendChild(a),n.appendChild(i),n.appendChild(o),n}var f=function(){},m=function(e,t,n){return n.months[t?"shorthand":"longhand"][e]},g={D:f,F:function(e,t,n){e.setMonth(n.months.longhand.indexOf(t))},G:function(e,t){e.setHours(parseFloat(t))},H:function(e,t){e.setHours(parseFloat(t))},J:function(e,t){e.setDate(parseFloat(t))},K:function(e,t,n){e.setHours(e.getHours()%12+12*o(new RegExp(n.amPM[1],"i").test(t)))},M:function(e,t,n){e.setMonth(n.months.shorthand.indexOf(t))},S:function(e,t){e.setSeconds(parseFloat(t))},U:function(e,t){return new Date(1e3*parseFloat(t))},W:function(e,t){var n=parseInt(t);return new Date(e.getFullYear(),0,2+7*(n-1),0,0,0,0)},Y:function(e,t){e.setFullYear(parseFloat(t))},Z:function(e,t){return new Date(t)},d:function(e,t){e.setDate(parseFloat(t))},h:function(e,t){e.setHours(parseFloat(t))},i:function(e,t){e.setMinutes(parseFloat(t))},j:function(e,t){e.setDate(parseFloat(t))},l:f,m:function(e,t){e.setMonth(parseFloat(t)-1)},n:function(e,t){e.setMonth(parseFloat(t)-1)},s:function(e,t){e.setSeconds(parseFloat(t))},u:function(e,t){return new Date(parseFloat(t))},w:f,y:function(e,t){e.setFullYear(2e3+parseFloat(t))}},p={D:"(\\w+)",F:"(\\w+)",G:"(\\d\\d|\\d)",H:"(\\d\\d|\\d)",J:"(\\d\\d|\\d)\\w+",K:"",M:"(\\w+)",S:"(\\d\\d|\\d)",U:"(.+)",W:"(\\d\\d|\\d)",Y:"(\\d{4})",Z:"(.+)",d:"(\\d\\d|\\d)",h:"(\\d\\d|\\d)",i:"(\\d\\d|\\d)",j:"(\\d\\d|\\d)",l:"(\\w+)",m:"(\\d\\d|\\d)",n:"(\\d\\d|\\d)",s:"(\\d\\d|\\d)",u:"(.+)",w:"(\\d\\d|\\d)",y:"(\\d{2})"},h={Z:function(e){return e.toISOString()},D:function(e,t,n){return t.weekdays.shorthand[h.w(e,t,n)]},F:function(e,t,n){return m(h.n(e,t,n)-1,!1,t)},G:function(e,t,n){return i(h.h(e,t,n))},H:function(e){return i(e.getHours())},J:function(e,t){return void 0!==t.ordinal?e.getDate()+t.ordinal(e.getDate()):e.getDate()},K:function(e,t){return t.amPM[o(e.getHours()>11)]},M:function(e,t){return m(e.getMonth(),!0,t)},S:function(e){return i(e.getSeconds())},U:function(e){return e.getTime()/1e3},W:function(e,t,n){return n.getWeek(e)},Y:function(e){return e.getFullYear()},d:function(e){return i(e.getDate())},h:function(e){return e.getHours()%12?e.getHours()%12:12},i:function(e){return i(e.getMinutes())},j:function(e){return e.getDate()},l:function(e,t){return t.weekdays.longhand[e.getDay()]},m:function(e){return i(e.getMonth()+1)},n:function(e){return e.getMonth()+1},s:function(e){return e.getSeconds()},u:function(e){return e.getTime()},w:function(e){return e.getDay()},y:function(e){return String(e.getFullYear()).substring(2)}},v=function(e){var t=e.config,i=void 0===t?n:t,o=e.l10n,r=void 0===o?a:o;return function(e,t,n){var a=n||r;return void 0!==i.formatDate?i.formatDate(e,t,a):t.split("").map(function(t,n,o){return h[t]&&"\\"!==o[n-1]?h[t](e,a,i):"\\"!==t?t:""}).join("")}},D=function(e){var t=e.config,i=void 0===t?n:t,o=e.l10n,r=void 0===o?a:o;return function(e,t,a,o){if(0===e||e){var l,c=o||r,d=e;if(e instanceof Date)l=new Date(e.getTime());else if("string"!=typeof e&&void 0!==e.toFixed)l=new Date(e);else if("string"==typeof e){var s=t||(i||n).dateFormat,u=String(e).trim();if("today"===u)l=new Date,a=!0;else if(/Z$/.test(u)||/GMT$/.test(u))l=new Date(e);else if(i&&i.parseDate)l=i.parseDate(e,s);else{l=i&&i.noCalendar?new Date((new Date).setHours(0,0,0,0)):new Date((new Date).getFullYear(),0,1,0,0,0,0);for(var f=void 0,m=[],h=0,v=0,D="";h<s.length;h++){var w=s[h],b="\\"===w,y="\\"===s[h-1]||b;if(p[w]&&!y){D+=p[w];var C=new RegExp(D).exec(e);C&&(f=!0)&&m["Y"!==w?"push":"unshift"]({fn:g[w],val:C[++v]})}else b||(D+=".");m.forEach(function(e){var t=e.fn,n=e.val;return l=t(l,n,c)||l})}l=f?l:void 0}}if(l instanceof Date&&!isNaN(l.getTime()))return!0===a&&l.setHours(0,0,0,0),l;i.errorHandler(new Error("Invalid date provided: "+d))}}};function w(e,t,n){return void 0===n&&(n=!0),!1!==n?new Date(e.getTime()).setHours(0,0,0,0)-new Date(t.getTime()).setHours(0,0,0,0):e.getTime()-t.getTime()}var b=function(e,t,n){return e>Math.min(t,n)&&e<Math.max(t,n)},y={DAY:864e5};"function"!=typeof Object.assign&&(Object.assign=function(e){for(var t=[],n=1;n<arguments.length;n++)t[n-1]=arguments[n];if(!e)throw TypeError("Cannot convert undefined or null to object");for(var a=function(t){t&&Object.keys(t).forEach(function(n){return e[n]=t[n]})},i=0,o=t;i<o.length;i++){a(o[i])}return e});var C=300;function M(n,f){var g={config:e({},E.defaultConfig),l10n:a};function h(e){return e.bind(g)}function M(){var e=g.config;!1===e.weekNumbers&&1===e.showMonths||!0!==e.noCalendar&&window.requestAnimationFrame(function(){if(void 0!==g.calendarContainer&&(g.calendarContainer.style.visibility="hidden",g.calendarContainer.style.display="block"),void 0!==g.daysContainer){var t=(g.days.offsetWidth+1)*e.showMonths;g.daysContainer.style.width=t+"px",g.calendarContainer.style.width=t+(void 0!==g.weekWrapper?g.weekWrapper.offsetWidth:0)+"px",g.calendarContainer.style.removeProperty("visibility"),g.calendarContainer.style.removeProperty("display")}})}function x(e){0===g.selectedDates.length&&ne(),void 0!==e&&"blur"!==e.type&&function(e){e.preventDefault();var t="keydown"===e.type,n=e.target;void 0!==g.amPM&&e.target===g.amPM&&(g.amPM.textContent=g.l10n.amPM[o(g.amPM.textContent===g.l10n.amPM[0])]);var a=parseFloat(n.getAttribute("min")),r=parseFloat(n.getAttribute("max")),l=parseFloat(n.getAttribute("step")),c=parseInt(n.value,10),d=e.delta||(t?38===e.which?1:-1:0),s=c+l*d;if(void 0!==n.value&&2===n.value.length){var u=n===g.hourElement,f=n===g.minuteElement;s<a?(s=r+s+o(!u)+(o(u)&&o(!g.amPM)),f&&Y(void 0,-1,g.hourElement)):s>r&&(s=n===g.hourElement?s-r-o(!g.amPM):a,f&&Y(void 0,1,g.hourElement)),g.amPM&&u&&(1===l?s+c===23:Math.abs(s-c)>l)&&(g.amPM.textContent=g.l10n.amPM[o(g.amPM.textContent===g.l10n.amPM[0])]),n.value=i(s)}}(e);var t=g._input.value;T(),ve(),g._input.value!==t&&g._debouncedChange()}function T(){if(void 0!==g.hourElement&&void 0!==g.minuteElement){var e,t,n=(parseInt(g.hourElement.value.slice(-2),10)||0)%24,a=(parseInt(g.minuteElement.value,10)||0)%60,i=void 0!==g.secondElement?(parseInt(g.secondElement.value,10)||0)%60:0;void 0!==g.amPM&&(e=n,t=g.amPM.textContent,n=e%12+12*o(t===g.l10n.amPM[1]));var r=void 0!==g.config.minTime||g.config.minDate&&g.minDateHasTime&&g.latestSelectedDateObj&&0===w(g.latestSelectedDateObj,g.config.minDate,!0);if(void 0!==g.config.maxTime||g.config.maxDate&&g.maxDateHasTime&&g.latestSelectedDateObj&&0===w(g.latestSelectedDateObj,g.config.maxDate,!0)){var l=void 0!==g.config.maxTime?g.config.maxTime:g.config.maxDate;(n=Math.min(n,l.getHours()))===l.getHours()&&(a=Math.min(a,l.getMinutes())),a===l.getMinutes()&&(i=Math.min(i,l.getSeconds()))}if(r){var c=void 0!==g.config.minTime?g.config.minTime:g.config.minDate;(n=Math.max(n,c.getHours()))===c.getHours()&&(a=Math.max(a,c.getMinutes())),a===c.getMinutes()&&(i=Math.max(i,c.getSeconds()))}O(n,a,i)}}function k(e){var t=e||g.latestSelectedDateObj;t&&O(t.getHours(),t.getMinutes(),t.getSeconds())}function I(){var e=g.config.defaultHour,t=g.config.defaultMinute,n=g.config.defaultSeconds;if(void 0!==g.config.minDate){var a=g.config.minDate.getHours(),i=g.config.minDate.getMinutes();(e=Math.max(e,a))===a&&(t=Math.max(i,t)),e===a&&t===i&&(n=g.config.minDate.getSeconds())}if(void 0!==g.config.maxDate){var o=g.config.maxDate.getHours(),r=g.config.maxDate.getMinutes();(e=Math.min(e,o))===o&&(t=Math.min(r,t)),e===o&&t===r&&(n=g.config.maxDate.getSeconds())}O(e,t,n)}function O(e,t,n){void 0!==g.latestSelectedDateObj&&g.latestSelectedDateObj.setHours(e%24,t,n||0,0),g.hourElement&&g.minuteElement&&!g.isMobile&&(g.hourElement.value=i(g.config.time_24hr?e:(12+e)%12+12*o(e%12==0)),g.minuteElement.value=i(t),void 0!==g.amPM&&(g.amPM.textContent=g.l10n.amPM[o(e>=12)]),void 0!==g.secondElement&&(g.secondElement.value=i(n)))}function S(e){var t=parseInt(e.target.value)+(e.delta||0);(t/1e3>1||"Enter"===e.key&&!/[^\d]/.test(t.toString()))&&V(t)}function _(e,t,n,a){return t instanceof Array?t.forEach(function(t){return _(e,t,n,a)}):e instanceof Array?e.forEach(function(e){return _(e,t,n,a)}):(e.addEventListener(t,n,a),void g._handlers.push({element:e,event:t,handler:n,options:a}))}function N(e){return function(t){1===t.which&&e(t)}}function F(){fe("onChange")}function P(e){var t=void 0!==e?g.parseDate(e):g.latestSelectedDateObj||(g.config.minDate&&g.config.minDate>g.now?g.config.minDate:g.config.maxDate&&g.config.maxDate<g.now?g.config.maxDate:g.now);try{void 0!==t&&(g.currentYear=t.getFullYear(),g.currentMonth=t.getMonth())}catch(e){e.message="Invalid date supplied: "+t,g.config.errorHandler(e)}g.redraw()}function A(e){~e.target.className.indexOf("arrow")&&Y(e,e.target.classList.contains("arrowUp")?1:-1)}function Y(e,t,n){var a=e&&e.target,i=n||a&&a.parentNode&&a.parentNode.firstChild,o=me("increment");o.delta=t,i&&i.dispatchEvent(o)}function j(e,t,n,a){var i=Z(t,!0),o=d("span","flatpickr-day "+e,t.getDate().toString());return o.dateObj=t,o.$i=a,o.setAttribute("aria-label",g.formatDate(t,g.config.ariaDateFormat)),-1===e.indexOf("hidden")&&0===w(t,g.now)&&(g.todayDateElem=o,o.classList.add("today"),o.setAttribute("aria-current","date")),i?(o.tabIndex=-1,ge(t)&&(o.classList.add("selected"),g.selectedDateElem=o,"range"===g.config.mode&&(c(o,"startRange",g.selectedDates[0]&&0===w(t,g.selectedDates[0],!0)),c(o,"endRange",g.selectedDates[1]&&0===w(t,g.selectedDates[1],!0)),"nextMonthDay"===e&&o.classList.add("inRange")))):o.classList.add("disabled"),"range"===g.config.mode&&function(e){return!("range"!==g.config.mode||g.selectedDates.length<2)&&w(e,g.selectedDates[0])>=0&&w(e,g.selectedDates[1])<=0}(t)&&!ge(t)&&o.classList.add("inRange"),g.weekNumbers&&1===g.config.showMonths&&"prevMonthDay"!==e&&n%7==1&&g.weekNumbers.insertAdjacentHTML("beforeend","<span class='flatpickr-day'>"+g.config.getWeek(t)+"</span>"),fe("onDayCreate",o),o}function H(e){e.focus(),"range"===g.config.mode&&ee(e)}function L(e){for(var t=e>0?0:g.config.showMonths-1,n=e>0?g.config.showMonths:-1,a=t;a!=n;a+=e)for(var i=g.daysContainer.children[a],o=e>0?0:i.children.length-1,r=e>0?i.children.length:-1,l=o;l!=r;l+=e){var c=i.children[l];if(-1===c.className.indexOf("hidden")&&Z(c.dateObj))return c}}function W(e,t){var n=Q(document.activeElement||document.body),a=void 0!==e?e:n?document.activeElement:void 0!==g.selectedDateElem&&Q(g.selectedDateElem)?g.selectedDateElem:void 0!==g.todayDateElem&&Q(g.todayDateElem)?g.todayDateElem:L(t>0?1:-1);return void 0===a?g._input.focus():n?void function(e,t){for(var n=-1===e.className.indexOf("Month")?e.dateObj.getMonth():g.currentMonth,a=t>0?g.config.showMonths:-1,i=t>0?1:-1,o=n-g.currentMonth;o!=a;o+=i)for(var r=g.daysContainer.children[o],l=n-g.currentMonth===o?e.$i+t:t<0?r.children.length-1:0,c=r.children.length,d=l;d>=0&&d<c&&d!=(t>0?c:-1);d+=i){var s=r.children[d];if(-1===s.className.indexOf("hidden")&&Z(s.dateObj)&&Math.abs(e.$i-d)>=Math.abs(t))return H(s)}g.changeMonth(i),W(L(i),0)}(a,t):H(a)}function R(e,t){for(var n=(new Date(e,t,1).getDay()-g.l10n.firstDayOfWeek+7)%7,a=g.utils.getDaysInMonth((t-1+12)%12),i=g.utils.getDaysInMonth(t),o=window.document.createDocumentFragment(),r=g.config.showMonths>1,l=r?"prevMonthDay hidden":"prevMonthDay",c=r?"nextMonthDay hidden":"nextMonthDay",s=a+1-n,u=0;s<=a;s++,u++)o.appendChild(j(l,new Date(e,t-1,s),s,u));for(s=1;s<=i;s++,u++)o.appendChild(j("",new Date(e,t,s),s,u));for(var f=i+1;f<=42-n&&(1===g.config.showMonths||u%7!=0);f++,u++)o.appendChild(j(c,new Date(e,t+1,f%i),f,u));var m=d("div","dayContainer");return m.appendChild(o),m}function B(){if(void 0!==g.daysContainer){s(g.daysContainer),g.weekNumbers&&s(g.weekNumbers);for(var e=document.createDocumentFragment(),t=0;t<g.config.showMonths;t++){var n=new Date(g.currentYear,g.currentMonth,1);n.setMonth(g.currentMonth+t),e.appendChild(R(n.getFullYear(),n.getMonth()))}g.daysContainer.appendChild(e),g.days=g.daysContainer.firstChild,"range"===g.config.mode&&1===g.selectedDates.length&&ee()}}function K(){var e=d("div","flatpickr-month"),t=window.document.createDocumentFragment(),n=d("span","cur-month"),a=u("cur-year",{tabindex:"-1"}),i=a.getElementsByTagName("input")[0];i.setAttribute("aria-label",g.l10n.yearAriaLabel),g.config.minDate&&i.setAttribute("min",g.config.minDate.getFullYear().toString()),g.config.maxDate&&(i.setAttribute("max",g.config.maxDate.getFullYear().toString()),i.disabled=!!g.config.minDate&&g.config.minDate.getFullYear()===g.config.maxDate.getFullYear());var o=d("div","flatpickr-current-month");return o.appendChild(n),o.appendChild(a),t.appendChild(o),e.appendChild(t),{container:e,yearElement:i,monthElement:n}}function J(){s(g.monthNav),g.monthNav.appendChild(g.prevMonthNav),g.config.showMonths&&(g.yearElements=[],g.monthElements=[]);for(var e=g.config.showMonths;e--;){var t=K();g.yearElements.push(t.yearElement),g.monthElements.push(t.monthElement),g.monthNav.appendChild(t.container)}g.monthNav.appendChild(g.nextMonthNav)}function U(){g.weekdayContainer?s(g.weekdayContainer):g.weekdayContainer=d("div","flatpickr-weekdays");for(var e=g.config.showMonths;e--;){var t=d("div","flatpickr-weekdaycontainer");g.weekdayContainer.appendChild(t)}return q(),g.weekdayContainer}function q(){var e=g.l10n.firstDayOfWeek,t=g.l10n.weekdays.shorthand.slice();e>0&&e<t.length&&(t=t.splice(e,t.length).concat(t.splice(0,e)));for(var n=g.config.showMonths;n--;)g.weekdayContainer.children[n].innerHTML="\n      <span class='flatpickr-weekday'>\n        "+t.join("</span><span class='flatpickr-weekday'>")+"\n      </span>\n      "}function $(e,t){void 0===t&&(t=!0);var n=t?e:e-g.currentMonth;n<0&&!0===g._hidePrevMonthArrow||n>0&&!0===g._hideNextMonthArrow||(g.currentMonth+=n,(g.currentMonth<0||g.currentMonth>11)&&(g.currentYear+=g.currentMonth>11?1:-1,g.currentMonth=(g.currentMonth+12)%12,fe("onYearChange")),B(),fe("onMonthChange"),pe())}function z(e){return!(!g.config.appendTo||!g.config.appendTo.contains(e))||g.calendarContainer.contains(e)}function G(e){if(g.isOpen&&!g.config.inline){var t="function"==typeof(r=e).composedPath?r.composedPath()[0]:r.target,n=z(t),a=t===g.input||t===g.altInput||g.element.contains(t)||e.path&&e.path.indexOf&&(~e.path.indexOf(g.input)||~e.path.indexOf(g.altInput)),i="blur"===e.type?a&&e.relatedTarget&&!z(e.relatedTarget):!a&&!n&&!z(e.relatedTarget),o=!g.config.ignoredFocusElements.some(function(e){return e.contains(t)});i&&o&&(g.close(),"range"===g.config.mode&&1===g.selectedDates.length&&(g.clear(!1),g.redraw()))}var r}function V(e){if(!(!e||g.config.minDate&&e<g.config.minDate.getFullYear()||g.config.maxDate&&e>g.config.maxDate.getFullYear())){var t=e,n=g.currentYear!==t;g.currentYear=t||g.currentYear,g.config.maxDate&&g.currentYear===g.config.maxDate.getFullYear()?g.currentMonth=Math.min(g.config.maxDate.getMonth(),g.currentMonth):g.config.minDate&&g.currentYear===g.config.minDate.getFullYear()&&(g.currentMonth=Math.max(g.config.minDate.getMonth(),g.currentMonth)),n&&(g.redraw(),fe("onYearChange"))}}function Z(e,t){void 0===t&&(t=!0);var n=g.parseDate(e,void 0,t);if(g.config.minDate&&n&&w(n,g.config.minDate,void 0!==t?t:!g.minDateHasTime)<0||g.config.maxDate&&n&&w(n,g.config.maxDate,void 0!==t?t:!g.maxDateHasTime)>0)return!1;if(0===g.config.enable.length&&0===g.config.disable.length)return!0;if(void 0===n)return!1;for(var a=g.config.enable.length>0,i=a?g.config.enable:g.config.disable,o=0,r=void 0;o<i.length;o++){if("function"==typeof(r=i[o])&&r(n))return a;if(r instanceof Date&&void 0!==n&&r.getTime()===n.getTime())return a;if("string"==typeof r&&void 0!==n){var l=g.parseDate(r,void 0,!0);return l&&l.getTime()===n.getTime()?a:!a}if("object"==typeof r&&void 0!==n&&r.from&&r.to&&n.getTime()>=r.from.getTime()&&n.getTime()<=r.to.getTime())return a}return!a}function Q(e){return void 0!==g.daysContainer&&(-1===e.className.indexOf("hidden")&&g.daysContainer.contains(e))}function X(e){var t=e.target===g._input,n=g.config.allowInput,a=g.isOpen&&(!n||!t),i=g.config.inline&&t&&!n;if(13===e.keyCode&&t){if(n)return g.setDate(g._input.value,!0,e.target===g.altInput?g.config.altFormat:g.config.dateFormat),e.target.blur();g.open()}else if(z(e.target)||a||i){var o=!!g.timeContainer&&g.timeContainer.contains(e.target);switch(e.keyCode){case 13:o?(x(),le()):ce(e);break;case 27:e.preventDefault(),le();break;case 8:case 46:t&&!g.config.allowInput&&(e.preventDefault(),g.clear());break;case 37:case 39:if(o)g.hourElement&&g.hourElement.focus();else if(e.preventDefault(),void 0!==g.daysContainer&&(!1===n||document.activeElement&&Q(document.activeElement))){var r=39===e.keyCode?1:-1;e.ctrlKey?(e.stopPropagation(),$(r),W(L(1),0)):W(void 0,r)}break;case 38:case 40:e.preventDefault();var l=40===e.keyCode?1:-1;g.daysContainer&&void 0!==e.target.$i||e.target===g.input?e.ctrlKey?(e.stopPropagation(),V(g.currentYear-l),W(L(1),0)):o||W(void 0,7*l):g.config.enableTime&&(!o&&g.hourElement&&g.hourElement.focus(),x(e),g._debouncedChange());break;case 9:if(o){var c=[g.hourElement,g.minuteElement,g.secondElement,g.amPM].filter(function(e){return e}),d=c.indexOf(e.target);if(-1!==d){var s=c[d+(e.shiftKey?-1:1)];void 0!==s?(e.preventDefault(),s.focus()):e.shiftKey&&(e.preventDefault(),g._input.focus())}}}}if(void 0!==g.amPM&&e.target===g.amPM)switch(e.key){case g.l10n.amPM[0].charAt(0):case g.l10n.amPM[0].charAt(0).toLowerCase():g.amPM.textContent=g.l10n.amPM[0],T(),ve();break;case g.l10n.amPM[1].charAt(0):case g.l10n.amPM[1].charAt(0).toLowerCase():g.amPM.textContent=g.l10n.amPM[1],T(),ve()}fe("onKeyDown",e)}function ee(e){if(1===g.selectedDates.length&&(!e||e.classList.contains("flatpickr-day")&&!e.classList.contains("disabled"))){for(var t=e?e.dateObj.getTime():g.days.firstElementChild.dateObj.getTime(),n=g.parseDate(g.selectedDates[0],void 0,!0).getTime(),a=Math.min(t,g.selectedDates[0].getTime()),i=Math.max(t,g.selectedDates[0].getTime()),o=g.daysContainer.lastChild.lastChild.dateObj.getTime(),r=!1,l=0,c=0,d=a;d<o;d+=y.DAY)Z(new Date(d),!0)||(r=r||d>a&&d<i,d<n&&(!l||d>l)?l=d:d>n&&(!c||d<c)&&(c=d));for(var s=0;s<g.config.showMonths;s++)for(var u=g.daysContainer.children[s],f=g.daysContainer.children[s-1],m=function(a,i){var o=u.children[a],d=o.dateObj.getTime(),m=l>0&&d<l||c>0&&d>c;return m?(o.classList.add("notAllowed"),["inRange","startRange","endRange"].forEach(function(e){o.classList.remove(e)}),"continue"):r&&!m?"continue":(["startRange","inRange","endRange","notAllowed"].forEach(function(e){o.classList.remove(e)}),void(void 0!==e&&(e.classList.add(t<g.selectedDates[0].getTime()?"startRange":"endRange"),!u.contains(e)&&s>0&&f&&f.lastChild.dateObj.getTime()>=d||(n<t&&d===n?o.classList.add("startRange"):n>t&&d===n&&o.classList.add("endRange"),d>=l&&(0===c||d<=c)&&b(d,n,t)&&o.classList.add("inRange")))))},p=0,h=u.children.length;p<h;p++)m(p)}}function te(){!g.isOpen||g.config.static||g.config.inline||oe()}function ne(){g.setDate(void 0!==g.config.minDate?new Date(g.config.minDate.getTime()):new Date,!1),I(),ve()}function ae(e){return function(t){var n=g.config["_"+e+"Date"]=g.parseDate(t,g.config.dateFormat),a=g.config["_"+("min"===e?"max":"min")+"Date"];void 0!==n&&(g["min"===e?"minDateHasTime":"maxDateHasTime"]=n.getHours()>0||n.getMinutes()>0||n.getSeconds()>0),g.selectedDates&&(g.selectedDates=g.selectedDates.filter(function(e){return Z(e)}),g.selectedDates.length||"min"!==e||k(n),ve()),g.daysContainer&&(re(),void 0!==n?g.currentYearElement[e]=n.getFullYear().toString():g.currentYearElement.removeAttribute(e),g.currentYearElement.disabled=!!a&&void 0!==n&&a.getFullYear()===n.getFullYear())}}function ie(){"object"!=typeof g.config.locale&&void 0===E.l10ns[g.config.locale]&&g.config.errorHandler(new Error("flatpickr: invalid locale "+g.config.locale)),g.l10n=e({},E.l10ns.default,"object"==typeof g.config.locale?g.config.locale:"default"!==g.config.locale?E.l10ns[g.config.locale]:void 0),p.K="("+g.l10n.amPM[0]+"|"+g.l10n.amPM[1]+"|"+g.l10n.amPM[0].toLowerCase()+"|"+g.l10n.amPM[1].toLowerCase()+")",g.formatDate=v(g),g.parseDate=D({config:g.config,l10n:g.l10n})}function oe(e){if(void 0!==g.calendarContainer){fe("onPreCalendarPosition");var t=e||g._positionElement,n=Array.prototype.reduce.call(g.calendarContainer.children,function(e,t){return e+t.offsetHeight},0),a=g.calendarContainer.offsetWidth,i=g.config.position.split(" "),o=i[0],r=i.length>1?i[1]:null,l=t.getBoundingClientRect(),d=window.innerHeight-l.bottom,s="above"===o||"below"!==o&&d<n&&l.top>n,u=window.pageYOffset+l.top+(s?-n-2:t.offsetHeight+2);if(c(g.calendarContainer,"arrowTop",!s),c(g.calendarContainer,"arrowBottom",s),!g.config.inline){var f=window.pageXOffset+l.left-(null!=r&&"center"===r?(a-l.width)/2:0),m=window.document.body.offsetWidth-l.right,p=f+a>window.document.body.offsetWidth,h=m+a>window.document.body.offsetWidth;if(c(g.calendarContainer,"rightMost",p),!g.config.static)if(g.calendarContainer.style.top=u+"px",p)if(h){var v=document.styleSheets[0];if(void 0===v)return;var D=window.document.body.offsetWidth,w=Math.max(0,D/2-a/2),b=v.cssRules.length,y="{left:"+l.left+"px;right:auto;}";c(g.calendarContainer,"rightMost",!1),c(g.calendarContainer,"centerMost",!0),v.insertRule(".flatpickr-calendar.centerMost:before,.flatpickr-calendar.centerMost:after"+y,b),g.calendarContainer.style.left=w+"px",g.calendarContainer.style.right="auto"}else g.calendarContainer.style.left="auto",g.calendarContainer.style.right=m+"px";else g.calendarContainer.style.left=f+"px",g.calendarContainer.style.right="auto"}}}function re(){g.config.noCalendar||g.isMobile||(pe(),B())}function le(){g._input.focus(),-1!==window.navigator.userAgent.indexOf("MSIE")||void 0!==navigator.msMaxTouchPoints?setTimeout(g.close,0):g.close()}function ce(e){e.preventDefault(),e.stopPropagation();var t=function e(t,n){return n(t)?t:t.parentNode?e(t.parentNode,n):void 0}(e.target,function(e){return e.classList&&e.classList.contains("flatpickr-day")&&!e.classList.contains("disabled")&&!e.classList.contains("notAllowed")});if(void 0!==t){var n=t,a=g.latestSelectedDateObj=new Date(n.dateObj.getTime()),i=(a.getMonth()<g.currentMonth||a.getMonth()>g.currentMonth+g.config.showMonths-1)&&"range"!==g.config.mode;if(g.selectedDateElem=n,"single"===g.config.mode)g.selectedDates=[a];else if("multiple"===g.config.mode){var o=ge(a);o?g.selectedDates.splice(parseInt(o),1):g.selectedDates.push(a)}else"range"===g.config.mode&&(2===g.selectedDates.length&&g.clear(!1,!1),g.latestSelectedDateObj=a,g.selectedDates.push(a),0!==w(a,g.selectedDates[0],!0)&&g.selectedDates.sort(function(e,t){return e.getTime()-t.getTime()}));if(T(),i){var r=g.currentYear!==a.getFullYear();g.currentYear=a.getFullYear(),g.currentMonth=a.getMonth(),r&&fe("onYearChange"),fe("onMonthChange")}if(pe(),B(),ve(),g.config.enableTime&&setTimeout(function(){return g.showTimeInput=!0},50),i||"range"===g.config.mode||1!==g.config.showMonths?void 0!==g.selectedDateElem&&void 0===g.hourElement&&g.selectedDateElem&&g.selectedDateElem.focus():H(n),void 0!==g.hourElement&&void 0!==g.hourElement&&g.hourElement.focus(),g.config.closeOnSelect){var l="single"===g.config.mode&&!g.config.enableTime,c="range"===g.config.mode&&2===g.selectedDates.length&&!g.config.enableTime;(l||c)&&le()}F()}}g.parseDate=D({config:g.config,l10n:g.l10n}),g._handlers=[],g._bind=_,g._setHoursFromDate=k,g._positionCalendar=oe,g.changeMonth=$,g.changeYear=V,g.clear=function(e,t){void 0===e&&(e=!0);void 0===t&&(t=!0);g.input.value="",void 0!==g.altInput&&(g.altInput.value="");void 0!==g.mobileInput&&(g.mobileInput.value="");g.selectedDates=[],g.latestSelectedDateObj=void 0,!0===t&&(g.currentYear=g._initialDate.getFullYear(),g.currentMonth=g._initialDate.getMonth());g.showTimeInput=!1,!0===g.config.enableTime&&I();g.redraw(),e&&fe("onChange")},g.close=function(){g.isOpen=!1,g.isMobile||(void 0!==g.calendarContainer&&g.calendarContainer.classList.remove("open"),void 0!==g._input&&g._input.classList.remove("active"));fe("onClose")},g._createElement=d,g.destroy=function(){void 0!==g.config&&fe("onDestroy");for(var e=g._handlers.length;e--;){var t=g._handlers[e];t.element.removeEventListener(t.event,t.handler,t.options)}if(g._handlers=[],g.mobileInput)g.mobileInput.parentNode&&g.mobileInput.parentNode.removeChild(g.mobileInput),g.mobileInput=void 0;else if(g.calendarContainer&&g.calendarContainer.parentNode)if(g.config.static&&g.calendarContainer.parentNode){var n=g.calendarContainer.parentNode;if(n.lastChild&&n.removeChild(n.lastChild),n.parentNode){for(;n.firstChild;)n.parentNode.insertBefore(n.firstChild,n);n.parentNode.removeChild(n)}}else g.calendarContainer.parentNode.removeChild(g.calendarContainer);g.altInput&&(g.input.type="text",g.altInput.parentNode&&g.altInput.parentNode.removeChild(g.altInput),delete g.altInput);g.input&&(g.input.type=g.input._type,g.input.classList.remove("flatpickr-input"),g.input.removeAttribute("readonly"),g.input.value="");["_showTimeInput","latestSelectedDateObj","_hideNextMonthArrow","_hidePrevMonthArrow","__hideNextMonthArrow","__hidePrevMonthArrow","isMobile","isOpen","selectedDateElem","minDateHasTime","maxDateHasTime","days","daysContainer","_input","_positionElement","innerContainer","rContainer","monthNav","todayDateElem","calendarContainer","weekdayContainer","prevMonthNav","nextMonthNav","currentMonthElement","currentYearElement","navigationCurrentMonth","selectedDateElem","config"].forEach(function(e){try{delete g[e]}catch(e){}})},g.isEnabled=Z,g.jumpToDate=P,g.open=function(e,t){void 0===t&&(t=g._positionElement);if(!0===g.isMobile)return e&&(e.preventDefault(),e.target&&e.target.blur()),void 0!==g.mobileInput&&(g.mobileInput.focus(),g.mobileInput.click()),void fe("onOpen");if(g._input.disabled||g.config.inline)return;var n=g.isOpen;g.isOpen=!0,n||(g.calendarContainer.classList.add("open"),g._input.classList.add("active"),fe("onOpen"),oe(t));!0===g.config.enableTime&&!0===g.config.noCalendar&&(0===g.selectedDates.length&&ne(),!1!==g.config.allowInput||void 0!==e&&g.timeContainer.contains(e.relatedTarget)||setTimeout(function(){return g.hourElement.select()},50))},g.redraw=re,g.set=function(e,n){null!==e&&"object"==typeof e?Object.assign(g.config,e):(g.config[e]=n,void 0!==de[e]?de[e].forEach(function(e){return e()}):t.indexOf(e)>-1&&(g.config[e]=l(n)));g.redraw(),ve(!1)},g.setDate=function(e,t,n){void 0===t&&(t=!1);void 0===n&&(n=g.config.dateFormat);if(0!==e&&!e||e instanceof Array&&0===e.length)return g.clear(t);se(e,n),g.showTimeInput=g.selectedDates.length>0,g.latestSelectedDateObj=g.selectedDates[0],g.redraw(),P(),k(),ve(t),t&&fe("onChange")},g.toggle=function(e){if(!0===g.isOpen)return g.close();g.open(e)};var de={locale:[ie,q],showMonths:[J,M,U]};function se(e,t){var n=[];if(e instanceof Array)n=e.map(function(e){return g.parseDate(e,t)});else if(e instanceof Date||"number"==typeof e)n=[g.parseDate(e,t)];else if("string"==typeof e)switch(g.config.mode){case"single":case"time":n=[g.parseDate(e,t)];break;case"multiple":n=e.split(g.config.conjunction).map(function(e){return g.parseDate(e,t)});break;case"range":n=e.split(g.l10n.rangeSeparator).map(function(e){return g.parseDate(e,t)})}else g.config.errorHandler(new Error("Invalid date supplied: "+JSON.stringify(e)));g.selectedDates=n.filter(function(e){return e instanceof Date&&Z(e,!1)}),"range"===g.config.mode&&g.selectedDates.sort(function(e,t){return e.getTime()-t.getTime()})}function ue(e){return e.slice().map(function(e){return"string"==typeof e||"number"==typeof e||e instanceof Date?g.parseDate(e,void 0,!0):e&&"object"==typeof e&&e.from&&e.to?{from:g.parseDate(e.from,void 0),to:g.parseDate(e.to,void 0)}:e}).filter(function(e){return e})}function fe(e,t){if(void 0!==g.config){var n=g.config[e];if(void 0!==n&&n.length>0)for(var a=0;n[a]&&a<n.length;a++)n[a](g.selectedDates,g.input.value,g,t);"onChange"===e&&(g.input.dispatchEvent(me("change")),g.input.dispatchEvent(me("input")))}}function me(e){var t=document.createEvent("Event");return t.initEvent(e,!0,!0),t}function ge(e){for(var t=0;t<g.selectedDates.length;t++)if(0===w(g.selectedDates[t],e))return""+t;return!1}function pe(){g.config.noCalendar||g.isMobile||!g.monthNav||(g.yearElements.forEach(function(e,t){var n=new Date(g.currentYear,g.currentMonth,1);n.setMonth(g.currentMonth+t),g.monthElements[t].textContent=m(n.getMonth(),g.config.shorthandCurrentMonth,g.l10n)+" ",e.value=n.getFullYear().toString()}),g._hidePrevMonthArrow=void 0!==g.config.minDate&&(g.currentYear===g.config.minDate.getFullYear()?g.currentMonth<=g.config.minDate.getMonth():g.currentYear<g.config.minDate.getFullYear()),g._hideNextMonthArrow=void 0!==g.config.maxDate&&(g.currentYear===g.config.maxDate.getFullYear()?g.currentMonth+1>g.config.maxDate.getMonth():g.currentYear>g.config.maxDate.getFullYear()))}function he(e){return g.selectedDates.map(function(t){return g.formatDate(t,e)}).filter(function(e,t,n){return"range"!==g.config.mode||g.config.enableTime||n.indexOf(e)===t}).join("range"!==g.config.mode?g.config.conjunction:g.l10n.rangeSeparator)}function ve(e){if(void 0===e&&(e=!0),0===g.selectedDates.length)return g.clear(e);void 0!==g.mobileInput&&g.mobileFormatStr&&(g.mobileInput.value=void 0!==g.latestSelectedDateObj?g.formatDate(g.latestSelectedDateObj,g.mobileFormatStr):""),g.input.value=he(g.config.dateFormat),void 0!==g.altInput&&(g.altInput.value=he(g.config.altFormat)),!1!==e&&fe("onValueUpdate")}function De(e){e.preventDefault();var t=g.prevMonthNav.contains(e.target),n=g.nextMonthNav.contains(e.target);t||n?$(t?-1:1):g.yearElements.indexOf(e.target)>=0?e.target.select():e.target.classList.contains("arrowUp")?g.changeYear(g.currentYear+1):e.target.classList.contains("arrowDown")&&g.changeYear(g.currentYear-1)}return function(){g.element=g.input=n,g.isOpen=!1,function(){var a=["wrap","weekNumbers","allowInput","clickOpens","time_24hr","enableTime","noCalendar","altInput","shorthandCurrentMonth","inline","static","enableSeconds","disableMobile"],i=e({},f,JSON.parse(JSON.stringify(n.dataset||{}))),o={};g.config.parseDate=i.parseDate,g.config.formatDate=i.formatDate,Object.defineProperty(g.config,"enable",{get:function(){return g.config._enable},set:function(e){g.config._enable=ue(e)}}),Object.defineProperty(g.config,"disable",{get:function(){return g.config._disable},set:function(e){g.config._disable=ue(e)}});var r="time"===i.mode;i.dateFormat||!i.enableTime&&!r||(o.dateFormat=i.noCalendar||r?"H:i"+(i.enableSeconds?":S":""):E.defaultConfig.dateFormat+" H:i"+(i.enableSeconds?":S":"")),i.altInput&&(i.enableTime||r)&&!i.altFormat&&(o.altFormat=i.noCalendar||r?"h:i"+(i.enableSeconds?":S K":" K"):E.defaultConfig.altFormat+" h:i"+(i.enableSeconds?":S":"")+" K"),Object.defineProperty(g.config,"minDate",{get:function(){return g.config._minDate},set:ae("min")}),Object.defineProperty(g.config,"maxDate",{get:function(){return g.config._maxDate},set:ae("max")});var c=function(e){return function(t){g.config["min"===e?"_minTime":"_maxTime"]=g.parseDate(t,"H:i")}};Object.defineProperty(g.config,"minTime",{get:function(){return g.config._minTime},set:c("min")}),Object.defineProperty(g.config,"maxTime",{get:function(){return g.config._maxTime},set:c("max")}),"time"===i.mode&&(g.config.noCalendar=!0,g.config.enableTime=!0),Object.assign(g.config,o,i);for(var d=0;d<a.length;d++)g.config[a[d]]=!0===g.config[a[d]]||"true"===g.config[a[d]];t.filter(function(e){return void 0!==g.config[e]}).forEach(function(e){g.config[e]=l(g.config[e]||[]).map(h)}),g.isMobile=!g.config.disableMobile&&!g.config.inline&&"single"===g.config.mode&&!g.config.disable.length&&!g.config.enable.length&&!g.config.weekNumbers&&/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);for(var d=0;d<g.config.plugins.length;d++){var s=g.config.plugins[d](g)||{};for(var u in s)t.indexOf(u)>-1?g.config[u]=l(s[u]).map(h).concat(g.config[u]):void 0===i[u]&&(g.config[u]=s[u])}fe("onParseConfig")}(),ie(),g.input=g.config.wrap?n.querySelector("[data-input]"):n,g.input?(g.input._type=g.input.type,g.input.type="text",g.input.classList.add("flatpickr-input"),g._input=g.input,g.config.altInput&&(g.altInput=d(g.input.nodeName,g.input.className+" "+g.config.altInputClass),g._input=g.altInput,g.altInput.placeholder=g.input.placeholder,g.altInput.disabled=g.input.disabled,g.altInput.required=g.input.required,g.altInput.tabIndex=g.input.tabIndex,g.altInput.type="text",g.input.setAttribute("type","hidden"),!g.config.static&&g.input.parentNode&&g.input.parentNode.insertBefore(g.altInput,g.input.nextSibling)),g.config.allowInput||g._input.setAttribute("readonly","readonly"),g._positionElement=g.config.positionElement||g._input):g.config.errorHandler(new Error("Invalid input element specified")),function(){g.selectedDates=[],g.now=g.parseDate(g.config.now)||new Date;var e=g.config.defaultDate||("INPUT"!==g.input.nodeName&&"TEXTAREA"!==g.input.nodeName||!g.input.placeholder||g.input.value!==g.input.placeholder?g.input.value:null);e&&se(e,g.config.dateFormat),g._initialDate=g.selectedDates.length>0?g.selectedDates[0]:g.config.minDate&&g.config.minDate.getTime()>g.now.getTime()?g.config.minDate:g.config.maxDate&&g.config.maxDate.getTime()<g.now.getTime()?g.config.maxDate:g.now,g.currentYear=g._initialDate.getFullYear(),g.currentMonth=g._initialDate.getMonth(),g.selectedDates.length>0&&(g.latestSelectedDateObj=g.selectedDates[0]),void 0!==g.config.minTime&&(g.config.minTime=g.parseDate(g.config.minTime,"H:i")),void 0!==g.config.maxTime&&(g.config.maxTime=g.parseDate(g.config.maxTime,"H:i")),g.minDateHasTime=!!g.config.minDate&&(g.config.minDate.getHours()>0||g.config.minDate.getMinutes()>0||g.config.minDate.getSeconds()>0),g.maxDateHasTime=!!g.config.maxDate&&(g.config.maxDate.getHours()>0||g.config.maxDate.getMinutes()>0||g.config.maxDate.getSeconds()>0),Object.defineProperty(g,"showTimeInput",{get:function(){return g._showTimeInput},set:function(e){g._showTimeInput=e,g.calendarContainer&&c(g.calendarContainer,"showTimeInput",e),g.isOpen&&oe()}})}(),g.utils={getDaysInMonth:function(e,t){return void 0===e&&(e=g.currentMonth),void 0===t&&(t=g.currentYear),1===e&&(t%4==0&&t%100!=0||t%400==0)?29:g.l10n.daysInMonth[e]}},g.isMobile||function(){var e=window.document.createDocumentFragment();if(g.calendarContainer=d("div","flatpickr-calendar"),g.calendarContainer.tabIndex=-1,!g.config.noCalendar){if(e.appendChild((g.monthNav=d("div","flatpickr-months"),g.yearElements=[],g.monthElements=[],g.prevMonthNav=d("span","flatpickr-prev-month"),g.prevMonthNav.innerHTML=g.config.prevArrow,g.nextMonthNav=d("span","flatpickr-next-month"),g.nextMonthNav.innerHTML=g.config.nextArrow,J(),Object.defineProperty(g,"_hidePrevMonthArrow",{get:function(){return g.__hidePrevMonthArrow},set:function(e){g.__hidePrevMonthArrow!==e&&(c(g.prevMonthNav,"disabled",e),g.__hidePrevMonthArrow=e)}}),Object.defineProperty(g,"_hideNextMonthArrow",{get:function(){return g.__hideNextMonthArrow},set:function(e){g.__hideNextMonthArrow!==e&&(c(g.nextMonthNav,"disabled",e),g.__hideNextMonthArrow=e)}}),g.currentYearElement=g.yearElements[0],pe(),g.monthNav)),g.innerContainer=d("div","flatpickr-innerContainer"),g.config.weekNumbers){var t=function(){g.calendarContainer.classList.add("hasWeeks");var e=d("div","flatpickr-weekwrapper");e.appendChild(d("span","flatpickr-weekday",g.l10n.weekAbbreviation));var t=d("div","flatpickr-weeks");return e.appendChild(t),{weekWrapper:e,weekNumbers:t}}(),n=t.weekWrapper,a=t.weekNumbers;g.innerContainer.appendChild(n),g.weekNumbers=a,g.weekWrapper=n}g.rContainer=d("div","flatpickr-rContainer"),g.rContainer.appendChild(U()),g.daysContainer||(g.daysContainer=d("div","flatpickr-days"),g.daysContainer.tabIndex=-1),B(),g.rContainer.appendChild(g.daysContainer),g.innerContainer.appendChild(g.rContainer),e.appendChild(g.innerContainer)}g.config.enableTime&&e.appendChild(function(){g.calendarContainer.classList.add("hasTime"),g.config.noCalendar&&g.calendarContainer.classList.add("noCalendar"),g.timeContainer=d("div","flatpickr-time"),g.timeContainer.tabIndex=-1;var e=d("span","flatpickr-time-separator",":"),t=u("flatpickr-hour");g.hourElement=t.getElementsByTagName("input")[0];var n=u("flatpickr-minute");if(g.minuteElement=n.getElementsByTagName("input")[0],g.hourElement.tabIndex=g.minuteElement.tabIndex=-1,g.hourElement.value=i(g.latestSelectedDateObj?g.latestSelectedDateObj.getHours():g.config.time_24hr?g.config.defaultHour:function(e){switch(e%24){case 0:case 12:return 12;default:return e%12}}(g.config.defaultHour)),g.minuteElement.value=i(g.latestSelectedDateObj?g.latestSelectedDateObj.getMinutes():g.config.defaultMinute),g.hourElement.setAttribute("step",g.config.hourIncrement.toString()),g.minuteElement.setAttribute("step",g.config.minuteIncrement.toString()),g.hourElement.setAttribute("min",g.config.time_24hr?"0":"1"),g.hourElement.setAttribute("max",g.config.time_24hr?"23":"12"),g.minuteElement.setAttribute("min","0"),g.minuteElement.setAttribute("max","59"),g.timeContainer.appendChild(t),g.timeContainer.appendChild(e),g.timeContainer.appendChild(n),g.config.time_24hr&&g.timeContainer.classList.add("time24hr"),g.config.enableSeconds){g.timeContainer.classList.add("hasSeconds");var a=u("flatpickr-second");g.secondElement=a.getElementsByTagName("input")[0],g.secondElement.value=i(g.latestSelectedDateObj?g.latestSelectedDateObj.getSeconds():g.config.defaultSeconds),g.secondElement.setAttribute("step",g.minuteElement.getAttribute("step")),g.secondElement.setAttribute("min","0"),g.secondElement.setAttribute("max","59"),g.timeContainer.appendChild(d("span","flatpickr-time-separator",":")),g.timeContainer.appendChild(a)}return g.config.time_24hr||(g.amPM=d("span","flatpickr-am-pm",g.l10n.amPM[o((g.latestSelectedDateObj?g.hourElement.value:g.config.defaultHour)>11)]),g.amPM.title=g.l10n.toggleTitle,g.amPM.tabIndex=-1,g.timeContainer.appendChild(g.amPM)),g.timeContainer}()),c(g.calendarContainer,"rangeMode","range"===g.config.mode),c(g.calendarContainer,"animate",!0===g.config.animate),c(g.calendarContainer,"multiMonth",g.config.showMonths>1),g.calendarContainer.appendChild(e);var r=void 0!==g.config.appendTo&&void 0!==g.config.appendTo.nodeType;if((g.config.inline||g.config.static)&&(g.calendarContainer.classList.add(g.config.inline?"inline":"static"),g.config.inline&&(!r&&g.element.parentNode?g.element.parentNode.insertBefore(g.calendarContainer,g._input.nextSibling):void 0!==g.config.appendTo&&g.config.appendTo.appendChild(g.calendarContainer)),g.config.static)){var l=d("div","flatpickr-wrapper");g.element.parentNode&&g.element.parentNode.insertBefore(l,g.element),l.appendChild(g.element),g.altInput&&l.appendChild(g.altInput),l.appendChild(g.calendarContainer)}g.config.static||g.config.inline||(void 0!==g.config.appendTo?g.config.appendTo:window.document.body).appendChild(g.calendarContainer)}(),function(){if(g.config.wrap&&["open","close","toggle","clear"].forEach(function(e){Array.prototype.forEach.call(g.element.querySelectorAll("[data-"+e+"]"),function(t){return _(t,"click",g[e])})}),g.isMobile)!function(){var e=g.config.enableTime?g.config.noCalendar?"time":"datetime-local":"date";g.mobileInput=d("input",g.input.className+" flatpickr-mobile"),g.mobileInput.step=g.input.getAttribute("step")||"any",g.mobileInput.tabIndex=1,g.mobileInput.type=e,g.mobileInput.disabled=g.input.disabled,g.mobileInput.required=g.input.required,g.mobileInput.placeholder=g.input.placeholder,g.mobileFormatStr="datetime-local"===e?"Y-m-d\\TH:i:S":"date"===e?"Y-m-d":"H:i:S",g.selectedDates.length>0&&(g.mobileInput.defaultValue=g.mobileInput.value=g.formatDate(g.selectedDates[0],g.mobileFormatStr)),g.config.minDate&&(g.mobileInput.min=g.formatDate(g.config.minDate,"Y-m-d")),g.config.maxDate&&(g.mobileInput.max=g.formatDate(g.config.maxDate,"Y-m-d")),g.input.type="hidden",void 0!==g.altInput&&(g.altInput.type="hidden");try{g.input.parentNode&&g.input.parentNode.insertBefore(g.mobileInput,g.input.nextSibling)}catch(e){}_(g.mobileInput,"change",function(e){g.setDate(e.target.value,!1,g.mobileFormatStr),fe("onChange"),fe("onClose")})}();else{var e=r(te,50);g._debouncedChange=r(F,C),g.daysContainer&&!/iPhone|iPad|iPod/i.test(navigator.userAgent)&&_(g.daysContainer,"mouseover",function(e){"range"===g.config.mode&&ee(e.target)}),_(window.document.body,"keydown",X),g.config.static||_(g._input,"keydown",X),g.config.inline||g.config.static||_(window,"resize",e),void 0!==window.ontouchstart?_(window.document,"click",G):_(window.document,"mousedown",N(G)),_(window.document,"focus",G,{capture:!0}),!0===g.config.clickOpens&&(_(g._input,"focus",g.open),_(g._input,"mousedown",N(g.open))),void 0!==g.daysContainer&&(_(g.monthNav,"mousedown",N(De)),_(g.monthNav,["keyup","increment"],S),_(g.daysContainer,"mousedown",N(ce))),void 0!==g.timeContainer&&void 0!==g.minuteElement&&void 0!==g.hourElement&&(_(g.timeContainer,["increment"],x),_(g.timeContainer,"blur",x,{capture:!0}),_(g.timeContainer,"mousedown",N(A)),_([g.hourElement,g.minuteElement],["focus","click"],function(e){return e.target.select()}),void 0!==g.secondElement&&_(g.secondElement,"focus",function(){return g.secondElement&&g.secondElement.select()}),void 0!==g.amPM&&_(g.amPM,"mousedown",N(function(e){x(e),F()})))}}(),(g.selectedDates.length||g.config.noCalendar)&&(g.config.enableTime&&k(g.config.noCalendar?g.latestSelectedDateObj||g.config.minDate:void 0),ve(!1)),M(),g.showTimeInput=g.selectedDates.length>0||g.config.noCalendar;var a=/^((?!chrome|android).)*safari/i.test(navigator.userAgent);!g.isMobile&&a&&oe(),fe("onReady")}(),g}function x(e,t){for(var n=Array.prototype.slice.call(e).filter(function(e){return e instanceof HTMLElement}),a=[],i=0;i<n.length;i++){var o=n[i];try{if(null!==o.getAttribute("data-fp-omit"))continue;void 0!==o._flatpickr&&(o._flatpickr.destroy(),o._flatpickr=void 0),o._flatpickr=M(o,t||{}),a.push(o._flatpickr)}catch(e){console.error(e)}}return 1===a.length?a[0]:a}"undefined"!=typeof HTMLElement&&(HTMLCollection.prototype.flatpickr=NodeList.prototype.flatpickr=function(e){return x(this,e)},HTMLElement.prototype.flatpickr=function(e){return x([this],e)});var E=function(e,t){return"string"==typeof e?x(window.document.querySelectorAll(e),t):e instanceof Node?x([e],t):x(e,t)};return E.defaultConfig=n,E.l10ns={en:e({},a),default:e({},a)},E.localize=function(t){E.l10ns.default=e({},E.l10ns.default,t)},E.setDefaults=function(t){E.defaultConfig=e({},E.defaultConfig,t)},E.parseDate=D({}),E.formatDate=v({}),E.compareDates=w,"undefined"!=typeof jQuery&&(jQuery.fn.flatpickr=function(e){return x(this,e)}),Date.prototype.fp_incr=function(e){return new Date(this.getFullYear(),this.getMonth(),this.getDate()+("string"==typeof e?parseInt(e,10):e))},"undefined"!=typeof window&&(window.flatpickr=E),E});
// Ion.RangeSlider, 2.3.0, © Denis Ineshin, 2010 - 2018, IonDen.com, Build date: 2018-12-12 00:00:37
!function(i){!jQuery&&"function"==typeof define&&define.amd?define(["jquery"],function(t){return i(t,document,window,navigator)}):jQuery||"object"!=typeof exports?i(jQuery,document,window,navigator):i(require("jquery"),document,window,navigator)}(function(a,c,l,t,_){"use strict";var i,s,o=0,e=(i=t.userAgent,s=/msie\s\d+/i,0<i.search(s)&&s.exec(i).toString().split(" ")[1]<9&&(a("html").addClass("lt-ie9"),!0));Function.prototype.bind||(Function.prototype.bind=function(o){var e=this,h=[].slice;if("function"!=typeof e)throw new TypeError;var r=h.call(arguments,1),n=function(){if(this instanceof n){var t=function(){};t.prototype=e.prototype;var i=new t,s=e.apply(i,r.concat(h.call(arguments)));return Object(s)===s?s:i}return e.apply(o,r.concat(h.call(arguments)))};return n}),Array.prototype.indexOf||(Array.prototype.indexOf=function(t,i){var s;if(null==this)throw new TypeError('"this" is null or not defined');var o=Object(this),e=o.length>>>0;if(0===e)return-1;var h=+i||0;if(Math.abs(h)===1/0&&(h=0),e<=h)return-1;for(s=Math.max(0<=h?h:e-Math.abs(h),0);s<e;){if(s in o&&o[s]===t)return s;s++}return-1});var h=function(t,i,s){this.VERSION="2.3.0",this.input=t,this.plugin_count=s,this.current_plugin=0,this.calc_count=0,this.update_tm=0,this.old_from=0,this.old_to=0,this.old_min_interval=null,this.raf_id=null,this.dragging=!1,this.force_redraw=!1,this.no_diapason=!1,this.has_tab_index=!0,this.is_key=!1,this.is_update=!1,this.is_start=!0,this.is_finish=!1,this.is_active=!1,this.is_resize=!1,this.is_click=!1,i=i||{},this.$cache={win:a(l),body:a(c.body),input:a(t),cont:null,rs:null,min:null,max:null,from:null,to:null,single:null,bar:null,line:null,s_single:null,s_from:null,s_to:null,shad_single:null,shad_from:null,shad_to:null,edge:null,grid:null,grid_labels:[]},this.coords={x_gap:0,x_pointer:0,w_rs:0,w_rs_old:0,w_handle:0,p_gap:0,p_gap_left:0,p_gap_right:0,p_step:0,p_pointer:0,p_handle:0,p_single_fake:0,p_single_real:0,p_from_fake:0,p_from_real:0,p_to_fake:0,p_to_real:0,p_bar_x:0,p_bar_w:0,grid_gap:0,big_num:0,big:[],big_w:[],big_p:[],big_x:[]},this.labels={w_min:0,w_max:0,w_from:0,w_to:0,w_single:0,p_min:0,p_max:0,p_from_fake:0,p_from_left:0,p_to_fake:0,p_to_left:0,p_single_fake:0,p_single_left:0};var o,e,h,r=this.$cache.input,n=r.prop("value");for(h in o={skin:"flat",type:"single",min:10,max:100,from:null,to:null,step:1,min_interval:0,max_interval:0,drag_interval:!1,values:[],p_values:[],from_fixed:!1,from_min:null,from_max:null,from_shadow:!1,to_fixed:!1,to_min:null,to_max:null,to_shadow:!1,prettify_enabled:!0,prettify_separator:" ",prettify:null,force_edges:!1,keyboard:!0,grid:!1,grid_margin:!0,grid_num:4,grid_snap:!1,hide_min_max:!1,hide_from_to:!1,prefix:"",postfix:"",max_postfix:"",decorate_both:!0,values_separator:" — ",input_values_separator:";",disable:!1,block:!1,extra_classes:"",scope:null,onStart:null,onChange:null,onFinish:null,onUpdate:null},"INPUT"!==r[0].nodeName&&console&&console.warn&&console.warn("Base element should be <input>!",r[0]),(e={skin:r.data("skin"),type:r.data("type"),min:r.data("min"),max:r.data("max"),from:r.data("from"),to:r.data("to"),step:r.data("step"),min_interval:r.data("minInterval"),max_interval:r.data("maxInterval"),drag_interval:r.data("dragInterval"),values:r.data("values"),from_fixed:r.data("fromFixed"),from_min:r.data("fromMin"),from_max:r.data("fromMax"),from_shadow:r.data("fromShadow"),to_fixed:r.data("toFixed"),to_min:r.data("toMin"),to_max:r.data("toMax"),to_shadow:r.data("toShadow"),prettify_enabled:r.data("prettifyEnabled"),prettify_separator:r.data("prettifySeparator"),force_edges:r.data("forceEdges"),keyboard:r.data("keyboard"),grid:r.data("grid"),grid_margin:r.data("gridMargin"),grid_num:r.data("gridNum"),grid_snap:r.data("gridSnap"),hide_min_max:r.data("hideMinMax"),hide_from_to:r.data("hideFromTo"),prefix:r.data("prefix"),postfix:r.data("postfix"),max_postfix:r.data("maxPostfix"),decorate_both:r.data("decorateBoth"),values_separator:r.data("valuesSeparator"),input_values_separator:r.data("inputValuesSeparator"),disable:r.data("disable"),block:r.data("block"),extra_classes:r.data("extraClasses")}).values=e.values&&e.values.split(","),e)e.hasOwnProperty(h)&&(e[h]!==_&&""!==e[h]||delete e[h]);n!==_&&""!==n&&((n=n.split(e.input_values_separator||i.input_values_separator||";"))[0]&&n[0]==+n[0]&&(n[0]=+n[0]),n[1]&&n[1]==+n[1]&&(n[1]=+n[1]),i&&i.values&&i.values.length?(o.from=n[0]&&i.values.indexOf(n[0]),o.to=n[1]&&i.values.indexOf(n[1])):(o.from=n[0]&&+n[0],o.to=n[1]&&+n[1])),a.extend(o,i),a.extend(o,e),this.options=o,this.update_check={},this.validate(),this.result={input:this.$cache.input,slider:null,min:this.options.min,max:this.options.max,from:this.options.from,from_percent:0,from_value:null,to:this.options.to,to_percent:0,to_value:null},this.init()};h.prototype={init:function(t){this.no_diapason=!1,this.coords.p_step=this.convertToPercent(this.options.step,!0),this.target="base",this.toggleInput(),this.append(),this.setMinMax(),t?(this.force_redraw=!0,this.calc(!0),this.callOnUpdate()):(this.force_redraw=!0,this.calc(!0),this.callOnStart()),this.updateScene()},append:function(){var t='<span class="irs irs--'+this.options.skin+" js-irs-"+this.plugin_count+" "+this.options.extra_classes+'"></span>';this.$cache.input.before(t),this.$cache.input.prop("readonly",!0),this.$cache.cont=this.$cache.input.prev(),this.result.slider=this.$cache.cont,this.$cache.cont.html('<span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min">0</span><span class="irs-max">1</span><span class="irs-from">0</span><span class="irs-to">0</span><span class="irs-single">0</span></span><span class="irs-grid"></span>'),this.$cache.rs=this.$cache.cont.find(".irs"),this.$cache.min=this.$cache.cont.find(".irs-min"),this.$cache.max=this.$cache.cont.find(".irs-max"),this.$cache.from=this.$cache.cont.find(".irs-from"),this.$cache.to=this.$cache.cont.find(".irs-to"),this.$cache.single=this.$cache.cont.find(".irs-single"),this.$cache.line=this.$cache.cont.find(".irs-line"),this.$cache.grid=this.$cache.cont.find(".irs-grid"),"single"===this.options.type?(this.$cache.cont.append('<span class="irs-bar irs-bar--single"></span><span class="irs-shadow shadow-single"></span><span class="irs-handle single"><i></i><i></i><i></i></span>'),this.$cache.bar=this.$cache.cont.find(".irs-bar"),this.$cache.edge=this.$cache.cont.find(".irs-bar-edge"),this.$cache.s_single=this.$cache.cont.find(".single"),this.$cache.from[0].style.visibility="hidden",this.$cache.to[0].style.visibility="hidden",this.$cache.shad_single=this.$cache.cont.find(".shadow-single")):(this.$cache.cont.append('<span class="irs-bar"></span><span class="irs-shadow shadow-from"></span><span class="irs-shadow shadow-to"></span><span class="irs-handle from"><i></i><i></i><i></i></span><span class="irs-handle to"><i></i><i></i><i></i></span>'),this.$cache.bar=this.$cache.cont.find(".irs-bar"),this.$cache.s_from=this.$cache.cont.find(".from"),this.$cache.s_to=this.$cache.cont.find(".to"),this.$cache.shad_from=this.$cache.cont.find(".shadow-from"),this.$cache.shad_to=this.$cache.cont.find(".shadow-to"),this.setTopHandler()),this.options.hide_from_to&&(this.$cache.from[0].style.display="none",this.$cache.to[0].style.display="none",this.$cache.single[0].style.display="none"),this.appendGrid(),this.options.disable?(this.appendDisableMask(),this.$cache.input[0].disabled=!0):(this.$cache.input[0].disabled=!1,this.removeDisableMask(),this.bindEvents()),this.options.disable||(this.options.block?this.appendDisableMask():this.removeDisableMask()),this.options.drag_interval&&(this.$cache.bar[0].style.cursor="ew-resize")},setTopHandler:function(){var t=this.options.min,i=this.options.max,s=this.options.from,o=this.options.to;t<s&&o===i?this.$cache.s_from.addClass("type_last"):o<i&&this.$cache.s_to.addClass("type_last")},changeLevel:function(t){switch(t){case"single":this.coords.p_gap=this.toFixed(this.coords.p_pointer-this.coords.p_single_fake),this.$cache.s_single.addClass("state_hover");break;case"from":this.coords.p_gap=this.toFixed(this.coords.p_pointer-this.coords.p_from_fake),this.$cache.s_from.addClass("state_hover"),this.$cache.s_from.addClass("type_last"),this.$cache.s_to.removeClass("type_last");break;case"to":this.coords.p_gap=this.toFixed(this.coords.p_pointer-this.coords.p_to_fake),this.$cache.s_to.addClass("state_hover"),this.$cache.s_to.addClass("type_last"),this.$cache.s_from.removeClass("type_last");break;case"both":this.coords.p_gap_left=this.toFixed(this.coords.p_pointer-this.coords.p_from_fake),this.coords.p_gap_right=this.toFixed(this.coords.p_to_fake-this.coords.p_pointer),this.$cache.s_to.removeClass("type_last"),this.$cache.s_from.removeClass("type_last")}},appendDisableMask:function(){this.$cache.cont.append('<span class="irs-disable-mask"></span>'),this.$cache.cont.addClass("irs-disabled")},removeDisableMask:function(){this.$cache.cont.remove(".irs-disable-mask"),this.$cache.cont.removeClass("irs-disabled")},remove:function(){this.$cache.cont.remove(),this.$cache.cont=null,this.$cache.line.off("keydown.irs_"+this.plugin_count),this.$cache.body.off("touchmove.irs_"+this.plugin_count),this.$cache.body.off("mousemove.irs_"+this.plugin_count),this.$cache.win.off("touchend.irs_"+this.plugin_count),this.$cache.win.off("mouseup.irs_"+this.plugin_count),e&&(this.$cache.body.off("mouseup.irs_"+this.plugin_count),this.$cache.body.off("mouseleave.irs_"+this.plugin_count)),this.$cache.grid_labels=[],this.coords.big=[],this.coords.big_w=[],this.coords.big_p=[],this.coords.big_x=[],cancelAnimationFrame(this.raf_id)},bindEvents:function(){this.no_diapason||(this.$cache.body.on("touchmove.irs_"+this.plugin_count,this.pointerMove.bind(this)),this.$cache.body.on("mousemove.irs_"+this.plugin_count,this.pointerMove.bind(this)),this.$cache.win.on("touchend.irs_"+this.plugin_count,this.pointerUp.bind(this)),this.$cache.win.on("mouseup.irs_"+this.plugin_count,this.pointerUp.bind(this)),this.$cache.line.on("touchstart.irs_"+this.plugin_count,this.pointerClick.bind(this,"click")),this.$cache.line.on("mousedown.irs_"+this.plugin_count,this.pointerClick.bind(this,"click")),this.$cache.line.on("focus.irs_"+this.plugin_count,this.pointerFocus.bind(this)),this.options.drag_interval&&"double"===this.options.type?(this.$cache.bar.on("touchstart.irs_"+this.plugin_count,this.pointerDown.bind(this,"both")),this.$cache.bar.on("mousedown.irs_"+this.plugin_count,this.pointerDown.bind(this,"both"))):(this.$cache.bar.on("touchstart.irs_"+this.plugin_count,this.pointerClick.bind(this,"click")),this.$cache.bar.on("mousedown.irs_"+this.plugin_count,this.pointerClick.bind(this,"click"))),"single"===this.options.type?(this.$cache.single.on("touchstart.irs_"+this.plugin_count,this.pointerDown.bind(this,"single")),this.$cache.s_single.on("touchstart.irs_"+this.plugin_count,this.pointerDown.bind(this,"single")),this.$cache.shad_single.on("touchstart.irs_"+this.plugin_count,this.pointerClick.bind(this,"click")),this.$cache.single.on("mousedown.irs_"+this.plugin_count,this.pointerDown.bind(this,"single")),this.$cache.s_single.on("mousedown.irs_"+this.plugin_count,this.pointerDown.bind(this,"single")),this.$cache.edge.on("mousedown.irs_"+this.plugin_count,this.pointerClick.bind(this,"click")),this.$cache.shad_single.on("mousedown.irs_"+this.plugin_count,this.pointerClick.bind(this,"click"))):(this.$cache.single.on("touchstart.irs_"+this.plugin_count,this.pointerDown.bind(this,null)),this.$cache.single.on("mousedown.irs_"+this.plugin_count,this.pointerDown.bind(this,null)),this.$cache.from.on("touchstart.irs_"+this.plugin_count,this.pointerDown.bind(this,"from")),this.$cache.s_from.on("touchstart.irs_"+this.plugin_count,this.pointerDown.bind(this,"from")),this.$cache.to.on("touchstart.irs_"+this.plugin_count,this.pointerDown.bind(this,"to")),this.$cache.s_to.on("touchstart.irs_"+this.plugin_count,this.pointerDown.bind(this,"to")),this.$cache.shad_from.on("touchstart.irs_"+this.plugin_count,this.pointerClick.bind(this,"click")),this.$cache.shad_to.on("touchstart.irs_"+this.plugin_count,this.pointerClick.bind(this,"click")),this.$cache.from.on("mousedown.irs_"+this.plugin_count,this.pointerDown.bind(this,"from")),this.$cache.s_from.on("mousedown.irs_"+this.plugin_count,this.pointerDown.bind(this,"from")),this.$cache.to.on("mousedown.irs_"+this.plugin_count,this.pointerDown.bind(this,"to")),this.$cache.s_to.on("mousedown.irs_"+this.plugin_count,this.pointerDown.bind(this,"to")),this.$cache.shad_from.on("mousedown.irs_"+this.plugin_count,this.pointerClick.bind(this,"click")),this.$cache.shad_to.on("mousedown.irs_"+this.plugin_count,this.pointerClick.bind(this,"click"))),this.options.keyboard&&this.$cache.line.on("keydown.irs_"+this.plugin_count,this.key.bind(this,"keyboard")),e&&(this.$cache.body.on("mouseup.irs_"+this.plugin_count,this.pointerUp.bind(this)),this.$cache.body.on("mouseleave.irs_"+this.plugin_count,this.pointerUp.bind(this))))},pointerFocus:function(t){var i,s;this.target||(i=(s="single"===this.options.type?this.$cache.single:this.$cache.from).offset().left,i+=s.width()/2-1,this.pointerClick("single",{preventDefault:function(){},pageX:i}))},pointerMove:function(t){if(this.dragging){var i=t.pageX||t.originalEvent.touches&&t.originalEvent.touches[0].pageX;this.coords.x_pointer=i-this.coords.x_gap,this.calc()}},pointerUp:function(t){this.current_plugin===this.plugin_count&&this.is_active&&(this.is_active=!1,this.$cache.cont.find(".state_hover").removeClass("state_hover"),this.force_redraw=!0,e&&a("*").prop("unselectable",!1),this.updateScene(),this.restoreOriginalMinInterval(),(a.contains(this.$cache.cont[0],t.target)||this.dragging)&&this.callOnFinish(),this.dragging=!1)},pointerDown:function(t,i){i.preventDefault();var s=i.pageX||i.originalEvent.touches&&i.originalEvent.touches[0].pageX;2!==i.button&&("both"===t&&this.setTempMinInterval(),t||(t=this.target||"from"),this.current_plugin=this.plugin_count,this.target=t,this.is_active=!0,this.dragging=!0,this.coords.x_gap=this.$cache.rs.offset().left,this.coords.x_pointer=s-this.coords.x_gap,this.calcPointerPercent(),this.changeLevel(t),e&&a("*").prop("unselectable",!0),this.$cache.line.trigger("focus"),this.updateScene())},pointerClick:function(t,i){i.preventDefault();var s=i.pageX||i.originalEvent.touches&&i.originalEvent.touches[0].pageX;2!==i.button&&(this.current_plugin=this.plugin_count,this.target=t,this.is_click=!0,this.coords.x_gap=this.$cache.rs.offset().left,this.coords.x_pointer=+(s-this.coords.x_gap).toFixed(),this.force_redraw=!0,this.calc(),this.$cache.line.trigger("focus"))},key:function(t,i){if(!(this.current_plugin!==this.plugin_count||i.altKey||i.ctrlKey||i.shiftKey||i.metaKey)){switch(i.which){case 83:case 65:case 40:case 37:i.preventDefault(),this.moveByKey(!1);break;case 87:case 68:case 38:case 39:i.preventDefault(),this.moveByKey(!0)}return!0}},moveByKey:function(t){var i=this.coords.p_pointer,s=(this.options.max-this.options.min)/100;s=this.options.step/s,t?i+=s:i-=s,this.coords.x_pointer=this.toFixed(this.coords.w_rs/100*i),this.is_key=!0,this.calc()},setMinMax:function(){if(this.options){if(this.options.hide_min_max)return this.$cache.min[0].style.display="none",void(this.$cache.max[0].style.display="none");if(this.options.values.length)this.$cache.min.html(this.decorate(this.options.p_values[this.options.min])),this.$cache.max.html(this.decorate(this.options.p_values[this.options.max]));else{var t=this._prettify(this.options.min),i=this._prettify(this.options.max);this.result.min_pretty=t,this.result.max_pretty=i,this.$cache.min.html(this.decorate(t,this.options.min)),this.$cache.max.html(this.decorate(i,this.options.max))}this.labels.w_min=this.$cache.min.outerWidth(!1),this.labels.w_max=this.$cache.max.outerWidth(!1)}},setTempMinInterval:function(){var t=this.result.to-this.result.from;null===this.old_min_interval&&(this.old_min_interval=this.options.min_interval),this.options.min_interval=t},restoreOriginalMinInterval:function(){null!==this.old_min_interval&&(this.options.min_interval=this.old_min_interval,this.old_min_interval=null)},calc:function(t){if(this.options&&(this.calc_count++,(10===this.calc_count||t)&&(this.calc_count=0,this.coords.w_rs=this.$cache.rs.outerWidth(!1),this.calcHandlePercent()),this.coords.w_rs)){this.calcPointerPercent();var i=this.getHandleX();switch("both"===this.target&&(this.coords.p_gap=0,i=this.getHandleX()),"click"===this.target&&(this.coords.p_gap=this.coords.p_handle/2,i=this.getHandleX(),this.options.drag_interval?this.target="both_one":this.target=this.chooseHandle(i)),this.target){case"base":var s=(this.options.max-this.options.min)/100,o=(this.result.from-this.options.min)/s,e=(this.result.to-this.options.min)/s;this.coords.p_single_real=this.toFixed(o),this.coords.p_from_real=this.toFixed(o),this.coords.p_to_real=this.toFixed(e),this.coords.p_single_real=this.checkDiapason(this.coords.p_single_real,this.options.from_min,this.options.from_max),this.coords.p_from_real=this.checkDiapason(this.coords.p_from_real,this.options.from_min,this.options.from_max),this.coords.p_to_real=this.checkDiapason(this.coords.p_to_real,this.options.to_min,this.options.to_max),this.coords.p_single_fake=this.convertToFakePercent(this.coords.p_single_real),this.coords.p_from_fake=this.convertToFakePercent(this.coords.p_from_real),this.coords.p_to_fake=this.convertToFakePercent(this.coords.p_to_real),this.target=null;break;case"single":if(this.options.from_fixed)break;this.coords.p_single_real=this.convertToRealPercent(i),this.coords.p_single_real=this.calcWithStep(this.coords.p_single_real),this.coords.p_single_real=this.checkDiapason(this.coords.p_single_real,this.options.from_min,this.options.from_max),this.coords.p_single_fake=this.convertToFakePercent(this.coords.p_single_real);break;case"from":if(this.options.from_fixed)break;this.coords.p_from_real=this.convertToRealPercent(i),this.coords.p_from_real=this.calcWithStep(this.coords.p_from_real),this.coords.p_from_real>this.coords.p_to_real&&(this.coords.p_from_real=this.coords.p_to_real),this.coords.p_from_real=this.checkDiapason(this.coords.p_from_real,this.options.from_min,this.options.from_max),this.coords.p_from_real=this.checkMinInterval(this.coords.p_from_real,this.coords.p_to_real,"from"),this.coords.p_from_real=this.checkMaxInterval(this.coords.p_from_real,this.coords.p_to_real,"from"),this.coords.p_from_fake=this.convertToFakePercent(this.coords.p_from_real);break;case"to":if(this.options.to_fixed)break;this.coords.p_to_real=this.convertToRealPercent(i),this.coords.p_to_real=this.calcWithStep(this.coords.p_to_real),this.coords.p_to_real<this.coords.p_from_real&&(this.coords.p_to_real=this.coords.p_from_real),this.coords.p_to_real=this.checkDiapason(this.coords.p_to_real,this.options.to_min,this.options.to_max),this.coords.p_to_real=this.checkMinInterval(this.coords.p_to_real,this.coords.p_from_real,"to"),this.coords.p_to_real=this.checkMaxInterval(this.coords.p_to_real,this.coords.p_from_real,"to"),this.coords.p_to_fake=this.convertToFakePercent(this.coords.p_to_real);break;case"both":if(this.options.from_fixed||this.options.to_fixed)break;i=this.toFixed(i+.001*this.coords.p_handle),this.coords.p_from_real=this.convertToRealPercent(i)-this.coords.p_gap_left,this.coords.p_from_real=this.calcWithStep(this.coords.p_from_real),this.coords.p_from_real=this.checkDiapason(this.coords.p_from_real,this.options.from_min,this.options.from_max),this.coords.p_from_real=this.checkMinInterval(this.coords.p_from_real,this.coords.p_to_real,"from"),this.coords.p_from_fake=this.convertToFakePercent(this.coords.p_from_real),this.coords.p_to_real=this.convertToRealPercent(i)+this.coords.p_gap_right,this.coords.p_to_real=this.calcWithStep(this.coords.p_to_real),this.coords.p_to_real=this.checkDiapason(this.coords.p_to_real,this.options.to_min,this.options.to_max),this.coords.p_to_real=this.checkMinInterval(this.coords.p_to_real,this.coords.p_from_real,"to"),this.coords.p_to_fake=this.convertToFakePercent(this.coords.p_to_real);break;case"both_one":if(this.options.from_fixed||this.options.to_fixed)break;var h=this.convertToRealPercent(i),r=this.result.from_percent,n=this.result.to_percent-r,a=n/2,c=h-a,l=h+a;c<0&&(l=(c=0)+n),100<l&&(c=(l=100)-n),this.coords.p_from_real=this.calcWithStep(c),this.coords.p_from_real=this.checkDiapason(this.coords.p_from_real,this.options.from_min,this.options.from_max),this.coords.p_from_fake=this.convertToFakePercent(this.coords.p_from_real),this.coords.p_to_real=this.calcWithStep(l),this.coords.p_to_real=this.checkDiapason(this.coords.p_to_real,this.options.to_min,this.options.to_max),this.coords.p_to_fake=this.convertToFakePercent(this.coords.p_to_real)}"single"===this.options.type?(this.coords.p_bar_x=this.coords.p_handle/2,this.coords.p_bar_w=this.coords.p_single_fake,this.result.from_percent=this.coords.p_single_real,this.result.from=this.convertToValue(this.coords.p_single_real),this.result.from_pretty=this._prettify(this.result.from),this.options.values.length&&(this.result.from_value=this.options.values[this.result.from])):(this.coords.p_bar_x=this.toFixed(this.coords.p_from_fake+this.coords.p_handle/2),this.coords.p_bar_w=this.toFixed(this.coords.p_to_fake-this.coords.p_from_fake),this.result.from_percent=this.coords.p_from_real,this.result.from=this.convertToValue(this.coords.p_from_real),this.result.from_pretty=this._prettify(this.result.from),this.result.to_percent=this.coords.p_to_real,this.result.to=this.convertToValue(this.coords.p_to_real),this.result.to_pretty=this._prettify(this.result.to),this.options.values.length&&(this.result.from_value=this.options.values[this.result.from],this.result.to_value=this.options.values[this.result.to])),this.calcMinMax(),this.calcLabels()}},calcPointerPercent:function(){this.coords.w_rs?(this.coords.x_pointer<0||isNaN(this.coords.x_pointer)?this.coords.x_pointer=0:this.coords.x_pointer>this.coords.w_rs&&(this.coords.x_pointer=this.coords.w_rs),this.coords.p_pointer=this.toFixed(this.coords.x_pointer/this.coords.w_rs*100)):this.coords.p_pointer=0},convertToRealPercent:function(t){return t/(100-this.coords.p_handle)*100},convertToFakePercent:function(t){return t/100*(100-this.coords.p_handle)},getHandleX:function(){var t=100-this.coords.p_handle,i=this.toFixed(this.coords.p_pointer-this.coords.p_gap);return i<0?i=0:t<i&&(i=t),i},calcHandlePercent:function(){"single"===this.options.type?this.coords.w_handle=this.$cache.s_single.outerWidth(!1):this.coords.w_handle=this.$cache.s_from.outerWidth(!1),this.coords.p_handle=this.toFixed(this.coords.w_handle/this.coords.w_rs*100)},chooseHandle:function(t){return"single"===this.options.type?"single":this.coords.p_from_real+(this.coords.p_to_real-this.coords.p_from_real)/2<=t?this.options.to_fixed?"from":"to":this.options.from_fixed?"to":"from"},calcMinMax:function(){this.coords.w_rs&&(this.labels.p_min=this.labels.w_min/this.coords.w_rs*100,this.labels.p_max=this.labels.w_max/this.coords.w_rs*100)},calcLabels:function(){this.coords.w_rs&&!this.options.hide_from_to&&("single"===this.options.type?(this.labels.w_single=this.$cache.single.outerWidth(!1),this.labels.p_single_fake=this.labels.w_single/this.coords.w_rs*100,this.labels.p_single_left=this.coords.p_single_fake+this.coords.p_handle/2-this.labels.p_single_fake/2):(this.labels.w_from=this.$cache.from.outerWidth(!1),this.labels.p_from_fake=this.labels.w_from/this.coords.w_rs*100,this.labels.p_from_left=this.coords.p_from_fake+this.coords.p_handle/2-this.labels.p_from_fake/2,this.labels.p_from_left=this.toFixed(this.labels.p_from_left),this.labels.p_from_left=this.checkEdges(this.labels.p_from_left,this.labels.p_from_fake),this.labels.w_to=this.$cache.to.outerWidth(!1),this.labels.p_to_fake=this.labels.w_to/this.coords.w_rs*100,this.labels.p_to_left=this.coords.p_to_fake+this.coords.p_handle/2-this.labels.p_to_fake/2,this.labels.p_to_left=this.toFixed(this.labels.p_to_left),this.labels.p_to_left=this.checkEdges(this.labels.p_to_left,this.labels.p_to_fake),this.labels.w_single=this.$cache.single.outerWidth(!1),this.labels.p_single_fake=this.labels.w_single/this.coords.w_rs*100,this.labels.p_single_left=(this.labels.p_from_left+this.labels.p_to_left+this.labels.p_to_fake)/2-this.labels.p_single_fake/2,this.labels.p_single_left=this.toFixed(this.labels.p_single_left)),this.labels.p_single_left=this.checkEdges(this.labels.p_single_left,this.labels.p_single_fake))},updateScene:function(){this.raf_id&&(cancelAnimationFrame(this.raf_id),this.raf_id=null),clearTimeout(this.update_tm),this.update_tm=null,this.options&&(this.drawHandles(),this.is_active?this.raf_id=requestAnimationFrame(this.updateScene.bind(this)):this.update_tm=setTimeout(this.updateScene.bind(this),300))},drawHandles:function(){this.coords.w_rs=this.$cache.rs.outerWidth(!1),this.coords.w_rs&&(this.coords.w_rs!==this.coords.w_rs_old&&(this.target="base",this.is_resize=!0),(this.coords.w_rs!==this.coords.w_rs_old||this.force_redraw)&&(this.setMinMax(),this.calc(!0),this.drawLabels(),this.options.grid&&(this.calcGridMargin(),this.calcGridLabels()),this.force_redraw=!0,this.coords.w_rs_old=this.coords.w_rs,this.drawShadow()),this.coords.w_rs&&(this.dragging||this.force_redraw||this.is_key)&&((this.old_from!==this.result.from||this.old_to!==this.result.to||this.force_redraw||this.is_key)&&(this.drawLabels(),this.$cache.bar[0].style.left=this.coords.p_bar_x+"%",this.$cache.bar[0].style.width=this.coords.p_bar_w+"%","single"===this.options.type?(this.$cache.bar[0].style.left=0,this.$cache.bar[0].style.width=this.coords.p_bar_w+this.coords.p_bar_x+"%",this.$cache.s_single[0].style.left=this.coords.p_single_fake+"%"):(this.$cache.s_from[0].style.left=this.coords.p_from_fake+"%",this.$cache.s_to[0].style.left=this.coords.p_to_fake+"%",(this.old_from!==this.result.from||this.force_redraw)&&(this.$cache.from[0].style.left=this.labels.p_from_left+"%"),(this.old_to!==this.result.to||this.force_redraw)&&(this.$cache.to[0].style.left=this.labels.p_to_left+"%")),this.$cache.single[0].style.left=this.labels.p_single_left+"%",this.writeToInput(),this.old_from===this.result.from&&this.old_to===this.result.to||this.is_start||(this.$cache.input.trigger("change"),this.$cache.input.trigger("input")),this.old_from=this.result.from,this.old_to=this.result.to,this.is_resize||this.is_update||this.is_start||this.is_finish||this.callOnChange(),(this.is_key||this.is_click)&&(this.is_key=!1,this.is_click=!1,this.callOnFinish()),this.is_update=!1,this.is_resize=!1,this.is_finish=!1),this.is_start=!1,this.is_key=!1,this.is_click=!1,this.force_redraw=!1))},drawLabels:function(){if(this.options){var t,i,s,o,e,h=this.options.values.length,r=this.options.p_values;if(!this.options.hide_from_to)if("single"===this.options.type)t=h?this.decorate(r[this.result.from]):(o=this._prettify(this.result.from),this.decorate(o,this.result.from)),this.$cache.single.html(t),this.calcLabels(),this.labels.p_single_left<this.labels.p_min+1?this.$cache.min[0].style.visibility="hidden":this.$cache.min[0].style.visibility="visible",this.labels.p_single_left+this.labels.p_single_fake>100-this.labels.p_max-1?this.$cache.max[0].style.visibility="hidden":this.$cache.max[0].style.visibility="visible";else{s=h?(this.options.decorate_both?(t=this.decorate(r[this.result.from]),t+=this.options.values_separator,t+=this.decorate(r[this.result.to])):t=this.decorate(r[this.result.from]+this.options.values_separator+r[this.result.to]),i=this.decorate(r[this.result.from]),this.decorate(r[this.result.to])):(o=this._prettify(this.result.from),e=this._prettify(this.result.to),this.options.decorate_both?(t=this.decorate(o,this.result.from),t+=this.options.values_separator,t+=this.decorate(e,this.result.to)):t=this.decorate(o+this.options.values_separator+e,this.result.to),i=this.decorate(o,this.result.from),this.decorate(e,this.result.to)),this.$cache.single.html(t),this.$cache.from.html(i),this.$cache.to.html(s),this.calcLabels();var n=Math.min(this.labels.p_single_left,this.labels.p_from_left),a=this.labels.p_single_left+this.labels.p_single_fake,c=this.labels.p_to_left+this.labels.p_to_fake,l=Math.max(a,c);this.labels.p_from_left+this.labels.p_from_fake>=this.labels.p_to_left?(this.$cache.from[0].style.visibility="hidden",this.$cache.to[0].style.visibility="hidden",this.$cache.single[0].style.visibility="visible",l=this.result.from===this.result.to?("from"===this.target?this.$cache.from[0].style.visibility="visible":"to"===this.target?this.$cache.to[0].style.visibility="visible":this.target||(this.$cache.from[0].style.visibility="visible"),this.$cache.single[0].style.visibility="hidden",c):(this.$cache.from[0].style.visibility="hidden",this.$cache.to[0].style.visibility="hidden",this.$cache.single[0].style.visibility="visible",Math.max(a,c))):(this.$cache.from[0].style.visibility="visible",this.$cache.to[0].style.visibility="visible",this.$cache.single[0].style.visibility="hidden"),n<this.labels.p_min+1?this.$cache.min[0].style.visibility="hidden":this.$cache.min[0].style.visibility="visible",l>100-this.labels.p_max-1?this.$cache.max[0].style.visibility="hidden":this.$cache.max[0].style.visibility="visible"}}},drawShadow:function(){var t,i,s,o,e=this.options,h=this.$cache,r="number"==typeof e.from_min&&!isNaN(e.from_min),n="number"==typeof e.from_max&&!isNaN(e.from_max),a="number"==typeof e.to_min&&!isNaN(e.to_min),c="number"==typeof e.to_max&&!isNaN(e.to_max);"single"===e.type?e.from_shadow&&(r||n)?(t=this.convertToPercent(r?e.from_min:e.min),i=this.convertToPercent(n?e.from_max:e.max)-t,t=this.toFixed(t-this.coords.p_handle/100*t),i=this.toFixed(i-this.coords.p_handle/100*i),t+=this.coords.p_handle/2,h.shad_single[0].style.display="block",h.shad_single[0].style.left=t+"%",h.shad_single[0].style.width=i+"%"):h.shad_single[0].style.display="none":(e.from_shadow&&(r||n)?(t=this.convertToPercent(r?e.from_min:e.min),i=this.convertToPercent(n?e.from_max:e.max)-t,t=this.toFixed(t-this.coords.p_handle/100*t),i=this.toFixed(i-this.coords.p_handle/100*i),t+=this.coords.p_handle/2,h.shad_from[0].style.display="block",h.shad_from[0].style.left=t+"%",h.shad_from[0].style.width=i+"%"):h.shad_from[0].style.display="none",e.to_shadow&&(a||c)?(s=this.convertToPercent(a?e.to_min:e.min),o=this.convertToPercent(c?e.to_max:e.max)-s,s=this.toFixed(s-this.coords.p_handle/100*s),o=this.toFixed(o-this.coords.p_handle/100*o),s+=this.coords.p_handle/2,h.shad_to[0].style.display="block",h.shad_to[0].style.left=s+"%",h.shad_to[0].style.width=o+"%"):h.shad_to[0].style.display="none")},writeToInput:function(){"single"===this.options.type?(this.options.values.length?this.$cache.input.prop("value",this.result.from_value):this.$cache.input.prop("value",this.result.from),this.$cache.input.data("from",this.result.from)):(this.options.values.length?this.$cache.input.prop("value",this.result.from_value+this.options.input_values_separator+this.result.to_value):this.$cache.input.prop("value",this.result.from+this.options.input_values_separator+this.result.to),this.$cache.input.data("from",this.result.from),this.$cache.input.data("to",this.result.to))},callOnStart:function(){this.writeToInput(),this.options.onStart&&"function"==typeof this.options.onStart&&(this.options.scope?this.options.onStart.call(this.options.scope,this.result):this.options.onStart(this.result))},callOnChange:function(){this.writeToInput(),this.options.onChange&&"function"==typeof this.options.onChange&&(this.options.scope?this.options.onChange.call(this.options.scope,this.result):this.options.onChange(this.result))},callOnFinish:function(){this.writeToInput(),this.options.onFinish&&"function"==typeof this.options.onFinish&&(this.options.scope?this.options.onFinish.call(this.options.scope,this.result):this.options.onFinish(this.result))},callOnUpdate:function(){this.writeToInput(),this.options.onUpdate&&"function"==typeof this.options.onUpdate&&(this.options.scope?this.options.onUpdate.call(this.options.scope,this.result):this.options.onUpdate(this.result))},toggleInput:function(){this.$cache.input.toggleClass("irs-hidden-input"),this.has_tab_index?this.$cache.input.prop("tabindex",-1):this.$cache.input.removeProp("tabindex"),this.has_tab_index=!this.has_tab_index},convertToPercent:function(t,i){var s,o=this.options.max-this.options.min,e=o/100;return o?(s=(i?t:t-this.options.min)/e,this.toFixed(s)):(this.no_diapason=!0,0)},convertToValue:function(t){var i,s,o=this.options.min,e=this.options.max,h=o.toString().split(".")[1],r=e.toString().split(".")[1],n=0,a=0;if(0===t)return this.options.min;if(100===t)return this.options.max;h&&(n=i=h.length),r&&(n=s=r.length),i&&s&&(n=s<=i?i:s),o<0&&(o=+(o+(a=Math.abs(o))).toFixed(n),e=+(e+a).toFixed(n));var c,l=(e-o)/100*t+o,_=this.options.step.toString().split(".")[1];return l=_?+l.toFixed(_.length):(l/=this.options.step,+(l*=this.options.step).toFixed(0)),a&&(l-=a),(c=_?+l.toFixed(_.length):this.toFixed(l))<this.options.min?c=this.options.min:c>this.options.max&&(c=this.options.max),c},calcWithStep:function(t){var i=Math.round(t/this.coords.p_step)*this.coords.p_step;return 100<i&&(i=100),100===t&&(i=100),this.toFixed(i)},checkMinInterval:function(t,i,s){var o,e,h=this.options;return h.min_interval?(o=this.convertToValue(t),e=this.convertToValue(i),"from"===s?e-o<h.min_interval&&(o=e-h.min_interval):o-e<h.min_interval&&(o=e+h.min_interval),this.convertToPercent(o)):t},checkMaxInterval:function(t,i,s){var o,e,h=this.options;return h.max_interval?(o=this.convertToValue(t),e=this.convertToValue(i),"from"===s?e-o>h.max_interval&&(o=e-h.max_interval):o-e>h.max_interval&&(o=e+h.max_interval),this.convertToPercent(o)):t},checkDiapason:function(t,i,s){var o=this.convertToValue(t),e=this.options;return"number"!=typeof i&&(i=e.min),"number"!=typeof s&&(s=e.max),o<i&&(o=i),s<o&&(o=s),this.convertToPercent(o)},toFixed:function(t){return+(t=t.toFixed(20))},_prettify:function(t){return this.options.prettify_enabled?this.options.prettify&&"function"==typeof this.options.prettify?this.options.prettify(t):this.prettify(t):t},prettify:function(t){return t.toString().replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g,"$1"+this.options.prettify_separator)},checkEdges:function(t,i){return this.options.force_edges&&(t<0?t=0:100-i<t&&(t=100-i)),this.toFixed(t)},validate:function(){var t,i,s=this.options,o=this.result,e=s.values,h=e.length;if("string"==typeof s.min&&(s.min=+s.min),"string"==typeof s.max&&(s.max=+s.max),"string"==typeof s.from&&(s.from=+s.from),"string"==typeof s.to&&(s.to=+s.to),"string"==typeof s.step&&(s.step=+s.step),"string"==typeof s.from_min&&(s.from_min=+s.from_min),"string"==typeof s.from_max&&(s.from_max=+s.from_max),"string"==typeof s.to_min&&(s.to_min=+s.to_min),"string"==typeof s.to_max&&(s.to_max=+s.to_max),"string"==typeof s.grid_num&&(s.grid_num=+s.grid_num),s.max<s.min&&(s.max=s.min),h)for(s.p_values=[],s.min=0,s.max=h-1,s.step=1,s.grid_num=s.max,s.grid_snap=!0,i=0;i<h;i++)t=+e[i],t=isNaN(t)?e[i]:(e[i]=t,this._prettify(t)),s.p_values.push(t);("number"!=typeof s.from||isNaN(s.from))&&(s.from=s.min),("number"!=typeof s.to||isNaN(s.to))&&(s.to=s.max),"single"===s.type?(s.from<s.min&&(s.from=s.min),s.from>s.max&&(s.from=s.max)):(s.from<s.min&&(s.from=s.min),s.from>s.max&&(s.from=s.max),s.to<s.min&&(s.to=s.min),s.to>s.max&&(s.to=s.max),this.update_check.from&&(this.update_check.from!==s.from&&s.from>s.to&&(s.from=s.to),this.update_check.to!==s.to&&s.to<s.from&&(s.to=s.from)),s.from>s.to&&(s.from=s.to),s.to<s.from&&(s.to=s.from)),("number"!=typeof s.step||isNaN(s.step)||!s.step||s.step<0)&&(s.step=1),"number"==typeof s.from_min&&s.from<s.from_min&&(s.from=s.from_min),"number"==typeof s.from_max&&s.from>s.from_max&&(s.from=s.from_max),"number"==typeof s.to_min&&s.to<s.to_min&&(s.to=s.to_min),"number"==typeof s.to_max&&s.from>s.to_max&&(s.to=s.to_max),o&&(o.min!==s.min&&(o.min=s.min),o.max!==s.max&&(o.max=s.max),(o.from<o.min||o.from>o.max)&&(o.from=s.from),(o.to<o.min||o.to>o.max)&&(o.to=s.to)),("number"!=typeof s.min_interval||isNaN(s.min_interval)||!s.min_interval||s.min_interval<0)&&(s.min_interval=0),("number"!=typeof s.max_interval||isNaN(s.max_interval)||!s.max_interval||s.max_interval<0)&&(s.max_interval=0),s.min_interval&&s.min_interval>s.max-s.min&&(s.min_interval=s.max-s.min),s.max_interval&&s.max_interval>s.max-s.min&&(s.max_interval=s.max-s.min)},decorate:function(t,i){var s="",o=this.options;return o.prefix&&(s+=o.prefix),s+=t,o.max_postfix&&(o.values.length&&t===o.p_values[o.max]?(s+=o.max_postfix,o.postfix&&(s+=" ")):i===o.max&&(s+=o.max_postfix,o.postfix&&(s+=" "))),o.postfix&&(s+=o.postfix),s},updateFrom:function(){this.result.from=this.options.from,this.result.from_percent=this.convertToPercent(this.result.from),this.result.from_pretty=this._prettify(this.result.from),this.options.values&&(this.result.from_value=this.options.values[this.result.from])},updateTo:function(){this.result.to=this.options.to,this.result.to_percent=this.convertToPercent(this.result.to),this.result.to_pretty=this._prettify(this.result.to),this.options.values&&(this.result.to_value=this.options.values[this.result.to])},updateResult:function(){this.result.min=this.options.min,this.result.max=this.options.max,this.updateFrom(),this.updateTo()},appendGrid:function(){if(this.options.grid){var t,i,s,o,e,h,r=this.options,n=r.max-r.min,a=r.grid_num,c=0,l=4,_="";for(this.calcGridMargin(),r.grid_snap&&(a=n/r.step),50<a&&(a=50),s=this.toFixed(100/a),4<a&&(l=3),7<a&&(l=2),14<a&&(l=1),28<a&&(l=0),t=0;t<a+1;t++){for(o=l,100<(c=this.toFixed(s*t))&&(c=100),e=((this.coords.big[t]=c)-s*(t-1))/(o+1),i=1;i<=o&&0!==c;i++)_+='<span class="irs-grid-pol small" style="left: '+this.toFixed(c-e*i)+'%"></span>';_+='<span class="irs-grid-pol" style="left: '+c+'%"></span>',h=this.convertToValue(c),_+='<span class="irs-grid-text js-grid-text-'+t+'" style="left: '+c+'%">'+(h=r.values.length?r.p_values[h]:this._prettify(h))+"</span>"}this.coords.big_num=Math.ceil(a+1),this.$cache.cont.addClass("irs-with-grid"),this.$cache.grid.html(_),this.cacheGridLabels()}},cacheGridLabels:function(){var t,i,s=this.coords.big_num;for(i=0;i<s;i++)t=this.$cache.grid.find(".js-grid-text-"+i),this.$cache.grid_labels.push(t);this.calcGridLabels()},calcGridLabels:function(){var t,i,s=[],o=[],e=this.coords.big_num;for(t=0;t<e;t++)this.coords.big_w[t]=this.$cache.grid_labels[t].outerWidth(!1),this.coords.big_p[t]=this.toFixed(this.coords.big_w[t]/this.coords.w_rs*100),this.coords.big_x[t]=this.toFixed(this.coords.big_p[t]/2),s[t]=this.toFixed(this.coords.big[t]-this.coords.big_x[t]),o[t]=this.toFixed(s[t]+this.coords.big_p[t]);for(this.options.force_edges&&(s[0]<-this.coords.grid_gap&&(s[0]=-this.coords.grid_gap,o[0]=this.toFixed(s[0]+this.coords.big_p[0]),this.coords.big_x[0]=this.coords.grid_gap),o[e-1]>100+this.coords.grid_gap&&(o[e-1]=100+this.coords.grid_gap,s[e-1]=this.toFixed(o[e-1]-this.coords.big_p[e-1]),this.coords.big_x[e-1]=this.toFixed(this.coords.big_p[e-1]-this.coords.grid_gap))),this.calcGridCollision(2,s,o),this.calcGridCollision(4,s,o),t=0;t<e;t++)i=this.$cache.grid_labels[t][0],this.coords.big_x[t]!==Number.POSITIVE_INFINITY&&(i.style.marginLeft=-this.coords.big_x[t]+"%")},calcGridCollision:function(t,i,s){var o,e,h,r=this.coords.big_num;for(o=0;o<r&&!(r<=(e=o+t/2));o+=t)h=this.$cache.grid_labels[e][0],s[o]<=i[e]?h.style.visibility="visible":h.style.visibility="hidden"},calcGridMargin:function(){this.options.grid_margin&&(this.coords.w_rs=this.$cache.rs.outerWidth(!1),this.coords.w_rs&&("single"===this.options.type?this.coords.w_handle=this.$cache.s_single.outerWidth(!1):this.coords.w_handle=this.$cache.s_from.outerWidth(!1),this.coords.p_handle=this.toFixed(this.coords.w_handle/this.coords.w_rs*100),this.coords.grid_gap=this.toFixed(this.coords.p_handle/2-.1),this.$cache.grid[0].style.width=this.toFixed(100-this.coords.p_handle)+"%",this.$cache.grid[0].style.left=this.coords.grid_gap+"%"))},update:function(t){this.input&&(this.is_update=!0,this.options.from=this.result.from,this.options.to=this.result.to,this.update_check.from=this.result.from,this.update_check.to=this.result.to,this.options=a.extend(this.options,t),this.validate(),this.updateResult(t),this.toggleInput(),this.remove(),this.init(!0))},reset:function(){this.input&&(this.updateResult(),this.update())},destroy:function(){this.input&&(this.toggleInput(),this.$cache.input.prop("readonly",!1),a.data(this.input,"ionRangeSlider",null),this.remove(),this.input=null,this.options=null)}},a.fn.ionRangeSlider=function(t){return this.each(function(){a.data(this,"ionRangeSlider")||a.data(this,"ionRangeSlider",new h(this,t,o++))})},function(){for(var h=0,t=["ms","moz","webkit","o"],i=0;i<t.length&&!l.requestAnimationFrame;++i)l.requestAnimationFrame=l[t[i]+"RequestAnimationFrame"],l.cancelAnimationFrame=l[t[i]+"CancelAnimationFrame"]||l[t[i]+"CancelRequestAnimationFrame"];l.requestAnimationFrame||(l.requestAnimationFrame=function(t,i){var s=(new Date).getTime(),o=Math.max(0,16-(s-h)),e=l.setTimeout(function(){t(s+o)},o);return h=s+o,e}),l.cancelAnimationFrame||(l.cancelAnimationFrame=function(t){clearTimeout(t)})}()});

"use strict";function _classCallCheck(instance,Constructor){if(!(instance instanceof Constructor))throw new TypeError("Cannot call a class as a function")}var _createClass=function(){function defineProperties(target,props){for(var i=0;i<props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0,"value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}return function(Constructor,protoProps,staticProps){return protoProps&&defineProperties(Constructor.prototype,protoProps),staticProps&&defineProperties(Constructor,staticProps),Constructor}}();(function(){var ImagePicker,ImagePickerOption,both_array_are_equal,sanitized_options,indexOf=[].indexOf;jQuery.fn.extend({imagepicker:function(){var opts=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};return this.each(function(){var select;if((select=jQuery(this)).data("picker")&&select.data("picker").destroy(),select.data("picker",new ImagePicker(this,sanitized_options(opts))),null!=opts.initialized)return opts.initialized.call(select.data("picker"))})}}),sanitized_options=function(opts){var default_options;return default_options={hide_select:!0,show_label:!1,initialized:void 0,changed:void 0,clicked:void 0,selected:void 0,limit:void 0,limit_reached:void 0,font_awesome:!1},jQuery.extend(default_options,opts)},both_array_are_equal=function(a,b){var i,j,len,x;if(!a||!b||a.length!==b.length)return!1;for(a=a.slice(0),b=b.slice(0),a.sort(),b.sort(),i=j=0,len=a.length;j<len;i=++j)if(x=a[i],b[i]!==x)return!1;return!0},ImagePicker=function(){function ImagePicker(select_element){var opts1=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};_classCallCheck(this,ImagePicker),this.sync_picker_with_select=this.sync_picker_with_select.bind(this),this.opts=opts1,this.select=jQuery(select_element),this.multiple="multiple"===this.select.attr("multiple"),null!=this.select.data("limit")&&(this.opts.limit=parseInt(this.select.data("limit"))),this.build_and_append_picker()}return _createClass(ImagePicker,[{key:"destroy",value:function(){var j,len,ref;for(j=0,len=(ref=this.picker_options).length;j<len;j++)ref[j].destroy();return this.picker.remove(),this.select.off("change",this.sync_picker_with_select),this.select.removeData("picker"),this.select.show()}},{key:"build_and_append_picker",value:function(){return this.opts.hide_select&&this.select.hide(),this.select.on("change",this.sync_picker_with_select),null!=this.picker&&this.picker.remove(),this.create_picker(),this.select.after(this.picker),this.sync_picker_with_select()}},{key:"sync_picker_with_select",value:function(){var j,len,option,ref,results;for(results=[],j=0,len=(ref=this.picker_options).length;j<len;j++)(option=ref[j]).is_selected()?results.push(option.mark_as_selected()):results.push(option.unmark_as_selected());return results}},{key:"create_picker",value:function(){return this.picker=jQuery("<ul class='thumbnails image_picker_selector'></ul>"),this.picker_options=[],this.recursively_parse_option_groups(this.select,this.picker),this.picker}},{key:"recursively_parse_option_groups",value:function(scoped_dom,target_container){var container,j,k,len,len1,option,option_group,ref,ref1,results;for(j=0,len=(ref=scoped_dom.children("optgroup")).length;j<len;j++)option_group=ref[j],option_group=jQuery(option_group),(container=jQuery("<ul></ul>")).append(jQuery("<li class='group_title'>"+option_group.attr("label")+"</li>")),target_container.append(jQuery("<li class='group'>").append(container)),this.recursively_parse_option_groups(option_group,container);for(ref1=function(){var l,len1,ref1,results1;for(results1=[],l=0,len1=(ref1=scoped_dom.children("option")).length;l<len1;l++)option=ref1[l],results1.push(new ImagePickerOption(option,this,this.opts));return results1}.call(this),results=[],k=0,len1=ref1.length;k<len1;k++)option=ref1[k],this.picker_options.push(option),option.has_image()&&results.push(target_container.append(option.node));return results}},{key:"has_implicit_blanks",value:function(){var option;return function(){var j,len,ref,results;for(results=[],j=0,len=(ref=this.picker_options).length;j<len;j++)(option=ref[j]).is_blank()&&!option.has_image()&&results.push(option);return results}.call(this).length>0}},{key:"selected_values",value:function(){return this.multiple?this.select.val()||[]:[this.select.val()]}},{key:"toggle",value:function(imagepicker_option,original_event){var new_values,old_values,selected_value;if(old_values=this.selected_values(),selected_value=imagepicker_option.value().toString(),this.multiple?indexOf.call(this.selected_values(),selected_value)>=0?((new_values=this.selected_values()).splice(jQuery.inArray(selected_value,old_values),1),this.select.val([]),this.select.val(new_values)):null!=this.opts.limit&&this.selected_values().length>=this.opts.limit?null!=this.opts.limit_reached&&this.opts.limit_reached.call(this.select):this.select.val(this.selected_values().concat(selected_value)):this.has_implicit_blanks()&&imagepicker_option.is_selected()?this.select.val(""):this.select.val(selected_value),!both_array_are_equal(old_values,this.selected_values())&&(this.select.change(),null!=this.opts.changed))return this.opts.changed.call(this.select,old_values,this.selected_values(),original_event)}}]),ImagePicker}(),ImagePickerOption=function(){function ImagePickerOption(option_element,picker){var opts1=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};_classCallCheck(this,ImagePickerOption),this.clicked=this.clicked.bind(this),this.picker=picker,this.opts=opts1,this.option=jQuery(option_element),this.create_node()}return _createClass(ImagePickerOption,[{key:"destroy",value:function(){return this.node.find(".thumbnail").off("click",this.clicked)}},{key:"has_image",value:function(){return null!=this.option.data("img-src")}},{key:"is_blank",value:function(){return!(null!=this.value()&&""!==this.value())}},{key:"is_selected",value:function(){var select_value;return select_value=this.picker.select.val(),this.picker.multiple?jQuery.inArray(this.value(),select_value)>=0:this.value()===select_value}},{key:"mark_as_selected",value:function(){return this.node.find(".thumbnail").addClass("selected")}},{key:"unmark_as_selected",value:function(){return this.node.find(".thumbnail").removeClass("selected")}},{key:"value",value:function(){return this.option.val()}},{key:"label",value:function(){return this.option.data("img-label")?this.option.data("img-label"):this.option.text()}},{key:"clicked",value:function(event){if(this.picker.toggle(this,event),null!=this.opts.clicked&&this.opts.clicked.call(this.picker.select,this,event),null!=this.opts.selected&&this.is_selected())return this.opts.selected.call(this.picker.select,this,event)}},{key:"create_node",value:function(){var image,imgAlt,imgClass,thumbnail;return this.node=jQuery("<li/>"),this.option.data("font_awesome")?(image=jQuery("<i>")).attr("class","fa-fw "+this.option.data("img-src")):(image=jQuery("<img class='image_picker_image'/>")).attr("src",this.option.data("img-src")),thumbnail=jQuery("<div class='thumbnail'>"),(imgClass=this.option.data("img-class"))&&(this.node.addClass(imgClass),image.addClass(imgClass),thumbnail.addClass(imgClass)),(imgAlt=this.option.data("img-alt"))&&image.attr("alt",imgAlt),thumbnail.on("click",this.clicked),thumbnail.append(image),this.opts.show_label&&thumbnail.append(jQuery("<p/>").html(this.label())),this.node.append(thumbnail),this.node}}]),ImagePickerOption}()}).call(void 0);

(function ($) {

	var WidgetPafeFormBuilderHandlerDate = function ($scope, $) {

        var $elements = $scope.find('.elementor-date-field');

		if (!$elements.length) {
			return;
		}

		var addDatePicker = function addDatePicker($element) {
			if ($($element).hasClass('elementor-use-native')) {
				return;
			}
			var options = {
				minDate: $($element).attr('min') || null,
				maxDate: $($element).attr('max') || null,
				allowInput: true
			};
			$element.flatpickr(options);
		};

		$.each($elements, function (i, $element) {
			addDatePicker($element);
		});

    };

    var WidgetPafeFormBuilderHandlerTime = function ($scope, $) {

	    var $elements = $scope.find('.elementor-time-field');

		if (!$elements.length) {
			return;
		}

		var addTimePicker = function addTimePicker($element) {
			if ($($element).hasClass('elementor-use-native')) {
				return;
			}
			$element.flatpickr({
				noCalendar: true,
				enableTime: true,
				allowInput: true
			});
		};
		$.each($elements, function (i, $element) {
			addTimePicker($element);
		});

	};

	function pafeCalculatedFieldsForm() {
        $(document).find('[data-pafe-form-builder-calculated-fields]').each(function(){
            var $fieldWidget = $(this).closest('.elementor-element'),
            	$fieldCurrent = $(this),
            	formID = $fieldCurrent.data('pafe-form-builder-form-id');
                calculation = $fieldCurrent.data('pafe-form-builder-calculated-fields');

            if (calculation.indexOf('field id') == -1) {

	            // Loop qua tat ca field trong form
	            $('[name^="form_fields"][data-pafe-form-builder-form-id="' + formID + '"]').each(function(){

	                if ($(this).attr('id') != undefined) {
	                    var fieldName = $(this).attr('name').replace('[]','').replace('form_fields[','').replace(']',''),
	                        $fieldSelector = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + ']"]'),
	                        fieldType = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + ']"]').attr('type');

	                    if($fieldSelector.length > 0) {

	                        if (fieldType == 'radio' || fieldType == 'checkbox') {
	                            var fieldValue = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + ']"]:checked').val();
	                        } else {
	                            var fieldValue = $fieldSelector.val().trim();
	                        }

	                        if (fieldValue == undefined) {
	                            fieldValue = 0;
	                        } else {
	                            fieldValue = parseInt( fieldValue );
	                            if (isNaN(fieldValue)) {
	                                fieldValue = 0;
	                            }
	                        }

	                        window[fieldName] = parseInt( fieldValue );
	                    }

	                    if (fieldName.indexOf('[]') !== -1) {
	                        fieldName = fieldName.replace('[]','');
	                        var $fieldSelectorMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]');
	                        if($fieldSelectorMultiple.length > 0) {
	                            fieldTypeMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]').attr('type');
	                            var fieldValueMultiple = $fieldSelectorMultiple.val(),
	                                fieldValueMultiple = [];

	                            if (fieldTypeMultiple == 'checkbox') {
	                                $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]:checked').each(function (index,element) {
	                                    fieldValueMultiple.push($(this).val());
	                                });
	                            } else {
	                                fieldValueMultiple = $fieldSelectorMultiple.val();
	                                if (fieldValueMultiple == null) {
	                                    var fieldValueMultiple = [];
	                                }
	                            }

	                            fieldValueMultipleTotal = 0;

	                            for (var j = 0; j < fieldValueMultiple.length; j++) {
	                                fieldValue = parseInt( fieldValueMultiple[j] );
	                                if (isNaN(fieldValue)) {
	                                    fieldValue = 0;
	                                }
	                                fieldValueMultipleTotal += fieldValue;
	                            }

	                            window[fieldName] = fieldValueMultipleTotal;
	                        }
	                    }
	                }
	            });

            } else {
            	var fieldNameArray = calculation.match(/\"(.*?)\"/g);
            	for (var j = 0; j<fieldNameArray.length; j++) {
            		var fieldNameSlug = fieldNameArray[j].replace('"','').replace('"',''),
            			$fieldSelectorExist = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name^="form_fields[' + fieldNameSlug + ']"]'),
                        $fieldSelector = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldNameSlug + ']"]');

                    if($fieldSelectorExist.length > 0) {  

                    	var fieldName = $fieldSelectorExist.attr('name').replace('[]','').replace('form_fields[','').replace(']',''),
	                        fieldType = $fieldSelectorExist.attr('type');

	                    if($fieldSelector.length > 0) {

	                        if (fieldType == 'radio' || fieldType == 'checkbox') {
	                            var fieldValue = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + ']"]:checked').val();
	                        } else {
	                            var fieldValue = $fieldSelector.val().trim();
	                        }

	                        if (fieldValue == undefined) {
	                            fieldValue = 0;
	                        } else {
	                            fieldValue = parseInt( fieldValue );
	                            if (isNaN(fieldValue)) {
	                                fieldValue = 0;
	                            }
	                        }

	                        window[fieldName] = parseInt( fieldValue );
	                    }

	                    if (fieldName.indexOf('[]') !== -1) {
	                        fieldName = fieldName.replace('[]','');
	                        var $fieldSelectorMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]');
	                        if($fieldSelectorMultiple.length > 0) {
	                            fieldTypeMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]').attr('type');
	                            var fieldValueMultiple = $fieldSelectorMultiple.val(),
	                                fieldValueMultiple = [];

	                            if (fieldTypeMultiple == 'checkbox') {
	                                $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]:checked').each(function (index,element) {
	                                    fieldValueMultiple.push($(this).val());
	                                });
	                            } else {
	                                fieldValueMultiple = $fieldSelectorMultiple.val();
	                                if (fieldValueMultiple == null) {
	                                    var fieldValueMultiple = [];
	                                }
	                            }

	                            fieldValueMultipleTotal = 0;

	                            for (var j = 0; j < fieldValueMultiple.length; j++) {
	                                fieldValue = parseInt( fieldValueMultiple[j] );
	                                if (isNaN(fieldValue)) {
	                                    fieldValue = 0;
	                                }
	                                fieldValueMultipleTotal += fieldValue;
	                            }

	                            window[fieldName] = fieldValueMultipleTotal;
	                        }
	                    }
                    }
            	}
            }

            var calculation = calculation.replace(/\[field id=/g, '').replace(/\"]/g, '').replace(/\"/g, '');

            var totalFieldContent = eval(calculation);
        		$fieldWidget.find('.pafe-calculated-fields-form__value').html(totalFieldContent);
            	$fieldCurrent.val(totalFieldContent);
            
        });
    }

	var WidgetPafeFormBuilderHandlerRangeSlider = function ($scope, $) {

	    var $elements = $scope.find('[data-pafe-form-builder-range-slider]');

		if (!$elements.length) {
			return;
		}

		$.each($elements, function (i, $element) {
			var optionsString = $($element).data('pafe-form-builder-range-slider');
	        var options = {};
			var items = optionsString.split(',');
			for (var j = 0; j < items.length; j++) {
			    var current = items[j].trim().split(':');
			    if (current[0] != undefined && current[1] != undefined) {
			    	var current1 = current[1].trim().replace('"','').replace('"','');
			    	if (current1 == "false" || current1 == "true") {
			    		if (current1 == "false") {
			    			options[current[0]] = false;
			    		} else {
			    			options[current[0]] = true;
			    		}
			    	} else {
			    		options[current[0]] = current1;
			    	}
			    }
			}

			options.onStart = function (data) {
	            //pafeConditionalLogicFormCheck();
	            pafeCalculatedFieldsForm();
	        };

			$($element).ionRangeSlider(options);
		});

	};

	var WidgetPafeFormBuilderHandlerImageSelect = function ($scope, $) {

	    var $elements = $scope.find('[data-pafe-form-builder-image-select]');

		if (!$elements.length) {
			return;
		}

		$.each($elements, function (i, $element) {
			
			var gallery = $($element).data('pafe-form-builder-image-select'),
                $options = $($element).find('option');

            $($element).closest('.elementor-field').addClass('pafe-image-select-field');
            
            $options.each(function(index,element){
                var imageURL = gallery[index]['url'],
                    optionsContent = $(this).html();

                $(this).attr('data-img-src',imageURL);
                $($element).imagepicker({show_label: true});
            });

		});

	};

	var WidgetPafeFormBuilderHandlerStripe = function ($scope, $) {

	    var $elements = $scope.find('[data-pafe-form-builder-stripe]');

		if (!$elements.length) {
			return;
		}

		$.each($elements, function (i, $element) {

			// Create a Stripe client
			var stripPk = $('[data-pafe-stripe]').data('pafe-stripe');
			var stripe = Stripe(stripPk);

			// Create an instance of Elements
			var elements = stripe.elements();

			// Custom styling can be passed to options when creating an Element.
			// (Note that this demo uses a wider set of styles than the guide below.)
			var style = {
			  base: {
			    color: '#32325d',
			    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			    fontSmoothing: 'antialiased',
			    fontSize: '16px',
			    '::placeholder': {
			      color: '#aab7c4'
			    }
			  },
			  invalid: {
			    color: '#fa755a',
			    iconColor: '#fa755a'
			  }
			};

			// Create an instance of the card Element
			var card = elements.create('card', { style: style });

			// Add an instance of the card Element into the `card-element` <div>
			card.mount($element);

			var formIdStripe = $($element).data('pafe-form-builder-form-id');

			$(document).on('click','[data-pafe-form-builder-submit-form-id]',function(){
				if ( $(this).data('pafe-form-builder-stripe-submit') != undefined ) {
			    	var formID = $(this).data('pafe-form-builder-submit-form-id'),
			    		$fields = $(document).find('[data-pafe-form-builder-form-id='+ formID +']'),
			    		fieldsOj = [],
			    		error = 0;

					$fields.each(function(){
						if ( $(this).data('pafe-form-builder-stripe') == undefined ) {
							if ( !$(this)[0].checkValidity() && $(this).closest('.elementor-widget').css('display') != 'none' && $(this).css('display') != 'none') {
								if ($(this).data('pafe-form-builder-image-select') == undefined) {
									$(this)[0].reportValidity();
								}
								error++;
							} else {
								var fieldType = $(this).attr('type'),
									fieldName = $(this).attr('name');

								if (fieldName.indexOf('[]') !== -1) {
				                    var fieldValueMultiple = [];

				                    if (fieldType == 'checkbox') {
				                        $(document).find('[name="'+ fieldName + '"]:checked').each(function () {
				                            fieldValueMultiple.push($(this).val());
				                        });
				                    } else {
				                        fieldValueMultiple = $(this).val();
				                        if (fieldValueMultiple == null) {
				                            var fieldValueMultiple = [];
				                        }
				                    }

				                    fieldValue = '';

				                    for (var j = 0; j < fieldValueMultiple.length; j++) {
				                    	fieldValue += fieldValueMultiple[j];
				                    	if (j != fieldValueMultiple.length - 1) {
				                    		fieldValue += ',';
				                    	}
				                    }
								} else {
									if (fieldType == 'radio' || fieldType == 'checkbox') {
					                    var fieldValue = $(document).find('[name="'+ fieldName +'"]:checked').val();
					                } else {
					                	if ($(this).data('pafe-form-builder-calculated-fields') != undefined) {
					                		var fieldValue = $(this).siblings('.pafe-calculated-fields-form').text();
					                	} else {
					                		var fieldValue = $(this).val().trim();
					                	}
					                }
								}
								
								if (fieldValue != undefined) {
									var fieldItem = {};
									fieldItem['label'] = $(this).closest('.elementor-field-group').find('.elementor-field-label').html();
									fieldItem['name'] = fieldName.replace('[]','').replace('form_fields[','').replace(']','');
									fieldItem['value'] = fieldValue;
									fieldsOj.push(fieldItem);
								}
								
							}
						}
					});

					if (error == 0) {

						stripe.createToken(card).then(function(result) {
							if (result.error) {
								// Inform the user if there was an error
								//var errorElement = document.getElementById('card-errors');
								//errorElement.textContent = result.error.message;
							} else {
								var $submit = $(document).find('[data-pafe-form-builder-submit-form-id="' + formID + '"]');
								$(document).find('[data-pafe-form-builder-form-id="' + formID + '"]').closest('.elementor-element').css({'opacity' : 0.45});
								$submit.closest('.elementor-element').css({'opacity' : 0.45});
								$submit.closest('.elementor-element').addClass('elementor-form-waiting');

								var $parent = $(document).find('[data-pafe-form-builder-submit-form-id="' + formID + '"]').closest('.elementor-element');
								$parent.find('.elementor-message').removeClass('visible');

								var amount = 0;

								if ($submit.data('pafe-form-builder-stripe-amount') != undefined) {
									amount = $submit.data('pafe-form-builder-stripe-amount');
								} else {
									if ($submit.data('pafe-form-builder-stripe-amount-field') != undefined) {
										var stripeAmountFieldName = $submit.data('pafe-form-builder-stripe-amount-field').replace('[field id="','').replace('"]','');
										amount = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + stripeAmountFieldName + ']"]').val();
									}
								}

								var description = '';

								if ($submit.data('pafe-form-builder-stripe-customer-info-field') != undefined) {
									var customerInfoFieldName = $submit.data('pafe-form-builder-stripe-customer-info-field').replace('[field id="','').replace('"]','');
									description = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + customerInfoFieldName + ']"]').val();
								}

								var data = {
									'action': 'pafe_ajax_form_builder',
									'post_id': $(document).find('input[name="post_id"][data-pafe-form-builder-hidden-form-id="'+ formID +'"]').eq(0).closest('[data-elementor-id]').data('elementor-id'),
									'form_id': $(document).find('input[name="form_id"][data-pafe-form-builder-hidden-form-id="'+ formID +'"]').val(),
									'fields' : fieldsOj,
									'stripeToken': result.token.id,
									'amount' : amount,
									'description' : description,
								};

						        $.post($('[data-pafe-ajax-url]').data('pafe-ajax-url'), data, function(response) {
						        	$(document).find('[data-pafe-form-builder-form-id="' + formID + '"]').closest('.elementor-element').css({'opacity' : 1});
						        	$parent.css({'opacity' : 1});
									$parent.removeClass('elementor-form-waiting');
									var response = response.trim();

									if (response.indexOf(',') !== -1) {
										var responseArray = response.split(',');

										if (responseArray[0] == 'succeeded') {
							        		$parent.find('.pafe-form-builder-alert--stripe .elementor-message-success').addClass('visible');
							        	}

							        	if (responseArray[0] == 'pending') {
							        		$parent.find('.pafe-form-builder-alert--stripe .elementor-help-inline').addClass('visible');
							        	}

							        	if (responseArray[0] == 'failed') {
							        		$parent.find('.pafe-form-builder-alert--stripe .elementor-message-danger').addClass('visible');
							        	}

							        	if (responseArray[1] != '') {
							        		$parent.find('.pafe-form-builder-alert--mail .elementor-message-success').addClass('visible');
							        	} else {
							        		$parent.find('.pafe-form-builder-alert--mail .elementor-message-danger').addClass('visible');
							        	}

							        	var fieldItemStripePaymentStatus = {};

							        	fieldItemStripePaymentStatus['label'] = 'payment_status';
										fieldItemStripePaymentStatus['name'] = 'payment_status';
										fieldItemStripePaymentStatus['value'] = responseArray[0];
										fieldsOj.push(fieldItemStripePaymentStatus);

										var fieldItemStripePaymentID = {};

										fieldItemStripePaymentID['label'] = 'payment_id';
										fieldItemStripePaymentID['name'] = 'payment_id';
										fieldItemStripePaymentID['value'] = responseArray[2];
										fieldsOj.push(fieldItemStripePaymentID);

										var $wrapper = $submit.closest('[data-pafe-form-google-sheets-connector]');

										if ($wrapper.data('pafe-form-google-sheets-connector') != undefined) {
											var row = '',
												fieldList = $wrapper.data('pafe-form-google-sheets-connector-field-list'),
												columnArray = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

											for (var z = 0; z < columnArray.length; z++) {
												var value = '';

											 	for (var i = 0; i < fieldList.length; i++) {
										            var fieldID = fieldList[i]['pafe_form_google_sheets_connector_field_id'].replace('[]','').replace('form_fields[','').replace(']','').replace('[','').replace(']',''),
										            	fieldColumn = fieldList[i]['pafe_form_google_sheets_connector_field_column'];

									            	if (columnArray[z] == fieldColumn) {
									            		for(var j=0; j < fieldsOj.length; ++j) {
									            			if (fieldsOj[j].name == fieldID) {
									            				value = fieldsOj[j].value;
									            			}
										        		}
									            	}  
										        }

										        row += '"'+value+'",';
									        }
										   
										    // Submission
										    row = row.slice(0, -1);
										    // Config
										    var gs_sid = $wrapper.data('pafe-form-google-sheets-connector'); // Enter your Google Sheet ID here
										    var gs_clid = $wrapper.data('pafe-form-google-sheets-connector-clid');; // Enter your API Client ID here
										    var gs_clis = $wrapper.data('pafe-form-google-sheets-connector-clis');; // Enter your API Client Secret here
										    var gs_rtok = $wrapper.data('pafe-form-google-sheets-connector-rtok');; // Enter your OAuth Refresh Token here
										    var gs_atok = false;
										    var gs_url = 'https://sheets.googleapis.com/v4/spreadsheets/'+gs_sid+'/values/A1:append?includeValuesInResponse=false&insertDataOption=INSERT_ROWS&responseDateTimeRenderOption=SERIAL_NUMBER&responseValueRenderOption=FORMATTED_VALUE&valueInputOption=USER_ENTERED';
										    var gs_body = '{"majorDimension":"ROWS", "values":[['+row+']]}';

										    // HTTP Request Token Refresh
										    var xhr = new XMLHttpRequest();
										    xhr.open('POST', 'https://www.googleapis.com/oauth2/v4/token?client_id='+gs_clid+'&client_secret='+gs_clis+'&refresh_token='+gs_rtok+'&grant_type=refresh_token');
										    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
										    xhr.onload = function() {           
										        var response = JSON.parse(xhr.responseText);
										        var gs_atok = response.access_token;            
												// HTTP Request Append Data
										        if(gs_atok) {
										            var xxhr = new XMLHttpRequest();
										            xxhr.open('POST', gs_url);
										            xxhr.setRequestHeader('Content-length', gs_body.length);
										            xxhr.setRequestHeader('Content-type', 'application/json');
										            xxhr.setRequestHeader('Authorization', 'OAuth ' + gs_atok );
										            xxhr.send(gs_body);
										        }            
										    };
										    xhr.send();
										}

							        }
								});
							}
						});

					}
				}
		    });

		});

	};

	$(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/pafe-form-builder-field.default', WidgetPafeFormBuilderHandlerDate);
        elementorFrontend.hooks.addAction('frontend/element_ready/pafe-form-builder-field.default', WidgetPafeFormBuilderHandlerTime);
        elementorFrontend.hooks.addAction('frontend/element_ready/pafe-form-builder-field.default', WidgetPafeFormBuilderHandlerRangeSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/pafe-form-builder-field.default', WidgetPafeFormBuilderHandlerImageSelect);
        elementorFrontend.hooks.addAction('frontend/element_ready/pafe-form-builder-field.default', WidgetPafeFormBuilderHandlerStripe);

    });

})(jQuery);

jQuery(document).ready(function( $ ) {
	$(document).on('click','[data-pafe-form-builder-submit-form-id]',function(){
		if ( $(this).data('pafe-form-builder-stripe-submit') == undefined ) {
	    	var formID = $(this).data('pafe-form-builder-submit-form-id'),
	    		$fields = $(document).find('[data-pafe-form-builder-form-id='+ formID +']'),
	    		fieldsOj = [],
	    		error = 0;

			$fields.each(function(){
				if ( $(this).data('pafe-form-builder-stripe') == undefined ) {
					if ( !$(this)[0].checkValidity() && $(this).closest('.elementor-widget').css('display') != 'none' && $(this).css('display') != 'none') {
						if ($(this).data('pafe-form-builder-image-select') == undefined) {
							$(this)[0].reportValidity();
						}
						error++;
					} else {
						var fieldType = $(this).attr('type'),
							fieldName = $(this).attr('name');

						if (fieldName.indexOf('[]') !== -1) {
		                    var fieldValueMultiple = [];

		                    if (fieldType == 'checkbox') {
		                        $(document).find('[name="'+ fieldName + '"]:checked').each(function () {
		                            fieldValueMultiple.push($(this).val());
		                        });
		                    } else {
		                        fieldValueMultiple = $(this).val();
		                        if (fieldValueMultiple == null) {
		                            var fieldValueMultiple = [];
		                        }
		                    }

		                    fieldValue = '';

		                    for (var j = 0; j < fieldValueMultiple.length; j++) {
		                    	fieldValue += fieldValueMultiple[j];
		                    	if (j != fieldValueMultiple.length - 1) {
		                    		fieldValue += ',';
		                    	}
		                    }
						} else {
							if (fieldType == 'radio' || fieldType == 'checkbox') {
			                    var fieldValue = $(document).find('[name="'+ fieldName +'"]:checked').val();
			                } else {
			                	if ($(this).data('pafe-form-builder-calculated-fields') != undefined) {
			                		var fieldValue = $(this).siblings('.pafe-calculated-fields-form').text();
			                	} else {
			                		var fieldValue = $(this).val().trim();
			                	}
			                }
						}
						
						if (fieldValue != undefined) {
							var fieldItem = {};
							fieldItem['label'] = $(this).closest('.elementor-field-group').find('.elementor-field-label').html();
							fieldItem['name'] = fieldName.replace('[]','').replace('form_fields[','').replace(']','');
							fieldItem['value'] = fieldValue;
							fieldsOj.push(fieldItem);
						}
						
					}
				}
			});

			if (error == 0) {

				$(document).find('[data-pafe-form-builder-form-id="' + formID + '"]').closest('.elementor-element').css({'opacity' : 0.45});
				$(this).closest('.elementor-element').css({'opacity' : 0.45});
				$(this).closest('.elementor-element').addClass('elementor-form-waiting');

				var data = {
					'action': 'pafe_ajax_form_builder',
					'post_id': $(document).find('input[name="post_id"][data-pafe-form-builder-hidden-form-id="'+ formID +'"]').eq(0).closest('[data-elementor-id]').data('elementor-id'),
					'form_id': $(document).find('input[name="form_id"][data-pafe-form-builder-hidden-form-id="'+ formID +'"]').val(),
					'fields' : fieldsOj,
				};

				var $parent = $(document).find('[data-pafe-form-builder-submit-form-id="' + formID + '"]').closest('.elementor-element');
				$parent.find('.elementor-message').removeClass('visible');

		        $.post($('[data-pafe-ajax-url]').data('pafe-ajax-url'), data, function(response) {
		        	$(document).find('[data-pafe-form-builder-form-id="' + formID + '"]').closest('.elementor-element').css({'opacity' : 1});
		        	$parent.css({'opacity' : 1});
					$parent.removeClass('elementor-form-waiting');
		        	if (response.trim() != '') {
		        		$parent.find('.elementor-message-success').addClass('visible');
		        	} else {
		        		$parent.find('.elementor-message-danger').addClass('visible');
		        	}
				});

		        var $wrapper = $(this).closest('[data-pafe-form-google-sheets-connector]');

				if ($wrapper.data('pafe-form-google-sheets-connector') != undefined) {
					var row = '',
						fieldList = $wrapper.data('pafe-form-google-sheets-connector-field-list'),
						columnArray = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

					for (var z = 0; z < columnArray.length; z++) {
						var value = '';

					 	for (var i = 0; i < fieldList.length; i++) {
				            var fieldID = fieldList[i]['pafe_form_google_sheets_connector_field_id'],
				            	fieldColumn = fieldList[i]['pafe_form_google_sheets_connector_field_column'];

			            	if (columnArray[z] == fieldColumn) {
			            		for(var j=0; j < fieldsOj.length; ++j) {
			            			if (fieldsOj[j].name == fieldID) {
			            				value = fieldsOj[j].value;
			            			}
				        		}
			            	}  
				        }

				        row += '"'+value+'",';
			        }
				   
				    // Submission
				    row = row.slice(0, -1);
				    // Config
				    var gs_sid = $wrapper.data('pafe-form-google-sheets-connector'); // Enter your Google Sheet ID here
				    var gs_clid = $wrapper.data('pafe-form-google-sheets-connector-clid');; // Enter your API Client ID here
				    var gs_clis = $wrapper.data('pafe-form-google-sheets-connector-clis');; // Enter your API Client Secret here
				    var gs_rtok = $wrapper.data('pafe-form-google-sheets-connector-rtok');; // Enter your OAuth Refresh Token here
				    var gs_atok = false;
				    var gs_url = 'https://sheets.googleapis.com/v4/spreadsheets/'+gs_sid+'/values/A1:append?includeValuesInResponse=false&insertDataOption=INSERT_ROWS&responseDateTimeRenderOption=SERIAL_NUMBER&responseValueRenderOption=FORMATTED_VALUE&valueInputOption=USER_ENTERED';
				    var gs_body = '{"majorDimension":"ROWS", "values":[['+row+']]}';

				    // HTTP Request Token Refresh
				    var xhr = new XMLHttpRequest();
				    xhr.open('POST', 'https://www.googleapis.com/oauth2/v4/token?client_id='+gs_clid+'&client_secret='+gs_clis+'&refresh_token='+gs_rtok+'&grant_type=refresh_token');
				    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				    xhr.onload = function() {           
				        var response = JSON.parse(xhr.responseText);
				        var gs_atok = response.access_token;            
						// HTTP Request Append Data
				        if(gs_atok) {
				            var xxhr = new XMLHttpRequest();
				            xxhr.open('POST', gs_url);
				            xxhr.setRequestHeader('Content-length', gs_body.length);
				            xxhr.setRequestHeader('Content-type', 'application/json');
				            xxhr.setRequestHeader('Authorization', 'OAuth ' + gs_atok );
				            xxhr.send(gs_body);
				        }            
				    };
				    xhr.send();
				}
			}
		}
    });

});

jQuery(document).ready(function($) {

    function pafeConditionalLogicFormCheck() {
        $(document).find('body:not(.elementor-editor-active) [data-pafe-form-builder-conditional-logic]').each(function(){
            var $fieldGroup = $(this), 
            	$fieldWidget = $(this).closest('.elementor-element'),
            	popupLength = $fieldWidget.closest('.elementor-location-popup').length,
            	$fieldCurrent = $fieldGroup.find('[data-pafe-form-builder-form-id]'),
            	formID = $fieldCurrent.data('pafe-form-builder-form-id'),
                speed = $fieldGroup.data('pafe-form-builder-conditional-logic-speed'),
                easing = $fieldGroup.data('pafe-form-builder-conditional-logic-easing'),
                conditionals = $fieldGroup.data('pafe-form-builder-conditional-logic');

            // Loop qua tat ca field trong form
            $(document).find('[name^="form_fields"][data-pafe-form-builder-form-id="' + formID + '"]').each(function(){
                if ($(this).attr('id') != undefined) {
                    var fieldName = $(this).attr('name').replace('[]','').replace('form_fields[','').replace(']',''),
                        error = 0,
                        conditionalsCount = 0,
                        conditionalsAndOr = '';

                    for (var i = 0; i < conditionals.length; i++) {
                        var show = $fieldCurrent.attr('id').replace('form-field-',''),
                            fieldIf = conditionals[i]['pafe_conditional_logic_form_if'].trim(),
                            comparison = conditionals[i]['pafe_conditional_logic_form_comparison_operators'],
                            value = conditionals[i]['pafe_conditional_logic_form_value'],
                            type = conditionals[i]['pafe_conditional_logic_form_type'];

                        if (type == 'number') {
                            value = parseInt( value );
                        }

                        if(fieldName == show) {
                            conditionalsCount++;
                            conditionalsAndOr = conditionals[i]['pafe_conditional_logic_form_and_or_operators'];
                            if(fieldIf != '') {
                                var $fieldIfSelector = $(document).find('[name="form_fields[' + fieldIf + ']"][data-pafe-form-builder-form-id="' + formID + '"]'),
                                    fieldIfType = $fieldIfSelector.attr('type');

                                if($fieldIfSelector.length > 0) {

                                    if (fieldIfType == 'radio' || fieldIfType == 'checkbox') {
                                        var fieldIfValue = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + ']"]:checked').val();
                                    } else {
                                        var fieldIfValue = $fieldIfSelector.val().trim();
                                    }
                                    
                                    if (fieldIfValue != undefined && fieldIfValue.indexOf(';') !== -1) {
                                        fieldIfValue = fieldIfValue.split(';');
                                        fieldIfValue = fieldIfValue[0];
                                    }

                                    if (type == 'number') {
                                        if (fieldIfValue == undefined) {
                                            fieldIfValue = 0;
                                        } else {
                                            fieldIfValue = parseInt( fieldIfValue );
                                            if (isNaN(fieldIfValue)) {
                                                fieldIfValue = 0;
                                            }
                                        }
                                    }

                                    if(comparison == 'not-empty') {
                                        if (fieldIfValue == '' || fieldIfValue == 0) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == 'empty') {
                                        if (fieldIfValue != '' || fieldIfValue != 0) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == '=') {
                                        if (fieldIfValue != value) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == '!=') {
                                        if (fieldIfValue == value) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == '>') {
                                        if (fieldIfValue <= value) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == '>=') {
                                        if (fieldIfValue < value) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == '<') {
                                        if (fieldIfValue >= value) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == '<=') {
                                        if (fieldIfValue > value) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == 'checked') {
                                        if (!$fieldIfSelector.prop('checked')) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == 'unchecked') {
                                        if ($fieldIfSelector.prop('checked')) {
                                            error += 1;
                                        }
                                    }
                                }

                                var $fieldIfSelectorMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + '][]"]');
                                if($fieldIfSelectorMultiple.length > 0) {
                                    fieldIfTypeMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + '][]"]').attr('type');
                                    var fieldIfValueMultiple = $fieldIfSelectorMultiple.val(),
                                        fieldIfValueMultiple = [];

                                    if (fieldIfTypeMultiple == 'checkbox') {
                                        $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + '][]"]:checked').each(function () {
                                            fieldIfValueMultiple[i++] = $(this).val();
                                        });
                                    } else {
                                        fieldIfValueMultiple = $fieldIfSelectorMultiple.val();
                                        if (fieldIfValueMultiple == null) {
                                            var fieldIfValueMultiple = [];
                                        }
                                    }

                                    if(comparison == 'not-empty') {
                                        if (fieldIfValueMultiple.length == 0) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == 'empty') {
                                        if (fieldIfValueMultiple.length > 0) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == '=' || comparison == '!=' || comparison == '>' || comparison == '>=' || comparison == '<' || comparison == '<=') {
                                        if (fieldIfValueMultiple.length == 0) {
                                            error += 1;
                                        }
                                    }
                                    if(comparison == '=') {
                                        for (var j = 0; j < fieldIfValueMultiple.length; j++) {
                                            if (fieldIfValueMultiple[j] != value) {
                                                error += 1;
                                            }
                                        }
                                    }
                                    if(comparison == '!=') {
                                        for (var j = 0; j < fieldIfValueMultiple.length; j++) {
                                            if (fieldIfValueMultiple[j] == value) {
                                                error += 1;
                                            }
                                        }
                                    }
                                    if(comparison == '>') {
                                        for (var j = 0; j < fieldIfValueMultiple.length; j++) {
                                            if (fieldIfValueMultiple[j] <= value) {
                                                error += 1;
                                            }
                                        }
                                    }
                                    if(comparison == '>=') {
                                        for (var j = 0; j < fieldIfValueMultiple.length; j++) {
                                            if (fieldIfValueMultiple[j] < value) {
                                                error += 1;
                                            }
                                        }
                                    }
                                    if(comparison == '<') {
                                        for (var j = 0; j < fieldIfValueMultiple.length; j++) {
                                            if (fieldIfValueMultiple[j] >= value) {
                                                error += 1;
                                            }
                                        }
                                    }
                                    if(comparison == '<=') {
                                        for (var j = 0; j < fieldIfValueMultiple.length; j++) {
                                            if (fieldIfValueMultiple[j] > value) {
                                                error += 1;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if (conditionalsAndOr == 'or') {
                        if (conditionalsCount > error) {
                        	if (popupLength > 0) {
                        		$fieldWidget.show();
                        	} else {
                        		$fieldWidget.slideDown(speed,easing);
                        	} 
                        } else {
                            if (popupLength > 0) {
                        		$fieldWidget.hide();
                        	} else {
                        		$fieldWidget.slideUp(speed,easing);
                        	}
                        }
                    } 

                    if (conditionalsAndOr == 'and') {
                        if (error == 0) {
                            if (popupLength > 0) {
                        		$fieldWidget.show();
                        	} else {
                        		$fieldWidget.slideDown(speed,easing);
                        	}
                        } else {
                            if (popupLength > 0) {
                        		$fieldWidget.hide();
                        	} else {
                        		$fieldWidget.slideUp(speed,easing);
                        	}
                        }
                    }
                }
            });
			
			if ($(this).hasClass('elementor-button')) {

	            var formID = $(this).data('pafe-form-builder-submit-form-id'),
	            	errorSubmit = 0,
	                conditionalsCountSubmit = 0,
	                conditionalsAndOrSubmit = '';

	            for (var i = 0; i < conditionals.length; i++) {
	                var fieldIf = conditionals[i]['pafe_conditional_logic_form_if'].trim(),
	                    comparison = conditionals[i]['pafe_conditional_logic_form_comparison_operators'],
	                    value = conditionals[i]['pafe_conditional_logic_form_value'],
	                    type = conditionals[i]['pafe_conditional_logic_form_type'];

	                if (type == 'number') {
	                    value = parseInt( value );
	                }

	                    conditionalsCountSubmit++;
	                    conditionalsAndOrSubmit = conditionals[i]['pafe_conditional_logic_form_and_or_operators'];
	                    if(fieldIf != '') {
	                        var $fieldIfSelector = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + ']"]'),
	                            fieldIfType = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + ']"]').attr('type');

	                        if($fieldIfSelector.length > 0) {

	                            if (fieldIfType == 'radio') {
	                                var fieldIfValue = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + ']"]:checked').val();
	                            } else {
	                                var fieldIfValue = $fieldIfSelector.val().trim();
	                            }
	                            
	                            if (fieldIfValue != undefined && fieldIfValue.indexOf(';') !== -1) {
	                                fieldIfValue = fieldIfValue.split(';');
	                                fieldIfValue = fieldIfValue[0];
	                            }

	                            if (type == 'number') {
	                                if (fieldIfValue == undefined) {
	                                    fieldIfValue = 0;
	                                } else {
	                                    fieldIfValue = parseInt( fieldIfValue );
	                                    if (isNaN(fieldIfValue)) {
	                                        fieldIfValue = 0;
	                                    }
	                                }
	                            }

	                            if(comparison == 'not-empty') {
	                                if (fieldIfValue == '' || fieldIfValue == 0) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == 'empty') {
	                                if (fieldIfValue != '' || fieldIfValue != 0) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == '=') {
	                                if (fieldIfValue != value) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == '!=') {
	                                if (fieldIfValue == value) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == '>') {
	                                if (fieldIfValue <= value) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == '>=') {
	                                if (fieldIfValue < value) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == '<') {
	                                if (fieldIfValue >= value) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == '<=') {
	                                if (fieldIfValue > value) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == 'checked') {
	                                if (!$fieldIfSelector.prop('checked')) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == 'unchecked') {
	                                if ($fieldIfSelector.prop('checked')) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                        }

	                        var $fieldIfSelectorMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + '][]"]');
	                        if($fieldIfSelectorMultiple.length > 0) {
	                            fieldIfTypeMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + '][]"]').attr('type');
	                            var fieldIfValueMultiple = $fieldIfSelectorMultiple.val(),
	                                fieldIfValueMultiple = [];

	                            if (fieldIfTypeMultiple == 'checkbox') {
	                                $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldIf + '][]"]:checked').each(function () {
	                                    fieldIfValueMultiple[i++] = $(this).val();
	                                });
	                            } else {
	                                fieldIfValueMultiple = $fieldIfSelectorMultiple.val();
	                                if (fieldIfValueMultiple == null) {
	                                    var fieldIfValueMultiple = [];
	                                }
	                            }

	                            if(comparison == 'not-empty') {
	                                if (fieldIfValueMultiple.length == 0) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == 'empty') {
	                                if (fieldIfValueMultiple.length > 0) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == '=' || comparison == '!=' || comparison == '>' || comparison == '>=' || comparison == '<' || comparison == '<=') {
	                                if (fieldIfValueMultiple.length == 0) {
	                                    errorSubmit += 1;
	                                }
	                            }
	                            if(comparison == '=') {
	                                for (var j = 0; j < fieldIfValueMultiple.length; j++) {
	                                    if (fieldIfValueMultiple[j] != value) {
	                                        errorSubmit += 1;
	                                    }
	                                }
	                            }
	                            if(comparison == '!=') {
	                                for (var j = 0; j < fieldIfValueMultiple.length; j++) {
	                                    if (fieldIfValueMultiple[j] == value) {
	                                        errorSubmit += 1;
	                                    }
	                                }
	                            }
	                            if(comparison == '>') {
	                                for (var j = 0; j < fieldIfValueMultiple.length; j++) {
	                                    if (fieldIfValueMultiple[j] <= value) {
	                                        errorSubmit += 1;
	                                    }
	                                }
	                            }
	                            if(comparison == '>=') {
	                                for (var j = 0; j < fieldIfValueMultiple.length; j++) {
	                                    if (fieldIfValueMultiple[j] < value) {
	                                        errorSubmit += 1;
	                                    }
	                                }
	                            }
	                            if(comparison == '<') {
	                                for (var j = 0; j < fieldIfValueMultiple.length; j++) {
	                                    if (fieldIfValueMultiple[j] >= value) {
	                                        errorSubmit += 1;
	                                    }
	                                }
	                            }
	                            if(comparison == '<=') {
	                                for (var j = 0; j < fieldIfValueMultiple.length; j++) {
	                                    if (fieldIfValueMultiple[j] > value) {
	                                        errorSubmit += 1;
	                                    }
	                                }
	                            }
	                        }
	                    }
	            }

	            if (conditionalsAndOrSubmit == 'or') {
	                if (conditionalsCountSubmit > errorSubmit) {
	                    if (popupLength > 0) {
                    		$fieldWidget.show();
                    	} else {
                    		$fieldWidget.slideDown(speed,easing);
                    	}
	                } else {
	                    if (popupLength > 0) {
                    		$fieldWidget.hide();
                    	} else {
                    		$fieldWidget.slideUp(speed,easing);
                    	}
	                }
	            } 

	            if (conditionalsAndOrSubmit == 'and') {
	                if (error == 0) {
	                    if (popupLength > 0) {
                    		$fieldWidget.show();
                    	} else {
                    		$fieldWidget.slideDown(speed,easing);
                    	}
	                } else {
	                    if (popupLength > 0) {
                    		$fieldWidget.hide();
                    	} else {
                    		$fieldWidget.slideUp(speed,easing);
                    	}
	                }
	            }
            }

        });
    }

    pafeConditionalLogicFormCheck();

	$(document).on('keyup change','[data-pafe-form-builder-form-id]', function(){
		pafeConditionalLogicFormCheck();
	});

	function pafeCalculatedFieldsForm(fieldNameElement) {
		var selector = '[data-pafe-form-builder-calculated-fields]';
		if (fieldNameElement != '') {
			selector = '[data-pafe-form-builder-calculated-fields*='+ fieldNameElement +']';
		}

        $(document).find(selector).each(function(){
            var $fieldWidget = $(this).closest('.elementor-element'),
            	$fieldCurrent = $(this),
            	formID = $fieldCurrent.data('pafe-form-builder-form-id');
                calculation = $fieldCurrent.data('pafe-form-builder-calculated-fields');

            if (calculation.indexOf('field id') == -1) {

	            // Loop qua tat ca field trong form
	            $(document).find('[name^="form_fields"][data-pafe-form-builder-form-id="' + formID + '"]').each(function(){

	                if ($(this).attr('id') != undefined) {
	                    var fieldName = $(this).attr('name').replace('[]','').replace('form_fields[','').replace(']',''),
	                        $fieldSelector = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + ']"]'),
	                        fieldType = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + ']"]').attr('type');

	                    if($fieldSelector.length > 0) {

	                        if (fieldType == 'radio' || fieldType == 'checkbox') {
	                            var fieldValue = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + ']"]:checked').val();
	                        } else {
	                            var fieldValue = $fieldSelector.val().trim();
	                        }

	                        if (fieldValue == undefined) {
	                            fieldValue = 0;
	                        } else {
	                            fieldValue = parseInt( fieldValue );
	                            if (isNaN(fieldValue)) {
	                                fieldValue = 0;
	                            }
	                        }

	                        window[fieldName] = parseInt( fieldValue );
	                    }

	                    if (fieldName.indexOf('[]') !== -1) {
	                        fieldName = fieldName.replace('[]','');
	                        var $fieldSelectorMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]');
	                        if($fieldSelectorMultiple.length > 0) {
	                            fieldTypeMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]').attr('type');
	                            var fieldValueMultiple = [];

	                            if (fieldTypeMultiple == 'checkbox') {
	                                $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]:checked').each(function (index,element) {
	                                    fieldValueMultiple.push($(this).val());
	                                });
	                            } else {
	                                fieldValueMultiple = $fieldSelectorMultiple.val();
	                                if (fieldValueMultiple == null) {
	                                    var fieldValueMultiple = [];
	                                }
	                            }

	                            fieldValueMultipleTotal = 0;

	                            for (var j = 0; j < fieldValueMultiple.length; j++) {
	                                fieldValue = parseInt( fieldValueMultiple[j] );
	                                if (isNaN(fieldValue)) {
	                                    fieldValue = 0;
	                                }
	                                fieldValueMultipleTotal += fieldValue;
	                            }

	                            window[fieldName] = fieldValueMultipleTotal;
	                        }
	                    }
	                }
	            });

            } else {
            	var fieldNameArray = calculation.match(/\"(.*?)\"/g);
            	for (var jx = 0; jx<fieldNameArray.length; jx++) {
            		var fieldNameSlug = fieldNameArray[jx].replace('"','').replace('"',''),
            			$fieldSelectorExist = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name^="form_fields[' + fieldNameSlug + ']"]'),
                        $fieldSelector = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldNameSlug + ']"]');

                    if($fieldSelectorExist.length > 0) {  

                    	var fieldName = $fieldSelectorExist.attr('name').replace('form_fields[','').replace(']',''),
	                        fieldType = $fieldSelectorExist.attr('type');

	                    if($fieldSelector.length > 0) {

	                        if (fieldType == 'radio' || fieldType == 'checkbox') {
	                            var fieldValue = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + ']"]:checked').val();
	                        } else {
	                            var fieldValue = $fieldSelector.val().trim();
	                        }

	                        if (fieldValue == undefined) {
	                            fieldValue = 0;
	                        } else {
	                            fieldValue = parseInt( fieldValue );
	                            if (isNaN(fieldValue)) {
	                                fieldValue = 0;
	                            }
	                        }

	                        window[fieldName] = parseInt( fieldValue );
	                    }

	                    if (fieldName.indexOf('[]') !== -1) {
	                        fieldName = fieldName.replace('[]','');
	                        var $fieldSelectorMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]');
	                        if($fieldSelectorMultiple.length > 0) {
	                            fieldTypeMultiple = $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]').attr('type');
	                            var fieldValueMultiple = [];

	                            if (fieldTypeMultiple == 'checkbox') {
	                                $(document).find('[data-pafe-form-builder-form-id="' + formID + '"][name="form_fields[' + fieldName + '][]"]:checked').each(function (index,element) {
	                                    fieldValueMultiple.push($(this).val());
	                                });
	                            } else {
	                                fieldValueMultiple = $fieldSelectorMultiple.val();
	                                if (fieldValueMultiple == null) {
	                                    var fieldValueMultiple = [];
	                                }
	                            }

	                            fieldValueMultipleTotal = 0;

	                            for (var j = 0; j < fieldValueMultiple.length; j++) {
	                                fieldValue = parseInt( fieldValueMultiple[j] );
	                                if (isNaN(fieldValue)) {
	                                    fieldValue = 0;
	                                }
	                                fieldValueMultipleTotal += fieldValue;
	                            }

	                            window[fieldName] = fieldValueMultipleTotal;
	                        }
	                    }
                    }
            	}
            }

            var calculation = calculation.replace(/\[field id=/g, '').replace(/\"]/g, '').replace(/\"/g, '');

            var totalFieldContent = eval(calculation);
        		$fieldWidget.find('.pafe-calculated-fields-form__value').html(totalFieldContent);
            	$fieldCurrent.val(totalFieldContent);
            
            var fieldNameCalc = $(this).attr('name').replace('[]','').replace('form_fields[','').replace(']','');
			pafeCalculatedFieldsForm(fieldNameCalc);

        });
    }

    pafeCalculatedFieldsForm('');

	$(document).on('keyup change','[data-pafe-form-builder-form-id]', function(){
		var fieldName = $(this).attr('name').replace('[]','').replace('form_fields[','').replace(']','');
		pafeCalculatedFieldsForm(fieldName);
	});


});