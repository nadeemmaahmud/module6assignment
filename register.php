<?php

if ( isset( $_POST['submit'] ) ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profile_pic = $_FILES['profile_pic'];

    if ( empty( $name ) || empty( $email ) || empty( $password ) || empty( $profile_pic ) ) {
        die( "Please fill out all fields." );
    }

    if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        die( "Invalid email format." );
    }

    $filename = uniqid() . '-' . $profile_pic['name'];
    $target_dir = "/Users/nadimmahmud/Documents/Coding/File/Module6Assignment/uploads/";
    $target_file = $target_dir . $filename;
    if ( !move_uploaded_file( $profile_pic['tmp_name'], $target_file ) ) {
        die( "Error uploading profile picture." );
    }

    $data = array( $name, $email, $filename );
    $file = fopen( 'users.csv', 'a' );
    fputcsv( $file, $data );
    fclose( $file );

    session_start();
    $_SESSION['name'] = $name;
    setcookie( "user", $name, time() + 3600 );

    header( "Location: success.php" );
    exit();
} else {
    die( "Access denied." );
}