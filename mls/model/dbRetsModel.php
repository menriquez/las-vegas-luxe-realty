<?php

require_once 'pdoConfig.php';
require_once 'dbRetsRoomModel.php';
require_once 'includes/utils.php';

// hold the data in this class
class dbRets extends pdoConfig {

	public  $row;
	public  $count;

	protected $rows;
	public  $row_idx;
	protected $stm;

    protected $pagination_page_num;

	const MLS_TABLENAME = 'master_rets_table';

	const CARD_FIEDS = ' sysid, listing_id,listing_price, listing_date, street_name,street_dir,street_number, 
	street_suffix, city, state_province, postal_code, 3_4_bath ,
	sqft_living, sqft_tot, halfbaths, full_bath , bedrooms , year_built , active_DOM , property_sub_type , property_type';

	public function __construct(){
		parent::__construct( );
	}

	//
	public function getPropertyType () {
		return $this->row['property_type'];
	}

	public function getPropertyTypeTag () {

		switch ($this->row['property_sub_type']) {
			case "Single Family Residential":
				return "House";
				break;
			default:
				return $this->row['property_sub_type'];
		}

	}

	public function getSysId() {
		return $this->row['sysid'];

	}

    public function getGlobalLastUpdateDateTime() {
	    $sql = "select end_time_db_ts from photo_dl_info order by end_time_db_ts DESC limit 1";
        $stm = $this->prepare($sql);

        $stm->execute();
        $row= $stm->fetch();

        // set row to first
        return($row['end_time_db_ts']);


    }

    public function getLastUpdateDateTime() {
        return $this->row['Photo'];

    }

	public function getAgentId () {
		return $this->row['agent_id'];
	}

	public function getStreetAddress() {

		switch ($this->row['street_suffix']) {
			case "Avenue":
				$sfx = "Ave";
				break;
			case "Boulevard":
				$sfx = "Blvd";
				break;
			case "Circle":
				$sfx = "Cir";
				break;
			case "Court":
				$sfx = "Ct";
				break;
			case "Drive":
				$sfx = "Dr";
				break;
            case "Lane":
                $sfx = "Ln";
                break;
			case "Highway":
				$sfx = "Hwy";
				break;
			case "Parkway":
				$sfx = "Pkwy";
				break;
			case "Place":
				$sfx = "Pl";
				break;
			case "Square":
				$sfx = "Sq";
				break;
			case "Street":
				$sfx="St";
				break;
			case "Terrace":
				$sfx = "Terr";
				break;
            case "Road":
                $sfx="Rd";
                break;
			case "Trail":
				$sfx = "Tr";
				break;
			case "Way":
				$sfx = "Way";
				break;
			case "Valley":
				$sfx = "Vly";
                break;
			default:
				$sfx=$this->row['street_suffix'];

		}


		$str = $this->row['street_number']." ".($this->row['street_dir']<>""?$this->row['street_dir']." ":"").ucwords(strtolower($this->row['street_name']))." ".$sfx;

		//$str= $this->row['public_address'];
		if ($str=="   ")
			$str="No Address Found";
		return $str;
	}

	public function getCityStZip($comma=true) {
		if ($comma)
			return $this->row['city'].", NV ".$this->row['postal_code'];
		else
			return $this->row['city']." NV ".$this->row['postal_code'];
	}

	public function buildURI() {

		$add = str_replace(" ","-", $this->getStreetAddress());
		$city = str_replace(" ","-", $this->getCityStZip(false));
		$uri = "/" . $add . "-" . $city . "/matrix-" . $this->getSysId() . $this->getMLSLink();

		return $uri;

	}

	public function buildAltTag() {
		$add =  $this->getStreetAddress();
		$city =  $this->getCityStZip(true);
		$uri = "Primary image for " . strtolower($this->getPropertyTypeTag()) . " for sale for " . $this->getPrice() . " located at address $add, $city | matrix id-" . $this->getSysId() . $this->getMLSLink();

		return $uri;
	}

	public function getMLS() {     
		return $this->row['listing_id'];
	}

	public function getMUID() {
		return $this->row['sysid'];
	}

	public function getPrevPriceDate() {
		$do = new DateTime($this->row['last_change_date']);
		return $do->format("m/d/Y");
	}

	public function getFaces() {
		return $this->row['house_faces'];
	}

	public function getViews() {
		return $this->row['home_views'];
	}

	public function getLandscape() {
		return $this->row['landscape_desc'];
	}

	public function getSqFt() {
		return number_format($this->row['sqft_living']);
	}

	public function getTotalSqFt() {
		return number_format($this->row['sqft_tot']);
	}

	public function getCity() {
		// return $this->row['city'].(strlen($this->row['city'])<=8?"&nbsp;&nbsp;&nbsp;&nbsp;":"");
		return $this->row['city'];
	}

	public function getCityDashes() {
		// return $this->row['city'].(strlen($this->row['city'])<=8?"&nbsp;&nbsp;&nbsp;&nbsp;":"");
		return fixBlanks($this->row['city']);
	}

	public function getCitiesNameAndCount() {
		return $this->row['city']." [".$this->row['current_hits']."]";   
	}

	public function getBaths() {
		return ($this->row['full_bath'].".".$this->row['3_4_bath'].".".$this->row['halfbaths']);
	}

	public function getFullBaths() {
		return ($this->row['full_bath']);
	}

	public function get34Baths() {
		return ($this->row['3_4_bath']);
	}

