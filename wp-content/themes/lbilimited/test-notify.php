<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
global $wpdb;

$post_id = 138423;
$year = get_field('year', $post_id);
$make = get_field('make', $post_id);
$model = get_field('model', $post_id);
$url = get_the_permalink( $post_id );

$notification_requests = $wpdb->get_results("SELECT * FROM `wp_lbi_notify` WHERE `vehicle_year` = '$year' AND `vehicle_make` = '$make' AND `vehicle_model` = '$model'");

foreach($notification_requests as $request){
    
    $vehicle_year = $request->vehicle_year;
    $vehicle_make = $request->vehicle_make;
    $vehicle_model = $request->vehicle_model;

    $name = $request->name;
    $email = $request->email;
    $subject = "$vehicle_year $vehicle_make $vehicle_model - LBI Limited";

    $headers = array(
        "Sender: noreply@lbilimited.com",
        "From: LBI Limited <info@lbilimited.com>",
        "Reply-To: LBI Limited <info@lbilimited.com>",
        "To: $name <$email>"
    );

    $message = "Hi $name, \n
    You requested that we give you a heads up when we get our hands on a $vehicle_year $vehicle_make $vehicle_model. Well, today is your lucky day! Check out the vehicle we just posted at the link below. If it's something you'd be interested in, you can simply reply to this email!\n
    \n
    $url \n
    \n
    Sincerely,\n
    The LBI Limited Team";

    $mailer = wp_mail($email, $subject,$message, $headers);

    echo "<pre>";
    print_r($mailer . ' ' . $email);
    echo "</pre>";
}


echo "hello";