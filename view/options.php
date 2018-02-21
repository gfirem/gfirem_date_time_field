<?php
/**
 * @package WordPress
 * @subpackage Formidable, gfirem
 * @author GFireM
 * @copyright 2017
 * @link http://www.gfirem.com
 * @license http://www.apache.org/licenses/
 */
?>
<tr>
    <td><label for="inputFormat_<?php echo esc_attr( $field['id'] ) ?>"><?php _e( "Input Format",'gfirem_date_time-locale' ) ?></label></td>
    <td>
        <label for="inputFormat_<?php echo esc_attr( $field['id'] ) ?>" class="howto"><?php echo esc_attr( _e( "Input Format of the TimePicker, by default 'Y/m/d H:i'. ",'gfirem_date_time-locale' ) ) ?></label>
        <input type="text" name="field_options[inputFormat_<?php echo esc_attr( $field['id'] ) ?>]" value="<?php echo esc_attr( $field['inputFormat'] ) ?>" id="inputFormat_<?php echo esc_attr( $field['id'] ) ?>">
    </td>

</tr>

<tr>
    <td><label for="datetimepicker_inline_<?php echo esc_attr( $field['id'] ) ?>"><?php _e( "Inline Mode","gfirem_date_time-locale" ) ?></label></td>
    <td>
        <label for="datetimepicker_inline_<?php echo esc_attr( $field['id'] ) ?>" class="howto"><?php echo esc_attr( _e( "Inline Mode for TimePicker, by default 'False'. ","gfirem_date_time-locale" ) ) ?></label>
        <select name="field_options[datetimepicker_inline_<?php echo esc_attr( $field['id'] ) ?>]" id="datetimepicker_inline_<?php echo esc_attr( $field['id'] ) ?>">
            <option <?php selected( esc_attr( $field['datetimepicker_inline'] ), 'true' ) ?> value="true"><?php _e( "True","gfirem_date_time-locale" ) ?></option>
            <option <?php selected( esc_attr( $field['datetimepicker_inline'] ), 'false' ) ?> value="false"><?php _e( "False","gfirem_date_time-locale" ) ?></option>
        </select>
    </td>
</tr>

<tr>
    <td><label for="datetimepicker_timepicker_<?php echo esc_attr( $field['id'] ) ?>"><?php _e( "Enable Time Picker" ,"gfirem_date_time-locale") ?></label></td>
    <td>
        <label for="datetimepicker_timepicker_<?php echo esc_attr( $field['id'] ) ?>" class="howto"><?php echo esc_attr( _e( "Enable Time Picker, by default is 'True'. ","gfirem_date_time-locale" ) ) ?></label>

        <select name="field_options[datetimepicker_timepicker_<?php echo esc_attr( $field['id'] ) ?>]" id="datetimepicker_timepicker_<?php echo esc_attr( $field['id'] ) ?>">
            <option <?php selected( esc_attr( $field['datetimepicker_timepicker'] ), 'true' ) ?> value="true"><?php _e( "True","gfirem_date_time-locale" ) ?></option>
            <option <?php selected( esc_attr( $field['datetimepicker_timepicker'] ), 'false' ) ?> value="false"><?php _e( "False","gfirem_date_time-locale" ) ?></option>
        </select>
    </td>

</tr>

<tr>
    <td><label for="datetimepicker_lang_<?php echo esc_attr( $field['id'] ) ?>"><?php _e( "Language","gfirem_date_time-locale" ) ?></label></td>
    <td>
        <label for="datetimepicker_lang_<?php echo esc_attr( $field['id'] ) ?>" class="howto"><?php echo esc_attr( _e( "Language for Time Picker, by default is 'English'. " ,"gfirem_date_time-locale") ) ?></label>

        <select name="field_options[datetimepicker_lang_<?php echo esc_attr( $field['id'] ) ?>]" id="datetimepicker_lang_<?php echo esc_attr( $field['id'] ) ?>">
            <option <?php selected( esc_attr( $field['datetimepicker_lang'] ), 'en' ) ?> value="en"><?php _e( "English","gfirem_date_time-locale" ) ?></option>
            <option <?php selected( esc_attr( $field['datetimepicker_lang'] ), 'es' ) ?> value="es"><?php _e( "Spanish","gfirem_date_time-locale" ) ?></option>
            <option <?php selected( esc_attr( $field['datetimepicker_lang'] ), 'fr' ) ?> value="fr"><?php _e( "French","gfirem_date_time-locale" ) ?></option>
        </select>
    </td>
</tr>