	public function getPhotoCount() {
		return ($this->row['photo_count']);
	}

	public function getHalfBaths() {
		return ($this->row['halfbaths']);
	}

	public function getLat() {
		return $this->row['latitude'];
	}

	public function getLong() {
		return $this->row['longitude'];
	}


	public function getPrice() {
		return "$".number_format($this->row['listing_price']);
	}

	public function getPrevPrice() {
		return "$".number_format($this->row['previous_price']);
	}
	public function getPriceRaw() {
		return number_format($this->row['listing_price']);
	}

	public function getBeds() {
		return $this->row['bedrooms'];
	}

	public function getNumPics() {
		return $this->row['photo_count'];
	}

	public function getHomeStyle() {
		return $this->row['home_style'];
	}

	public function getShortDesc($inLen=66) {
		return substr($this->row['remarks'],0,$inLen)."...";
	}

	public function getShortUCDesc($inLen=66) {
		return ucfirst (strtolower(substr($this->row['remarks'],0,$inLen)."..."));
	}

	public function getThumbSmallFn() {
	    global $BASE_WEB_URL_IMAGES;


		return $BASE_WEB_URL_IMAGES."/rets/thumbs200/".$this->row['sysid']."-1.jpg";
	}

	public function getThumbFn() {
        global $BASE_WEB_THUMBS_URL;
		return  $BASE_WEB_THUMBS_URL. "/rets/thumbs/".$this->row['sysid']."-1.jpg";
	}

/*	public function getFrontPicFn() {

		// return "/mls/photos/".$this->row['sysid']."-1.jpg";
		return "//lasvegasluxerealty.com/rets/".$this->row['sysid']."-0.webp";
	}
*/

	public function getPctDiscount() {
		return number_format($this->row['pct_discount'],1);
	}

	public function getDOM() {
		return $this->row['active_DOM'];
	}

	public function getFrontPicFn() {

		global $BASE_WEB_PHOTOS_URL;

		$add    = str_replace(" ","-", $this->getStreetAddress());
		$city   = str_replace(" ","-", $this->getCityStZip(false));
		$uri    = $add . "-" . $city . "-" . $this->getMLSPhoto();

		$rv = $uri . "-0.jpg";

	/*	if ($global_browser_id == 1) {
			if (!file_exists("rets/photos/jpeg/". $uri . "-0.jpg")) {
				$img = imagecreatefromwebp("rets/photos/" . $uri . "-0.webp");
				imagejpeg($img, "rets/photos/jpeg/" . $uri . "-0.jpg", 60);
			}

			$rv = "jpeg/". $uri . "-0.jpg";
		}
   */
		return $BASE_WEB_PHOTOS_URL.$rv;
	}

	public function getGlobPicFn() {

		$add    = str_replace(" ","-", $this->getStreetAddress());
		$city   = str_replace(" ","-", $this->getCityStZip(false));
		$uri    = $add . "-" . $city . "-" . $this->getMLSPhoto();

		$rv = $uri;

		return $rv;
	}

	public function getMLSPhoto() {
		return "mls-".$this->row['listing_id'];
	}

	public function getPlantPicFn() {
		// return "/mls/photos/".$this->row['sysid']."-1.jpg";
		global $BASE_WEB_URL_IMAGES;

		return $BASE_WEB_URL_IMAGES. "/img/plants/caro/".$this->row['img_fn'];
	}
	
	public function getPlantName() {     
		return $this->row['plant_name'];
	}

	public function getConstruction() {
		return $this->row['construction'];
	}

	public function getBuildingDesc() {
		return $this->row['building_desc'];
	}

	public function getPlantPrice() {     
		return $this->row['price'];
	}

	public function getExtFeats() {
		return $this->row['exterior_features'];
	}

	public function getIntFeats() {
		return $this->row['interior_features'];
	}

	public function getEquipApp() {
		return $this->row['equipment_appliances'];
	}

	public function getTaxAmount() {
		return "$".number_format($this->row['tax_amount']);
	}

	public function getHOADues() {
		return "$".number_format($this->row['hoa_dues']);
	}

	// generic data function to grab fields directly
	public function getData($inFld) {

		$rv = $this->row[$inFld];
		if ($this->row[$inFld]=="1") {
			$rv = "Yes";
		}
		return str_replace(",",", ",$rv);
	}

	public function notEmpty($inFld) {
		if (empty($this->row[$inFld]))
			return false;
		else
			return true;
	}

	// functions to build quicksearch links
	public function getMLSLink() {
		return "/mls-".$this->getMLS();
	}

	// functions to build quicksearch links
	public function getImageDisplayList() {
		
		global $BASE_WEB_URL;

		$images = $this->getImageArray();

		$first = true;
		$cnt=0;

		foreach ($images as $image) {

			if ($first==true) $stg = "bugaga"; else $stg = "";

			$imageArr = explode("/",$image);
			$fn = array_pop($imageArr);

			$img = $BASE_WEB_URL."/rets/photos/".$fn;

			$alt = $this->buildAltTag() . " [image $cnt]";

			echo "<a class='rsImg $stg' data-rsw='540' data-rsh='374' data-rsBigImg='$img' href='$img'><img width='96' height='72' class='rsTmb' src='$img' alt='$alt' /></a>\n\n";
			$first = false;
			$cnt++;

		}

	}

	public function getExtFeatsList() {

		$extFeats = explode(",",$this->row['exterior_features']);   
		foreach ($extFeats as $feat) {
			echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";
		} 
	}

