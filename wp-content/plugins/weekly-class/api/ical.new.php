<?php

class WCS_iCal{

  private $_ical_name = 'wcs_ical';

  public function __construct(){
    add_action('init', array( 'WCS_iCal', 'init' ) );
  }

  public static function init(){
    add_feed( 'wcs_ical', array( 'WCS_iCal', 'index' ));
  }

  public static function index(){

    $start 		  = self::dateToCal( filter_var( $_GET['start'], FILTER_SANITIZE_NUMBER_INT ) );
    $end		    = self::dateToCal( filter_var( $_GET['end'], FILTER_SANITIZE_NUMBER_INT ) );
    $subject    = html_entity_decode( apply_filters( 'the_title', $_GET['subject'] ) );
    $url	   	  = filter_var( urldecode( $_GET['url'] ), FILTER_SANITIZE_URL );
    $desc	   	  = self::escapeString( filter_var( urldecode( $_GET['desc'] ), FILTER_SANITIZE_SPECIAL_CHARS ) );
    $name	   	  = filter_var( urldecode( $_GET['filename'] ), FILTER_SANITIZE_SPECIAL_CHARS );
    $host	   	  = self::escapeString( parse_url( $url, PHP_URL_HOST ) );
    $location	  = self::escapeString( esc_html( $_GET['location'] ) );
    $id         = uniqid();
    $timestamp  = self::dateToCal( time() );

    header("Content-type: text/calendar; charset=utf-8");
		header("Content-Disposition: attachment; filename={$name}.ics");

echo
"BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH
BEGIN:VEVENT
DTEND:{$end}
UID:{$id}
DTSTAMP:{$timestamp}
LOCATION:{$location}
DESCRIPTION:{$desc}
URL;VALUE=URI:{$host}
SUMMARY:{$subject}
DTSTART:{$start}
END:VEVENT
END:VCALENDAR";

    exit;

  }

  public static function dateToCal($timestamp) {
    return date('Ymd\THis\Z', $timestamp);
  }

  public static function escapeString($string) {
    return preg_replace('/([\,;])/','\\\$1', $string);
  }


}
new WCS_iCal();
