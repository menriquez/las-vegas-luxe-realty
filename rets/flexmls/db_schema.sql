-- ----------------------------
-- Table structure for `city_information`
-- ----------------------------
DROP TABLE IF EXISTS `city_information`;
CREATE TABLE `city_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL DEFAULT '',
  `youtube_id` varchar(25) DEFAULT NULL,
  `content` text,
  `additional_info_link` varchar(25) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `keywords` text,
  `youtube_keywords` text,
  `youtube_desc` text,
  `current_hits` int(14) DEFAULT NULL,
  `current_rental_hits` int(11) DEFAULT NULL,
  `headline` varchar(127) DEFAULT NULL,
  `closed_hits` int(11) DEFAULT NULL,
  `avg_dom` int(11) DEFAULT NULL,
  `avg_closed_price` int(11) DEFAULT NULL,
  `hi_closed_price` int(11) DEFAULT NULL,
  `lo_closed_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city` (`city`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of city_information
-- ----------------------------

-- ----------------------------
-- Table structure for `community_area_files`
-- ----------------------------
DROP TABLE IF EXISTS `community_area_files`;
CREATE TABLE `community_area_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(150) NOT NULL,
  `subdivision_area_id` int(11) NOT NULL,
  `file_type` int(11) NOT NULL COMMENT '1 = Image, 2 = Document',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of community_area_files
-- ----------------------------

-- ----------------------------
-- Table structure for `community_area_information`
-- ----------------------------
DROP TABLE IF EXISTS `community_area_information`;
CREATE TABLE `community_area_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL DEFAULT '',
  `subdivision_area_name` varchar(150) NOT NULL,
  `youtube_id` varchar(25) DEFAULT NULL,
  `content` text,
  `additional_info_link` varchar(25) DEFAULT NULL,
  `street_address` varchar(150) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `keywords` text,
  `current_rental_hits` int(11) DEFAULT NULL,
  `youtube_keywords` text,
  `youtube_desc` text,
  `current_hits` int(11) DEFAULT '0',
  `headline` varchar(128) DEFAULT NULL,
  `closed_hits` int(11) DEFAULT NULL,
  `avg_dom` int(11) DEFAULT NULL,
  `avg_closed_price` int(11) DEFAULT NULL,
  `hi_closed_price` int(11) DEFAULT NULL,
  `lo_closed_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city` (`city`)
) ENGINE=MyISAM AUTO_INCREMENT=1982 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of community_area_information
-- ----------------------------

-- ----------------------------
-- Table structure for `custom_listings`
-- ----------------------------
DROP TABLE IF EXISTS `custom_listings`;
CREATE TABLE `custom_listings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` varchar(20) NOT NULL DEFAULT '',
  `youtube_id` varchar(40) DEFAULT NULL,
  `content` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `keywords` text,
  `youtube_keywords` text,
  `youtube_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of custom_listings
-- ----------------------------
INSERT INTO `custom_listings` VALUES ('56', '1887720', null, null, '1', null, null, null);
INSERT INTO `custom_listings` VALUES ('57', '1584203', null, null, '1', null, null, null);
INSERT INTO `custom_listings` VALUES ('58', '1887686', null, null, '1', null, null, null);
INSERT INTO `custom_listings` VALUES ('59', '1853362', null, null, '1', null, null, null);
INSERT INTO `custom_listings` VALUES ('60', '1634697', null, null, '1', null, null, null);

