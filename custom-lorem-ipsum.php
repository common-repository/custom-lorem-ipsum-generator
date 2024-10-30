<?php
 /*
Plugin Name: Custom Lorem Ipsum Generator
Description: Generate a Lorem Ipsum placeholder by the number of words. Just insert [lorem words=XXX] shortcut. (Replace XXX by the number of words)
Version: 1.0
Author: Manuel Schwarz
Author URI: http://www.hatework.de

/*  Copyright 2019 Manuel Schwarz (email : manuel@hatework.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function custom_lorem_function($clf_attributes)
{
    //Dummy Text
    $dummyLorem = explode(" ", "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, se d diam voluptua. At vero eos et accusam et jus to duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata  sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt  ut labore et dolore magna aliquyam erat, sed d iam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.  Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.");

    //Check how much words should be generated. Default = 300
    extract(shortcode_atts(array(
        'words' => 300,
    ), $clf_attributes));
    $counter = 0;
    $returnText = array();

    //Generate Dummy Text
    while ($counter <= $words) {
        array_push($returnText, $dummyLorem[$counter % count($dummyLorem)]);
        $counter++;
    }

    //Return String
    return implode(" ", $returnText);
}

add_shortcode('lorem', 'custom_lorem_function');