	public function getIntFeatsList() {

		$extFeats = explode(",",$this->row['interior_features']);
		foreach ($extFeats as $feat) {
			echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";  
		}

	}  
	public function getEquipApplList() {

		$extFeats = explode(",",$this->row['equipment_appliances']);
		foreach ($extFeats as $feat) {     
			echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";
		} 
	}

	public function getAmenityList() {

		$extFeats = explode(",",$this->row['amenities']);
		foreach ($extFeats as $feat) {     
			echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";
		} 
	}

	public function getUtilityList() {

		$extFeats = explode(",",$this->row['utilities']);
		foreach ($extFeats as $feat) {     
			echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";
		} 
	}

	public function getHOAList() {

		echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> {$this->row['hoa']} </li>";  
		echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> \${$this->row['hoa_dues']}</li>";
		// echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $this->row['hoa']</li>";

	}

	public function getGMapsAddress() {

		return $this->row['street_number']."+".$this->row['street_dir']."+".$this->row['street_name']."+".$this->row['street_suffix']."+".$this->row['city']."+FL";
	}

	public function initQueryResults($sql) {

		$this->stm = $this->prepare($sql);

		$this->stm->execute();
		$this->rows= $this->stm->fetchAll(self::FETCH_ASSOC);
		$this->count = $this->stm->rowCount();
		$this->row_idx = 0;

		// set row to first
		$this->row=$this->rows[$this->row_idx++];
	}


}

// do the sql searching in this class
class dbRetsModel extends dbRets {

	// vars to handle internal row management


	private $paging;

	// search fields
	private $mls_id;
	private $property_type;
	private $property_subtype;
	private $agent_id;
	private $city;
	private $subdiv;
	private $cityname;

	private $min_price;
	private $max_price;

	private $date_from;
	private $tag;

	public $pagination;
	private $recs_per_page=42;

	public $rooms;

	public $is_pagination;

	public function __construct(){
		parent::__construct( );
		$this->min_price = 200000;
		$this->max_price = 1500000;
	}

	// the search "title" is at the search level, not row level
	public function getDisplayTitle () {

		$tag="";

		if (!(isset($_GET['page']))) {
			if ($this->tag=="")
				return $this->count." ".$this->getPropertyTypeTag()." Listings for ".$this->cityname;
			else
				return $this->count." ".$this->tag." ".$this->getPropertyTypeTag()." Listings for ".$this->cityname;
		}
		else {

			switch ($_GET['page']) {

				case 2:
					$tag.=" 251 - 500";
					break;
				case 3:
					$tag.=" 501 - 750";
					break;
				case 4:
					$tag.=" 751 - 1000";
					break;
				case 5:
					$tag.=" 1001 - 1250";
					break;

					// add more if needed...

			}
			return "Showing $tag of $this->count ".$this->getPropertyTypeTag()." Listings for ".$this->cityname;
		}
	}

	public function isFirst() {
		return ($this->row_idx==1?"1":"0");
	}

	// set functions for searches
	public function setPropertyType ($inStg) {
		$this->property_type=self::quote($inStg);
	}

	public function setPropertySubType ($inStg) {

		$this->property_type=self::quote("Residential");

		if ($inStg == "homes") {
			$searchStg = "Single Family Residential";
		}                                  
		else if ($inStg == "townhomes") {
			$searchStg = "Townhouse";
		}
		else if ($inStg == "condos") {
			$searchStg = "Condominium";
		}     
		else {
			$this->property_type=self::quote("High Rise");
			$searchStg = "";
		}


		$this->property_subtype=self::quote($searchStg);
	}

	public function setAgentId ($inStg) {
		$this->agent_id=self::quote($inStg);
	}

	public function setLoPrice ($inStg) {
		$this->min_price=self::quote($inStg);
	}

	public function setHiPrice ($inStg) {
		$this->max_price=self::quote($inStg);
	}

	public function setMLS ($inStg) {
		$this->mls_id=self::quote($inStg);
	}

	public function setCity ($inStg) {
		$this->city=self::quote($inStg);
	}

	public function setCommunity ($inStg) {
		$this->community=fixDashes(self::quote($inStg));
		$this->subdiv=fixDashes(self::quote($inStg));
	}

	public function setArea ($inStg) {
                                         
		if (strtolower($inStg)=="all") {
			return;
		}

		if ($inStg=="today" || $inStg=="thisweek") {
			$this->date_from = ($inStg=="today" ? date("Y-m-d", strtotime( '-1 days' )): date("Y-m-d", strtotime( '-7 days' ) ))." 00:00:00";
			return;
		}
		if ($inStg=="commercial" ) {
			$this->setPropertyType("commercial");
			return;
		}
		$area=fixDashes($inStg);
		if ($this->isCity($area)) {
			$this->city=self::quote($area);
		}
		else {
			$this->subdiv=self::quote($area);
		}
	}

