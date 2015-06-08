<?php

/** 1. Create a multi-dimensional array that encapsulates the following data set:
 *
 * Arists
 *   Van Halen
 *     albums
 *       1984
 *         genre
 *           Rock
 *       Fair Warning
 *         genre
 *           Rock
 *     debut year
 *       1972
 *   AC/DC
 *     albums
 *       Back in Black
 *         genre
 *           Rock
 *     debut year
 *       1973
 *   Taylor Swift
 *     albums
 *       Fearless
 *         genre
 *           Country
 *       1989
 *         genre
 *           Pop
 *     debut year
 *       2006
 *
 * Use "$artists" as the variable name ($artists = array(...)
 */

$artists = array(
 'Van Halen' => array(
   'albums' => array(
     '1984' => array(
       'genre' => 'rock',
     ),
     'Fair Warning' => array(
       'genre' => 'rock',
     ),
   ),
   'debut year' => 1972,
 ),
 'AC/DC' => array(
   'albums' => array(
     'Back in Black' => array(
       'genre' => 'rock',
     ),
   ),
   'debut year' => 1973,
 ),
 'Taylor Swift' => array(
   'albums' => array(
     'Fearless'=> array(
       'genre' => 'country',
     ),
     '1989' => array(
       'genre' => 'pop',
     ),
   ),
   'debut year' => 2006,
 ),
);

print '1. $arists array: <br/><pre>';
print_r($artists);
print '</pre>';

/** 2.  Accessing the array elements directly, print out Van Halen's "debut year"
 *  (for example, "print $artist['Van Halen']...").
 */

print '2. Van Halen debut year: ';
print $artists['Van Halen']['debut year'];
print '<br/><br/>';

/** 3.  Using a "foreach" loop(s), print out a list of all artists, each on a separate 
 *      line. Challenge: do it on a single line (additional php function required).
 */

print '3. All artists:<br/>';
foreach($artists as $artist_name => $artist_data) {
  print $artist_name;
  print '<br/>';
}
print '<br/><br/>';

print '3(challenge). All artists:<br/>';
print implode('<br/>', array_keys($artists));
print '<br/><br/>';

/** 4.  Repeat the previous example, but print out as a comma separated list using the
 *  PHP "implode" function. Challenge: do it in a single line of code (additional php 
 *  function required).
 */

print '4. All artists (comma-separated):<br/>';
$names = array();
foreach($artists as $artist_name => $artist_data) {
  $names[] = $artist_name;
}
print implode(', ', $names);
print '<br/><br/>';

print '4(challenge). All artists (comma-separated):<br/>';
print implode(', ', array_keys($artists));
print '<br/><br/>';

/** 5.  Using a "foreach" loop(s) and if-statements, print out names of artists that 
 *  debuted after the year 2000.
 */

print '5. Artists that debuted after the year 2000:<br/>';
foreach($artists as $artist_name => $artist_data) {
  if ($artist_data['debut year'] > 2000) {
    print $artist_name;
    print '<br/>';
  }
}
print '<br/><br/>';

/** 6.  Using "foreach" loop(s), print out a list of all artists followed by their 
 *  "debut year" on a single line for each artist (use concatenation). 
 */

print '6. All artists and their debut year:<br/>';
foreach($artists as $artist_name => $artist_data) {
  print $artist_name . ' - ' . $artist_data['debut year'];
  print '<br/>';
}
print '<br/><br/>';

/** 7.  Add two more artists (and relevant data) to the $artists array. Do not go back 
 *  and modify the original array.
 */

$artists['Dave Matthews Band'] = array(
  'albums' => array(
    'Under the Table and Dreaming'=> array(
      'genre' => 'rock',
    ),
    'Remember Two Things' => array(
      'genre' => 'rock',
    ),
  ),
  'debut year' => 1991,
);
$artists['Adele'] = array(
  'albums' => array(
    '21'=> array(
      'genre' => 'pop',
    ),
  ),
  'debut year' => 2006,
);

print '7. Updated $arists array: <br/><pre>';
print_r($artists);
print '</pre>';

/** 8.  Create a function called "get_artists_names" for the code of step 6 above, 
 *  taking the "$artists" array as the argument, and retuning a text string as the result.
 *  Call the function from a "print" statement. 
 */
 

 
 
 
 

function get_artists_names($artists) {
  $output = '';
  foreach($artists as $artist_name => $artist_data) {
    $output .= $artist_name . ' - ' . $artist_data['debut year'];
    $output .= '<br/>';
  }
  return $output;
}

print '8. Updated artists names and debut year: <br/>';
print get_artists_names($artists);
print '<br/><br/>';

/** 9.  Create a function called "get_artists_stats" that takes the $artists array and
 *  returns the number of albums and the number of artists as an array. Call the function
 *  and output its results from one or more "print" statements. 
 */

function get_artists_stats($artists) {
  $stats = array();
  $stats['num_artists'] = count($artists);
  $stats['num_albums'] = 0;
  foreach($artists as $artist_name => $artist_data) {
    $stats['num_albums'] += count($artist_data['albums']);
  }
  return $stats;
}

$artists_stats = get_artists_stats($artists);
print '9. Artists array stats: <br/>';
print 'Number of artists: ' . $artists_stats['num_artists'];
print '<br/>';
print 'Number of albums: ' . $artists_stats['num_albums'];
print '<br/><br/>';


/** 10.  Create a function called "add_artist" that takes two arguments. The first is
 *  the $artists array (passed by reference) and the second is a $new_artists array. The
 *  function will add the contents of the $new_artists array to the existing $artists 
 *  array only if the artist doesn't already exist in the $artists array. 
 *  Add a new artist using this function then call the functions from steps 8
 *  and 9 above to see the updated stats. 
 */

function add_artist(&$artists, $new_artists) {
  foreach($new_artists as $new_artist_name => $new_artist_data) {
    if (!array_key_exists($new_artist_name, $artists)) {
      $artists[$new_artist_name] = $new_artist_data;
    }
  }
}

$new_artist['Train'] = array(
  'albums' => array(
    'Bulletproof Picasso'=> array(
      'genre' => 'rock',
    ),
  ),
  'debut year' => 2000,
);

add_artist($artists, $new_artist);
$artists_stats = get_artists_stats($artists);
print '10. Added artist, updated stats: <br/>';
print get_artists_names($artists);
print '<br/>';
print 'Number of artists: ' . $artists_stats['num_artists'];
print '<br/>';
print 'Number of albums: ' . $artists_stats['num_albums'];
print '<br/><br/>';
