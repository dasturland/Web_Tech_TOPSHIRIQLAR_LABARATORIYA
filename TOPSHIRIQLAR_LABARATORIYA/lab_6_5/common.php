<?php
// Common utilities for lab_6_5
session_start();

function db_connect() {
    // lightweight in-memory products list for examples
    return [
        ['id'=>1,'name'=>'Apple','category'=>'Fruits','price'=>1.2,'qty'=>10],
        ['id'=>2,'name'=>'Banana','category'=>'Fruits','price'=>0.8,'qty'=>0],
        ['id'=>3,'name'=>'Chair','category'=>'Furniture','price'=>25,'qty'=>5],
    ];
}

function send_custom_header() {
    header('X-Lab-Owner: Sadullayev Jaxongi');
}

?>