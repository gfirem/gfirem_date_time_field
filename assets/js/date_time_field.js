/*
 * @package WordPress
 * @subpackage Formidable, gfirem
 * @author GFireM
 * @copyright 2017
 * @link http://www.gfirem.com
 * @license http://www.apache.org/licenses/
 *
 */
var wrappers = document.getElementsByClassName("date_time_field_container");
[].forEach.call(wrappers, process_fields);
function pad(number,size) {
    var s = number;
    while (s.length < (size || 2)) {s = "0" + s;}
    return s;
}
function process_fields(item, index) {
	var field_container = item.querySelector("[class=gfirem_date_time_field_picker]");
	var id = field_container.getAttribute('id');
	var intervall = parseInt(date_time_field.config[id].datetimepicker_interval);
	var allowTimesInterval =[];
	for(var horas =0;horas<24;horas++){
		for(var minutos = 0; minutos<60;minutos+=intervall){
			var element =pad(horas)+":"+pad(minutos);
            allowTimesInterval.push(element);
		}
	}

	var datetimefield = jQuery("#"+id).datetimepicker({
		format: date_time_field.config[id].inputFormat,
		inline: date_time_field.config[id].datetimepicker_inline == "true" ? true : false,
		timepicker: date_time_field.config[id].datetimepicker_timepicker == "true" ? true : false,
        datepicker: date_time_field.config[id].datetimepicker_datepicker == "true" ? true : false,
		defaultDate: date_time_field.now_date,
		defaultTime: date_time_field.now_time,
        allowTimes: allowTimesInterval

	});
    jQuery.datetimepicker.setLocale(date_time_field.config[id].datetimepicker_lang);
}
