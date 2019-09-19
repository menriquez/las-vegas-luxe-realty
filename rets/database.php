<?php

$ACTIVE_DOMAIN="lasvegasluxerealty.com";


if (constant("DEV_NAME") != "prod")  {
    //$ACTIVE_DOMAIN=$_SERVER['HTTP_HOST'];
    $configDB = array(
      'DB_HOST' => 'lasvegasluxerealty.com',
      'DB_NAME' => 'admin_lvlr',
      'DB_USER' => 'admin_admin_lvlr',
      'DB_PASS' => 'JTgOaOVZrd',
      'DB_DRIVER' => 'mysql'
    );

}
else {
    $configDB = array(
      'DB_HOST' => 'localhost',
      'DB_NAME' => 'admin_lvlr',
      'DB_USER' => 'admin_admin_lvlr',
      'DB_PASS' => 'JTgOaOVZrd',
      'DB_DRIVER' => 'mysql'
    );

}

echo "Connecting to database..\n";
$conn=mysqli_connect($configDB['DB_HOST'], $configDB['DB_USER'], $configDB['DB_PASS'], $configDB['DB_NAME']) or die(mysqli_error());
if ($conn) echo "db ".$configDB['DB_HOST'].":".$configDB['DB_NAME']." CONNECT OK\n";

// Get State Abbreviation
function getState($state = '', $postal_code = '') {

    global $conn;

    if(!empty($postal_code))
    {

    $zipcode_sql = "SELECT * FROM zipcode_lookup WHERE Zipcode = '{$postal_code}' AND LocationType = 'Primary'";
    $query_result = mysqli_query($conn,$zipcode_sql);

    while($rows = mysqli_fetch_array($query_result))
    {
      $zipcode_lookup = $rows;
    }

    return $zipcode_lookup['State'];

  }
  elseif(!empty($state)) {

    $state_abb_sql = "SELECT * FROM states_abbreviation WHERE State = '{$state}'";
    $query_result = mysqli_query($conn,$state_abb_sql);

    while($rows = mysqli_fetch_array($query_result))
    {
      $state_abb_lookup = $rows;
    }

    return $state_abb_lookup['Abbreviation'];
  }

    return false;

}

// Get County
function getCounty($postal_code = '', $city = '')
{
    global $conn;

    if(!empty($postal_code))
    {

        $county_results = mysqli_query( $conn,"SELECT * FROM `zipcode_county_lookup` WHERE `zip_code` = '{$postal_code}' LIMIT 1");
        if(mysqli_num_rows($county_results) > 0)
        {
            $row_1 = mysqli_fetch_assoc($county_results);
            return $row_1['county'];
        }

    }
    elseif(!empty($city))
    {

        $county_results = mysqli_query( $conn, "SELECT * FROM `zipcode_county_lookup` WHERE `city` = '{$city}' LIMIT 1");
        if(mysqli_num_rows($county_results) > 0)
        {
            $row_1 = mysqli_fetch_assoc($county_results);
            return $row_1['county'];
        }
    }

    return false;
}