	/******************************************************************************************************************/
	// start search methods
	/******************************************************************************************************************/
	public function getIndexProps() {

		// check class data
		if ($this->cityname == "") {
			throw new Exception("dbRetsSearch :: getIndexProps :: Invalid City - please make sure you set city class variable");
		}

		// grad
		$sql = "SELECT subdivision_area_name,current_hits FROM community_area_information
		WHERE city = '".trim($this->cityname)."'
		ORDER BY current_hits DESC";

		$this->stm = $this->prepare($sql);   
		$this->stm->execute();
		$this->rows= $this->stm->fetchAll(self::FETCH_ASSOC);

		$rowcnt = 0;
		foreach ($this->rows as $row) {

			$this->subdiv = $row['subdivision_area_name'];

			$sql = "SELECT subdivision_area_name,current_hits FROM community_area_information
			WHERE city = '".trim($this->cityname)."'
			ORDER BY current_hits DESC";

			if ($rowcnt++ == 6) {
				break;
			}
		}
	}

	public function getSubdivCounts () {

		$results = array();

		// check class data
		if ($this->cityname == "") {
			throw new Exception("dbRetsSearch :: getSubdivCounts :: Invalid City - please make sure you set city class variable");
		}

		$sql = "SELECT subdivision_area_name AS subdiv_name,current_hits AS hits,city FROM community_area_information
		WHERE city = ".trim($this->cityname)."
		ORDER BY subdivision_area_name ASC";

		$this->stm2 = $this->prepare($sql);   
		$this->stm2->execute();
		$this->rows= $this->stm2->fetchAll(self::FETCH_ASSOC);

		$this->count = $this->stm2->rowCount();
		$this->row_idx = 0;

		// set row to first
		$this->row=$this->rows[$this->row_idx++];

	}

	public function getSingleProperty () {

		// check class data
		if ($this->mls_id == "") {
			throw new Exception("dbRetsSearch :: getProperty :: Invalid mls_id");
		}

		$sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
		WHERE listing_id = '.$this->mls_id.'
		ORDER BY listing_price DESC';

		$this->stm = $this->prepare($sql);

		$this->stm->execute();
		$this->rows= $this->stm->fetchAll(self::FETCH_ASSOC);
		$this->count = $this->stm->rowCount();
		$this->row_idx = 0;

		// set row to first
		if ($this->count) {

			$this->row=$this->rows[$this->row_idx++];
			// go ahead and try to load the room data as well now...
			$this->rooms = new dbRetsRoomModel($this->getData('sysid'));

		}

	}   