-- ----------------------------
-- Table structure for `glvar_property_9`
-- ----------------------------
DROP TABLE IF EXISTS `glvar_property_9`;
CREATE TABLE `glvar_property_9` (
  `sysid_sysid` int(11) DEFAULT NULL,
  `Property_Type_1` text,
  `Legal_LctnTownship_(Search)_3` text,
  `Legal_Lctn_Range_(Search)_4` text,
  `Zip_Code_10` text,
  `StatusChangeDate_18` datetime DEFAULT NULL,
  `Actual_Close_Date_25` datetime DEFAULT NULL,
  `LA_Name_26` text,
  `Area_37` int(11) DEFAULT NULL,
  `Bedrooms_68` int(11) DEFAULT NULL,
  `Comp_Days_on_Market_81` int(11) DEFAULT NULL,
  `Acceptance_Date_85` datetime DEFAULT NULL,
  `County_Name_87` text,
  `Compass_Point_100` text,
  `DOM_101` int(11) DEFAULT NULL,
  `Entry_Date_104` datetime DEFAULT NULL,
  `Images_129` int(11) DEFAULT NULL,
  `Last_Transaction_Code_134` text,
  `Last_Transaction_Date_135` datetime DEFAULT NULL,
  `List_Office_Code_137` text,
  `List_Date_138` datetime DEFAULT NULL,
  `List_Agent_Public_ID_143` text,
  `List_Price_144` decimal(14,2) DEFAULT NULL,
  `ML_#_163` text,
  `Original_List_Price_173` decimal(14,2) DEFAULT NULL,
  `Parcel_#_176` text,
  `Previous_Price_199` decimal(14,2) DEFAULT NULL,
  `Record_Delete_Date_205` datetime DEFAULT NULL,
  `Record_Delete_Flag_207` text,
  `Sale_Price_210` decimal(14,2) DEFAULT NULL,
  `Buyer_Broker_211` text,
  `Sort_Price_235` decimal(14,2) DEFAULT NULL,
  `Status_242` text,
  `Street_Name_243` text,
  `Street_Number_244` int(11) DEFAULT NULL,
  `Year_Built_264` int(11) DEFAULT NULL,
  `LA_Phone_1462` text,
  `Dishwasher_1464` text,
  `Disposal_1465` text,
  `Refrigerator_1467` text,
  `Dryer_Utilities_1468` text,
  `3/4_Baths_1469` int(11) DEFAULT NULL,
  `Full_Baths_1470` int(11) DEFAULT NULL,
  `Half_Baths_1471` int(11) DEFAULT NULL,
  `Baths_Total_1472` int(11) DEFAULT NULL,
  `Cable_Available_1474` text,
  `Carports_1475` int(11) DEFAULT NULL,
  `Contact_Phone_1477` text,
  `Referral_Commission_Amount_1482` int(11) DEFAULT NULL,
  `Contact_Name_1485` text,
  `Contact_Person_1486` text,
  `Contingency_Desc_1487` text,
  `Date_Available_1489` datetime DEFAULT NULL,
  `Administration_Deposit_1490` int(11) DEFAULT NULL,
  `Cleaning_Deposit_1491` int(11) DEFAULT NULL,
  `Key_Deposit_1492` int(11) DEFAULT NULL,
  `Other_Deposit_1493` int(11) DEFAULT NULL,
  `Pet_Deposit_1494` int(11) DEFAULT NULL,
  `Security_Deposit_1495` int(11) DEFAULT NULL,
  `Fence_1498` text,
  `#_Fireplaces_1499` int(11) DEFAULT NULL,
  `Garage_1505` int(11) DEFAULT NULL,
  `Internet?_Y/N_1507` text,
  `Land_Use_1508` int(11) DEFAULT NULL,
  `Construction_Description_1509` text,
  `Parking_Description_1510` text,
  `Lot_Description_1511` text,
  `Showing_Agent_Public_ID_1516` text,
  `Lease_Option_Considered?__Y_1520` text,
  `Permitted_Property_Manager_1521` text,
  `Community_Name_1522` text,
  `Metro_Map_Map_Coor_1523` text,
  `Metro_Map_Map_Page_1524` int(11) DEFAULT NULL,
  `Rented_Price_1526` int(11) DEFAULT NULL,
  `LO_Name_1531` text,
  `LO_Phone_1532` text,
  `Oven_Description_1533` text,
  `Owner_Licensee_1534` text,
  `Power_On/Off_1535` text,
  `Condition_1540` text,
  `Private_Pool_1541` text,
  `Range_1542` int(11) DEFAULT NULL,
  `Realtor?_Y/N_1543` text,
  `Administration_Refund_1544` text,
  `Cleaning_Refund_1545` text,
  `Key_Refund_1546` text,
  `Other_Refund_1547` text,
  `Pet_Refund_1548` text,
  `Security_Refund_1549` text,
  `Elem_K-2_1551` text,
  `High_School_1552` text,
  `Jr_High_School_1553` text,
  `Year_Round_School_1554` text,
  `Section_8_Considered?__Y/N_1555` text,
  `Section_1556` int(11) DEFAULT NULL,
  `Spa_1557` text,
  `Approx_Liv_Area_1558` int(11) DEFAULT NULL,
  `Studio_1563` text,
  `Subdivision_Name_1564` text,
  `Township_1566` int(11) DEFAULT NULL,
  `Washer-Dryer_Included?_1569` text,
  `Washer_Dryer_Location_1570` text,
  `Assoc/Comm_Features_Desc_1573` text,
  `Zoning_1574` text,
  `Style_1575` text,
  `Building_Description_1576` text,
  `Pool_Description_1578` text,
  `Spa_Description_1580` text,
  `Deposit_1581` text,
  `Lease_Description_1582` text,
  `Tenant_Pays_1583` text,
  `Directions_1584` text,
  `Other_Appliance_Description_1586` text,
  `Interior_Description_1587` text,
  `Master_Bedroom_Description_1588` text,
  `Living_Room_Description_1589` text,
  `Flooring_Description_1590` text,
  `Kitchen_Description_1591` text,
  `Exterior_Description_1592` text,
  `Fireplace_Description_1593` text,
  `Restrictions_1594` text,
  `Landscape_Description_1595` text,
  `Fence_Type_1596` text,
  `Heating_Description_1597` text,
  `Heating_Fuel_Description_1598` text,
  `Cooling_Description_1599` text,
  `Showing_Description_1600` text,
  `Sold_Lease_Description_1601` text,
  `Subdivision_Number_1734` int(11) DEFAULT NULL,
  `Est_Clo/Lse_dt_1736` datetime DEFAULT NULL,
  `LP/SqFt_(w/cents)_1738` decimal(14,2) DEFAULT NULL,
  `Furnished_1748` text,
  `IDX_1809` text,
  `Virtual_Tour_Link_2139` text,
  `Photo_Inst_2146` text,
  `Open_House_Flag_2237` decimal(14,2) DEFAULT NULL,
  `Last_Image_Trans_Date_2238` datetime DEFAULT NULL,
  `LP/SqFt_2341` decimal(14,2) DEFAULT NULL,
  `Metro_Map_Coor_XP_2343` text,
  `Metro_Map_Page_XP_2345` int(11) DEFAULT NULL,
  `Subdivision_Name_XP_2353` text,
  `SP/SqFt_[w/cents]_2359` decimal(14,2) DEFAULT NULL,
  `Approx_Liv_Area_2361` int(11) DEFAULT NULL,
  `Subdivision_#_(Search)_2367` text,
  `Fax_#_2383` text,
  `Email_2385` text,
  `UnitNumber_2386` text,
  `Condo_Conversion_Y/N_2549` text,
  `Loft_Dim_1st_Floor_2555` text,
  `5th_Bedroom_Description_2564` text,
  `4th_Bedroom_Description_2566` text,
  `Loft_Dim_2nd_Floor_2567` text,
  `Bath_Down_Y/N_2569` text,
  `Loft_Description_2570` text,
  `3rd_Bedroom_Description_2571` text,
  `Building_#_2572` text,
  `Roof_Description_2573` text,
  `Unit_Description_2574` text,
  `Approx_Addl_Liv_Area_2576` int(11) DEFAULT NULL,
  `Bath_Down_Description_2579` text,
  `Den_Dimensions_2580` text,
  `4th_Bedroom_Dimensions_2584` text,
  `5th_Bedroom_Dimensions_2585` text,
  `3rd_Bedroom_Dimensions_2586` text,
  `2nd_Bedroom_Dimensions_2587` text,
  `2nd_Bedroom_Description_2588` text,
  `Master_Bath_Description_2590` text,
  `Furnished_Description_2591` text,
  `#Den/Other_2592` int(11) DEFAULT NULL,
  `#Loft_2593` int(11) DEFAULT NULL,
  `Property_Description_2595` text,
  `#_Acres_2596` decimal(14,2) DEFAULT NULL,
  `Family_Room_Dimensions_2597` text,
  `Great_Room_Dimensions_2598` text,
  `Great_Room_Y/N_2599` text,
  `Great_Room_Description_2600` text,
  `Dining_Room_Dimensions_2601` text,
  `Dining_Room_Description_2602` text,
  `Utility_Information_2604` text,
  `Homeowner_Association_Name_2605` text,
  `Homeowner_Association_Phone_No_2606` text,
  `Rent_Range_2607` text,
  `Association_Name_2608` text,
  `Association_Phone_Number_2609` text,
  `Referral_Minimum_Commission_2611` int(11) DEFAULT NULL,
  `Referral_Maximum_Commission_2612` int(11) DEFAULT NULL,
  `Litigation_Y/N_2613` text,
  `Master_Bedroom_Dimensions_2615` text,
  `Garage_Desc_2616` text,
  `Manufactured_2617` text,
  `Loft_Dimensions_2618` text,
  `Show_Additional_2621` text,
  `Family_Room_Description_2622` text,
  `Living_Room_Dimensions_2623` text,
  `Elem_3-5_2625` text,
  `Type_2626` text,
  `Converted_Garage_Y/N_2627` text,
  `Sale_Office_Bonus_2632` text,
  `LADOM_2655` int(11) DEFAULT NULL,
  `Bedroom_Downstairs?_Y/N_2657` text,
  `Public_Address_Y/N_2858` text,
  `CommentaryY/N_2859` text,
  `AVM_Y/N_2860` text,
  `Public_Address_2861` text,
  `SP/LP_2864` decimal(14,2) DEFAULT NULL,
  `NOD_Date_2876` datetime DEFAULT NULL,
  `Foreclosure_Commenced_Y/N_2877` text,
  `Photo_Excluded_2883` text,
  `Pets_Y/N_2889` text,
  `T_Status_Date_2893` datetime DEFAULT NULL,
  `DocumentFolderID_2903` int(11) DEFAULT NULL,
  `DocumentFolderCount_2904` int(11) DEFAULT NULL,
  `PriceChgDate_2908` datetime DEFAULT NULL,
  `City/Town_2909` text,
  `Tower_Name_2913` text,
  `Status_Update_2914` text,
  `Accessibility_Features_2925` text,
  `Green_Features_2927` text,
  `Green_Building_Certification_2928` text,
  `Green_Year_Certified_2929` int(11) DEFAULT NULL,
  `Green_Certifying_Body_2930` text,
  `Green_Certification_Rating_2931` text,
  `Water_Heater_Description_2932` text,
  `Active_DOM_2940` int(11) DEFAULT NULL,
  `Lockbox_Authorization_2943` text,
  `Gated_Y/N_2946` text,
  `Approx_Total_Liv_Area_2953` int(11) DEFAULT NULL,
  `State_2963` text,
  `Application_Fee_Y/N_2972` text,
  `Applicant_2973` text,
  `Solar_Electric_2978` text,
  `Owner_Managed_2980` text,
  `Application_Fee_Amount_2981` decimal(14,2) DEFAULT NULL,
  `Administration_Fee_Y/N_2982` text,
  `Age_Restricted_Y/N_2983` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*
Navicat MySQL Data Transfer

Source Server         : webware
Source Server Version : 50505
Source Host           : webwarephpdevelopment.com:3306
Source Database       : admin_lvluxe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-05 15:06:52
*/


-- ----------------------------
-- Table structure for `glvar_propertysubtable_room`
-- ----------------------------
DROP TABLE IF EXISTS `glvar_propertysubtable_room`;
CREATE TABLE `glvar_propertysubtable_room` (
  `Input_Entry_Order` int(11) DEFAULT NULL,
  `Listing_MUI` text,
  `Matrix_Unique_Id` text,
  `Matrix_Modified_DT` datetime DEFAULT NULL,
  `Room_Description` text,
  `Room_Dimensions` varchar(75) DEFAULT NULL,
  `Room_Type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--------------------------
-- Table structure for `ip_logs`
-- ----------------------------
DROP TABLE IF EXISTS `ip_logs`;
CREATE TABLE `ip_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `login_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6962 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;


-- ----------------------------
-- Table structure for `master_rets_table`
-- ----------------------------
DROP TABLE IF EXISTS `master_rets_table`;
CREATE TABLE `master_rets_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sysid` varchar(20) NOT NULL,
  `agent_id` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `rets_system` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `rets_key` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `listing_id` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `property_type` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `property_sub_type` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `listing_area` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `listing_price` int(11) DEFAULT NULL,
  `listing_date` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_entry_timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `listing_office_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_fax` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_url` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_address` text CHARACTER SET latin1 NOT NULL,
  `listing_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `street_number` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `street_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `street_dir` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `street_suffix` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `state_province` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `postal_code` varchar(9) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `additional_rooms` text CHARACTER SET latin1,
  `bathrooms` int(11) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `county` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `construction` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dwelling_view` varchar(50) DEFAULT NULL,
  `equipment_appliances` text CHARACTER SET latin1,
  `expenses` int(11) DEFAULT NULL,
  `exterior_features` text CHARACTER SET latin1,
  `exterior_finish` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `fireplace` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `fireplace_desc` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `floor` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `furnishing` text CHARACTER SET latin1,
  `gated_community` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `hoa` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `hoa_dues` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `hoa_dues_term` text CHARACTER SET latin1,
  `home_style` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `home_view` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `home_warranty` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `interior_features` text CHARACTER SET latin1,
  `interior_improvements` text CHARACTER SET latin1,
  `latitude` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `longitude` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `lot_sqft` int(11) DEFAULT '0',
  `over_55` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `parking` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `past_photo_count` int(11) DEFAULT NULL,
  `pool` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `pool_features` text CHARACTER SET latin1,
  `photo_update` int(11) NOT NULL DEFAULT '0',
  `photo_count` int(11) DEFAULT NULL,
  `photo_timestamp` datetime DEFAULT NULL,
  `property_status` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `remarks` text CHARACTER SET latin1,
  `roof_type` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `split_yn` varchar(4) DEFAULT NULL,
  `subdivision` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `square_footage` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `tax_amount` int(11) DEFAULT NULL,
  `tax_year` int(11) DEFAULT NULL,
  `total_floors` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `utilities` text CHARACTER SET latin1 NOT NULL,
  `virtual_tour` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `waterfront` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `water_type` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `year_built` int(11) DEFAULT NULL,
  `short_sale` varchar(4) DEFAULT NULL,
  `garage` varchar(100) DEFAULT NULL,
  `halfbaths` varchar(45) DEFAULT NULL,
  `amenities` varchar(100) DEFAULT NULL,
  `dining_area` varchar(100) DEFAULT NULL,
  `security` varchar(100) DEFAULT NULL,
  `cooling` varchar(100) DEFAULT NULL,
  `heating` varchar(100) DEFAULT NULL,
  `water_footage` varchar(20) DEFAULT NULL,
  `design` varchar(100) DEFAULT NULL,
  `avail` varchar(100) DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `pets` varchar(100) DEFAULT NULL,
  `furn_ann_rent` varchar(10) NOT NULL,
  `furn_sea_rent` varchar(10) NOT NULL,
  `furn_offsea_rent` varchar(10) NOT NULL,
  `unfurn_ann_rent` varchar(10) NOT NULL,
  `unfurn_sea_rent` varchar(10) NOT NULL,
  `unfurn_offsea_rent` varchar(10) NOT NULL,
  `1st_deposit` varchar(10) NOT NULL,
  `last_deposit` varchar(10) NOT NULL,
  `pet_fee` varchar(10) NOT NULL,
  `tenant_pays` varchar(40) NOT NULL,
  `rent_date_avail` date NOT NULL,
  `app_fee` varchar(10) NOT NULL,
  `subdivision_amenities` varchar(200) NOT NULL,
  `rent_restrict` varchar(60) NOT NULL,
  `elem_school` varchar(50) NOT NULL,
  `middle_school` varchar(50) NOT NULL,
  `high_school` varchar(50) NOT NULL,
  `zoning` varchar(30) NOT NULL,
  `bank_owned` varchar(25) NOT NULL,
  `development` varchar(60) NOT NULL,
  `frontage` varchar(20) NOT NULL,
  `develop_status` varchar(50) NOT NULL,
  `tot_units` smallint(6) NOT NULL,
  `improvements` varchar(30) NOT NULL,
  `loc` varchar(40) NOT NULL,
  `loc_desc` varchar(100) NOT NULL,
  `master_bedbath` varchar(100) NOT NULL,
  `dock_boat_info` varchar(100) NOT NULL,
  `prop_misc` varchar(100) NOT NULL,
  `ada_info` varchar(100) NOT NULL,
  `index_photo` smallint(1) DEFAULT NULL,
  `ada_comp` varchar(100) NOT NULL,
  `boat_services` varchar(100) NOT NULL,
  `lot_desc` varchar(100) NOT NULL,
  `maint_fee_inc` varchar(50) NOT NULL,
  `restrictions` varchar(50) NOT NULL,
  `membership` varchar(80) NOT NULL,
  `rooms` varchar(80) NOT NULL,
  `special_info` varchar(128) NOT NULL,
  `tax_places` varchar(128) NOT NULL,
  `terms_considered` varchar(128) NOT NULL,
  `unit_desc` varchar(128) NOT NULL,
  `private_pool` varchar(100) NOT NULL,
  `sqft_living` double(9,2) NOT NULL,
  `sqft_tot` double(9,2) DEFAULT NULL,
  `fence_type` varchar(80) DEFAULT NULL,
  `landscape_desc` varchar(100) DEFAULT NULL,
  `sewer` varchar(50) DEFAULT NULL,
  `sid_lid_yn` varchar(1) DEFAULT NULL,
  `assessment_amount_type` varchar(10) DEFAULT NULL,
  `3_4_bath` varchar(11) DEFAULT NULL,
  `full_bath` varchar(11) DEFAULT NULL,
  `bath_down_desc` varchar(3) DEFAULT NULL,
  `sale_bonus` varchar(1) DEFAULT NULL,
  `builder_manu` varchar(40) DEFAULT NULL,
  `built_desc` varchar(100) DEFAULT NULL,
  `carport` int(11) DEFAULT NULL,
  `carport_desc` varchar(100) DEFAULT NULL,
  `contingency_desc` varchar(100) DEFAULT NULL,
  `accept_date` datetime DEFAULT NULL,
  `cooling_fuel` varchar(10) DEFAULT NULL,
  `2nd_bed_dim` varchar(5) DEFAULT NULL,
  `3rd_bed_dim` varchar(5) DEFAULT NULL,
  `4th_bed_dim` varchar(5) DEFAULT NULL,
  `5th_bed_dim` varchar(5) DEFAULT NULL,
  `5th_bed_desc` varchar(18) DEFAULT NULL,
  `fam_room_dim` varchar(5) DEFAULT NULL,
  `live_room_dim` varchar(5) DEFAULT NULL,
  `master_bed_dim` varchar(5) DEFAULT NULL,
  `dom` int(11) DEFAULT NULL,
  `earnest_depo` int(11) DEFAULT NULL,
  `assessment_yn` varchar(1) DEFAULT NULL,
  `conv_garage_yn` varchar(1) DEFAULT NULL,
  `ground_mount_yn` varchar(1) DEFAULT NULL,
  `internet_yn` varchar(1) DEFAULT NULL,
  `land_use` int(11) DEFAULT NULL,
  `last_trans_code` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_trans_date` datetime DEFAULT NULL,
  `listing_office_code` varchar(12) DEFAULT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `metro_map_coor` varchar(2) DEFAULT NULL,
  `metro_map_page` int(11) DEFAULT NULL,
  `original_list_price` decimal(14,2) DEFAULT NULL,
  `owner_licensee` varchar(10) DEFAULT NULL,
  `parcel_num` varchar(75) DEFAULT NULL,
  `den_other_num` int(11) DEFAULT NULL,
  `pool_length` int(11) DEFAULT NULL,
  `pool_width` int(11) DEFAULT NULL,
  `power_on_off` varchar(10) DEFAULT NULL,
  `previous_price` decimal(14,2) DEFAULT NULL,
  `property_cond` varchar(50) DEFAULT NULL,
  `legal_loc_range` int(11) DEFAULT NULL,
  `realtor_yn` varchar(1) DEFAULT NULL,
  `existing_rent` int(11) DEFAULT NULL,
  `buyer_broker` varchar(50) DEFAULT NULL,
  `yr_round_school` varchar(1) DEFAULT NULL,
  `legal_loc_section` int(3) DEFAULT NULL,
  `sid_lid_balance` int(11) DEFAULT NULL,
  `amount_owner_carry` int(11) DEFAULT NULL,
  `loft_num` int(11) DEFAULT NULL,
  `sold_term` varchar(7) DEFAULT NULL,
  `sold_price` decimal(14,2) DEFAULT NULL,
  `pv_spa_yn` varchar(1) DEFAULT NULL,
  `approx_liv_area` int(11) DEFAULT NULL,
  `legal_loc_town` int(50) DEFAULT NULL,
  `washer_dryer_loc` varchar(50) DEFAULT NULL,
  `fam_room_desc` varchar(24) DEFAULT NULL,
  `property_desc` varchar(100) DEFAULT NULL,
  `garage_desc` varchar(100) DEFAULT NULL,
  `spa_desc` varchar(100) DEFAULT NULL,
  `traffic_directions` varchar(300) DEFAULT NULL,
  `kitchen_desc` varchar(48) DEFAULT NULL,
  `live_room_desc` varchar(24) DEFAULT NULL,
  `master_bath_desc` varchar(30) DEFAULT NULL,
  `2nd_bed_desc` varchar(18) DEFAULT NULL,
  `3rd_bed_desc` varchar(18) DEFAULT NULL,
  `4th_bed_desc` varchar(18) DEFAULT NULL,
  `possession_desc` varchar(100) DEFAULT NULL,
  `financing` varchar(199) DEFAULT NULL,
  `show_additional` varchar(100) DEFAULT NULL,
  `oven_desc` varchar(100) DEFAULT NULL,
  `ranching` varchar(100) DEFAULT NULL,
  `misc_desc` varchar(200) DEFAULT NULL,
  `heating_fuel` varchar(50) DEFAULT NULL,
  `energy_save` varchar(100) DEFAULT NULL,
  `subdivision_num` int(11) DEFAULT NULL,
  `estate_lease_close_date` datetime DEFAULT NULL,
  `list_price_sqft` decimal(14,2) DEFAULT NULL,
  `unit_num` varchar(12) DEFAULT NULL,
  `bath_dwnstair_yn` varchar(1) DEFAULT NULL,
  `bed_dwnstair_yn` varchar(1) DEFAULT NULL,
  `building_desc` varchar(100) DEFAULT NULL,
  `building_num` varchar(8) DEFAULT NULL,
  `court_approv_yn` varchar(1) DEFAULT NULL,
  `fireplace_loc` varchar(50) DEFAULT NULL,
  `furnishing_desc` varchar(100) DEFAULT NULL,
  `great_room_yn` varchar(1) DEFAULT NULL,
  `great_room_dim` varchar(5) DEFAULT NULL,
  `great_room_desc` varchar(12) DEFAULT NULL,
  `inc_washer_yn` varchar(1) DEFAULT NULL,
  `inc_dryer_yn` varchar(1) DEFAULT NULL,
  `litigation` varchar(1) DEFAULT NULL,
  `ownership` varchar(3) DEFAULT NULL,
  `den_dim` varchar(5) DEFAULT '',
  `loft_dim` varchar(5) DEFAULT NULL,
  `loft_desc` varchar(50) DEFAULT NULL,
  `studio_yn` varchar(1) DEFAULT NULL,
  `public_address_yn` varchar(1) DEFAULT NULL,
  `public_address` varchar(100) DEFAULT NULL,
  `commentary_yn` varchar(1) DEFAULT NULL,
  `accessibility_desc` varchar(168) DEFAULT NULL,
  `water_heat_desc` varchar(100) DEFAULT NULL,
  `dishwasher_inc` varchar(1) DEFAULT NULL,
  `disposal_inc` varchar(1) DEFAULT NULL,
  `fridge_inc` varchar(1) DEFAULT NULL,
  `solar` varchar(50) DEFAULT NULL,
  `active_DOM` int(11) DEFAULT NULL,
  `house_faces` varchar(10) DEFAULT NULL,
  `floor_num` int(11) DEFAULT NULL,
  `last_change_type` varchar(50) DEFAULT NULL,
  `last_change_date` date DEFAULT NULL,
  `lot_acres` float DEFAULT NULL,
  `last_status` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`,`sysid`,`listing_entry_timestamp`,`postal_code`),
  KEY `listing_id` (`listing_id`) USING BTREE,
  KEY `city` (`city`),
  FULLTEXT KEY `property_type` (`property_type`),
  FULLTEXT KEY `subdivision` (`subdivision`),
  FULLTEXT KEY `listing_area` (`listing_area`),
  FULLTEXT KEY `property_sub_type` (`property_sub_type`)
) ENGINE=MyISAM AUTO_INCREMENT=10315 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `master_rets_table_update`
-- ----------------------------
DROP TABLE IF EXISTS `master_rets_table_update`;
CREATE TABLE `master_rets_table_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sysid` varchar(20) NOT NULL,
  `agent_id` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `rets_system` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `rets_key` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `listing_id` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `property_type` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `property_sub_type` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `listing_area` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `listing_price` int(11) DEFAULT NULL,
  `listing_date` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_entry_timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `listing_office_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_fax` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_url` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_address` text CHARACTER SET latin1 NOT NULL,
  `listing_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `street_number` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `street_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `street_dir` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `street_suffix` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `state_province` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `postal_code` varchar(9) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `additional_rooms` text CHARACTER SET latin1,
  `bathrooms` int(11) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `county` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `construction` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dwelling_view` varchar(50) DEFAULT NULL,
  `equipment_appliances` text CHARACTER SET latin1,
  `expenses` int(11) DEFAULT NULL,
  `exterior_features` text CHARACTER SET latin1,
  `exterior_finish` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `fireplace` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `fireplace_desc` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `floor` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `furnishing` text CHARACTER SET latin1,
  `gated_community` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `hoa` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `hoa_dues` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `hoa_dues_term` text CHARACTER SET latin1,
  `home_style` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `home_view` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `home_warranty` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `interior_features` text CHARACTER SET latin1,
  `interior_improvements` text CHARACTER SET latin1,
  `latitude` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `longitude` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `lot_sqft` int(11) DEFAULT '0',
  `over_55` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `parking` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `past_photo_count` int(11) DEFAULT NULL,
  `pool` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `pool_features` text CHARACTER SET latin1,
  `photo_update` int(11) NOT NULL DEFAULT '0',
  `photo_count` int(11) DEFAULT NULL,
  `photo_timestamp` datetime DEFAULT NULL,
  `property_status` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `remarks` text CHARACTER SET latin1,
  `roof_type` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `split_yn` varchar(4) DEFAULT NULL,
  `subdivision` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `square_footage` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `tax_amount` int(11) DEFAULT NULL,
  `tax_year` int(11) DEFAULT NULL,
  `total_floors` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `utilities` text CHARACTER SET latin1 NOT NULL,
  `virtual_tour` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `waterfront` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `water_type` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `year_built` int(11) DEFAULT NULL,
  `short_sale` varchar(4) DEFAULT NULL,
  `garage` varchar(100) DEFAULT NULL,
  `halfbaths` varchar(45) DEFAULT NULL,
  `amenities` varchar(100) DEFAULT NULL,
  `dining_area` varchar(100) DEFAULT NULL,
  `security` varchar(100) DEFAULT NULL,
  `cooling` varchar(100) DEFAULT NULL,
  `heating` varchar(100) DEFAULT NULL,
  `water_footage` varchar(20) DEFAULT NULL,
  `design` varchar(100) DEFAULT NULL,
  `avail` varchar(100) DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `pets` varchar(100) DEFAULT NULL,
  `furn_ann_rent` varchar(10) NOT NULL,
  `furn_sea_rent` varchar(10) NOT NULL,
  `furn_offsea_rent` varchar(10) NOT NULL,
  `unfurn_ann_rent` varchar(10) NOT NULL,
  `unfurn_sea_rent` varchar(10) NOT NULL,
  `unfurn_offsea_rent` varchar(10) NOT NULL,
  `1st_deposit` varchar(10) NOT NULL,
  `last_deposit` varchar(10) NOT NULL,
  `pet_fee` varchar(10) NOT NULL,
  `tenant_pays` varchar(40) NOT NULL,
  `rent_date_avail` date NOT NULL,
  `app_fee` varchar(10) NOT NULL,
  `subdivision_amenities` varchar(200) NOT NULL,
  `rent_restrict` varchar(60) NOT NULL,
  `elem_school` varchar(50) NOT NULL,
  `middle_school` varchar(50) NOT NULL,
  `high_school` varchar(50) NOT NULL,
  `zoning` varchar(30) NOT NULL,
  `bank_owned` varchar(25) NOT NULL,
  `development` varchar(60) NOT NULL,
  `frontage` varchar(20) NOT NULL,
  `develop_status` varchar(50) NOT NULL,
  `tot_units` smallint(6) NOT NULL,
  `improvements` varchar(30) NOT NULL,
  `loc` varchar(40) NOT NULL,
  `loc_desc` varchar(100) NOT NULL,
  `master_bedbath` varchar(100) NOT NULL,
  `dock_boat_info` varchar(100) NOT NULL,
  `prop_misc` varchar(100) NOT NULL,
  `ada_info` varchar(100) NOT NULL,
  `index_photo` smallint(1) DEFAULT NULL,
  `ada_comp` varchar(100) NOT NULL,
  `boat_services` varchar(100) NOT NULL,
  `lot_desc` varchar(100) NOT NULL,
  `maint_fee_inc` varchar(50) NOT NULL,
  `restrictions` varchar(50) NOT NULL,
  `membership` varchar(80) NOT NULL,
  `rooms` varchar(80) NOT NULL,
  `special_info` varchar(128) NOT NULL,
  `tax_places` varchar(128) NOT NULL,
  `terms_considered` varchar(128) NOT NULL,
  `unit_desc` varchar(128) NOT NULL,
  `private_pool` varchar(100) NOT NULL,
  `sqft_living` double(9,2) NOT NULL,
  `sqft_tot` double(9,2) DEFAULT NULL,
  `fence_type` varchar(80) DEFAULT NULL,
  `landscape_desc` varchar(100) DEFAULT NULL,
  `sewer` varchar(50) DEFAULT NULL,
  `sid_lid_yn` varchar(1) DEFAULT NULL,
  `assessment_amount_type` varchar(10) DEFAULT NULL,
  `3_4_bath` varchar(11) DEFAULT NULL,
  `full_bath` varchar(11) DEFAULT NULL,
  `bath_down_desc` varchar(3) DEFAULT NULL,
  `sale_bonus` varchar(1) DEFAULT NULL,
  `builder_manu` varchar(40) DEFAULT NULL,
  `built_desc` varchar(100) DEFAULT NULL,
  `carport` int(11) DEFAULT NULL,
  `carport_desc` varchar(100) DEFAULT NULL,
  `contingency_desc` varchar(100) DEFAULT NULL,
  `accept_date` datetime DEFAULT NULL,
  `cooling_fuel` varchar(10) DEFAULT NULL,
  `2nd_bed_dim` varchar(5) DEFAULT NULL,
  `3rd_bed_dim` varchar(5) DEFAULT NULL,
  `4th_bed_dim` varchar(5) DEFAULT NULL,
  `5th_bed_dim` varchar(5) DEFAULT NULL,
  `5th_bed_desc` varchar(18) DEFAULT NULL,
  `fam_room_dim` varchar(5) DEFAULT NULL,
  `live_room_dim` varchar(5) DEFAULT NULL,
  `master_bed_dim` varchar(5) DEFAULT NULL,
  `dom` int(11) DEFAULT NULL,
  `earnest_depo` int(11) DEFAULT NULL,
  `assessment_yn` varchar(1) DEFAULT NULL,
  `conv_garage_yn` varchar(1) DEFAULT NULL,
  `ground_mount_yn` varchar(1) DEFAULT NULL,
  `internet_yn` varchar(1) DEFAULT NULL,
  `land_use` int(11) DEFAULT NULL,
  `last_trans_code` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_trans_date` datetime DEFAULT NULL,
  `listing_office_code` varchar(12) DEFAULT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `metro_map_coor` varchar(2) DEFAULT NULL,
  `metro_map_page` int(11) DEFAULT NULL,
  `original_list_price` decimal(14,2) DEFAULT NULL,
  `owner_licensee` varchar(10) DEFAULT NULL,
  `parcel_num` varchar(75) DEFAULT NULL,
  `den_other_num` int(11) DEFAULT NULL,
  `pool_length` int(11) DEFAULT NULL,
  `pool_width` int(11) DEFAULT NULL,
  `power_on_off` varchar(10) DEFAULT NULL,
  `previous_price` decimal(14,2) DEFAULT NULL,
  `property_cond` varchar(50) DEFAULT NULL,
  `legal_loc_range` int(11) DEFAULT NULL,
  `realtor_yn` varchar(1) DEFAULT NULL,
  `existing_rent` int(11) DEFAULT NULL,
  `buyer_broker` varchar(50) DEFAULT NULL,
  `yr_round_school` varchar(1) DEFAULT NULL,
  `legal_loc_section` int(3) DEFAULT NULL,
  `sid_lid_balance` int(11) DEFAULT NULL,
  `amount_owner_carry` int(11) DEFAULT NULL,
  `loft_num` int(11) DEFAULT NULL,
  `sold_term` varchar(7) DEFAULT NULL,
  `sold_price` decimal(14,2) DEFAULT NULL,
  `pv_spa_yn` varchar(1) DEFAULT NULL,
  `approx_liv_area` int(11) DEFAULT NULL,
  `legal_loc_town` int(50) DEFAULT NULL,
  `washer_dryer_loc` varchar(50) DEFAULT NULL,
  `fam_room_desc` varchar(24) DEFAULT NULL,
  `property_desc` varchar(100) DEFAULT NULL,
  `garage_desc` varchar(100) DEFAULT NULL,
  `spa_desc` varchar(100) DEFAULT NULL,
  `traffic_directions` varchar(300) DEFAULT NULL,
  `kitchen_desc` varchar(48) DEFAULT NULL,
  `live_room_desc` varchar(24) DEFAULT NULL,
  `master_bath_desc` varchar(30) DEFAULT NULL,
  `2nd_bed_desc` varchar(18) DEFAULT NULL,
  `3rd_bed_desc` varchar(18) DEFAULT NULL,
  `4th_bed_desc` varchar(18) DEFAULT NULL,
  `possession_desc` varchar(100) DEFAULT NULL,
  `financing` varchar(199) DEFAULT NULL,
  `show_additional` varchar(100) DEFAULT NULL,
  `oven_desc` varchar(100) DEFAULT NULL,
  `ranching` varchar(100) DEFAULT NULL,
  `misc_desc` varchar(200) DEFAULT NULL,
  `heating_fuel` varchar(50) DEFAULT NULL,
  `energy_save` varchar(100) DEFAULT NULL,
  `subdivision_num` int(11) DEFAULT NULL,
  `estate_lease_close_date` datetime DEFAULT NULL,
  `list_price_sqft` decimal(14,2) DEFAULT NULL,
  `unit_num` varchar(12) DEFAULT NULL,
  `bath_dwnstair_yn` varchar(1) DEFAULT NULL,
  `bed_dwnstair_yn` varchar(1) DEFAULT NULL,
  `building_desc` varchar(100) DEFAULT NULL,
  `building_num` varchar(8) DEFAULT NULL,
  `court_approv_yn` varchar(1) DEFAULT NULL,
  `fireplace_loc` varchar(50) DEFAULT NULL,
  `furnishing_desc` varchar(100) DEFAULT NULL,
  `great_room_yn` varchar(1) DEFAULT NULL,
  `great_room_dim` varchar(5) DEFAULT NULL,
  `great_room_desc` varchar(12) DEFAULT NULL,
  `inc_washer_yn` varchar(1) DEFAULT NULL,
  `inc_dryer_yn` varchar(1) DEFAULT NULL,
  `litigation` varchar(1) DEFAULT NULL,
  `ownership` varchar(3) DEFAULT NULL,
  `den_dim` varchar(5) DEFAULT '',
  `loft_dim` varchar(5) DEFAULT NULL,
  `loft_desc` varchar(50) DEFAULT NULL,
  `studio_yn` varchar(1) DEFAULT NULL,
  `public_address_yn` varchar(1) DEFAULT NULL,
  `public_address` varchar(100) DEFAULT NULL,
  `commentary_yn` varchar(1) DEFAULT NULL,
  `accessibility_desc` varchar(168) DEFAULT NULL,
  `water_heat_desc` varchar(100) DEFAULT NULL,
  `dishwasher_inc` varchar(1) DEFAULT NULL,
  `disposal_inc` varchar(1) DEFAULT NULL,
  `fridge_inc` varchar(1) DEFAULT NULL,
  `solar` varchar(50) DEFAULT NULL,
  `active_DOM` int(11) DEFAULT NULL,
  `house_faces` varchar(10) DEFAULT NULL,
  `floor_num` int(11) DEFAULT NULL,
  `last_change_type` varchar(50) DEFAULT NULL,
  `last_change_date` date DEFAULT NULL,
  `lot_acres` float DEFAULT NULL,
  `last_status` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`,`sysid`,`listing_entry_timestamp`,`postal_code`),
  KEY `listing_id` (`listing_id`) USING BTREE,
  KEY `city` (`city`),
  FULLTEXT KEY `property_type` (`property_type`),
  FULLTEXT KEY `subdivision` (`subdivision`),
  FULLTEXT KEY `listing_area` (`listing_area`),
  FULLTEXT KEY `property_sub_type` (`property_sub_type`)
) ENGINE=MyISAM AUTO_INCREMENT=20712 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `mrt_bu`
-- ----------------------------
DROP TABLE IF EXISTS `mrt_bu`;
CREATE TABLE `mrt_bu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sysid` varchar(20) NOT NULL,
  `agent_id` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `rets_system` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `rets_key` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `listing_id` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `property_type` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `property_sub_type` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `listing_area` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `listing_price` int(11) DEFAULT NULL,
  `listing_date` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_entry_timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `listing_office_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_fax` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_url` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_address` text CHARACTER SET latin1 NOT NULL,
  `listing_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `street_number` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `street_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `street_dir` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `street_suffix` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `state_province` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `postal_code` varchar(9) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `additional_rooms` text CHARACTER SET latin1,
  `bathrooms` int(11) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `county` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `construction` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dwelling_view` varchar(50) DEFAULT NULL,
  `equipment_appliances` text CHARACTER SET latin1,
  `expenses` int(11) DEFAULT NULL,
  `exterior_features` text CHARACTER SET latin1,
  `exterior_finish` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `fireplace` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `fireplace_desc` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `floor` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `furnishing` text CHARACTER SET latin1,
  `gated_community` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `hoa` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `hoa_dues` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `hoa_dues_term` text CHARACTER SET latin1,
  `home_style` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `home_view` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `home_warranty` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `interior_features` text CHARACTER SET latin1,
  `interior_improvements` text CHARACTER SET latin1,
  `latitude` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `longitude` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `lot_sqft` int(11) DEFAULT '0',
  `over_55` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `parking` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `past_photo_count` int(11) DEFAULT NULL,
  `pool` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `pool_features` text CHARACTER SET latin1,
  `photo_update` int(11) NOT NULL DEFAULT '0',
  `photo_count` int(11) DEFAULT NULL,
  `photo_timestamp` datetime DEFAULT NULL,
  `property_status` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `remarks` text CHARACTER SET latin1,
  `roof_type` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `split_yn` varchar(4) DEFAULT NULL,
  `subdivision` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `square_footage` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `tax_amount` int(11) DEFAULT NULL,
  `tax_year` int(11) DEFAULT NULL,
  `total_floors` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `utilities` text CHARACTER SET latin1 NOT NULL,
  `virtual_tour` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `waterfront` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `water_type` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `year_built` int(11) DEFAULT NULL,
  `short_sale` varchar(4) DEFAULT NULL,
  `garage` varchar(100) DEFAULT NULL,
  `halfbaths` varchar(45) DEFAULT NULL,
  `amenities` varchar(100) DEFAULT NULL,
  `dining_area` varchar(100) DEFAULT NULL,
  `security` varchar(100) DEFAULT NULL,
  `cooling` varchar(100) DEFAULT NULL,
  `heating` varchar(100) DEFAULT NULL,
  `water_footage` varchar(20) DEFAULT NULL,
  `design` varchar(100) DEFAULT NULL,
  `avail` varchar(100) DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `pets` varchar(100) DEFAULT NULL,
  `furn_ann_rent` varchar(10) NOT NULL,
  `furn_sea_rent` varchar(10) NOT NULL,
  `furn_offsea_rent` varchar(10) NOT NULL,
  `unfurn_ann_rent` varchar(10) NOT NULL,
  `unfurn_sea_rent` varchar(10) NOT NULL,
  `unfurn_offsea_rent` varchar(10) NOT NULL,
  `1st_deposit` varchar(10) NOT NULL,
  `last_deposit` varchar(10) NOT NULL,
  `pet_fee` varchar(10) NOT NULL,
  `tenant_pays` varchar(40) NOT NULL,
  `rent_date_avail` date NOT NULL,
  `app_fee` varchar(10) NOT NULL,
  `subdivision_amenities` varchar(200) NOT NULL,
  `rent_restrict` varchar(60) NOT NULL,
  `elem_school` varchar(50) NOT NULL,
  `middle_school` varchar(50) NOT NULL,
  `high_school` varchar(50) NOT NULL,
  `zoning` varchar(30) NOT NULL,
  `bank_owned` varchar(25) NOT NULL,
  `development` varchar(60) NOT NULL,
  `frontage` varchar(20) NOT NULL,
  `develop_status` varchar(50) NOT NULL,
  `tot_units` smallint(6) NOT NULL,
  `improvements` varchar(30) NOT NULL,
  `loc` varchar(40) NOT NULL,
  `loc_desc` varchar(100) NOT NULL,
  `master_bedbath` varchar(100) NOT NULL,
  `dock_boat_info` varchar(100) NOT NULL,
  `prop_misc` varchar(100) NOT NULL,
  `ada_info` varchar(100) NOT NULL,
  `index_photo` smallint(1) DEFAULT NULL,
  `ada_comp` varchar(100) NOT NULL,
  `boat_services` varchar(100) NOT NULL,
  `lot_desc` varchar(100) NOT NULL,
  `maint_fee_inc` varchar(50) NOT NULL,
  `restrictions` varchar(50) NOT NULL,
  `membership` varchar(80) NOT NULL,
  `rooms` varchar(80) NOT NULL,
  `special_info` varchar(128) NOT NULL,
  `tax_places` varchar(128) NOT NULL,
  `terms_considered` varchar(128) NOT NULL,
  `unit_desc` varchar(128) NOT NULL,
  `private_pool` varchar(100) NOT NULL,
  `sqft_living` double(9,2) NOT NULL,
  `sqft_tot` double(9,2) DEFAULT NULL,
  `fence_type` varchar(80) DEFAULT NULL,
  `landscape_desc` varchar(100) DEFAULT NULL,
  `sewer` varchar(50) DEFAULT NULL,
  `sid_lid_yn` varchar(1) DEFAULT NULL,
  `assessment_amount_type` varchar(10) DEFAULT NULL,
  `3_4_bath` varchar(11) DEFAULT NULL,
  `full_bath` varchar(11) DEFAULT NULL,
  `bath_down_desc` varchar(3) DEFAULT NULL,
  `sale_bonus` varchar(1) DEFAULT NULL,
  `builder_manu` varchar(40) DEFAULT NULL,
  `built_desc` varchar(100) DEFAULT NULL,
  `carport` int(11) DEFAULT NULL,
  `carport_desc` varchar(100) DEFAULT NULL,
  `contingency_desc` varchar(100) DEFAULT NULL,
  `accept_date` datetime DEFAULT NULL,
  `cooling_fuel` varchar(10) DEFAULT NULL,
  `2nd_bed_dim` varchar(5) DEFAULT NULL,
  `3rd_bed_dim` varchar(5) DEFAULT NULL,
  `4th_bed_dim` varchar(5) DEFAULT NULL,
  `5th_bed_dim` varchar(5) DEFAULT NULL,
  `5th_bed_desc` varchar(18) DEFAULT NULL,
  `fam_room_dim` varchar(5) DEFAULT NULL,
  `live_room_dim` varchar(5) DEFAULT NULL,
  `master_bed_dim` varchar(5) DEFAULT NULL,
  `dom` int(11) DEFAULT NULL,
  `earnest_depo` int(11) DEFAULT NULL,
  `assessment_yn` varchar(1) DEFAULT NULL,
  `conv_garage_yn` varchar(1) DEFAULT NULL,
  `ground_mount_yn` varchar(1) DEFAULT NULL,
  `internet_yn` varchar(1) DEFAULT NULL,
  `land_use` int(11) DEFAULT NULL,
  `last_trans_code` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_trans_date` datetime DEFAULT NULL,
  `listing_office_code` varchar(12) DEFAULT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `metro_map_coor` varchar(2) DEFAULT NULL,
  `metro_map_page` int(11) DEFAULT NULL,
  `original_list_price` decimal(14,2) DEFAULT NULL,
  `owner_licensee` varchar(10) DEFAULT NULL,
  `parcel_num` varchar(75) DEFAULT NULL,
  `den_other_num` int(11) DEFAULT NULL,
  `pool_length` int(11) DEFAULT NULL,
  `pool_width` int(11) DEFAULT NULL,
  `power_on_off` varchar(10) DEFAULT NULL,
  `previous_price` decimal(14,2) DEFAULT NULL,
  `property_cond` varchar(50) DEFAULT NULL,
  `legal_loc_range` int(11) DEFAULT NULL,
  `realtor_yn` varchar(1) DEFAULT NULL,
  `existing_rent` int(11) DEFAULT NULL,
  `buyer_broker` varchar(50) DEFAULT NULL,
  `yr_round_school` varchar(1) DEFAULT NULL,
  `legal_loc_section` int(3) DEFAULT NULL,
  `sid_lid_balance` int(11) DEFAULT NULL,
  `amount_owner_carry` int(11) DEFAULT NULL,
  `loft_num` int(11) DEFAULT NULL,
  `sold_term` varchar(7) DEFAULT NULL,
  `sold_price` decimal(14,2) DEFAULT NULL,
  `pv_spa_yn` varchar(1) DEFAULT NULL,
  `approx_liv_area` int(11) DEFAULT NULL,
  `legal_loc_town` int(50) DEFAULT NULL,
  `washer_dryer_loc` varchar(50) DEFAULT NULL,
  `fam_room_desc` varchar(24) DEFAULT NULL,
  `property_desc` varchar(100) DEFAULT NULL,
  `garage_desc` varchar(100) DEFAULT NULL,
  `spa_desc` varchar(100) DEFAULT NULL,
  `traffic_directions` varchar(300) DEFAULT NULL,
  `kitchen_desc` varchar(48) DEFAULT NULL,
  `live_room_desc` varchar(24) DEFAULT NULL,
  `master_bath_desc` varchar(30) DEFAULT NULL,
  `2nd_bed_desc` varchar(18) DEFAULT NULL,
  `3rd_bed_desc` varchar(18) DEFAULT NULL,
  `4th_bed_desc` varchar(18) DEFAULT NULL,
  `possession_desc` varchar(100) DEFAULT NULL,
  `financing` varchar(199) DEFAULT NULL,
  `show_additional` varchar(100) DEFAULT NULL,
  `oven_desc` varchar(100) DEFAULT NULL,
  `ranching` varchar(100) DEFAULT NULL,
  `misc_desc` varchar(200) DEFAULT NULL,
  `heating_fuel` varchar(50) DEFAULT NULL,
  `energy_save` varchar(100) DEFAULT NULL,
  `subdivision_num` int(11) DEFAULT NULL,
  `estate_lease_close_date` datetime DEFAULT NULL,
  `list_price_sqft` decimal(14,2) DEFAULT NULL,
  `unit_num` varchar(12) DEFAULT NULL,
  `bath_dwnstair_yn` varchar(1) DEFAULT NULL,
  `bed_dwnstair_yn` varchar(1) DEFAULT NULL,
  `building_desc` varchar(100) DEFAULT NULL,
  `building_num` varchar(8) DEFAULT NULL,
  `court_approv_yn` varchar(1) DEFAULT NULL,
  `fireplace_loc` varchar(50) DEFAULT NULL,
  `furnishing_desc` varchar(100) DEFAULT NULL,
  `great_room_yn` varchar(1) DEFAULT NULL,
  `great_room_dim` varchar(5) DEFAULT NULL,
  `great_room_desc` varchar(12) DEFAULT NULL,
  `inc_washer_yn` varchar(1) DEFAULT NULL,
  `inc_dryer_yn` varchar(1) DEFAULT NULL,
  `litigation` varchar(1) DEFAULT NULL,
  `ownership` varchar(3) DEFAULT NULL,
  `den_dim` varchar(5) DEFAULT '',
  `loft_dim` varchar(5) DEFAULT NULL,
  `loft_desc` varchar(50) DEFAULT NULL,
  `studio_yn` varchar(1) DEFAULT NULL,
  `public_address_yn` varchar(1) DEFAULT NULL,
  `public_address` varchar(100) DEFAULT NULL,
  `commentary_yn` varchar(1) DEFAULT NULL,
  `accessibility_desc` varchar(168) DEFAULT NULL,
  `water_heat_desc` varchar(100) DEFAULT NULL,
  `dishwasher_inc` varchar(1) DEFAULT NULL,
  `disposal_inc` varchar(1) DEFAULT NULL,
  `fridge_inc` varchar(1) DEFAULT NULL,
  `solar` varchar(50) DEFAULT NULL,
  `active_DOM` int(11) DEFAULT NULL,
  `house_faces` varchar(10) DEFAULT NULL,
  `floor_num` int(11) DEFAULT NULL,
  `last_change_type` varchar(50) DEFAULT NULL,
  `last_change_date` date DEFAULT NULL,
  `lot_acres` float DEFAULT NULL,
  `last_status` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`,`sysid`,`listing_entry_timestamp`,`postal_code`),
  KEY `listing_id` (`listing_id`) USING BTREE,
  KEY `city` (`city`),
  FULLTEXT KEY `property_type` (`property_type`),
  FULLTEXT KEY `subdivision` (`subdivision`),
  FULLTEXT KEY `listing_area` (`listing_area`),
  FULLTEXT KEY `property_sub_type` (`property_sub_type`)
) ENGINE=MyISAM AUTO_INCREMENT=20824 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `content` text NOT NULL,
  `keywords` text,
  `author` varchar(55) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `youtube_id` varchar(15) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `source_link` text,
  `short_description` varchar(255) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for `news_category`
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of news_category
-- ----------------------------

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(55) NOT NULL,
  `page_title` varchar(155) NOT NULL,
  `page_keywords` text,
  `page_description` text,
  `page_text` text,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of pages
