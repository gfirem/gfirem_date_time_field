<?php
/**
 * @package    WordPress
 * @subpackage Formidable, gfirem
 * @author     GFireM
 * @copyright  2017
 * @link       http://www.gfirem.com
 * @license    http://www.apache.org/licenses/
 *
 */

class GFiremDateTimeField extends GFireMFieldBase
{
    public $version = '1.0.0';
    public $form_id;
    function __construct() {
        parent::__construct( 'gfirem-date-time', __( 'DateTimePicker','gfirem_date_time-locale' ),
            array(
                'inputFormat'               => 'Y/m/d H:i',
                'datetimepicker_timepicker' => 'true',
                'datetimepicker_inline'     => 'false',
                'datetimepicker_lang'       => 'en'
            ),
            __( 'Show the Date and Time with a DateTimePicker.','gfirem_date_time-locale' ),
            array()
        );
    }

    protected function set_field_options( $fieldData ) {
        $fieldData['default_value'] = date( 'Y/m/d' ) . ' ' . date( 'H:i' );

        return $fieldData;
    }

    protected function inside_field_options( $field, $display, $values ) {

        include GFireMDateTime::$view. 'options.php';
    }

    /**
     * Add the HTML for the field on the front end
     *
     * @param $field
     * @param $field_name
     *
     */
    protected function field_front_view( $field, $field_name, $html_id ) {

            $field['value'] = stripslashes_deep( $field['value'] );

            $print_value = $field['default_value'];
            if ( ! empty( $field['value'] ) ) {
                $print_value = $field['value'];
            }

            $html_id = $field['field_key'];
            $this->load_script( $print_value, $html_id );

            include GFireMDateTime::$view.'field.php';
    }

    private function load_script( $print_value = "", $field_id = "" ) {

            $base_url = GFireMDateTime::$assets;
            wp_enqueue_style( 'jquery.datetimepicker', $base_url . 'css/jquery.datetimepicker.min.css', array(), $this->version );
            wp_enqueue_script( 'jquery.datetimepicker', $base_url . 'js/jquery.datetimepicker.full.min.js', array( "jquery" ), $this->version, true );
            wp_enqueue_script( 'date_time_field', $base_url . 'js/date_time_field.js', array( "jquery" ), $this->version, true );
            $params = array(
                'now_date' => date( 'Y/m/d' ),
                'now_time' => date( 'H:i' ),
                'language' => 'en',
            );
            if ( ! empty( $print_value ) ) {
                $params["print_value"] = $print_value;
            }
            if ( ! empty( $field_id ) ) {
                $params["field_id"] = $field_id;
            }
            $date_time_Fields = FrmField::get_all_types_in_form( $this->form_id, $this->slug );
            foreach ( $date_time_Fields as $key => $field ) {
                foreach ( $this->defaults as $def_key => $def_val ) {
                    $opt                                                          = FrmField::get_option( $field, $def_key );
                    $params['config'][ 'field_' . $field->field_key ][ $def_key ] = ( ! empty( $opt ) ) ? $opt : $def_val;
                }
            }
            wp_localize_script( 'date_time_field', 'date_time_field', $params );
        }

    /**
     * Set display option for the field
     *
     * @param $display
     *
     * @return mixed
     */
    protected function display_options( $display ) {
        $display['unique']         = false;
        $display['required']       = true;
        $display['read_only']      = true;
        $display['description']    = true;
        $display['options']        = true;
        $display['label_position'] = true;
        $display['css']            = true;
        $display['conf_field']     = false;
        $display['invalid']        = true;
        $display['default_value']  = true;
        $display['visibility']     = true;
        $display['size']           = true;

        return $display;
    }

}