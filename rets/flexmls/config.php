<?php
// Field Map because someone at the rets place is on crack
//include('field_map.php');

// Login Information
$rets_config['FLEXMLS']['name'] = 'FLEXMLS';
$rets_config['FLEXMLS']['login_url'] = 'http://retsgw.flexmls.com:80/rets2_1/Login';
$rets_config['FLEXMLS']['username'] = 'fl.rets.stevenshattow';
$rets_config['FLEXMLS']['password'] = 'blurt-y17';
$rets_config['FLEXMLS']['user_agent'] = 'Webware RETS';

$rets_config['FLEXMLS']['name'] = 'FLEXMLS';
$rets_config['FLEXMLS']['login_url'] = 'http://rets.las.mlsmatrix.com/rets/login.ashx';
$rets_config['FLEXMLS']['username'] = 'webw';
$rets_config['FLEXMLS']['password'] = 'glvar212';
$rets_config['FLEXMLS']['user_agent'] = 'Webware RETS';

// Image Setup
//$rets_config['FLEXMLS']['image_directory'] = $base_image.'flexmls/';
//$rets_config['FLEXMLS']['image_type'] = 'HiRes';

// Query and Database Settings
$rets_config['FLEXMLS']['query_limit'] = '20000';
$rets_config['FLEXMLS']['server_query_limit'] = '25000';
$rets_config['FLEXMLS']['table_prefix'] = 'glvar';
$rets_config['FLEXMLS']['listing_id_field'] = 'LIST_105';
$rets_config['FLEXMLS']['master_update_script'] = 'flexmls_master_update';


// $rets_config['FLEXMLS']['data']['rental'] = array(
//  "resource" => "Property",
//  "class" => "F",
//  "create_table" => true,
//  "keyfield" => "LIST_1",
//  "query" => "(138=2012-01-01T00:00:00+),(LIST_15=|12MKV6FH8HUD,PWC_15429SGZYQIT)");

//TODO: setup query date so it's not hard coded (LIST_132)

/*ets_config['FLEXMLS']['data']['multifamily'] = array(
  "resource" => "Property",
  "create_table" => true,
  "class" => "B",
  "keyfield" => "LIST_1",
  "query" => "(LIST_132=2011-01-01T00:00:00+),(LIST_15=|12MKUJQH3QE8,PWC_15429SGZYQIT,12LL26N0CIFT)");

  */
/** @var TYPE_NAME $rets_config */
$rets_config['FLEXMLS']['data']['residential'] = array(
    "resource" => "Property",
    "create_table" => true,
    "class" => "Listing",
    "keyfield" => "matrix_unique_id ",
    // "query" => "(1=|RES),(242=|ER,EA,AU,C)"
    "query" => "(Status=|EA,A)"
);

/*
$rets_config['FLEXMLS']['data']['room'] = array(
"resource" => "PropertySubTable",
"create_table" => true,
"class" => "Room",
"keyfield" => "matrix_unique_id ",
"query" => ""
);
    

$rets_config['FLEXMLS']['data']['rental'] = array(
"resource" => "Property",
"create_table" => true,
"class" => "9",
"keyfield" => "sysid",
"query" => "(1=RNT)"
);
      */
/////////////////////////////////////////////////////////////////////////////////////////////////
//  end of time-chunked residential data download
/////////////////////////////////////////////////////////////////////////////////////////////////

function hasNumber($str)
{

    if (preg_match('#[0-9]#', $str))
        return true;
    else
        return false;
}

/**
 * flexmls_master_update function.
 * Runs the corresponding updater for $property_type ie. "Residential", "Commercial" etc.
 * @access public
 * @param mixed $property_type
 * @return void
 */
function flexmls_master_update($property_type)
{

    switch ($property_type) {

        // A
        case 'residential':
            flexmls_updateAll();
            break;

        // B
        case 'multifamily':
            // flexmls_updateMultifamily();
            break;

        // C
        case 'vacantland':
            //   flexmls_updateVacantland();
            break;

        // D
        case 'business':
            // flexmls_updateBusiness();
            break;

        // E
        case 'commercial':
            //flexmls_updateCommercial();
            break;

        // F
        case 'rental':
            flexmls_updateRental();
            break;

        case 'hirise':
            flexmls_updateHirise();
            break;

    }
}