-- ----------------------------

-- ----------------------------
-- Table structure for `photo_dl_info`
-- ----------------------------
DROP TABLE IF EXISTS `photo_dl_info`;
CREATE TABLE `photo_dl_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `start_time_db_ts` timestamp NULL DEFAULT NULL,
  `end_time_db_ts` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo_dl_info
-- ----------------------------
INSERT INTO `photo_dl_info` VALUES ('6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', null, null);
INSERT INTO `photo_dl_info` VALUES ('7', '2017-05-11 13:04:41', '0000-00-00 00:00:00', '2017-06-01 07:15:54', '2017-05-11 15:11:27');
INSERT INTO `photo_dl_info` VALUES ('13', '2017-06-02 09:49:34', '2017-06-02 13:10:30', '2017-06-02 13:20:48', '2017-06-01 09:51:17');
INSERT INTO `photo_dl_info` VALUES ('20', '2017-06-03 08:44:15', null, null, null);

-- ----------------------------
-- Table structure for `rxwiki`
-- ----------------------------
DROP TABLE IF EXISTS `rxwiki`;
CREATE TABLE `rxwiki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rxwiki
-- ----------------------------
INSERT INTO `rxwiki` VALUES ('1', 'Brashear&#39;s Pharmacy', 'www.brashearspharmacy.com', 'Brashear&#39;s Pharmacy Â· Team.<b>png</b> Â· Services.<b>png</b> Â· Refill.<b>png</b> Â· Compounding.<b>png</b> Â· \nHealth-News.<b>png</b> ... Lecanto: P: (352) 746-3420. <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('2', 'Services - Hilton Family Pharmacy', 'www.hiltonfamilypharmacy.com', '... Shower and Bath items; Greeting Cards; Candles; Jewelry. p: (585) 392-7979. f\n: (585) 392-2256. hfp@hiltonfamilypharmacy.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('3', 'Refill a Prescription - Meadow Valley Pharmacy', 'www.mvpharmacy.com', 'Pickup. Mail. Delivery. Comments: I agree to Terms and Conditions. p: (775) 726-\n3771. f: (775) 726-3685. pharmacymv@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('4', '<b>RxWiki</b>: Medication Information and Prescription Drug News', 'www.rxwiki.com', 'The most updated news about prescription drugs, over the counter drugs, natural \nmedications, side effects, drug interactions and warnings.');
INSERT INTO `rxwiki` VALUES ('5', 'Find My Rx - HealthRidge Pharmacy', 'www.healthridgepharmacy.com', 'HealthRidge Pharmacy Â· Home Â· Team Â· Services Â· â–¸Find My Rx Â· Refill Â· Hours &amp; \nLocation. p: (828) 669-9970. <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('6', 'About Us - Barnes &amp; Williams Drug Center', 'www.bwdrug.com', '... art along with the cooperative purchasing <b>power</b> of thousands of independent \npharmacies in the United States to compete price wise ... <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('7', 'Refill a Prescription - Hidenwood Pharmacy Inc', 'hidenwoodrx.com', 'Pickup. Delivery. Comments: I agree to Terms and Conditions. p: (757) 595-1151. \nf: (757) 599-3202. hidenwoodrx@verizon.net Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('8', 'Rx Search - Mace&#39;s Pharmacy', 'www.macespharmacy.com', '... â–¸Rx Search Â· Refill Â· Mobile Â· Contact â–¾ Â· Belington Â· Philippi. p: (304) 457-4233\n. f: (304) 457-6760. emailus@macespharmacy.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('9', 'Compounding Services - University Pharmacy', 'www.myuniversitypharmacy.com', 'p: (313) 831-2008. f: (313) 831-2122. info@myuniversitypharmacy.com Â· \n<b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('10', 'Compounding Services - Gore Drug', 'www.goredrug.com', '... of all prescriptions are compounded by pharmacists on a daily basis. p: 918-\n489-5558. f: 918-489-5359. goredrug@mac.com Â· Privacy Â· <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('11', 'Gifts - Medical Center West Pharmacy', 'www.medicalcenterwestpharmacy.com', '... your own home or as a gift to brighten someone else&#39;s day. p: (706) 854-2424. f\n: (706) 854-2425. MCWP2003@HOTMAIL.COM Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('12', 'Vic Vena Pharmacy', 'www.vicvenapharmacy.com', 'Screen Shot 2015-03-23 at 2.46.47 PM.<b>png</b>. Welcome to Vic Vena Pharmacy! We\n&#39;ve been serving ... vicvenapharmacy@yahoo.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('13', 'Daniel Pharmacy', 'www.danielpharmacy.com', '... if it is disabled in your browser. Services (1).<b>png</b> Â· Location (1).<b>png</b>. Refill (1).\n<b>png</b>. google.<b>png</b>. 560.<b>png</b>. overlay.<b>png</b>. <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>. prevnext. close.');
INSERT INTO `rxwiki` VALUES ('14', 'Taylor&#39;s Drug Store: Pharmacy in Madison', 'www.taylorsdrugstore.com', 'Locally Owned and <b>Operated</b>. Taylor&#39;s Drug Store in downtown Madison, Maine, \nhas ... 100 years! p: (207) 696-3935. f: (207) 696-0827. <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('15', 'The Medicine Center - Lindenhurst: Pharmacy in Lindenhurst', 'www.themedcenterrx.com', 'About.<b>png</b> Â· Services.<b>png</b> Â· Health-News.<b>png</b> Â· Mobile.<b>png</b> Â· Rx-Search.<b>png</b> Â· \nResources.<b>png</b> Â· Refill.<b>png</b> Â· Contact-(labeled).<b>png</b> ... <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('16', 'Mobile - Grubb&#39;s NW Specialty Pharmacy', 'www.grubbsnw.com', 'graphics_App Icon (13).<b>png</b> ... in the App Store or Google play, or click an icon \nbelow and download today. gp1.<b>png</b> Â· ios1.<b>png</b>. p: (202) ... <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('17', 'Mobile - Lakeside Pharmacy &amp; Market', 'www.lakesidepharm.com', 'lakeside mobile.<b>png</b> ... Search &quot;Lakeside Market Pharmacy&quot; in the App Store or \nGoogle play. gp1.<b>png</b> Â· ios1.<b>png</b>. p: (715) 623-4444 ... <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('18', 'Wynne Apothecary: Wynne Pharmacy', 'www.wynneapothecary.com', 'We hope you&#39;ll enjoy shopping at Wynne Apothecary. It will always be our \npleasure to serve you. p: (870) 238-8511. f: (870) 238-2135. <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('19', 'Mobile - Curtis Pharmacy', 'www.curtispharmacy.com', '550.<b>png</b> ... in the Apple App store or Google play to download, or click the icon for \nyour mobile device below! gp1.<b>png</b>. ios1.<b>png</b> ... <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('20', 'Diabetic Services - Rocky Mountain Pharmacy', 'www.rockymountainpharmacy.com', '... pressure, and blood sugar (testing by appointment only). p: (970) 586-1930. f: (\n970) 586-0455. hello@rockymountainpharmacy.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('21', 'The Chemist Shoppe', 'www.thechemistshoppe.com', 'The Chemist Shoppe Â· About.<b>png</b> Â· Services.<b>png</b> Â· Health-News.<b>png</b> Â· Rx-Search.\n<b>png</b> Â· Refill.<b>png</b> Â· Mobile.<b>png</b> Â· Contact-(labeled).<b>png</b> ... <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('22', 'about us - Clinton Drug Company', 'www.clintondrugco.com', 'health mart logo.<b>png</b> ... within 15 minutes! Visit us for all your healthcare needs! p\n: (910) 592-8444. f: (910) 592-6505. cdc@intrstar.net Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('23', 'Compounding - Stone Oak Pharmacy', 'www.stoneoakpharmacy.net', '... good source is your compounding pharmacist.more. p: (210) 494-4272. f: (210) \n494-0200. mypharmacy@stoneoakpharmacy.net Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('24', 'Med Synchronization - Pharm A Save Monroe', 'www.pharmasavemonroe.com', 'p: (360) 794-7351. f: (360) 805-5271. pharmasave2@pasmonroe.com Â· Check \nout Pharm-A-Save Monroe on Yelp. <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>. Web Analytics.');
INSERT INTO `rxwiki` VALUES ('25', 'About Us - Pharm A Save Monroe', 'www.pharmasavemonroe.com', 'We are a locally owned and <b>operated</b> independent pharmacy and Medical \nSupply company, taking pride in offering our customers ... <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('26', 'Pharmacy Services - Tayloe&#39;s Hospital Pharmacy', 'www.tayloeshospitalpharmacy.com', '... Infant Care; Hair Care; Shower and Bath Items. p: (252) 946-4113. f: (252) 946-\n9552. hospitalpharmacy@embarqmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('27', 'About Us - The Medicine Shoppe Aliquippa', 'www.medicineshoppealiquippa.com', '... competitive prices for those without prescription insurance. p: (724) 375-5561. f\n: (724) 378-8826. agpharmacy@comcast.net Â· Privacy Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('28', 'Contact - Beverly Hills Medical Plaza Pharmacy', 'www.bhmpp.com', 'Services.<b>png</b> Â· specialty.<b>png</b> Â· community.<b>png</b> Â· clinical-trials.<b>png</b> Â· press.<b>png</b> Â· \nRefill.<b>png</b> Â· Mobile.<b>png</b> Â· Contact-(labeled).<b>png</b> ... <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('29', 'About My Meds - Alps Pharmacy', 'www.alpspharmacy.com', '<b>RxWiki&#39;s</b> full encyclopedia at your fingertips. 2650 W. Kearney Street; Springfield, \nMO 65803 ... 8am-5:30pm; Sat - Closed; Sun - Closed. <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('30', 'Team - Frank&#39;s Pharmacy', 'www.franksrx.com', '... PHARMACY CLERK correct size.jpg. Audriana Faustino. Pharmacy Clerk. p: (\n831) 685-1100. f: (831) 685-1132. info@franksrx.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('31', 'Services - Carroll Pharmacy', 'www.carrollpharmacy.com', '... Shower and Bath items; Greeting Cards; Candles; Jewelry. p: (919) 934-7164. f\n: (919) 934-0921. info.carrollpharmacy@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('32', 'Rx Encyclopedia - Pelot&#39;s Pharmacy', 'www.pelotspharmacy.com', '... Trials Â· Health News Â· â–¸Rx Search Â· Contact Â· Pelot&#39;s Pharmacy. p: (941) 748-\n8130. f: (941) 749-5406. jessicapelot@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('33', 'Poret&#39;s Thrifty Way Pharmacy', 'www.poretsthriftywaypharmacy.com', 'Health-News.<b>png</b> Â· Mobile.<b>png</b> Â· Contact-(labeled).<b>png</b> ... <b>RxWiki</b>-(White).<b>png</b>. \nDigital Pharmacist(1).<b>png</b> ... gporet@hotmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('34', 'Oakfield Family Pharmacy', 'www.oakfieldfamilypharmacy.com', 'Services. p: (585) 948-5283. f: (585) 948-5360. pharmacy@\noakfieldfamilypharmacy.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>. Send Us Your Refills 24 \nHours a DayÂ ...');
INSERT INTO `rxwiki` VALUES ('35', 'Services At Propst Discount Drugs we do more than just fill <b>...</b>', 'www.propstdrugs.com', '... Care; Hair Care; Shower and Bath items; Greeting Cards; Candles. p: (256) \n539-7443. f: (256) 539-1012. propstrx@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('36', 'Locations - DeVille Pharmacies', 'www.devillepharmacies.com', '... 9amâ€“5pm; Friday: 9amâ€“5pm; Saturday: Closed; Sunday: Closed. Send Us A \nMessage. Fill out my online form. Fill out my Wufoo form! <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>\n.');
INSERT INTO `rxwiki` VALUES ('37', 'Kim&#39;s Pharmacy: Waynesville Pharmacy', 'www.kimsrx.com', 'Kim&#39;s Pharmacy Home Â· Refill.<b>png</b> Â· Health-News.<b>png</b> Â· Mobile.<b>png</b> Â· Contact-(\nlabeled).<b>png</b> ... f: (828) 452-5451. kimsrx@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('38', 'Oakland Drugs', 'www.oaklanddrugs.com', 'Oakland Drugs Â· About.<b>png</b> Â· Services.<b>png</b> Â· Refill.<b>png</b> Â· Health-News.<b>png</b> Â· Mobile\n.<b>png</b> Â· Contact-(labeled).<b>png</b> ... Privacy Policy Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('39', 'Jensen&#39;s Community Pharmacy', 'www.jensenscommunitypharmacy.com', 'Jensen&#39;s Community Pharmacy is a locally owned and <b>operated</b> pharmacy in \nSaline. Our goal is to improve the health outcomes of ... <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('40', 'Digital Pharmacist', 'www.digitalpharmacist.com', 'platform.<b>png</b> ... engager.<b>png</b> ... check-up.<b>png</b> ... NCPA-Logo.<b>png</b> ... Mission-goals\n.<b>png</b> ... &quot;The mobile app <b>RxWiki</b> made for our business is already generatingÂ ...');
INSERT INTO `rxwiki` VALUES ('41', 'Downey Drug Flu Center - Downey Drug', 'www.downeydruganniston.com', '... at a low-no copay. *Cost of vaccine without insurance is $25*. p: (256) 237-\n9426. f: (256) 237-4352. downeydrug@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('42', 'Services - Paris Apothecary', 'www.paris-apothecary.com', 'All Gussied Up Boutique. Jewelry; Accessories; Scarves. p: (903) 785-4208. f: (\n903) 737-6974. leeann@paris-apothecary.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('43', 'About Us - La Milagrosa Pharmacy &amp; Discount', 'www.lamilagrosapharmacy.com', '... the version, goals and commitment of the company. p: (305) 545-1127. f: (305) \n545-1129. info@lamilagrosapharmacy.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('44', 'A &amp; S Drugs: Pharmacy in Pipestone', 'www.aandsdrug.com', '... services, call or stop by and see us today! services.<b>png</b>. refill.<b>png</b>. location.<b>png</b>. \np: (507) 825-3100. f: (507) 825-5810. asdrug@iw.net Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('45', 'Diabetic Shoes - Jordan Pharmacy', 'www.jordanpharmacy.com', '... and let us fit you with the proper pair of diabetic shoes! p: (254) 386-3111. f: (\n254) 386-8844. jordanpharmacy@embarqmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('46', 'Mobile - Watsonville Pharmacy', 'www.watsonvillerx.com', 'Mobile. coming soon! gp1.<b>png</b> Â· ios1.<b>png</b>. p: (831) 728-1818. f: (831) 728-8678. \ninfo@watsonvillerx.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('47', 'Medical Tower Pharmacy', 'www.medicaltowerpharmacy.com', 'Medical Tower Pharmacy Â· Services.<b>png</b> Â· Refill.<b>png</b> Â· Health-News.<b>png</b> Â· Mobile.\n<b>png</b> Â· Contact-(labeled).<b>png</b> ... f: (215) 732-7013. <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('48', 'Mobile - Medi Thrift Pharmacy', 'www.medithrift.com', 'medi thift mobile app.<b>png</b> ... Search &quot;Medi Thrift Pharmacy&quot; in the App Store or \nGoogle play, or click an icon below. gp1.<b>png</b> Â· ios1.<b>png</b> ... <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('49', 'Zikam Neighborhood Pharmacy', 'www.zikampharmacy.com', 'Continue to Mobile Site &gt;&gt;. gp1.<b>png</b> Â· ios.<b>png</b>. overlay.<b>png</b>. p: (210) 503-5063. f: (\n844) 451-4766. zikampharmacy@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('50', 'Carl&#39;s Thrifty Way Pharmacy: Pharmacy in Opelousas', 'www.carlsthriftyway.com', 'Services merica.<b>png</b>. Refill (1) merica.<b>png</b>. Location merica.<b>png</b>. p: (337) 948-\n7900. f: (337) 942-1535. carljsavoie@bellsouth.net Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('51', 'Pharmacy Services - Modern Pharmacy', 'www.modernpharmacyrx.com', '... Personal Needs Items. Infant Care; Hair Care; Shower and Bath items. p: (231) \n627-9949. f: (231) 627-8294. info@cheboyganrx.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('52', 'Star Discount Pharmacy', 'www.huntsvillestarpharmacy.com', 'Star Discount Pharmacy Â· Services.<b>png</b>. Refill.<b>png</b>. Health-News.<b>png</b>. Mobile.<b>png</b>. \nContact-(labeled).<b>png</b> ... Services. Locations Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('53', 'Refill - Curt&#39;s Pharmacy', 'www.curtspharmacy.com', 'Pickup. Delivery. Comments: I agree to Terms and Conditions. p: (507) 373-6337. \nf: (507) 373-1379. curtclarambeau@hotmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('54', 'Schwenker Pharmacy', 'www.schwenkerpharmacy.com', 'Welcome to Schwenker Pharmacy! Serving[1].<b>png</b>. Welcome to Schwenker \nPharmacy, ... f: (512) 352-8282. schwenkerrx@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('55', 'Ritzville Drug', 'www.ritzvilledrug.com', 'Services.<b>png</b> Â· gift-shop.<b>png</b> Â· Refill.<b>png</b> Â· Health-News.<b>png</b> Â· Mobile.<b>png</b> Â· Contact\n-(labeled).<b>png</b> ... p: (509) 659-0250. f: (509) 659-1763. <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('56', 'About Pavilion Compounding Pharmacy', 'www.pavilioncompounding.com', '... into our filling process to provide state of the art services. p: 404-350-5780. f: \n404-350-5640. staff@pavilioncompounding.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('57', 'Mobile - Rosenkrans Pharmacy', 'www.rosenkranspharmacy.com', '550.<b>png</b> ... App store or Google play to download, or click the icon for your mobile \ndevice below! gp1.<b>png</b>. ios1.<b>png</b>. p: (585) 798-1650 ... <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('58', 'Saiff Drugs', 'www.saiffdrugs.com', 'Active&amp;healthy.<b>png</b>; Refill.<b>png</b>; LongTermHealth.<b>png</b>; Health Consultation.<b>png</b>. 1; \n2; 3; 4. Previous; Next ... saiffdrugs@yahoo.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>Â ...');
INSERT INTO `rxwiki` VALUES ('59', 'Contact Us - Village Pharmacy and Surgical', 'www.villagepharmacyandsurgical.com', 'fb-icon.<b>png</b> Â· pinterest-icon.<b>png</b> Â· twitter-cion.<b>png</b>. Monday: 10amâ€“8pm; Tuesday: \n10amâ€“8pm ... info@villagepharmacyandsurgical.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('60', 'Health News - Blanco Pharmacy &amp; Wellness', 'www.blancopharmacy.com', 'p: (830) 833-4815. f: (830) 833-5585. blancopharmacyandwellness@gmail.com. \n<b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('61', 'Services - Blanco Pharmacy &amp; Wellness', 'www.blancopharmacy.com', '... Bath items; Hair Care; Greeting Cards; Candles. p: (830) 833-4815. f: (830) \n833-5585. blancopharmacyandwellness@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('62', 'Moore&#39;s Pharmacy: Pharmacy in Carthage', 'www.moorespharmacyrx.com', 'Moore&#39;s Pharmacy Â· About.<b>png</b> Â· Services.<b>png</b> Â· Refill.<b>png</b> Â· Compounding.<b>png</b> Â· \nHealth-News.<b>png</b> Â· Mobile. ... Sebastopol. (601) 625-7158. <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('63', 'Arrow Pharmacy', 'www.arrowpharmacy.com', 'mobile2.<b>png</b>; Fingertips.<b>png</b>; Refill.<b>png</b>. 1; 2; 3. Previous; Next. p: (212) 245-8469\n. f: (212) 586-1502. arrowpharmacy@gmail.com Â· <b>Powered</b>-by-<b>RxWIki</b>.<b>png</b>.');
INSERT INTO `rxwiki` VALUES ('64', 'Brown Drug Company: Quincy Pharmacy', 'www.browndrugcompany.com', 'p: (217) 228-6400. f: (217) 228-6423. browns@adams.net Â· <b>Powered</b>-by-<b>RxWIki</b>.\n<b>png</b>. Send Us Your Refills 24 Hours a Day Through Our Mobile App. Click aÂ ...');

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panel_name` varchar(50) NOT NULL DEFAULT 'Unamed Panel',
  `client_name` varchar(50) NOT NULL,
  `base_url` varchar(255) NOT NULL,
  `panel_url` varchar(100) NOT NULL,
  `support_url` varchar(255) NOT NULL DEFAULT 'http://www.fenclwebdesign.com/support',
  `assets` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'Admin Backend Panel', 'Las Vegas Luxe', 'http://dev.webwarephpdevelopment.com', 'http://webwarephpdevelopment.com:8080/user', 'http://www.webwarephpdevelopment.com', 'http://dev.webwarephpdevelopment.com/user/assets');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `bio` text NOT NULL,
  `testimonial` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `website` varchar(60) NOT NULL,
  `facebook` varchar(60) NOT NULL,
  `twitter` varchar(60) NOT NULL,
  `activerain` varchar(60) NOT NULL,
  `linkedin` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_pic` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of staff
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `pw_hash` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for `user_types`
-- ----------------------------
DROP TABLE IF EXISTS `user_types`;
CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user_types
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL DEFAULT '2',
  `username` varchar(55) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'password',
  `phone` varchar(25) DEFAULT NULL,
  `gender` varchar(50) NOT NULL DEFAULT 'Unknown',
  `user_city` varchar(50) NOT NULL DEFAULT 'Unkown',
  `user_state` varchar(50) DEFAULT NULL,
  `user_bio` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hashkey` varchar(100) NOT NULL,
  `profile_pic` varchar(100) NOT NULL DEFAULT 'no_pic.gif',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 - active, 2 - disabled',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-