	public function getRandomProperty() {


		$sql = "(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'JUNO BEACH' and listing_price > 500000 and listing_price <= 1500000
	
		order by rand()
		limit 1
		) union all
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'palm beach gardens' and listing_price > 500000 and   listing_price <= 1500000
		order by rand()
		limit 1
		) union all
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'North Palm Beach' and listing_price > 500000 and   listing_price <= 1500000
		order by rand()
		limit 1
		) union all             
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Palm Beach' and listing_price > 500000 and   listing_price <= 1500000
		order by rand()
		limit 1
		) union all             
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Boynton Beach' and listing_price > 500000 and   listing_price <= 1500000
		order by rand()
		limit 1
		) union all              
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Delray Beach' and listing_price > 500000 and   listing_price <= 1500000
		order by rand()
		limit 1
		) union all  
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'jupiter' and listing_price > 500000 and listing_price <= 1500000
		order by rand()
		limit 1
		) union all
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'WEST PALM BEACH' and listing_price > 500000 and  listing_price <= 1500000
		 
		order by rand()
		limit 1
		) union all
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Boca Raton' and listing_price > 500000 and  listing_price <= 1500000
		 
		order by rand()
		limit 1
		) union all
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Singer Island' and listing_price > 500000 and  listing_price <= 1500000
		 
		order by rand()
		limit 1
		)";            

		$this->initQueryResults($sql);
	}

	public function getCitySearchButtonTag($city,$proptype,$searchtype) {

		$propsearchstg = ($proptype=="Homes"?"Single Family Detach":$proptype);
		$typesearchstg = ($searchtype=="Sale"?"residential":"rental");

		$sql = "select count(*) as cnt
		FROM master_rets_table
		WHERE city = '$city'
		AND property_sub_type = '$propsearchstg' 
		AND property_type = '$typesearchstg' ";            

		$stm = $this->prepare($sql);

		$stm->execute();
		$row= $stm->fetch();

		$rval = "Search $city<br>$proptype for $searchtype [$row[cnt]]";

		// set row to first
		return($rval);

	}

	public function getSubdivDropdown() {

		$sql = "SELECT count(*) as cnt, subdivision FROM master_rets_table WHERE 
		subdivision<>'none' AND 
		subdivision<>'custom' AND
		subdivision<>'N/A' AND
		subdivision<>'0' AND
		subdivision<>'9999'
		GROUP BY subdivision 
		HAVING cnt > 10
		ORDER BY cnt desc";

	}

	public function getCityDesc($city) {

		$sql = "select *
		from city_information
		where city = '$city'";            


		$stm = $this->prepare($sql);

		$stm->execute();
		$row= $stm->fetch();

		// set row to first
		return($row['content']);

	}

	public function getFeaturedListingProps() {

		$sql = "SELECT  ".self::CARD_FIEDS." from master_rets_table 
		WHERE listing_price > 600000 AND listing_price < 1300000 
		AND photo_count > 0 
		AND property_status IN  ( 'active' )
		AND property_type IN  ( 'Residential' )
	
		ORDER BY photo_timestamp DESC LIMIT 12";

		$this->initQueryResults($sql);

	}

	public function getHighRiseListingProps() {

		$sql = "SELECT  ".self::CARD_FIEDS." from master_rets_table 
		WHERE listing_price > 900000 AND listing_price < 1800000 
		AND photo_count > 0 
		AND property_status IN  ( 'active' )
		AND property_type IN  ( 'High Rise )
		
		ORDER BY photo_timestamp DESC LIMIT 12";

		$this->initQueryResults($sql);

	}

	public function getCarouselProps() {

		$sql = 'SELECT * from master_rets_table 
		WHERE listing_id IN (SELECT listing_id from custom_listings)';

		$this->initQueryResults($sql);

	}
	

	public function getCarouselPlants() {

		$sql = 'SELECT * from custom_listings_plants'; 

		$this->initQueryResults($sql);

	}
	

	public function getNewestPropertyByCity($inStg) {

		$sql = "select *
		from master_rets_table
		WHERE property_type = 'Residential' and city = '$inStg' and listing_price > 400000 and listing_price <= 1200000
		AND sqft_living > 1000
		order by listing_entry_timestamp DESC
		limit 2";


		$this->initQueryResults($sql);
	}

	public function getNewestProperties() {

		$sql = "SELECT * FROM master_rets_table 
		WHERE  (DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= listing_entry_timestamp) 
		AND property_type='Residential' 
		AND listing_price > 300000 and county='palm beach' 
		group by city 
		order by  CITY asc, listing_entry_timestamp DEsc";

		$this->initQueryResults($sql);

	}


	public function getBargainProperties($pct_cutoff,$days_to_scan) {

		$sql = "SELECT  " .self::CARD_FIEDS. "  , previous_price, (( previous_price - listing_price )/ previous_price )* 100 AS 'pct_discount' 
					FROM
						" .self::MLS_TABLENAME. " 
					WHERE
						last_change_type = 'Price Decrease' 
						AND
						(( previous_price - listing_price )/ previous_price ) > $pct_cutoff
						AND
						(( previous_price - listing_price )/ previous_price ) < 0.51
						AND
						active_DOM < $days_to_scan
					
					ORDER BY
						active_DOM ASC ,
						pct_discount DESC
				LIMIT 18";

		$this->initQueryResults($sql);

	}


	public function getNewestProperty() {

		$sql = "(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Jupiter' and listing_price > 300000 and listing_price <= 1000000
		 
		order by listing_entry_timestamp DESC
		limit 2
		) UNION ALL
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'palm beach gardens' and listing_price > 500000 and   listing_price <= 1000000
		 
		order by listing_entry_timestamp DESC
		limit 2
		) UNION ALL
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'WEST PALM BEACH' and listing_price > 500000 and listing_price <= 1000000
		
		order by listing_entry_timestamp DESC
		limit 2
		) UNION ALL
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Boyton Beach' and listing_price > 500000 and  listing_price <= 1000000
		
		order by listing_entry_timestamp DESC
		limit 2
		) UNION ALL
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Delray Beach' and listing_price > 500000 and  listing_price <= 1000000
	
		order by listing_entry_timestamp DESC
		limit 2
		) UNION ALL
		(select *
		from master_rets_table
		where property_type = 'Residential' and city = 'Boca Raton' and listing_price > 500000 and  listing_price <= 1000000
		
		order by listing_entry_timestamp DESC
		limit 2
		)";            

		$this->initQueryResults($sql);

	}


	public function getCityCounts() {

		$sql = 'SELECT * from city_information
		ORDER BY city ASC';            

		$this->initQueryResults($sql);

	}

	public function getClientSummaryListings () {

		// check class data
		if (($this->property_type == "") || ($this->agent_id == "")) {
			throw new Exception("dbRetsSearch ::getClientSummaryListings :: Invalid property_type or agent_id");
		}

		$sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
		WHERE property_type = '.$this->property_type.'  AND agent_id = '.$this->agent_id.'
		ORDER BY listing_price DESC';

		$this->initQueryResults($sql);

	}

	public function getAreaSubTypeListings () {

		$sql = 'SELECT '.self::CARD_FIEDS.' FROM '.self::MLS_TABLENAME. '
		WHERE city = '.$this->city.'
		AND  property_sub_type = '.$this->property_subtype.'
		AND listing_price >= '.$this->min_price.' AND listing_price <= '.$this->max_price.'
		
		ORDER BY listing_price DESC ';

		$this->stm = $this->prepare($sql);
		$this->stm->execute();

		$this->rows= $this->stm->fetchAll(self::FETCH_ASSOC);
		$this->count = $this->stm->rowCount();

		// adding pagination

		$this->pagination = new zPagination();
		$this->pagination->records($this->count);
		$this->pagination->records_per_page($this->recs_per_page);
		$this->pagination->method('url');
		$this->pagination->base_url("",false);

		$this->rows = array_slice(
			$this->rows,
			(($this->pagination->get_page() - 1) * $this->recs_per_page),
			$this->recs_per_page);

		$this->count=count($this->rows);

		$this->row_idx = 0;

		// set row to first
		if ($this->count > 0)
			$this->row=$this->rows[$this->row_idx++];
	}

	public function getAreaListings () {

		// check class data
		if (($this->city == "") && ($this->subdiv == "") &&
		($this->date_from == "") && ($this->property_type == "")) {
			throw new Exception("dbRetsSearch:: getAreaListings - empty city, subdiv or starting date for search");
		}

		if ($this->city != "" ) {
			$sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
			WHERE city = '.$this->city.'
			ORDER BY listing_price DESC LIMIT 100';
		}

		if ($this->subdiv != ""){

			$sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
			WHERE subdivision REGEXP '.$this->subdiv.' 
			AND city = '.$this->city.'
			ORDER BY listing_price DESC';
		}
		else if ($this->date_from != "") {

			$sql = "SELECT * FROM MLS_TBLNAME WHERE (listing_entry_timestamp > '$this->date_from' ) ORDER BY listing_price DESC";

		}
		else if ($this->property_type != "") {

			$sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
			WHERE property_type = '.$this->property_type.'
			ORDER BY listing_price DESC ';

		}

		$this->initQueryResults($sql);

	}

	public function getSearchHeaderInfo () {

		// check class data
		$sql = $this->buildQuery(true);

		$this->stm = $this->prepare($sql);

		$this->stm->execute();
		$this->rows= $this->stm->fetchAll(self::FETCH_ASSOC);
		$this->row_idx = 0;

		// set row to first
		$this->row=$this->rows[$this->row_idx++];
		$this->count = $this->row['cnt'];

	}

	public function getCityDropDownInfo () {

		// check class data
		$sql = "SELECT DISTINCT city FROM ".self::MLS_TABLENAME." where city <> '' AND county <> 'Palm Beach' OR county='Martin' ORDER BY city ASC";

		$this->stm = $this->prepare($sql);

		$retval="";
		$this->stm->execute();
		foreach ($this->stm->fetchAll(self::FETCH_ASSOC) as $row) {
			$retval.="<option value='".str_replace(' ','-',$row['city'])."'> ".$row['city']."</option>";
		}

		echo $retval;

	}

	public function getCityDropDown($county) {

		// check class data
		$sql = "SELECT DISTINCT city FROM ".self::MLS_TABLENAME." where  county = '$county' ORDER BY city ASC";

		$this->stm = $this->prepare($sql);

		$this->stm->execute();

		$retval="";

		foreach ($this->stm->fetchAll(self::FETCH_ASSOC) as $row) {
			$retval.="<option value='".str_replace(' ','-',$row['city'])."'>".$row['city']."</option>";
		}

		echo $retval;

	}

	public function doSearch () {

        $this->pagination = new zPagination();

	    // first we need to check for pagination condition...
        $matches=null;
        $this->is_pagination=false;
        if (preg_match('/page([0-9]+)/',$_SERVER['PATH_INFO'] , $matches, PREG_OFFSET_CAPTURE)) {

            $this->is_pagination = true;

            $page = (int) filter_var($matches[0][0], FILTER_SANITIZE_NUMBER_INT);
            $this->pagination->set_page($page);
            $sql = $_SESSION['pagination_sql'];

        }

        else {
            $sql = $this->buildQuery();
        }

		$this->stm = $this->prepare($sql);

		// save this sql in case we trigger paginatiton...
		$_SESSION['pagination_sql']=$sql;
        $_SESSION['request_obj'] =  serialize($_REQUEST);

		$this->stm->execute();
		$this->rows= $this->stm->fetchAll(self::FETCH_ASSOC);
		$this->count = $this->stm->rowCount();

		// adding pagination
		$this->pagination->records($this->count);
		$this->pagination->records_per_page($this->recs_per_page);
		$this->pagination->method('url');
		$this->pagination->base_url("",true);

		$this->rows = array_slice(
			$this->rows,
			(($this->pagination->get_page() - 1) * $this->recs_per_page),
			$this->recs_per_page);

		$this->count=count($this->rows);

		$this->row_idx = 0;

		// set row to first
		if ($this->count > 0)
			$this->row=$this->rows[$this->row_idx++];

	}
	/******************************************************************************************************************/
	// end search methods
	/****************************************\\\\\\\\\\\\\\\\\\\\\\\\\\\**************************************************************************/

	public function next() {

		if ($this->row_idx < $this->count) {
			$this->row=$this->rows[$this->row_idx++];
			return true;
		}
		else {
			$this->row_idx=0;
			return false;
		}
	}

	///////////////////////////////////////////////////////////////////////////////
	//
	//  class utility funcs...
	//
	///////////////////////////////////////////////////////////////////////////////

	// get all city names in database and check for match
	public function isCity($area) {

		if (strtolower($area)=="all") {
			return false;
		}

		$sql = 'SELECT distinct(city) FROM '.self::MLS_TABLENAME.' WHERE county = "Palm Beach" OR county = "Martin" ';
		$stm = $this->prepare($sql);
		$stm->execute();
		$cities= $stm->fetchAll(self::FETCH_COLUMN, 0);

		// $citiesnew = array_map('trim', $cities['city']);
		$area = trim(ucwords($area));

		if (in_array($area,$cities))
			return true;
		else
			return false;

	}

	/******************************************************************************************************************/
	//  in order to save time, i cut-n-pasted this crappy-yet-working SQL logic from dbasile.com - please forgive me - marke
	/******************************************************************************************************************/
	public function buildQuery($countFlag=false) {

		// grab "tag" string for use in titles/seo
		if (isset($_POST['tag'])) {
			$this->tag = ucwords(fixDashes($_REQUEST['tag']));
		}
		
		// jump out of here if an MLS # is discovered /////////////////////////////////////////////////////////////////////////////////////////////////
		if (!empty($_POST['mlsnumber'])) {
			return "SELECT * FROM ".self::MLS_TABLENAME." WHERE listing_id = '$_REQUEST[mlsnumber]' ";
		}

		if (!empty($_POST['streetName'])) {
			$s = $_POST['streetName'];
			return "SELECT * FROM ".self::MLS_TABLENAME." WHERE city = " . $this->quote($this->fix_dashes($_POST['city'])) . " AND street_name LIKE '%$s' ";
		}

		$qs = false;
		if (isset($_REQUEST['qs']) AND ($_REQUEST['qs']==1)) {
			$qs = true;
			$_REQUEST['property'] = $_REQUEST['dosearch'];
		}
		switch ($_REQUEST['property']) {

			case "homes":
			case "home":
				$type = "  property_type='Residential' ";
				$subtype = " property_sub_type='Single Family Residential' ";
				$interval = 1;
				$qs = true;
				break;
			case "condos":
			case "condo":
				$type = "  property_type='Residential' ";
				$subtype = " property_sub_type='Condominium' ";
				$interval = 3;
				$qs = true;
				break;
			case "townhouses":
			case "townhome":
				$type = "  property_type='Residential' ";
				$subtype = " property_sub_type='Townhouse' ";
				$interval = 3;
				$qs = true;
			break;
			case "highrise":
				$type = "  property_type='High Rise' ";
				$subtype = " property_sub_type='' ";
				$interval = 5;
				$qs = true;
				break;


		}

		if ($qs) {
			return "SELECT " . self::CARD_FIEDS . " FROM ".self::MLS_TABLENAME." WHERE 
					(DATE_SUB(CURDATE(),INTERVAL $interval DAY) <= listing_date) AND 
					$type AND $subtype ORDER BY listing_date DESC ";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		if (!empty($this->subdiv))
			$sql_or[] = "subdivision REGEXP '$this->subdiv'";

		// throw city into the search becuz sometimes the data has a blank listing_area....sigh - marke
		if (!empty($_POST['city']))
			$sql_or[] = "city = " . $this->quote($this->fix_dashes($_POST['city']));


		// create multi-city OR sql statement...implode() magic - marke
		if (!empty($sql_or))
			$orsql = '('.implode(" OR ", $sql_or).')';

		$sql_addition = array();

		//
		//  process the search and property type info ////////////////////////////////////////////  
		//

		//$this->setPropertyType($_POST['proptype']);

		switch (strtolower($_POST['property-subtype'])) {

			// kludge-y way to deal with property_type search - ugh sorry
			case "homes":
			case "home":
			case "house":
				$type = "  property_type='Residential' ";
				$subtype = " property_type = 'Single Family Residential' ";
				break;

			case "villa":
			case "townhome":
			case "townhomes":
			case "townhouse":
				$subtype =  "  property_sub_type='Townhouse' ";
				$type = "  property_type='Residential' ";
				break;

			case "high-rise":
				$type = "  property_type='High Rise' ";
				break;

			case "condo":
			case "condos":
				$type = "  property_type='Residential' ";
				$subtype = " property_sub_type='Condominium' ";
				break;

			case "new":
				$type = " (DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= listing_date) ";
				break;

			case "industrial":
				$type = "property_type='commercial' AND property_sub_type='industrial' ";
				break;

			case "commercial":
				$type = "property_type='commercial' AND property_sub_type='commercial' ";
				if (isset($srch) && $srch=="sale")
					$isComm = true;
				break;

			case "vacantland":
				$type = "property_type='vacantland'";
				break;

			case "listings":
			default:
				// ALL proptype falls here
				break;
		} // end proptype switch

		if (!empty($type))
			$sql_addition[] = $type;

		//
		//  end process top level type data ////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//

		if (!empty($_POST['subdiv'])) {
			$_POST['subdiv']=fixDashes($_POST['subdiv']);
			$sql_addition[] = " subdivision REGEXP '$_POST[subdiv]'";
		}


		if(!empty($_POST['price_from'])) {
			if($_POST['price_from']=="any") {
				$price_from=0;
				$_POST['price_to'] = 100000000;

			}
			else {
				$price_from=$_POST['price_from'];
			}
			$sql_addition[] = " listing_price >= $price_from ";
		}

		if(!empty($_POST['price_to'])) {
			$price_to = $_POST['price_to'];
			$sql_addition[] = " listing_price <= $price_to ";
		}

		//
		//  end process price search  ///////////////////////////////////////////////////////////////////////////
		//

		if(!empty($_POST['beds_from'])) {
			if($_POST['beds_from']=="any") {
				$beds_from=0;
				$_POST['beds_to'] = 20;
			}
			else {
				$beds_from = $_POST['beds_from'];
			}
			$sql_addition[] = " bedrooms >= $beds_from ";
		}

		if(!empty($_POST['beds_to'])) {
			$beds_to= $_POST['beds_to'];
			$sql_addition[] = " bedrooms <= $beds_to ";
		}


		if(!empty($_POST['baths_from'])) {
			if($_POST['baths_from']=="any") {
				$baths_from=0;
				$_POST['baths_to'] = 20;
			}
			else {
				$baths_from = $_POST['baths_from'];
			}

			$sql_addition[] = " full_bath >= $baths_from ";
		}

		if(!empty($_POST['baths_to'])) {
			$baths_to = $_POST['baths_to'];
			$sql_addition[] = " full_bath <= $baths_to ";
		}

		/* FOOTAGE */
		if(!empty($_POST['sqft_from'])) {
			$footage_from = $_POST['sqft_from'];
			$sql_addition[] = " sqft_living >=$footage_from ";
		}

		if(!empty($_POST['sqft_to'])) {
			$footage_to  = $_POST['sqft_to'];
			$sql_addition[] = " sqft_living <=$footage_to ";
		}

		if(!empty($_POST['year_from'])) {
			if ($_POST['year_from']=="any") {
				$year_from = "1000";
				$_POST['year_to'] = date("Y");
			}
			else {
				$year_from = $_POST['year_from'];
			}

			$sql_addition[] = "year_built >= $year_from";
		}

		if(!empty($_POST['year_to'])) {
			$year_to = $_POST['year_to'];
			$sql_addition[] = "year_built <=$year_to";
		}

		if($_POST['pool']!='Any') {

			$pool = $_POST['pool'];
			if ($pool=="Private") {
				$sql_addition[] = " pool = 1 ";
			} else {
				$sql_addition[] = " pool = 0 ";
			}
		}

		if(!empty($_POST['dwelling'])) {
			$dwelling = $_POST['dwelling'];
			$sql_addition[] = " dwelling_view LIKE '%$dwelling%' ";
		}

		if(!empty($_POST['over55'])) {

			$sql_addition[] = " ( remarks REGEXP 'adult' OR remarks REGEXP '55' ) ";
		}

		if(!empty($_POST['reo'])) {

			$sql_addition[] = " ( reo = 'Yes' ) ";
		}

		if(!empty($_POST['pets'])) {

			$sql_addition[] = " ( pets = 'Yes' OR pets = 'Restricted' ) ";
		}   

		if(!empty($_POST['gated'])) {  
			$sql_addition[] = " security REGEXP 'gate' ";
		}

		/* FORECLOSURE */
		if($_POST['foreclosure'] != "any") {
			$flg = $_POST['foreclosure'] == 'yes'?'1':'0';
			$sql_addition[] = " in_foreclose = $flg ";
		}

		if(!empty($_POST['waterfront'])) {
			$sql_addition[] = " waterfront <> 'None' ";
		}

		//  seo quicksearch stuff to process searches - me
		if (isset($street) && $street != ""){
			$street=str_replace("-"," ",$street);
			$sql_addition[] = " street_name LIKE '%". $street ."%' ";
		}

		if (isset($zipcode) && $zipcode != ""){
			$sql_addition[] = " postal_code = '". $zipcode ."' ";
		}

		/* WATER */
		if (!empty($watertype) && $watertype != ""){
			$watertype = fixDash($watertype);
			$sql_addition[] = " water_type LIKE '%". $watertype ."%' ";
		}

		$andsql = implode(" AND ", $sql_addition);

		if (isset($orsql)) {
			if(!empty($andsql)) $andsql = ' AND ' . $andsql;
		}
		else $orsql="";

		if ($countFlag)
			return "SELECT count(*) as cnt,property_sub_type,city,postal_code FROM ".self::MLS_TABLENAME. " WHERE $orsql $andsql ORDER BY listing_price DESC";
		else
			return "SELECT * FROM ".self::MLS_TABLENAME." WHERE $orsql $andsql ORDER BY listing_price DESC";
	}

	protected function getImageArray() {

		include_once('includes/globals.php');
		global $base_image_dir;
		global $base_image_jpeg_dir;
		global $global_browser_id;

	// 	$global_browser_id = 1;

		$listing_fname = $this->getGlobPicFn();

		$search_fname = $base_image_dir."/".$listing_fname."-?.jpg";
		$jpg_count = -1;

		if ($global_browser_id == 1) {
			$search_jpg_name = "rets/photos/".$listing_fname."-?.jpg";
			$fn_jpg_Array1 = glob($search_jpg_name);
			$jpg_count = count($fn_jpg_Array1);
		}

		$fnArray1 = glob($search_fname);
		if ($fnArray1==false) {
			$fnArray1 = array();
		}
		$fn_count = count($fnArray1);


		// fix the fact the glob sometimes doens't return an array type...
		$fnArray2 = glob($base_image_dir."/".$listing_fname."-??.jpg");
		if ($fnArray2==false) {
			$fnArray2 = array();
		}

		// added for props with over 100 images...sigh..agents need to chill with that shit - marke
		$fnArray3 = glob($base_image_dir."/".$listing_fname."-???.jpg");
		if ($fnArray3==false) {
			$fnArray3 = array();
		}

		// merge the arrays and get coun
		$images1 = array_merge($fnArray2 , $fnArray3 );
		$images = array_merge($fnArray1 , $images1 );
		$image_count = count($images);

		if ($global_browser_id == 1 && $fn_count <> $jpg_count) {
			$images = $this->convert_to_jpeg($images);
		}

		if ($global_browser_id ==1)
			$images=$this->convert_to_jpeg_filenames($images);

		return $images;

	}

	public function convert_to_jpeg($img) {

		global $base_image_jpeg_dir;

		$img_names = [];
		foreach ($img as $i) {
			$jpg_image = imagecreatefromwebp($i);
			$img_name_part = pathinfo($i);
			imagejpeg($jpg_image, "rets/photos/" . $img_name_part['filename'] . ".jpg", 60);
			$img_names[] = "rets/photos/" . $img_name_part['filename'] . ".jpg";
		}

		return $img_names;
	}

	public function convert_to_jpeg_filenames($img) {
		$img_names = [];
		foreach ($img as $i) {
			$img_name_part = pathinfo($i);
			$img_names[] = "rets/photos/jpeg/" . $img_name_part['filename'] . ".jpg";
		}
		return $img_names;
	}



}