/**
 * flexmls_updateResidential function.
 * Updates the flexmls_property_a table and the master_rets_table with Residential listing data from FLEXMLS
 * @access public
 * @return void
 */

function flexmls_updateAll()
{

    global $conn;

    // delete all old records in master table...
    $clean_up = mysqli_query($conn, "DELETE FROM `master_rets_table_update` ");
    if (!$clean_up) {
        echo("FATAL ERROR - Can't clean up MRT - INVESTIGATE!");
        exit(0);
    }

    // now grab all the new records...
    $rets_results = mysqli_query($conn, "SELECT * from `glvar_property_listing` ");        // TODO:  make this dynamic
    $tot_row = mysqli_num_rows($rets_results);
    $cnt_row = 0;
    echo "Updating All properties into master_rets_table_update [$tot_row]..." . "\n";
    if ($tot_row > 0) {
        // process the new rows
        while ($row = mysqli_fetch_array($rets_results)) {
            // Get State
            $row['state_or_province'] = getState($row['state_or_province'], $row['postal_code']);

            // Get County
            if (empty($row['county'])) {
                $row['county'] = getCounty($row['postal_code'], $row['city']);
            }

            // always insert...
            $master_check = 0;

            if ($master_check <= 0) {

                /** Insert new record into master table */
                $sql = "INSERT INTO `master_rets_table_update` SET       
                    rets_system = 'GLVAR',
                    property_type= '" . mysqli_real_escape_string($conn, $row['Property_Type']) . "',
                    listing_id = '" . mysqli_real_escape_string($conn, $row['MLS_Number']) . "',
                    rets_key = '" . mysqli_real_escape_string($conn, $row['MLS_Number']) . "',
                    sysid = '" . mysqli_real_escape_string($conn, $row['Matrix_Unique_ID']) . "',
                    photo_timestamp = '" . mysqli_real_escape_string($conn, $row['Photo_Modification_Timestamp']) . "',
                    photo_count = '" . mysqli_real_escape_string($conn, $row['Photo_Count']) . "',     
                    agent_id = '" . mysqli_real_escape_string($conn, $row['List_Agent_MLSID']) . "',
                    street_number = '" . mysqli_real_escape_string($conn, $row['Street_Number']) . "',
                    street_name = '" . mysqli_real_escape_string($conn, $row['Street_Name']) . "',
                    street_dir = '" . mysqli_real_escape_string($conn, $row['Street_Dir_Prefix']) . "',
                    city = '" . mysqli_real_escape_string($conn, $row['City']) . "',
                    state_province = '" . mysqli_real_escape_string($conn, $row['State_Or_Province']) . "',
                    postal_code = '" . mysqli_real_escape_string($conn, $row['Postal_Code']) . "',
                    property_sub_type = '" . mysqli_real_escape_string($conn, $row['Property_Sub_Type']) . "',
                    sqft_living = '" . mysqli_real_escape_string($conn, $row['Approx_Total_Liv_Area']) . "',
                    sqft_tot = '" . mysqli_real_escape_string($conn, $row['Sq_Ft_Total']) . "',
                    bedrooms = '" . mysqli_real_escape_string($conn, $row['Bedrooms_Total_Possible_Num']) . "',
                    bathrooms = '" . mysqli_real_escape_string($conn, $row['Baths_Total']) . "',
                    listing_price = '" . mysqli_real_escape_string($conn, $row['List_Price']) . "',
                    floor = '" . mysqli_real_escape_string($conn, $row['Flooring_Description']) . "',
                    listing_date = '" . $row['Listing_Contract_Date'] . "',
                    listing_entry_timestamp = '" . mysqli_real_escape_string($conn, $row['Listing_Contract_Date']) . "',
                    listing_area = '" . mysqli_real_escape_string($conn, $row['Area']) . "',             
                    year_built = '" . mysqli_real_escape_string($conn, $row['Year_Built']) . "',
                    exterior_features = '" . mysqli_real_escape_string($conn, $row['Exterior_Description']) . "',
                    interior_features = '" . mysqli_real_escape_string($conn, $row['Interior']) . "',
                    pool_features = '" . mysqli_real_escape_string($conn, $row['Pool_Description']) . "', 
                    private_pool = '" . mysqli_real_escape_string($conn, $row['PvPool_203']) . "',
                    utilities = '" . mysqli_real_escape_string($conn, $row['Utility_Information']) . "',
                    equipment_appliances = '" . mysqli_real_escape_string($conn, $row['Other_Appliance_Description']) . "',
                    parking = '" . mysqli_real_escape_string($conn, $row['Parking_Description']) . "',
                    construction = '" . mysqli_real_escape_string($conn, $row['Construction_Description']) . "',
                    roof_type = '" . mysqli_real_escape_string($conn, $row['Roof_Description']) . "',
                    fireplace = '" . mysqli_real_escape_string($conn, $row['Fireplace']) . "',     
                    county = '" . mysqli_real_escape_string($conn, $row['County_Or_Parish']) . "',
                    gated_community = '" . mysqli_real_escape_string($conn, $row['Gated_YN']) . "',
                    furnishing = '" . mysqli_real_escape_string($conn, $row['Furnishings_Description']) . "',
                    tax_amount = '" . mysqli_real_escape_string($conn, $row['Annual_Property_Taxes']) . "',
                    subdivision = '" . mysqli_real_escape_string($conn, $row['Subdivision_Name']) . "',
                    property_status = '" . mysqli_real_escape_string($conn, $row['Status']) . "',
                    home_view = '" . mysqli_real_escape_string($conn, $row['Views']) . "',
                    garage = '" . mysqli_real_escape_string($conn, $row['Garage']) . "',
                    short_sale = '" . mysqli_real_escape_string($conn, $row['Short_Sale']) . "',
                    dining_area = '" . mysqli_real_escape_string($conn, $row['Dining_Room_Description_276']) . "',
                    heating = '" . mysqli_real_escape_string($conn, $row['Heating_Description']) . "',
                    halfbaths =  '" . mysqli_real_escape_string($conn, $row['Baths_Half']) . "',
                    cooling =  '" . mysqli_real_escape_string($conn, $row['Cooling_Description']) . "',
                    zoning = '" . mysqli_real_escape_string($conn, $row['Zoning']) . "',
                    lot_desc = '" . mysqli_real_escape_string($conn, $row['Lot_Description']) . "',
                    master_bedbath =  '" . mysqli_real_escape_string($conn, $row['Master_Bedroom_Description_281']) . "',
                    rooms = '" . mysqli_real_escape_string($conn, $row['Room_Count']) . "',  
                    tax_places =  '" . mysqli_real_escape_string($conn, $row['Tax_District']) . "',
                    unit_desc = '" . mysqli_real_escape_string($conn, $row['Unit_Description']) . "',                       
                    elem_school =  '" . mysqli_real_escape_string($conn, $row['Elementary_School_K-2_2377']) . "',
                    middle_school =  '" . mysqli_real_escape_string($conn, $row['Jr_High_School']) . "',
                    high_school =  '" . mysqli_real_escape_string($conn, $row['High_School']) . "',
                    bank_owned =  '" . mysqli_real_escape_string($conn, $row['Repo_Reo_YN']) . "',
                    virtual_tour = '" . mysqli_real_escape_string($conn, $row['Virtual_Tour_Link']) . "',
                    listing_office_name = '" . mysqli_real_escape_string($conn, $row['List_Office_Name']) . "',
                    listing_office_phone = '" . mysqli_real_escape_string($conn, $row['List_Office_Phone']) . "',
                    listing_office_address = '" . mysqli_real_escape_string($conn, $row['Public_Address_2861']) . "',
                    listing_office_email = '" . mysqli_real_escape_string($conn, $row['Email_2385']) . "',
                    lot_sqft = '" . mysqli_real_escape_string($conn, $row['Lot_Sqft']) . "',
                    lot_acres = '" . mysqli_real_escape_string($conn, $row['Num_Acres']) . "',
                    hoa = '" . mysqli_real_escape_string($conn, $row['Association_Name']) . "',  
                    dwelling_view = '" . mysqli_real_escape_string($conn, $row['House_Views']) . "',
                    over_55 = '" . mysqli_real_escape_string($conn, $row['Age_Restricted_Community_YN']) . "',
                    water_type = '" . mysqli_real_escape_string($conn, $row['Water']) . "',
                    fireplace_desc = '" . mysqli_real_escape_string($conn, $row['Fireplace_Description']) . "',
                    fence_type = '" . mysqli_real_escape_string($conn, $row['Fence_Type']) . "',
                    landscape_desc = '" . mysqli_real_escape_string($conn, $row['Landscape_Description']) . "',
                    sid_lid_yn  = '" . mysqli_real_escape_string($conn, $row['SIDLIDYN']) . "',
                    assessment_amount_type  = '" . mysqli_real_escape_string($conn, $row['Assessment_Amount_Type_2465']) . "',
                    full_bath  = '" . mysqli_real_escape_string($conn, $row['Baths_Full']) . "',
                    bath_down_desc  = '" . mysqli_real_escape_string($conn, $row['Bath_Downstairs_Description']) . "',
                    sale_bonus = '" . mysqli_real_escape_string($conn, $row['Sale_Office_Bonus_YN']) . "',
                    builder_manu = '" . mysqli_real_escape_string($conn, $row['Builder']) . "',
                    built_desc = '" . mysqli_real_escape_string($conn, $row['Built_Description']) . "',
                    carport = '" . mysqli_real_escape_string($conn, $row['Carports']) . "',
                    carport_desc = '" . mysqli_real_escape_string($conn, $row['Carport_Description']) . "',
                    accept_date = '" . mysqli_real_escape_string($conn, $row['Acceptance_Date_85']) . "',
                    cooling_fuel = '" . mysqli_real_escape_string($conn, $row['Cooling_Fuel']) . "',
                    2nd_bed_dim =  '" . mysqli_real_escape_string($conn, $row['2nd_Bedroom_Dimensions_89']) . "',
                    3rd_bed_dim = '" . mysqli_real_escape_string($conn, $row['3rd_Bedroom_Dimensions_90']) . "',
                    4th_bed_dim = '" . mysqli_real_escape_string($conn, $row['4th_Bedroom_Dimensions_91']) . "',
                    5th_bed_dim  = '" . mysqli_real_escape_string($conn, $row['5th_Bedroom_Dimensions_94']) . "',
                    fam_room_dim  = '" . mysqli_real_escape_string($conn, $row['Family_Room_Dimensions_93']) . "',
                    live_room_dim = '" . mysqli_real_escape_string($conn, $row['Living_Room_Dimensions_95']) . "',
                    master_bed_dim = '" . mysqli_real_escape_string($conn, $row['Master_Bedroom_Dimensions_96']) . "',
                    dom = '" . mysqli_real_escape_string($conn, $row['DOM']) . "',
                    earnest_depo = '" . mysqli_real_escape_string($conn, $row['Earnest_Deposit']) . "',
                    assessment_yn = '" . mysqli_real_escape_string($conn, $row['Assessment_YN']) . "',
                    conv_garage_yn = '" . mysqli_real_escape_string($conn, $row['Converted_Garage_YN']) . "',
                    ground_mount_yn = '" . mysqli_real_escape_string($conn, $row['Ground_Mounted_YN']) . "',
                    internet_yn  = '" . mysqli_real_escape_string($conn, $row['Internet_YN']) . "',
                    land_use = '" . mysqli_real_escape_string($conn, $row['Land_Use']) . "',
                    sewer  = '" . mysqli_real_escape_string($conn, $row['Sewer']) . "',
                    last_trans_code = '" . mysqli_real_escape_string($conn, $row['Last_Transaction_Code_134']) . "',
                    last_trans_date = '" . mysqli_real_escape_string($conn, $row['Last_Transaction_Date_135']) . "',
                    listing_office_code = '" . mysqli_real_escape_string($conn, $row['List_Agent_MUI']) . "',
                    community_name = '" . mysqli_real_escape_string($conn, $row['Community_Name']) . "',
                    metro_map_coor = '" . mysqli_real_escape_string($conn, $row['Metro_Map_Coor_XP']) . "',
                    metro_map_page = '" . mysqli_real_escape_string($conn, $row['Metro_Map_Page_XP']) . "',
                    original_list_price = '" . mysqli_real_escape_string($conn, $row['Original_List_Price']) . "',
                    owner_licensee = '" . mysqli_real_escape_string($conn, $row['Owner_Licensee']) . "',
                    parcel_num = '" . mysqli_real_escape_string($conn, $row['Parcel_Number']) . "',
                    pool_length = '" . mysqli_real_escape_string($conn, $row['Pool_Length']) . "',
                    pool_width = '" . mysqli_real_escape_string($conn, $row['Pool_Width']) . "',
                    power_on_off = '" . mysqli_real_escape_string($conn, $row['Poweronor_Off']) . "',
                    previous_price = '" . mysqli_real_escape_string($conn, $row['Last_List_Price']) . "',
                    property_cond = '" . mysqli_real_escape_string($conn, $row['Property_Condition']) . "',
                    legal_loc_range = '" . mysqli_real_escape_string($conn, $row['Legal_Location_Range_204']) . "',
                    realtor_yn = '" . mysqli_real_escape_string($conn, $row['Realtor_YN']) . "',
                    existing_rent = '" . mysqli_real_escape_string($conn, $row['Existing_Rent']) . "',
                    buyer_broker = '" . mysqli_real_escape_string($conn, $row['Buyer_Broker_211']) . "',
                    yr_round_school = '" . mysqli_real_escape_string($conn, $row['Year_Round_School_216']) . "',
                    legal_loc_section = '" . mysqli_real_escape_string($conn, $row['Legal_Location_Section_217']) . "',
                    sid_lid_balance = '" . mysqli_real_escape_string($conn, $row['SIDLID_Balance']) . "',
                    amount_owner_carry = '" . mysqli_real_escape_string($conn, $row['Owner_Will_Carry']) . "',
                    loft_num = '" . mysqli_real_escape_string($conn, $row['Num_Loft']) . "',
                    sold_term = '" . mysqli_real_escape_string($conn, $row['Sold_Term']) . "',
                    sold_price = '" . mysqli_real_escape_string($conn, $row['Sold_Price_235']) . "',
                    pv_spa_yn = '" . mysqli_real_escape_string($conn, $row['Spa']) . "',
                    spa_desc = '" . mysqli_real_escape_string($conn, $row['Spa_Description']) . "',
                    approx_liv_area = '" . mysqli_real_escape_string($conn, $row['Approx_Total_Liv_Area']) . "',
                    legal_loc_town = '" . mysqli_real_escape_string($conn, $row['Township']) . "',
                    washer_dryer_loc = '" . mysqli_real_escape_string($conn, $row['Washer_Dryer_Location']) . "',
                    property_desc = '" . mysqli_real_escape_string($conn, $row['Property_Description']) . "',
                    garage_desc = '" . mysqli_real_escape_string($conn, $row['Garage_Description']) . "',
                    traffic_directions = '" . mysqli_real_escape_string($conn, $row['Directions']) . "',
                    kitchen_desc = '" . mysqli_real_escape_string($conn, $row['Kitchen_Countertops']) . "',
                    live_room_desc = '" . mysqli_real_escape_string($conn, $row['Living_Room_Description_279']) . "',
                    master_bath_desc = '" . mysqli_real_escape_string($conn, $row['Master_Bath_Desc_280']) . "',
                    2nd_bed_desc = '" . mysqli_real_escape_string($conn, $row['2nd_Bedroom_Description_282']) . "',
                    3rd_bed_desc = '" . mysqli_real_escape_string($conn, $row['3rd_Bedroom_Description_283']) . "',
                    4th_bed_desc = '" . mysqli_real_escape_string($conn, $row['4th_Bedroom_Description_284']) . "',
                    possession_desc = '" . mysqli_real_escape_string($conn, $row['Possession_Description_285']) . "',
                    financing = '" . mysqli_real_escape_string($conn, $row['Financing_Considered']) . "',
                    show_additional = '" . mysqli_real_escape_string($conn, $row['Show_(Additional)_288']) . "',
                    oven_desc = '" . mysqli_real_escape_string($conn, $row['Oven_Description']) . "',
                    ranching = '" . mysqli_real_escape_string($conn, $row['Equestrian_Description']) . "',
                    misc_desc = '" . mysqli_real_escape_string($conn, $row['Miscellaneous_Description']) . "',
                    heating_fuel = '" . mysqli_real_escape_string($conn, $row['Heating_Fuel']) . "',
                    list_price_sqft = '" . mysqli_real_escape_string($conn, $row['RATIO_Current_Price_By_SQFT']) . "',
                    unit_num = '" . mysqli_real_escape_string($conn, $row['Unit_Number']) . "',
                    bath_dwnstair_yn = '" . mysqli_real_escape_string($conn, $row['Bath_Down_YN']) . "',
                    bed_dwnstair_yn = '" . mysqli_real_escape_string($conn, $row['Bedroom_Downstairs_YN']) . "',
                    building_desc = '" . mysqli_real_escape_string($conn, $row['Building_Description']) . "',
                    building_num = '" . mysqli_real_escape_string($conn, $row['Building_Number']) . "',
                    court_approv_yn = '" . mysqli_real_escape_string($conn, $row['Court_Approval']) . "',
                    fireplace_loc = '" . mysqli_real_escape_string($conn, $row['Fireplace_Location']) . "',
                    furnishing_desc = '" . mysqli_real_escape_string($conn, $row['']) . "',
                    great_room_yn = '" . mysqli_real_escape_string($conn, $row['']) . "',
                    great_room_dim = '" . mysqli_real_escape_string($conn, $row['']) . "',
                    great_room_desc = '" . mysqli_real_escape_string($conn, $row['']) . "',
                    inc_washer_yn = '" . mysqli_real_escape_string($conn, $row['Washer_Dryer_Included']) . "',
                    inc_dryer_yn = '" . mysqli_real_escape_string($conn, $row['Dryer_Included']) . "',
                    litigation = '" . mysqli_real_escape_string($conn, $row['Litigation']) . "',
                    ownership = '" . mysqli_real_escape_string($conn, $row['Ownership']) . "',
                    den_dim = '" . mysqli_real_escape_string($conn, $row['DEN_Dim_2511']) . "',
                    loft_dim = '" . mysqli_real_escape_string($conn, $row['LOFT_Dim_2513']) . "',
                    loft_desc = '" . mysqli_real_escape_string($conn, $row['Loft_Description_2539']) . "',
                    studio_yn = '" . mysqli_real_escape_string($conn, $row['Studio_YN']) . "',
                    public_address_yn = '" . mysqli_real_escape_string($conn, $row['Public_Address_YN']) . "',
                    public_address = '" . mysqli_real_escape_string($conn, $row['Public_Address']) . "',
                    commentary_yn = '" . mysqli_real_escape_string($conn, $row['CommentaryY/N_2859']) . "',
                    accessibility_desc = '" . mysqli_real_escape_string($conn, $row['Accessibility_Features_2925']) . "',
                    water_heat_desc = '" . mysqli_real_escape_string($conn, $row['Water_Heater_Description']) . "',
                    dishwasher_inc = '" . mysqli_real_escape_string($conn, $row['Dishwasher_YN']) . "',
                    disposal_inc = '" . mysqli_real_escape_string($conn, $row['Disposal_YN']) . "',
                    fridge_inc = '" . mysqli_real_escape_string($conn, $row['Refrigerator_YN']) . "',
                    hoa_dues = '" . mysqli_real_escape_string($conn, $row['Association_Fee_1']) . "',
                    hoa_dues_term = '" . mysqli_real_escape_string($conn, $row['Association_Fee_1_MQYN']) . "',
                    street_suffix = '" . mysqli_real_escape_string($conn, $row['Street_Suffix']) . "',
                    additional_rooms = '" . mysqli_real_escape_string($conn, $row['additional_rooms']) . "',
                    ada_info = '" . mysqli_real_escape_string($conn, $row['Accessibility_Features']) . "',
                    maint_fee_inc =  '" . mysqli_real_escape_string($conn, $row['Maintenance']) . "',
                    interior_improvements = '" . mysqli_real_escape_string($conn, $row['interior_improvements']) . "',                         
                    listing_office_url = '" . mysqli_real_escape_string($conn, $row['listing_office_url']) . "',
                    expenses = '" . mysqli_real_escape_string($conn, $row['expenses']) . "',
                    exterior_finish = '" . mysqli_real_escape_string($conn, $row['siding']) . "',
                    home_warranty = '" . mysqli_real_escape_string($conn, $row['home_warranty']) . "',
                    tax_year = '" . mysqli_real_escape_string($conn, $row['tax_year']) . "',
                    security = '" . mysqli_real_escape_string($conn, $row['security']) . "',
                    boat_services = '" . mysqli_real_escape_string($conn, $row['boat_services']) . "',
                    membership =  '" . mysqli_real_escape_string($conn, $row['membership']) . "',
                    restrictions =  '" . mysqli_real_escape_string($conn, $row['restrictions']) . "',
                    terms =  '" . mysqli_real_escape_string($conn, $row['Terms_Owner_Will_Carry']) . "',
                    water_footage = '" . mysqli_real_escape_string($conn, $row['waterfront_footage']) . "',
                    terms_considered =  '" . mysqli_real_escape_string($conn, $row['terms_considered']) . "',
                    waterfront = '" . mysqli_real_escape_string($conn, $row['water_type']) . "',
                    amenities = '" . mysqli_real_escape_string($conn, $row['Services_Available_On_Site']) . "',
                    listing_status = '" . mysqli_real_escape_string($conn, $row['Status']) . "',  
                    split_yn = '" . mysqli_real_escape_string($conn, $row['split_yn']) . "',
                    pool = '" . mysqli_real_escape_string($conn, $row['Pv_Pool']) . "',
                    remarks = '" . mysqli_real_escape_string($conn, $row['Public_Remarks']) . "',
                    pets =  '" . mysqli_real_escape_string($conn, $row['Pets_Allowed']) . "',        
                    design =  '" . mysqli_real_escape_string($conn, $row['design']) . "',
                    home_style = '" . mysqli_real_escape_string($conn, $row['Style']) . "',
                    floor_num = '" . mysqli_real_escape_string($conn, $row['Elevator_Floor_Num']) . "',
                    house_faces = '" . mysqli_real_escape_string($conn, $row['House_Faces']) . "',
                    last_change_type = '" . mysqli_real_escape_string($conn, $row['Last_Change_Type']) . "',
                    last_change_date = '" . mysqli_real_escape_string($conn, $row['Last_Change_Timestamp']) . "',
                    last_status = '" . mysqli_real_escape_string($conn, $row['Last_Status']) . "',
                    3_4_bath = '" . mysqli_real_escape_string($conn, $row['Three_Qtr_Baths']) . "',
                    active_DOM = '" . mysqli_real_escape_string($conn, $row['DOM']) . "'
                ";
                //if hoa dues + hoa dues term is wrong, fix.

            }

            $sql = strtr($sql, array(
                "\r\n" => "",
                "\r" => "",
                "\n" => "",
                "\t" => " "));

            // Run Query
            $results = mysqli_query($conn, $sql) or die(mysqli_error() . $sql);
            $cntRow++;

            if (($cntRow % 50) == 0) {
                $pctDone = number_format($cntRow / $tot_row * 100, 1);
                echo "Working [$pctDone%]..." . "\n";
            }
        }
        echo "Update RESIDENTIAL properties DONE...ok" . "\n\n";
    }

}


function padBlanks($inStg)
{
    return str_replace(" ", "_", $inStg);
}

