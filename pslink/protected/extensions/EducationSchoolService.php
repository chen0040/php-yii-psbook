<?php

class EducationSchoolService extends CComponent
{
	private $singapore_schools=null;
	private $china_schools=null;   
       private $australia_schools=null;
	private $uk_schools=null;//  each country define here
	private $usa_schools=null; 
	
	public function __construct()
	{
	}

	public function init()
	{
	}
	
	public function getSchoolsByCountry($country)
	{		
		if($country==='Singapore')
		{
			if(isset($this->singapore_schools))
			{
				return $this->singapore_schools;
			}  // in each country do this
			
			$this->singapore_schools=array();
			
			//Singapore
			$singapore_singapore_singapore_schools=array(
			'National University of Singapore',
			'Nanyang Technological University',
			'Singapore Management University',
			'Singapore Polytechnic',
			'NanYang Polytechnic',
			'Temasek Polytechnic',
			'Ngee Ann Polytechnic',
			'Republic Polytechnic',
			'British Council',
			'Singapore International Hotel and Tourism College',
			'Lasalle College of the Arts',
			'Management Development Insitiute Of Singapore',
			'Ministry Of Education Singapore',
			'Singapore Institute Of Management',
			'Management Development Institute Of Singapore',
			'Nanyang Academy of Fine Arts',
			'Singapore Institute of Materials Management',
			'Lasalle college of the Arts',
			'Building and Construction Authority',
			'Young Men\'s Christian Association of Singapore',
			'Informatics Institute of Singapore',
			'Stansfield College',
			'Raffles Junior College',
			'Shelton College International Singapore',
			'Singapore Accountancy Academy',
			'EASB Institute of Management',
			'Kaplan-Asia Pacific Management Institute Of Singapore',
			'Kaplan Financial',
			'Kaplan Fanancial',
			'Dimensions Education Group',
			'PSB Academy',
			'Raffles Design Institute of Singapore',
			'Singapore Brookes University Business School',
			'Singapore Raffles Music College',
			'Nanyang Institute of Management',
			'University of New Brunswick Singapore Campus',
			'ERC Institute',
			);
			
			$singapore_singapore_schools=array();
			$singapore_singapore_schools['Singapore']=$singapore_singapore_singapore_schools;
			$this->singapore_schools['Singapore']=$singapore_singapore_schools;
			
			return $this->singapore_schools;  // each country has this return
		}
		else if($country==='UK')
		{
			if(isset($this->uk_schools))
			{
				return $this->uk_schools;
			}  // in each country do this
			
			$this->uk_schools=array();
			
			//UK
			$uk_uk_uk_schools=array(
			'Oxford',
			'Cambridge',
			'Imperial College',
			'Imperial College',
			'University College London',
			'Loughborough',
			'Bristol',
			'Warwick',
			'Bath',
			'Durham',
			'Edinburgh',
			'Royal Holloway',
			'Aston',
			'Nottingham',
			'York',
			'Cardiff',
			'King\'s College London',
			'Leicester',
			'SOAS',
			'St Andrews',
			'Lancaster',
			'Southampton',
			'East Anglia',
			'Sheffield',
			'Newcastle',
			'Manchester',
			'Sussex',
			'Exeter',
			'Glasgow',
			'Essex',
			'Reading',
			'Queen\'s, Belfast',
			'Birmingham',
			'Kent',
			'Leeds',
			'Aberdeen',
			'Stirling',
			'Surrey',
			'Liverpool',
			'Strathclyde',
			'Queen Mary',
			'Bangor',
			'Swansea',
			'Dundee',
			'Goldsmiths College',
			'Aberystwyth',
			'Bradford',
			'Heriot-Watt',
			'Hull',
			'Brunel',
			'Ulster',
			'Keele',
			'City',
			'Oxford Brookes',
			'Plymouth',
			'Robert Gordon',
			'Abertay Dundee',
			'Northumbria',
			'Brighton',
			'Nottingham Trent',
			'UWIC, Cardiff',
			'Winchester',
			'Central England',
			'Chichester',
			'Salford',
			'Lampeter',
			'West of England',
			'Chester',
			'Bournemouth',
			'Roehampton',
			'Glasgow Caledonian',
			'Central Lancashire',
			'Bath Spa',
			'Glamorgan',
			'Staffordshire',
			'Coventry',
			'Portsmouth',
			'Gloucestershire',
			'Napier',
			'UWCN, Newport',
			'Sheffield Hallam',
			'Worcester',
			'Liverpool John Moor',
			'Univ of the Arts, London',
			'Hertfordshire',
			'Canterbury Christ Church',
			'Anglia Ruskin',
			'Bolton',
			'Kingston',
			'Huddersfield',
			'Leeds Metropolitan',
			'Sunderland',
			'East London',	
			'Westminster',
			'Teesside',
			'Liverpool Hope',
			'Manchester Metropolitan',
			'Middlesex',
			'De Montfort',
			'Wolverhampton',
			'London South Bank',
			'Paisley',
			'Northampton',
			'Lincoln',
			'Derby',
			'Greenwich',
			'Southampton Solent',
			'Luton',
			'Thames Valley',
			'Buckinghamshire Chilterns',
			'London Metropolitan',
			'Creative Arts',
			'Royal Academy of Music',
			'The Glasgow School of Art',
			'Finical investment and Banking',
			'Albion',
			'Bucks New',
			'Edinburgh College Of Art',
			'Birmingam City',
			'Cumbria',
			'RSAMD',
			'King\'s College  Cambridge  UK',
			'Harper Adams University College',
			'Leeds Trinity & All Saints',
			'Calderdale College',
			'Ealing & Hammersmith West London College',
			'Brighton  College',
			'Bournemouth and Poole College',
			'Architectural Association School of Architecture',
			'The University of Buckingham',
			'Glyndwr University',
			'Cambridge International College',
			'Glasgow Caledonian University',
			'Greenwich School of Management',
			'Queen Margaret University',
			'The Royal Agricultural College',
			'Harper Adams University College',
			'Leeds Trinity & All Saints',
			'Calderdale College',
			'Ealing & Hammersmith West London College',
			'Brighton  College',
			'Bournemouth and Poole College',
			'Architectural Association School of Architecture',
			'The University of Buckingham',
			'Glyndwr University',
			'Cambridge International College',
			'Glasgow Caledonian University',
			'Greenwich School of Management',
			'Queen Margaret University',
			'The Royal Agricultural College',
			'Hartlepool Sixth Form College',
			'INTO Manchester',
			'Harrow International Business School',
			'Saint Martins University',
			'Cranfield University',
			'Chartered Institute of Marketing',
			'University of Bedfordshire',
			'University College Birmingham',
			'College Of Naturopathic Medicine UK',
			'London School of Commerce',
			'Royal College of Art',
			'Royal College of Music',
			'University College Falmouth',
			'Oak Pacific Interative',
			'Royal Northern College of Music',
			'Liverpool John Moores University',
			'The University of Sheffield',
			'The University of Warwick',
			'Coventry University',
			'London College of Accountancy',
			'Ravensbourne College of Design and Communication',
			'Hogwarts School',
			'Royal Academy of Arts',
			'the University of Glasgow',
			'Liverpool Hope University',
			'University of liverpool',
			'Kings College London',
			'Lancaster University',
			'Aston University',
			'Royal holloway',
			'University College of London',
			'The University of Nottingham',
			'Winchester College',
			);
			
			$uk_uk_schools=array();
			$uk_uk_schools['UK']=$uk_uk_uk_schools;
			$this->uk_schools['UK']=$uk_uk_schools;
			
			return $this->uk_schools;  // each country has this return
		}
		else if($country==='Australia')
		{
			if(isset($this->australia_schools))
			{
				return $this->australia_schools;
			}  // in each country do this
			
			$this->australia_schools=array();
			
			//Australia
			$australia_australia_australia_schools=array(
			'University of Sydney',
			'University of New South Wales',
			'University of Melbourne',
			'Adelaide University',
			'Monash University',
			'The University of Queensland'.
			'The University of Western Australia',
			'The Australian National University',
			'Macquarie University',
			'The University of Newcastle',
			'University of Wollongong',
			'Griffith University',
			'Flinders University',
			'University of Tasmania',
			'University of Western Sydney',
			'Bond University',
			'Deakin University',
			'University of Technology , Sydney',
			'Curtin University of Technology',
			'RMIT University',
			'Queensland University of Technology',
			'La Trobe University',
			'Murdoch University',
			'University of Canberra',
			'Swinburne University of Technology',
			'University of South Australia',
			'Charles Sturt University',
			'James Cook University',
			'University of Notre Dame',
			'University of New England',
			'University of Southern Queensland',
			'Australia Catholic University',
			'University of Ballarat',
			'Edith Cowan University',
			'Southern Cross University',
			'University of Sunshine Coast',
			'Victoria University',
			'Northern Territory University',
			'Australian National University',
			'Carrick Institute of Education',
			'BoxHill Institute TAFE',
			'New south wales Technical And Further Education',
			'Central Queensland University',
			'Billy Blue School of Graphic Arts',
			'Academia International',
			'Canberra Institute of Technology',
			'Hunter Institute of Technology',
			'Illawarra Institute of TAFE',
			'New England Institute of TAFE',
			'North Coast Institute of TAFE',
			'Northern Sydney Institute of TAFE',
			'Riverina Institute of TAFE',
			'South Western Sydney Institute of TAFE',
			'Sydney Institute of Technology',
			'Western Institute of TAFE',
			'Western Sydney Institute of TAFE',
			'Charles Darwin University',
			'Barrier Reef Institute of TAFE',
			'Brisbane North Institute of TAFE',
			'Central Queensland Institute of TAFE',
			'Cooloola Sunshine Institute of TAFE',
			'Gold Coast Institute of TAFE',
			'Gold Coast Institute of TAFE',
			'Moreton Institute of TAFE',
			'Mt Isa Institute of TAFE',
			'Open Learning Institute',
			'Southbank Institute of TAFE',
			'Southern Queensland Institute of TAFE',
			'The Bremer Institute of TAFE',
			'Tropical North Queensland Institute of TAFE',
			'Wide Bay Institute of TAFE',
			'Yeronga Institute of TAFE',
			'Adelaide Institute of TAFE',
			'Douglas Mawson Institute of TAFE',
			'Murray Institute of TAFE',
			'Onkaparinga Institute of TAFE',
			'Regency Institute of TAFE',
			'Spencer Institute of TAFE',
			'Torrens Valley Institute of TAFE',
			'The Institute of TAFE Tasmania',
			'Bendigo Regional Institute of TAFE',
			'Central Gippsland Institute of TAFE',
			'Chisholm Institute of TAFE',
			'East Gippsland Institute of TAFE',
			'Gordon Institute of TAFE',
			'Goulburn Ovens Institute of TAFE',
			'Holmesglen Institute of TAFE',
			'Kangan Batman Institute of TAFE',
			'Northern Melbourne Institute of TAFE',
			'South West Institute of TAFE',
			'Sunraysia Institute of TAFE',
			'William Angliss Institute of TAFE',
			'Wodonga Institute of TAFE',
			'Central West College of TAFE',
			'Challenger TAFE',
			'CY O\'Connor College of TAFE',
			'Great Southern TAFE',
			'Kimberley College of TAFE',
			'Pilbara TAFE',
			'South West Regional College of TAFE',
			'Swan TAFE',
			'TAFE International Western Australia',
			'West Coast College of TAFE',
			'Central TAFE',
			'The Meridian International Hotel School',
			'William Blue School of Hospitality',
			'Le Cordon Bleu Sydney',
			'Cambridge International College',
			'Southbank Institute of Technology',
			'International College of Hotel Management',
			'Academy of Information Technology',
			'Victory Institute of Professional Training',
			'Blue Mountains Hotel School',
			'Australian Institute of Translation and Interpretation',
			'Australian School of Tourism & Hotel Management',
			'China Southern Western Australia Flying College',
			'Le Cordon Bleu Australia',
			'TK Melbourne',
			'Australian International Conservatorium of Music',
			'Hospitality Training Association Inc',
			'the university of melbourne',
			'Melbourne Institute of Business and Technology£¨MIBT£©',
			'Australian National Institute of Business & Technology (ANIBT)',
			'taylors college',			
			);
			
			$australia_australia_schools=array();
			$australia_australia_schools['Australia']=$australia_australia_australia_schools;
			$this->australia_schools['Australia']=$australia_australia_schools;
			
			return $this->australia_schools;  // each country has this return
		}

		else if($country==='USA')
		{
			if(isset($this->usa_schools))
			{
				return $this->usa_schools;
			}
			
			$this->usa_schools=array();
			
			//USA, AK
			$usa_ak_ak_schools=array(
			'University of Alaska Fairbanks',
			);
			
			$usa_ak_schools=array();
			$usa_ak_schools['AK']=$usa_ak_ak_schools;
			$this->usa_schools['AK']=$usa_ak_schools;

			//USA, AL
			$usa_al_al_schools=array(
			'Alabama A&M University',
			'Auburn University',
			'University of Alabama',
			'University of Alabama Birmingham',
			'University of Alabama Huntsville',
			'University of South Alabama',
			'Troy University',
			'Birmingham - Southern College',
			'University of North Alabama',
			'Samford University',
			);
			
			$usa_al_schools=array();
			$usa_al_schools['AL']=$usa_al_al_schools;
			$this->usa_schools['AL']=$usa_al_schools;

			//USA, AR
			$usa_ar_ar_schools=array(
			'University of Arkansas Little Rock',
			'University of Arkansas',
			'University of Central Arkansas',
			'Henderson State University',		
			'Harding University',
			'Lyon College',
			'Hendrix College',
			'Arkansas State University',
			'Arkansas Tech University',
			);
			
			$usa_ar_schools=array();
			$usa_ar_schools['AR']=$usa_ar_ar_schools;
			$this->usa_schools['AR']=$usa_ar_schools;

			//USA, AZ
			$usa_az_az_schools=array(
			'Northern Arizona University',
			'University of Arizona',
			'Arizona State University',
			'Pan Am International Flight Academy',
			'AirSafety Flight Academy',
			'Mayo Clinic College of Medicine',
			);
			
			$usa_az_schools=array();
			$usa_az_schools['AZ']=$usa_az_az_schools;
			$this->usa_schools['AZ']=$usa_az_schools;


			//USA, CA
			$usa_ca_ca_schools=array(
			'Biola University',
			'California Institute of Technology',
			'Pepperdine University',
			'San Diego State University',
			'Stanford University',
			'University of California Los Angeles',
			'University of California Riverside',
			'University of California San Diego',
			'University of California Santa Barbara',
			'University of California Santa Cruz',
			'University of Southern California',	
			'University of California Berkeley',
			'University of California Davis',
			'University of California Irvine',
			'University of La Verne',
			'University of San Diego',
			'University of San Francisco',
			'University of the Pacific',
			'Art Center College of Design',
			'California Polytechnic State University San Luis Obispo',
			'California State University,Los Angeles',
			'California State University,Bakersfield',
			'California State University,Chico',
			'California State University,Channel Islands',
			'California State University,Dominguez Hills',
			'California State University,Fresno',
			'California State University,Long Beach',
			'California State University,Maritime Academy',
			'California State University,Monterey Bay',
			'California State University,Northridge',
			'California State University,Pomona',
			'California State University,Sacramento',
			'California State University,San Bernardino',
			'California State University,San Marcos',
			'California State University,Stanislaus',
			'California State University, Fresno',
			'Santa Monica College',
			'De Anza College',
			'Fullerton College',
			'California State University,Fullerton',
			'Harvey Mudd College',
			'California State University, East Bay',
			'Humboldt State University',
			'Pasadena City College',
			'Mount San Antonio College',
			'Pomona College',
			'California State University',
			'California State University,San Diego',
			'California State University,San Francisco',
			'California State University,San Jose',
			'California State University,Sonoma',
			'Riverside Community College',
			'Diablo Valley College',
			'Laguna College of Art and Design',
			'Monterey Institute of International Studies',
			'Claremont McKenna College',
			'Scripps College',
			'Occidental College',
			'Ohlone College',
			'Grossmont College',
			'College of  San Mateo',
			'Academy of Art University',
			'East Los Angeles College',
			'Azusa Pacific University',
			'Thomas Aquinas College',
			'Westmont College',
			'Pitzer College',
			'Citrus College',
			'California Institute Of The Arts',
			'University of California Merced',
			'Sacramento City College',
			'City College of San Francisco',
			'Woodbury University',
			'California State Polytechnic University,Pomona',
			'Laney College',
			'Los Angeles City College',
			'Menlo College',
			'University of the West',
			'Thomas Jefferson School of Law',
			'California Baptist University',
			'New York Film Academy',
			'Otis College of Art and Design',
			'San Francisco Conservatory Of Music',
			'Sierra College',
			'Claremont Graduate University',
			'Santa Barbara City College',
			'California College of the Arts',
			'Moorpark College',
			'West Valley College',
			'Loma Linda University',
			'Butte College',
			'Golden Gate University',
			'Chabot College',
			'Northwestern Polytechnic University',
			'Glendale Community College',
			'College of Alameda',
			'Dominican University of California',
			'San Francisco State University',
			'The Scripps Research Institute',
			'Southern California Institute of Architecture',
			'Santa Clara University',
			'Foothill College',
			);
			
			$usa_ca_schools=array();
			$usa_ca_schools['CA']=$usa_ca_ca_schools;
			$this->usa_schools['CA']=$usa_ca_schools;

			//USA, CO
			$usa_co_co_schools=array(
			'Colorado State University',
			'University of Colorado Boulder',
			'University of Colorado Denver',
			'University of Denver',
			'University of Northern Colorado',
			'University of Colorado at Colorado Springs',
			'Colorado School of Mines',
			'Colorado College',
			'Colorado Mountain College',
			);
			
			$usa_co_schools=array();
			$usa_co_schools['CO']=$usa_co_co_schools;
			$this->usa_schools['CO']=$usa_co_schools;
			
			//USA, CT
			$usa_ct_ct_schools=array(
			'University of Bridgeport',
			'University of Connecticut',
			'University of Hartford',
			'Yale University',
			'Connecticut College',
			'Wesleyan University',
			'Trinity College',
			'University of New Haven',
			'Manchester Community College',		
			);
			
			$usa_ct_schools=array();
			$usa_ct_schools['CT']=$usa_ct_ct_schools;
			$this->usa_schools['CT']=$usa_ct_schools;
			
			//USA, DC
			$usa_dc_dc_schools=array(
			'American University',
			'Catholic University of America',
			'George Washington University',
			'Georgetown University',
			'Howard University',
			'University of the District of Columbia',	
			);
			
			$usa_dc_schools=array();
			$usa_dc_schools['DC']=$usa_dc_dc_schools;
			$this->usa_schools['DC']=$usa_dc_schools;
                    
			//USA,DE
			$usa_de_de_schools=array(
			'University of Delaware',
			'Wilmington College',
			);
			
			$usa_de_schools=array();
			$usa_de_schools['DE']=$usa_de_de_schools;
			$this->usa_schools['DE']=$usa_de_schools;

			//USA,FL
			$usa_fl_fl_schools=array(
			'Florida Atlantic University',
			'Florida Institute of Technology',
			'Florida International University',
			'Florida State University',
			'Nova Southeastern University',
			'University of Central Florida',
			'University of Florida',
			'University of Miami',
			'University of South Florida',
			'Rollins College',
			'Schiller International University',	
			'New College of Florida',
			'Embry-Riddle Aeronautical University',
			);
			
			$usa_fl_schools=array();
			$usa_fl_schools['FL']=$usa_fl_fl_schools;
			$this->usa_schools['FL']=$usa_fl_schools;

			//USA,GA
			$usa_ga_ga_schools=array(
			'Clark Atlanta University',
			'Emory University',
			'Georgia Institute of Technology',
			'Georgia State University',
			'University of Georgia',
			'Georgia Southern University',
			'Kennesaw State University',
			'Savannah College of Art and Design',
			'Valdosta State University',
			'Agnes Scott College',
			'Southern Polytechnic State University',
			'Berry College',
			'Spelman College',
			'Georgia College & State University',
			'Georgia Southwestern State University',
			'Mercer University',
			'Georgia Perimeter College',
			);
			
			$usa_ga_schools=array();
			$usa_ga_schools['GA']=$usa_ga_ga_schools;
			$this->usa_schools['GA']=$usa_ga_schools;

			//USA,HI
			$usa_hi_hi_schools=array(
			'University of Hawaii Manoa',
			'Hawaii Pacific University',
			'University of Hawaii',
			'Chaminade University of Honolulu',
			'Brigham Young University Hawaii',
			);

			$usa_hi_schools=array();
			$usa_hi_schools['HI']=$usa_hi_hi_schools;
			$this->usa_schools['HI']=$usa_hi_schools;

			//USA,IA
			$usa_ia_ia_schools=array(
			'Iowa State University',
			'University of Iowa',
			'Graceland University',
			'Grinnell College',
			'Luther College',
			'Drake University',
			'University of Northern Iowa',
			'Coe College',
			'Cornell College',
			'Divine Word College',
			'Central College',
			'Des Moines Area Community College',
			'Iowa Wesleyan College',
			);

			$usa_ia_schools=array();
			$usa_ia_schools['IA']=$usa_ia_ia_schools;
			$this->usa_schools['IA']=$usa_ia_schools;

			//USA,ID
			$usa_id_id_schools=array(
			'Idaho State University',
			'University of Idaho',
			'Boise state university,Idaho',
			);

			$usa_id_schools=array();
			$usa_id_schools['ID']=$usa_id_id_schools;
			$this->usa_schools['ID']=$usa_id_schools;

			//USA,IL
			$usa_il_il_schools=array(
			'DePaul University',
			'Illinois Institute of Technology',
			'Illinois State University',
			'Loyola University Chicago',
			'National-Louis University',
			'Northern Illinois University',
			'Northwestern University',
			'Southern Illinois University Carbondale',
			'University of Illinois Urbana-Champaign',
			'University of Chicago',
			'University of Illinois Chicago',
			'Knox College',
			'Lake Forest College',
			'Roosevelt University',
			'Illinois Wesleyan University',
			'Black Hawk College',
			'Augustana College',
			'Principia College',
			'Columbia College Chicago',
			'School of the Art Institute of Chicago',	
			'Parkland College',
			'Moraine Valley Community College',
			'Fermi National Accelerator Laboratory',
			'Dominican University',
			'Benedictine University',
			'Lewis University',
			'Rush University',		
			);

			$usa_il_schools=array();
			$usa_il_schools['IL']=$usa_il_il_schools;
			$this->usa_schools['IL']=$usa_il_schools;

			//USA,IN
			$usa_in_in_schools=array(
			'Ball State University',
			'Indiana State University',
			'Indiana University-Purdue University Indianapolis',
			'Indiana University of Pennsylvania',
			'Indiana University Bloomington',
			'Purdue Universit',
			'University of Notre Dame',
			'Indiana University of Bloomington',
			'Unversity of Indianapolis',
			'University of southern Indiana',
			'Wabash College',
			'DePauw University',
			'Hanover College',
			'St. Mary\'s College',
			'Earlham College',
			'Valparaiso University',
			'Indiana University South Bend',
			'Butler University',
			'Rose-Hulman Institute of Technology',
			);

			$usa_in_schools=array();
			$usa_in_schools['IN']=$usa_in_in_schools;
			$this->usa_schools['IN']=$usa_in_schools;

			//USA,KS
			$usa_ks_ks_schools=array(
			'Kansas State University',
			'University of Kansas',
			'Wichita State University',
			'Emporia State University',
			'Fort Hays State University',
			'Pittsburg State University',
			);

			$usa_ks_schools=array();
			$usa_ks_schools['KS']=$usa_ks_ks_schools;
			$this->usa_schools['KS']=$usa_ks_schools;

			//USA,KY
			$usa_ky_ky_schools=array(
			'University of Kentucky',
			'University of Louisville',
			'Murray State University',
			'Centre College',
			'Berea College',
			'Transylvania University',
			'University of the Cumberlands',
			'Western Kentucky University',
			'Mid-Continent University',
			'Eastern Kentucky University',
			);

			$usa_ky_schools=array();
			$usa_ky_schools['KY']=$usa_ky_ky_schools;
			$this->usa_schools['KY']=$usa_ky_schools;

			//USA,LA
			$usa_la_la_schools=array(
			'Louisiana State University Baton Rouge',
			'Louisiana Tech University',
			'Tulane University',
			'University of Louisiana Lafayette',
			'University of New Orleans',
			'Loyola University New Orleans',
			'Centenary College of Louisiana',
			);

			$usa_la_schools=array();
			$usa_la_schools['LA']=$usa_la_la_schools;
			$this->usa_schools['LA']=$usa_la_schools;

			//USA,MA
			$usa_ma_ma_schools=array(
			'Boston College',
			'Boston University',
			'Brandeis University',
			'Clark University',
			'Harvard University',
			'Massachusetts Inst. of Technology',
			'Northeastern University',
			'Tufts University',
			'University of Massachusetts Amherst',
			'University of Massachusetts Boston',
			'University of Massachusetts Lowell',
			'Worcester Polytechnic Inst.',
			'Bentley College',
			'Bunker Hill Community College',
			'Bridgewater State College',
			'Smith College',
			'Gordon College',
			'Mount Holyoke College',
			'Suffolk University',
			'Wellesley College',
			'Hampshire College',
			'Babson College',
			'Williams College',
			'Amherst College',
			'Wheaton College',
			'Stonehill College',
			'College of the Holy Cross',
			'New England Conservatory of Music',
			'Colby-Sawyer College',
			'Worcester State College',
			'Fisher College',
			'Simmons College',
			'Massachusetts College of Pharmacy Alied Health Science',
			'Berklee College of Music',
			'Boston Graduate School of Psychoanalysis',
			'Hult International Business School',
			);

			$usa_ma_schools=array();
			$usa_ma_schools['MA']=$usa_ma_ma_schools;
			$this->usa_schools['MA']=$usa_ma_schools;

			//USA,MD
			$usa_md_md_schools=array(
			'Johns Hopkins University',
			'University of Maryland Baltimore County',
			'University of Maryland College Park',
			'Towson University',
			'Washington College',
			'St. Mary\'s College of Maryland',
			'Goucher College',
			'Howard Community College',
			'Anne Arundel Community College',
			'Montgomery College',
			'Community College of Baltimore County',
			);

			$usa_md_schools=array();
			$usa_md_schools['MD']=$usa_md_md_schools;
			$this->usa_schools['MD']=$usa_md_schools;

			//USA,ME
			$usa_me_me_schools=array(
			'University of Maine Orono',
			'Bowdoin College',
			'Colby College',
			'Bates College',
			);

			$usa_me_schools=array();
			$usa_me_schools['ME']=$usa_me_me_schools;
			$this->usa_schools['ME']=$usa_me_schools;

			//USA,MI
			$usa_mi_mi_schools=array(
			'Andrews University',
			'Central Michigan University',
			'Michigan State University',
			'Michigan Technological University',
			'Oakland University',
			'University of Michigan Ann Arbor',
			'Wayne State University',
			'Western Michigan University',
			'Kettering  University',
			'University of Detroit Mercy',
			'Hope College',
			'Albion College',
			'Calvin College',
			'Hillsdale College',
			'Kalamazoo College',
			'Eastern Michigan University',
			'Saginaw Valley State University',
			'Davenport University',
			'Spring Arbor University',
			'Northwood University',
			'Lawrence Technological University',
			'Truman State University',
			'University of Minnesota, Crookston',
			);

			$usa_mi_schools=array();
			$usa_mi_schools['MI']=$usa_mi_mi_schools;
			$this->usa_schools['MI']=$usa_mi_schools;

			//USA,MN
			$usa_mn_mn_schools=array(
			'University of Minnesota Twin Cities',
			'University of St. Thomas',
			'St.Cloud State University',
			'The College of St.Catherine',
			'St.Olaf College',
			'winona state university',
			'Carleton College',
			'Macalester College',
			'College of Saint Benedict/Saint John\'s University',
			'Gustavus Adolphus College',
			'University of Minnesota Morris',
			'Hamline University',
			'Minnesota State University, Mankato',
			'Bethany Lutheran College',
			'University of Minnesota Duluth',
			'Concordia College',
			'Bemidji State University',
			'University of Minnesota Crookston',
			);

			$usa_mn_schools=array();
			$usa_mn_schools['MN']=$usa_mn_mn_schools;
			$this->usa_schools['MN']=$usa_mn_schools;

			//USA,MO
			$usa_mo_mo_schools=array(
			'St. Louis University',
			'University of Missouri Columbia',
			'University of Missouri Kansas City',
			'University of Missouri St. Louis',
			'University of Missouri Rolla',
			'Washington University in St. Louis',
			'Drury University',
			'Missouri Western State University',
			'Southeast Missouri State University',
			'Missouri State University',
			);

			$usa_mo_schools=array();
			$usa_mo_schools['MO']=$usa_mo_mo_schools;
			$this->usa_schools['MO']=$usa_mo_schools;

			//USA,MS
			$usa_ms_ms_schools=array(
			'Jackson State University',
			'Mississippi State University',
			'University of Southern Mississippi',
			'University of Mississippi',
			'Mississippi College',
			'Millsaps College',
			'William Carey University',
			);

			$usa_ms_schools=array();
			$usa_ms_schools['MS']=$usa_ms_ms_schools;
			$this->usa_schools['MS']=$usa_ms_schools;

			//USA,MT
			$usa_mt_mt_schools=array(
			'Montana State University Bozeman',
			'University of Montana',
			);

			$usa_mt_schools=array();
			$usa_mt_schools['MT']=$usa_mt_mt_schools;
			$this->usa_schools['MT']=$usa_mt_schools;

			//USA,NC
			$usa_nc_nc_schools=array(
			'Duke University',
			'East Carolina University',
			'North Carolina State University Raleigh',
			'University of North Carolina Chapel Hill',
			'University of North Carolina Greensboro',
			'Wake Forest University',
			'Davidson College',
			'University of North Carolina Wilmington',
			'Unversity of North Carolina Charlotte',
			'Salem College',
			'School of Arts',
			'Appalachian State University',
			'University of North Carolina Pembroke',
			'Wake Technical Community College',
			'Methodist University',
			);

			$usa_nc_schools=array();
			$usa_nc_schools['NC']=$usa_nc_nc_schools;
			$this->usa_schools['NC']=$usa_nc_schools;

			//USA,ND
			$usa_nd_nd_schools=array(
			'North Dakota State University',
			'niversity of North Dakota',
			'Minot State University',
			'Dickinson State University',
			);

			$usa_nd_schools=array();
			$usa_nd_schools['ND']=$usa_nd_nd_schools;
			$this->usa_schools['ND']=$usa_nd_schools;

			//USA,NE
			$usa_ne_ne_schools=array(
			'University of Nebraska Lincoln',
			'University of Nebraska at Omaha',
			'University of Nebraska Kearney',
			);

			$usa_ne_schools=array();
			$usa_ne_schools['NE']=$usa_ne_ne_schools;
			$this->usa_schools['NE']=$usa_ne_schools;

			//USA,NH
			$usa_nh_nh_schools=array(
			'Dartmouth College',
			'University of New Hampshire',
			'Franklin Pierce University',
			);

			$usa_nh_schools=array();
			$usa_nh_schools['NH']=$usa_nh_nh_schools;
			$this->usa_schools['NH']=$usa_nh_schools;

			//USA,NJ
			$usa_nj_nj_schools=array(
			'New Jersey Inst. of Technology',
			'Princeton University',
			'Rutgers New Brunswick',
			'Rutgers Newark',
			'Seton Hall University',
			'Stevens Institute of Technology',
			'rutgers university of new jersey',
			'middlesex county college',
			'Fairleigh Dickinson University',
			'Rowan University',
			'Drew University',
			'Montclair State University',
			'Rider University',
			'Centenary College',
			'William Paterson University',
			'Kean University',
			);

			$usa_nj_schools=array();
			$usa_nj_schools['NJ']=$usa_nj_nj_schools;
			$this->usa_schools['NJ']=$usa_nj_schools;

			//USA,NM
			$usa_nm_nm_schools=array(
			'N.M. Inst. of Mining and Tech.',
			'New Mexico State University',
			'University of New Mexico',
			'Eastern New Mexico University',
			'St.John\'s College',
			);

			$usa_nm_schools=array();
			$usa_nm_schools['NM']=$usa_nm_nm_schools;
			$this->usa_schools['NM']=$usa_nm_schools;

			//USA,NV
			$usa_nv_nv_schools=array(
			'University of Nevada Las Vegas',
			'University of Nevada Reno',
			'Truckee Meadows Community College',
			'College of Southern Nevada',
			);

			$usa_nv_schools=array();
			$usa_nv_schools['NV']=$usa_nv_nv_schools;
			$this->usa_schools['NV']=$usa_nv_schools;

			//USA,NY
			$usa_ny_ny_schools=array(
			'Adelphi University',
			'Clarkson University',
			'Columbia University',
			'Cornell University',
			'Fordham University',
			'Hofstra University',
			'New School University',
			'New York University',
			'Pace University',
			'Polytechnic Institute of New York University',
			'Rensselaer Polytechnic Inst.',
			'St. John\'s University',
			'SUNY Albany',
			'SUNY Binghamton',
			'SUNY College Environmental Science and Forestry',
			'SUNY Stony Brook',
			'SUNY University at Buffalo',
			'Syracuse University',
			'University of Rochester',
			'Yeshiva University',
			'Bard College',
			'The City University of New York',
			'The Cooper Union for the Advancement of Science and Art',
			'Fashion Institute of Technology',
			'SUNY Fredonia',
			'Sarah Lawrence College',
			'Ithaca College',
			'The Juilliard School',
			'Colgate University',
			'SUNY PLATTSBURGH',
			'State University of New York at Oswego',
			'SUNY Potsdam',
			'Hamilton College',
			'Vassar College',
			'Barnard College',
			'St. Lawrence Universtiy',
			'Skidmore College',
			'Rochester Institute Of Technology',
			'Manhattan School of Music',
			'CUNY Baruch College',
			'St. Lawrence University',
			'Siena College',
			'Wells College',
			'Hobart and William Smith Colleges',
			'Union College',
			'Suny College Of Technology At Alfred',
			'CNUY Johnjay College',
			'CUNY Queens College',
			'Elmira College',
			'School of Visual Arts',
			'SUNY Geneseo',
			'SUNY Upstate Medical University',
			'Queens Community College',
			'Pratt Institute',
			'Long Island University',
			'Dowling College',
			'SUNY Farmingdale',
			'Borough of Manhattan Community College',
			'SUNY New Paltz',
			'Mount Saint Mary College',
			'Keuka College',
			'Saint Francis College',
			'St. Joseph\'s College',
			'SUNY Old Westbury',
			'Cuny Hunter College',
			'New York Institute of Technology',
			'CUNY LaGuardia Community College',
			'Alfred University',
			'Houghton College',
			'United States Military Academy at West Point',
			'Manhattan College',
			'Parsons School of Design',
			'New York School Of Interior Design',
			'Hartiwck College',
			);

			$usa_ny_schools=array();
			$usa_ny_schools['NY']=$usa_ny_ny_schools;
			$this->usa_schools['NY']=$usa_ny_schools;

			//USA,OH
			$usa_oh_oh_schools=array(
			'Bowling Green State University',
			'Case Western Reserve University',
			'Cleveland State University',
			'Kent State University',
			'Miami University Oxford',
			'Ohio State University Columbus',
			'Ohio University',
			'Union Institute',
			'University of Akron',
			'University of Cincinnati',
			'University of Dayton',
			'University of Toledo',
			'Wright State University',
			'Denison University',
			'heidelberg college',
			'Marietta College',
			'Oberlin College',
			'Tiffin University',
			'College of Wooster',
			'Kenyon College',
			'Ohio Wesleyan University',
			'Wittenberg University',
			'University of Findlay',
			'Ashland University',
			'Ohio Northern University',
			);

			$usa_oh_schools=array();
			$usa_oh_schools['OH']=$usa_oh_oh_schools;
			$this->usa_schools['OH']=$usa_oh_schools;

			//USA,OK
			$usa_ok_ok_schools=array(
			'Oklahoma State University',
			'University of Oklahoma',
			'University of Tulsa',
			'Oklahoma Christian University',
			'Southeastern Oklahoma State University',
			'Nothwestern Oklahoma State University',
			'Oklahoma City University',
			'Oklahoma City Community College',
			'Southern Nazarene University',
			'University of Central Oklahoma',
			);

			$usa_ok_schools=array();
			$usa_ok_schools['OK']=$usa_ok_ok_schools;
			$this->usa_schools['OK']=$usa_ok_schools;

			//USA,OR
			$usa_or_or_schools=array(
			'Oregon State University',
			'Portland State University',
			'University of Oregon',
			'Lewis & Clark College',
			'western oregon university',
			'Willamette University',
			'Linfield College',
			'Reed College',
			'Southern Oregon University',
			'Pacific University',
			'George Fox University',
			);

			$usa_or_schools=array();
			$usa_or_schools['OR']=$usa_or_or_schools;
			$this->usa_schools['OR']=$usa_or_schools;

			//USA,PA
			$usa_pa_pa_schools=array(
			'Carnegie Mellon University',
			'Drexel University',
			'Duquesne University',
			'Lehigh University',	
			'MCP Hahnemann University',
			'Pennsylvania State University Park',
			'Temple University',
			'University of Pennsylvania',
			'University of Pittsburgh',
			'Widener University',
			'Bryn Mawr College',
			'Bucknell University',
			'Chatham University',
			'Franklin & Marshall College',
			'Grove City College',
			'Swarthmore College',
			'Saint Joseph\'s University',
			'Haverford College',
			'Lafayette College',
			'Dickinson College',
			'Gettysburg College',
			'Allegheny College',
			'Philadelphia University',
			'The Curtis Institute of Music',
			'Villanova University',
			'Muhlenberg College',
			'Susquehanna University',
			'Washington and Jefferson College',
			'Juniata College',
			'Lock Haven',
			'Bloomsburg University of Pennsylvania',
			'Kutztown University of Pennsylvania',
			'Arcadia University',
			'University of Scranton',
			'Community College of Philadelphia',
			'Clarion University of Pennsylvania',
			'La Salle University',
			'East Stroudsburg University',
			'Harrisburg Area Community College',
			'Edinboro University of Pennsylvania',
			'Albright College',
			'Cedar Crest College',
			'Wilkes University',
			'Slippery Rock University',
			);

			$usa_pa_schools=array();
			$usa_pa_schools['PA']=$usa_pa_pa_schools;
			$this->usa_schools['PA']=$usa_pa_schools;

			//USA,RI
			$usa_ri_ri_schools=array(
			'Brown University',
			'University of Rhode Island',
			'Bryant University',
			'RISD',
			'Johnson & Wales University',
			'Roger Williams University',
			);

			$usa_ri_schools=array();
			$usa_ri_schools['RI']=$usa_ri_ri_schools;
			$this->usa_schools['RI']=$usa_ri_schools;

			//USA,SC
			$usa_sc_sc_schools=array(
			'Clemson University',
			'South Carolina State University',
			'University of South Carolina Columbia',
			'Winthrop University',
			'Presbyterian College',
			'Wofford College',
			'Furman University',
			);

			$usa_sc_schools=array();
			$usa_sc_schools['SC']=$usa_sc_sc_schools;
			$this->usa_schools['SC']=$usa_sc_schools;

			//USA,SD
			$usa_sd_sd_schools=array(
			'South Dakota State University',
			'University of South Dakota',
			'Northern State University',
			'Dakota State Universit',
			);

			$usa_sd_schools=array();
			$usa_sd_schools['SD']=$usa_sd_sd_schools;
			$this->usa_schools['SD']=$usa_sd_schools;

			//USA,TN
			$usa_tn_tn_schools=array(
			'East Tennessee State University',
			'Middle Tennessee State University',
			'Tennessee State University',
			'University of Tennessee Knoxville',
			'University of Memphis',
			'Vanderbilt University',
			'Tennessee Technological University',
			'Rhodes College',
			'Fisk University',
			'Sewanee¡ªUniversity of the South',
			);

			$usa_tn_schools=array();
			$usa_tn_schools['TN']=$usa_tn_tn_schools;
			$this->usa_schools['TN']=$usa_tn_schools;

			//USA,TX
			$usa_tx_tx_schools=array(
			'Baylor University',
			'Rice University',
			'Southern Methodist University',
			'Texas A&M University College Station',
			'Texas A&M University Kingsville',
			'Texas A&M University Commerce',
			'Texas Christian University',
			'Texas Southern University',
			'Texas Tech University',
			'Texas Woman\'s University',
			'University of Houston',
			'University of North Texas',
			'University of Texas Arlington',
			'University of Texas Austin',
			'University of Texas Dallas',
			'University of Texas El Paso',
			'Abilene Christian University',
			'University of Texas San Anotnio',
			'University of Texas at San Antonio',
			'RICHLAND COLLEGE',
			'Baylor College of Medicine',
			'Texas State University, San Marcos',
			'Texas A&M University Corpus Christi',
			'Austin College',
			'Southwestern University',
			'Trinity University',
			'University of the Incarnate Word',
			'Hardin-Simmons University',
			'University of Texas Medical Branch at Galveston',
			'University of Houston - Downtown',
			'University of Mary Hardin-Baylor',
			'Dallas Baptist University',
			'University of Texas Southwestern Medical Center at Dallas',
			'Brookhaven College',
			);

			$usa_tx_schools=array();
			$usa_tx_schools['TX']=$usa_tx_tx_schools;
			$this->usa_schools['TX']=$usa_tx_schools;

			//USA,UT
			$usa_ut_ut_schools=array(
			'Brigham Young University Provo',
			'University of Utah',
			'Utah State University',
			'Weber State University',
			'Westminster College',
			);

			$usa_ut_schools=array();
			$usa_ut_schools['UT']=$usa_ut_ut_schools;
			$this->usa_schools['UT']=$usa_ut_schools;

			//USA,VA
			$usa_va_va_schools=array(
			'College of William and Mary',
			'George Mason University',
			'Old Dominion University',
			'University of Virginia',
			'Virginia Commonwealth University',
			'Virginia Tech',
			'Christopher Newport University',
			'Liberty University',
			'Washington and Lee University',
			'Randolph College',
			'University of Richmond',
			'James Madison Univeristy',
			'Hollins University',
			'Hampden - Sydney College',
			'Sweet Briar College',
			'Virginia Military Institute',
			'Southern Virginia University',
			'Mary Baldwin College',
			'Randolph Macon College',
			'Longwood University',
			'Radford University',
			'J. Sargeant Reynolds Community College',
			'University of Northern Virginia',
			'Northern Virginia Community College',
			);

			$usa_va_schools=array();
			$usa_va_schools['VA']=$usa_va_va_schools;
			$this->usa_schools['VA']=$usa_va_schools;

			//USA,VT
			$usa_vt_vt_schools=array(
			'University of Vermont',
			'Middlebury College',
			'St. Michael\'s College',
			'Bennington College',
			);

			$usa_vt_schools=array();
			$usa_vt_schools['VT']=$usa_vt_vt_schools;
			$this->usa_schools['VT']=$usa_vt_schools;

			//USA,WA
			$usa_wa_wa_schools=array(
			'University of Washington',
			'Washington State University',
			'Pacific Lutheran University',
			'Eastern Washington University',
			'University of Puget Sound',
			'Whitman College',
			'Tacoma Community College',
			'Seattle University',
			'Central Washington University',
			'The Art Institute of Seattle',
			'Green River Community Collage',
			'Shoreline Community College',
			'Bellevue Community College',
			'North Seattle Community College',
			'South Seattle Community College',
			'Western Washington University',
			'Edmonds Community College',
			'Pierce College',
			'City University of Seattle',
			'Seattle Central Community College',
			);

			$usa_wa_schools=array();
			$usa_wa_schools['WA']=$usa_wa_wa_schools;
			$this->usa_schools['WA']=$usa_wa_schools;

			//USA,WI
			$usa_wi_wi_schools=array(
			'Marquette University',
			'University of Wisconsin Madison',
			'University of Wisconsin Milwaukee',
			'St. Norbert College',
			'University of Wisconsin-Stevens Point',
			'University of Wisconsin-Whitewater',
			'Lawrence University',
			'Beloit College',
			'University Of Wisconsin La Crosse',
			'University of Wisconsin Green Bay',
			'University of Wisconsin Oshkosh',
			'University of Wisconsin-Eau Claire',
			'University of Wisconsin - Stout',
			'University of Wisconsin-Platteville',
			'University of Wisconsin-Superior',
			'Lakeland College',
			'University of Wisconsin-River Falls',
			'Medical College of Wisconsin',
			'Wisconsin Lutheran College',
			);

			$usa_wi_schools=array();
			$usa_wi_schools['WI']=$usa_wi_wi_schools;
			$this->usa_schools['WI']=$usa_wi_schools;

			//USA,WV
			$usa_wv_wv_schools=array(
			'West Virginia University',
			'Fairmont State University',
			'Marshall University',
			'University of Charleston',
			'West Virginia Wesleyan College',
			);

			$usa_wv_schools=array();
			$usa_wv_schools['WV']=$usa_wv_wv_schools;
			$this->usa_schools['WV']=$usa_wv_schools;

			//USA,WY
			$usa_wy_wy_schools=array(
			'University of Wyoming',
			);

			$usa_wy_schools=array();
			$usa_wy_schools['WY']=$usa_wy_wy_schools;
			$this->usa_schools['WY']=$usa_wy_schools;
			
			return $this->usa_schools;
		}

		else if($country==='China')
		{
			if(isset($this->china_schools))
			{
				return $this->china_schools;
			}
			
			$this->china_schools=array();
			
			//China, Beijing
			$china_beijing_beijing_schools=array(
			'Peking University',
			'Tsinghua University',
			'Renmin University of China',
			'Beijing Normal University',
			'Beihang University', 
			'Beijing Institute of Technology', 
			'China Agricultural University',
			'Peking University Health Science Center',
			'Academy of Arts and Design of Tsinghua University',
			'Peking Union Medical College',
			'China University of Geosciences',
			'Beijing Broadcasting Institute',
			'Beijing Foreign Studies University',
			'Beijing Forestry University',
			'Beijing Jiaotong University',
			'Beijing Language and Culture University',
			'Beijing University of Chemical Technology',
			'Beijing University of Chinese Medicine',
			'Beijing University of Petroleum',
			'Beijing University of Posts and Telecommunications',
			'Central Academy of Drama',
			'Central Conservatory of Music',
			'Central University of Finance and Economics',
			'Central University of Nationalities',
			'China Agricultural University',
			'China Central Academy of Fine Arts',
			'China Central Radio and TV University',
			'China University of Mining & Technology at Beijing',
			'China University of Political Science and Law ',
			'Communication University of China',
			'North China Electric Power University at Beijing',
			'University of International Business and Economics',
			'University of International Relations',
			'University of Science and Technology Beijing',
			'Beijing Electronic Science and Technology Institute',
			'Beijing Institute of Technology',
			'Beijing Peoples Police College',
			'Beijing University of Aeronautics and Astronautics',
			'Beijing University of Physical Education',
			'Central University for Nationalities',
			'China Center of Advanced Science and Technology',
			'China Foreign Affairs University',
			'China Institute of Industrial Relations',
			'Chinese People\'s Public Security University',
			'China Women\'s University',
			'China Youth University for Political Sciences',
			'Beijing Dance Academy',
			'Beijing Film Academy',
			'Beijing Information Science & Technology University',
			'Beijing Institute of Fashion Technology',
			'Beijing Institute of Graphic Communication',
			'Beijing Institute of Machinery',
			'Beijing Institute of Petrochemical Technology',
			'Beijing International Studies University',
			'Beijing Materials University',
			'Beijing Technology and Business University',
			'Beijing Union University',
			'Beijing University of Agriculture',
			'Beijing University of Civil Engineering and Architecture',
			'Beijing University of Technology',
			'Capital Institute of Physical Education',
			'Capital Normal University',
			'Capital University of Economics and Business',
			'Capital University of Medical Sciences',
			'China College of Music',
			'National Academy of Chinese Theatre Arts',
			'North China University of Technology',
			'SG Institute of Technology',
			'Beijing International Chinese College',
			'Beijing City University',
			'Beijing Geely University',
			);
			
			$china_beijing_schools=array();
			$china_beijing_schools['Beijing']=$china_beijing_beijing_schools;
			$this->china_schools['Beijing']=$china_beijing_schools;
			
			//China, Tianjing
			$china_tianjing_tianjing_schools=array(
			'Nankai University', 
			'Tianjin University',
			'Boustead College',
			'Tianjin Academy of Fine Arts',
			'Tianjin Agricultural College',
			'Tianjin Conservatory of Music',
			'Tianjin Foreign Studies University',
			'Tianjin Institute of Physical Education',
			'Tianjin Medical University',
			'Tianjin Normal University',
			'Tianjin Polytechnic University',
			'Tianjin Radio & TV University',
			'Tianjin University of Commerce',
			'Tianjin University of Finance & Economics',
			'Tianjin University of Science & Technology',
			'Tianjin University of Technology',
			'Tianjin University of Technology and Education',
			'Tianjin University of Traditional Chinese Medicine',
			'Tianjin Urban Construction Institute',
			);
			
			$china_tianjing_schools=array();
			$china_tianjing_schools['Tianjing']=$china_tianjing_tianjing_schools;
			$this->china_schools['Tianjing']=$china_tianjing_schools;
			
			//China, Jiangsu
			$china_jiangsu_nanjing_schools=array(
			'Nanjing University', 
			'Southeast University',
			'Hohai University',
			'Nanjing University of Science and Technology',
			'Nanjing Agricultural University',
			'Nanjing University of Aeronautics and Astronautics',
			'China Pharmaceutical University',
			'Nanjing Arts Institute',
			'Nanjing College for Population Programme Management',
			'Nanjing Forestry University',
			'Nanjing Medical University',
			'Nanjing Normal University',
			'Nanjing University of Finance & Economics',
			'Nanjing University of Technology',
			'Nanjing University of Information Science and Technology',
			'Nanjing University of Posts and Telecommunications',
			);
			
			$china_jiangsu_schools=array();
			$china_jiangsu_schools['Nanjing']=$china_jiangsu_nanjing_schools;
			$this->china_schools['Jiangsu']=$china_jiangsu_schools;
			
			//China, Jiangsu
			$china_jiangsu_xuzhou_schools=array(
			'China University of Mining and Technology',
			'Xuzhou Normal University',
			'Xuzhou Medical College', 
			'Xuzhou Normal University',
			);
			
			$china_jiangsu_schools['Xuzhou']=$china_jiangsu_xuzhou_schools;
			$this->china_schools['Jiangsu']=$china_jiangsu_schools;
			
			//China, Jiangsu
			$china_jiangsu_suzhou_schools=array(
			'Soochow University',
			'Suzhou University of Science and Technology',
			'Xi\'an Jiaotong-Liverpool University'
			);
			
			$china_jiangsu_schools['Suzhou']=$china_jiangsu_suzhou_schools;
			$this->china_schools['Jiangsu']=$china_jiangsu_schools;
			
			//China, Jiangsu
			$china_jiangsu_yangzhou_schools=array(
			'Yangzhou University',
			);
			
			$china_jiangsu_schools['Yangzhou']=$china_jiangsu_yangzhou_schools;
			$this->china_schools['Jiangsu']=$china_jiangsu_schools;
			
			//China, Jiangsu
			$china_jiangsu_wuxi_schools=array(
			'Jiangsu University',
			);
			
			$china_jiangsu_schools['Wuxi']=$china_jiangsu_wuxi_schools;
			$this->china_schools['Jiangsu']=$china_jiangsu_schools;
			
			//China, Jiangsu
			$china_jiangsu_changzhou_schools=array(
			'Jiangsu Polytechnic University',
			);
			
			$china_jiangsu_schools['Changzhou']=$china_jiangsu_changzhou_schools;
			$this->china_schools['Jiangsu']=$china_jiangsu_schools;
			
			//China, Jiangsu
			$china_jiangsu_zhenjiang_schools=array(
			'Jiangsu University',
			);
			
			$china_jiangsu_schools['Zhenjiang']=$china_jiangsu_zhenjiang_schools;
			$this->china_schools['Jiangsu']=$china_jiangsu_schools;
			
			//China, Jiangsu
			$china_jiangsu_nantong_schools=array(
			'Nantong University',
			);
			
			$china_jiangsu_schools['Nantong']=$china_jiangsu_nantong_schools;
			$this->china_schools['Jiangsu']=$china_jiangsu_schools;
			
			//China, Anhui
			$china_anhui_hefei_schools=array(
			'University of Science and Technology of China',
			'Hefei University of Technology',
			'Anhui University',
			'Anhui Agricultural University',
			'Anhui Medical University',
			'Anhui University of Traditional Chinese Medicine',
			'Anhui University of Architecture',
			'Hefei University', 
			);
			
			$china_anhui_schools=array();
			$china_anhui_schools['Hefei']=$china_anhui_hefei_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_anqing_schools=array(
			'Anqing Teachers College',
			);
			
			$china_anhui_schools['Anqing']=$china_anhui_anqing_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_bengbu_schools=array(
			'Anhui University of Finance and Economics',
			'Bengbu Medical College',
			);
			
			$china_anhui_schools['Bengbu']=$china_anhui_bengbu_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_chaohu_schools=array(
			'Chaohu University',
			);
			
			$china_anhui_schools['Chaohu']=$china_anhui_chaohu_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_fuyang_schools=array(
			'Fuyang Teachers College',
			);
			
			$china_anhui_schools['Fuyang']=$china_anhui_fuyang_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_huaibei_schools=array(
			'Huaibei Normal University',
			);
			
			$china_anhui_schools['Huaibei']=$china_anhui_huaibei_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_huainan_schools=array(
			'Anhui University of Science and Technology',
			'Huainan Normal University',
			);
			
			$china_anhui_schools['Huainan']=$china_anhui_huainan_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_huangshan_schools=array(
			'Huangshan University',
			);
			
			$china_anhui_schools['Huangshan Shi']=$china_anhui_huangshan_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_luan_schools=array(
			'West Anhui University',
			);
			
			$china_anhui_schools['Lu\'an']=$china_anhui_luan_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_manashan_schools=array(
			'Anhui University of Technology',
			);
			
			$china_anhui_schools['Ma\'anshan']=$china_anhui_manashan_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_tongling_schools=array(
			'Tongling University',
			);
			
			$china_anhui_schools['Tongling']=$china_anhui_tongling_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Anhui
			$china_anhui_wuhu_schools=array(
			'Anhui Normal University',
			'Anhui Polytechnic University',
			'Wannan Medical College',
			);
			
			$china_anhui_schools['Wuhu']=$china_anhui_wuhu_schools;
			$this->china_schools['Anhui']=$china_anhui_schools;
			
			//China, Zhejiang, 
			$china_zhejiang_hangzhou_schools=array(
			'Zhejiang University',
			'Zhejiang University of Technology',
			'China Jiliang University',
			'China National Academy of Art',
			'Zhejiang Sci-Tech University',
			'Zhejiang Chinese Medical University',
			'Zhejiang University of Science and Technology',
			'Hangzhou Teachers College',
			'Hangzhou Dianzi University',
			'Zhejiang Gongshang University', 
			'Zhejiang University of Finance & Economics',
			'Zhejiang Ocean University',
			);
			
			$china_zhejiang_schools=array();
			$china_zhejiang_schools['Hangzhou']=$china_zhejiang_hangzhou_schools;
			$this->china_schools['Zhejiang']=$china_zhejiang_schools;
			
			//China, Zhejiang, 
			$china_zhejiang_ningbo_schools=array(
			'Ningbo University',
			'University of Nottingham, Ningbo, China',
			);
			
			$china_zhejiang_schools['Ningbo']=$china_zhejiang_ningbo_schools;
			$this->china_schools['Zhejiang']=$china_zhejiang_schools;
			
			//China, Zhejiang, 
			$china_zhejiang_wenzhou_schools=array(
			'Wenzhou Medical College',
			'Wenzhou University',
			);
			
			$china_zhejiang_schools['Wenzhou']=$china_zhejiang_wenzhou_schools;
			$this->china_schools['Zhejiang']=$china_zhejiang_schools;
			
			//China, Zhejiang, 
			$china_zhejiang_shaoxin_schools=array(
			'Shaoxing University',
			);
			
			$china_zhejiang_schools['Shaoxin']=$china_zhejiang_shaoxin_schools;
			$this->china_schools['Zhejiang']=$china_zhejiang_schools;
			
			//China, Zhejiang, 
			$china_zhejiang_taizhou_schools=array(
			'Taizhou University',
			);
			
			$china_zhejiang_schools['Taizhou']=$china_zhejiang_taizhou_schools;
			$this->china_schools['Zhejiang']=$china_zhejiang_schools;
			
			
			//China,  Shandong, Jinan
			$china_shandong_jinan_schools=array(
			'Shandong University',
			'Shandong Normal University',
			'Shandong Jianzhu University',
			'Shandong Economic University',
			'Shandong University of Traditional Chinese Medicine', 
			);
			
			//China, Shandong, Qingdao
			$china_shandong_qingdao_schools=array(
			'Ocean University of China',
			'Qingdao University',
			'Shandong University of Science and Technology',
			'Qingdao Technological University',
			);
			//China, Shandong, Yantai
			$china_shandong_yantai_schools=array(
			'Yantai University',
			);
			
			//China, Shandong, Tai an
			$china_shandong_taian_schools=array(
			'Shandong Agricultural University',
			);
			
			//China, Shandong, Qu fu
			$china_shandong_qufu_schools=array(
			'Qufu Normal University',
			);
			
			//China, Shandong, Liaocheng
			$china_shandong_liaocheng_schools=array(
			'Liaocheng University',
			);
			
			//China, Shandong, Wei fang
			$china_shandong_weifang_schools=array(
			'Weifang Medical University',
			'Weifang University',
			);
			
			$china_shandong_schools=array();
			$china_shandong_schools['Jinan']=$china_shandong_jinan_schools;
			$china_shandong_schools['Qingdao']=$china_shandong_qingdao_schools;
			$china_shandong_schools['Yantai']=$china_shandong_yantai_schools;
			$china_shandong_schools['Tai\'an']=$china_shandong_taian_schools;
			$china_shandong_schools['Qufu']=$china_shandong_qufu_schools;
			$china_shandong_schools['Liaocheng']=$china_shandong_liaocheng_schools;
			$china_shandong_schools['Weifang']=$china_shandong_weifang_schools;
			$this->china_schools['Shandong']=$china_shandong_schools;
			
			//China, Shanghai
			$china_shanghai_shanghai_schools=array(
			'Fudan University', 
			'Shanghai Jiao Tong University', 
			'Tongji University', 
			'East China Normal University',
			'Shanghai University of Finance and Economics',
			'Shanghai University',
			'Shanghai Conservatory of Music',
			'Shanghai Theater Academy',
			'Shanghai International Studies University',
			'Donghua University',
			'East China University of Political Science and Law',
			'East China University of Science and Technology',
			'Second Military Medical University',
			'Shanghai University of Political Science and Law',
			'Shanghai Finance University',
			'Shanghai Institute of Foreign Trade',
			'Shanghai Maritime University',
			'Shanghai Normal University',
			'Shanghai Ocean University',
			'Shanghai Sports University',
			'Shanghai University of Electric Power',
			'Shanghai University of Engineering Sciences',
			'Shanghai University of Traditional Chinese Medicine',
			'University of Shanghai for Science and Technology',
			'Shanghai Second Polytechnic University',
			);
			
			$china_shanghai_schools=array();
			$china_shanghai_schools['Shanghai']=$china_shanghai_shanghai_schools;
			$this->china_schools['Shanghai']=$china_shanghai_schools;
			
			//China, Shaanxi, Xi'an
			$china_xian_shaanxi_schools=array(
			'Xi\'an Jiao Tong University', 
			'Northwest University',
			'Xi\'an University of Technology',
			'Xi\'an University of Architecture and Technology',
			'Xi\'an University of Science and Technology',
			'Xi\'an Petroleum University',
			'Xi\'an Polytechnic University',
			'Xi\'an International Studies University',
			'Xi\'an Institute of Post & Telecommunications',
			'Xi\'an Medical University',
			'Xi\'an University of Finance and Economics',
			'Northwest University of Political Science and Law',
			'Xi\'an Physical Education Institute',
			'Xi\'an Academy of Fine Arts',
			'Xi\'an Conservatory of Music',
			'Xi\'an Institute of Arts and Science',
			'Xi\'an Peihua University',
			'Xi\'an Eurasia University',
			'Xi\'an International University',
			'Xi\'an Fanyi University',
			'Xi\'an Siyuan University',
			);
			
			$china_xian_xianyang_schools=array(
			'Shaanxi University of Science & Technology', 
			'Shaanxi Institute of Traditional Chinese Medicine',
			'Xianyang Normal College',
			);
			
			$china_xian_weinan_schools=array(
			'Weinan Teachers College', 
			);
			
			$china_xian_yulin_schools=array(
			'Yulin College', 
			);
			
			$china_xian_hanzhong_schools=array(
			'Shanxi University of Technology', 
			);
			
			$china_xian_baoji_schools=array(
			'Baoji University of Arts & Science', 
			);
			
			$china_xian_ankang_schools=array(
			'Ankang University', 
			);
			
			$china_xian_shangluo_schools=array(
			'Shangluo University', 
			);
			
			$china_xian_schools=array();
			$china_xian_schools['Shaanxi']=$china_xian_shaanxi_schools;
			$china_xian_schools['Xianyang']=$china_xian_xianyang_schools;
			$china_xian_schools['Weinan']=$china_xian_weinan_schools;
			$china_xian_schools['Yulin']=$china_xian_yulin_schools;
			$china_xian_schools['Hanzhong']=$china_xian_hanzhong_schools;
			$china_xian_schools['Baoji']=$china_xian_baoji_schools;
			$china_xian_schools['Ankang']=$china_xian_ankang_schools;
			$china_xian_schools['Shangluo']=$china_xian_shangluo_schools;
			$this->china_schools['Xi\'an']=$china_xian_schools;
			
			//China, Sichuan, Chengdu
			$china_sichuan_chengdu_schools=array(
			'Sichuan University', 
			'University of Electronic Science and Technology of China',
			'Southwest Jiaotong University',
			'Southwest University for Nationalities',
			'Southwestern University of Finance and Economics',
			'Sichuan Normal University',
			'Chengdu University of Traditional Chinese Medicine',
			'Chengdu University of Information Technology',
			'Xihua University',
			'Chengdu University of Technology',
			);
			
			$china_sichuan_nanchong_schools=array(
			'North Sichuan Medical College',
			'Southwest Petroleum University',
			);
			
			$china_sichuan_yaan_schools=array(
			'Sichuan Agricultural University',
			);
			
			$china_sichuan_schools=array();
			$china_sichuan_schools['Chengdu']=$china_sichuan_chengdu_schools;
			$china_sichuan_schools['Nanchong']=$china_sichuan_nanchong_schools;
			$china_sichuan_schools['Yaan']=$china_sichuan_yaan_schools;
			$this->china_schools['Sichuan']=$china_sichuan_schools;
			
			//China, Gansu, Lanzhou
			$china_gansu_lanzhou_schools=array(
			'Lanzhou University',
			'Northwest University for Nationalities',
			'Eastern Gansu University',
			'Lanzhou University of Technology',
			'Northwest Normal University',
			'Gansu Agricultural University',
			'Lanzhou Commercial College', 
			'Gansu Political Science and Law Institute',
			'Lanzhou Medical College',
			'Lanzhou Jiaotong University',
			);
			
			$china_gansu_schools=array();
			$china_gansu_schools['Lanzhou']=$china_gansu_lanzhou_schools;
			$this->china_schools['Gansu']=$china_gansu_schools;
			
			//China, Chongqing
			$china_chongqing_chongqing_schools=array(
			'Chongqing University',
			'Southwest University',
			'Southwest University of Political Science and Law',
			'Third Military Medical University',
			'Chongqing University of Posts and Telecommunications',
			'Chongqing University of Technology',
			'Chongqing Jiaotong University',
			'Chongqing Medical University',
			'Chongqing Normal University',
			'Chongqing Technology and Business University',
			'Chongqing Three Gorges University',
			'Chongqing University of Science and Technology',
			'Sichuan Fine Arts Institute',
			'Sichuan International Studies University',
			'University of Logistics',
			'Western Chongqing University',
			'Yangtze Normal University',
			);
			
			$china_chongqing_schools=array();
			$china_chongqing_schools['Chongqing']=$china_chongqing_chongqing_schools;
			$this->china_schools['Chongqing']=$china_chongqing_schools;
			
			//China, (Wuhan, Hubei), 
			$china_hubei_wuhan_schools=array(
			'Wuhan University',
			'Huazhong University of Science and Technology',
			'Wuhan University of Technology',
			'China University of Geosciences',
			'Central China Agricultural University',
			'Central China Normal University',
			'Zhongnan University of Economics and Law',
			'South-Central University for Nationalities',
			'Hubei University',
			'Wuhan University of Science and Technology',
			'Wuhan Institute of Technology',
			'Wuhan University of Science and Engineering',
			'Wuhan Polytechnic University',
			'Hubei University of Technology',
			'Hubei College of Traditional Chinese Medicine',
			'Wuhan Institute of Physical Education',
			'Hubei Institute of Fine Arts',
			'Jianghan University',
			'Wuhan Vocational College of Software and Engineering',
			);
			
			$china_hubei_xiangfan_schools=array(
			'XiangFan University',
			);
			
			$china_hubei_jingzhou_schools=array(
			'Yangtze University',
			);
			
			$china_hubei_enshi_schools=array(
			'Hubei Institute for Nationalities',
			);
			
			$china_hubei_xiaogan_schools=array(
			'Xiaogan University',
			);
			
			$china_hubei_yichang_schools=array(
			'China Three Gorges University',
			);
			
			$china_hubei_shiyan_schools=array(
			'Yunyang Medical College',
			'Hubei University Of Automotive Technology',
			'Shiyan Institute Of Technology',
			'Yunyang Normal College',
			);
			
			$china_hubei_huanggang_schools=array(
			'Huanggang Normal University',
			);
			
			$china_hubei_huangshi_schools=array(
			'Huangshi Institute of Technology',
			'Hubei Normal University',
			);
			
			$china_hubei_jingmen_schools=array(
			'Jingchu University of Technology',
			);
			
			$china_hubei_xianning_schools=array(
			'Xianning University',
			);
			
			$china_hubei_schools=array();
			$china_hubei_schools['Wuhan']=$china_hubei_wuhan_schools;
			$china_hubei_schools['Xiangfan']=$china_hubei_xiangfan_schools;
			$china_hubei_schools['Jingzhou']=$china_hubei_jingzhou_schools;
			$china_hubei_schools['Enshi']=$china_hubei_enshi_schools;
			$china_hubei_schools['Xiaogan']=$china_hubei_xiaogan_schools;
			$china_hubei_schools['Yichang']=$china_hubei_yichang_schools;
			$china_hubei_schools['Shiyan']=$china_hubei_shiyan_schools;
			$china_hubei_schools['Huanggang']=$china_hubei_huanggang_schools;
			$china_hubei_schools['Huangshi']=$china_hubei_huangshi_schools;
			$china_hubei_schools['Jingmen']=$china_hubei_jingmen_schools;
			$china_hubei_schools['Xianning']=$china_hubei_xianning_schools;
			$this->china_schools['Hubei']=$china_hubei_schools;
			
			//China, (Changsha, Hunan), 
			$china_hunan_changsha_schools=array(
			'National University of Defense Technology', 
			'Central South University',
			'Hunan University',
			'Changsha University of Science and Technology',
      'Hunan Normal University',
      'Hunan Agricultural University',
      'Central South University Forestry and Technology',
      'Hunan University of Traditional Chinese Medicine',
      'Changsha Technical College',
      'Hunan International Economics University',
			);
			
			$china_hunan_chenzhou_schools=array(
			'Xiangnan University',
			);
			
			$china_hunan_hengyang_schools=array(
			'Hengyang Normal College',
			'Hunan Institute of Technology',
			'University of South China',
			);
			
			$china_hunan_huaihua_schools=array(
			'Huaihua College',
			'Huaihua Medical College',
			);
			
			$china_hunan_jishou_schools=array(
			'Jishou University',
			'Normal College of Jishou University',
			);
			
			$china_hunan_loudi_schools=array(
			'Hunan University of Humanities, Science and Technology',
			);
			
			$china_hunan_xiangtan_schools=array(
			'Hunan University of Science and Technology',
			'Hunan Institute of Engineering',
			'Xiangtan University',
			);
			
			$china_hunan_yueyang_schools=array(
			'Hunan Institute of Science and Technology',
			);
			
			$china_hunan_xiangtan_schools=array(
			'Central South University Forestry and Technology',
			'Hunan Polytechnic University',
			);
			
			$china_hunan_schools=array();
			$china_hunan_schools['Changsha']=$china_hunan_changsha_schools;
			$china_hunan_schools['Cenzhou']=$china_hunan_chenzhou_schools;
			$china_hunan_schools['Hengyang']=$china_hunan_hengyang_schools;
			$china_hunan_schools['Huaihua']=$china_hunan_huaihua_schools;
			$china_hunan_schools['Jishou']=$china_hunan_jishou_schools;
			$china_hunan_schools['Loudi']=$china_hunan_loudi_schools;
			$china_hunan_schools['Xiangtan']=$china_hunan_xiangtan_schools;
			$china_hunan_schools['Yueyang']=$china_hunan_yueyang_schools;
			$china_hunan_schools['Xiangtan']=$china_hunan_xiangtan_schools;
			$this->china_schools['Hunan']=$china_hunan_schools;
			
			//China, (Guangzhou, Guangdong), 
			$china_guangdong_guangzhou_schools=array(
			'Sun Yat-sen University',
			'South China University of Technology',
			'Jinan University',
			'South China Normal University',
			'Guangzhou University of Chinese Medicine',
			'Southern Medical University',
			'South China Agricultural University',
			'Guangdong University of Business Studies',
			'Guangdong University of Foreign Studies',
			'Guangdong University of Technology',
			'Guangzhou Institute of Fine Arts',
			'Guangzhou University',
			);
			
			$china_guangdong_foshan_schools=array(
			'Foshan University',
			);
			
			$china_guangdong_meizhou_schools=array(
			'Jiaying University',
			);
			
			$china_guangdong_shantou_schools=array(
			'Shantou University',
			);
			
			$china_guangdong_shenzhen_schools=array(
			'Shenzhen University',
			'South University of Science and Technology of China',
			'Shenzhen Polytechnic',
			'Shenzhen Radio and TV University',
			'Shenzhen Institute of Information Technology',
			'Shenzhen Graduate School of Peking University',
			'Shenzhen Graduate School of Tsinghua University',
			'Shenzhen Graduate School of Harbin Institute of Technology',
			);
			
			$china_guangdong_zhanjiang_schools=array(
			'Guangdong Ocean University',
			'Guangdong Medical College',
			'Zhanjiang Normal University',
			);
			
			$china_guangdong_zhuhai_schools=array(
			'Sun Yat-Sen University (Zhuhai Campus)',
			);
			
			$china_guangdong_schools=array();
			$china_guangdong_schools['Guangzhou']=$china_guangdong_guangzhou_schools;
			$china_guangdong_schools['Foshan']=$china_guangdong_foshan_schools;
			$china_guangdong_schools['Meizhou']=$china_guangdong_meizhou_schools;
			$china_guangdong_schools['Shantou']=$china_guangdong_shantou_schools;
			$china_guangdong_schools['Shenzhen']=$china_guangdong_shenzhen_schools;
			$china_guangdong_schools['Zhanjiang']=$china_guangdong_zhanjiang_schools;
			$china_guangdong_schools['Zhuhai']=$china_guangdong_zhuhai_schools;
			$this->china_schools['Guangdong']=$china_guangdong_schools;
			
			//China, (Xiamen, Fujian), 
			$china_fujian_xiamen_schools=array(
			'Xiamen University',
			'Huaqiao University', 
			);
			
			$china_fujian_fuzhou_schools=array(
			'Fujian Agriculture and Forestry University ',
			'Fujian University of Traditional Chinese Medicine',
			'Minjiang University',
			'Fujian Medical University',
			'Fujian Normal University',
			'Fujian University of Technology',
			'Fuzhou University',
			);
			
			$china_fujian_putian_schools=array(
			'Putian University',
			);
			
			$china_fujian_longyan_schools=array(
			'Longyan University',
			);
			
			$china_fujian_quanzhou_schools=array(
			'Quanzhou Normal College',
			);
			
			$china_fujian_wuyi_schools=array(
			'Wuyi University',
			);
			
			$china_fujian_zhangzhou_schools=array(
			'Zhangzhou Normal College',
			);
			
			$china_fujian_schools=array();
			$china_fujian_schools['Xiamen']=$china_fujian_xiamen_schools;
			$china_fujian_schools['Fuzhou']=$china_fujian_fuzhou_schools;
			$china_fujian_schools['Putian']=$china_fujian_putian_schools;
			$china_fujian_schools['Longyan']=$china_fujian_longyan_schools;
			$china_fujian_schools['Quanzhou']=$china_fujian_quanzhou_schools;
			$china_fujian_schools['Wuyi']=$china_fujian_wuyi_schools;
			$china_fujian_schools['Zhangzhou']=$china_fujian_zhangzhou_schools;
			$this->china_schools['Fujian']=$china_fujian_schools;
			
			//China, (Heilongjiang, Harbin), 
			$china_heilongjiang_harbin_schools=array(
			'Harbin Institute of Technology',
			'Harbin Engineering University',
			'Harbin University of Science and Technology',
			'Harbin University of Commerce',
			'Heilongjiang University',
			'Heilongjiang University of Chinese Medicine',
			'Northeast Agricultural University',
			'Northeast Forestry University',
			);
			
			$china_heilongjiang_daqing_schools=array(
			'Daqing Petroleum Institute',
			);
			
			$china_heilongjiang_schools=array();
			$china_heilongjiang_schools['Harbin']=$china_heilongjiang_harbin_schools;
			$china_heilongjiang_schools['Daqing']=$china_heilongjiang_daqing_schools;
			$this->china_schools['Heilongjiang']=$china_heilongjiang_schools;
			
			//China, (Dalian, Liaoning), 
			$china_liaoning_dalian_schools=array(
			'Dalian University of Technology',
			'Dalian Maritime University',
			'Dalian Nationalities University',
			'Dalian Fisheries University',
			'Dalian Jiaotong University',
			'Dalian Medical University',
			'Dalian Polytechnic University',
			'Dalian University',
			'Dalian University of Foreign Languages',
			'Dongbei University of Finance and Economics',
			'Liaoning Normal University',
			'Liaoning University of International Business and Economics',
			'Neusoft Institute of Information',
			);
			
			$china_liaoning_shenyang_schools=array(
			'China Medical University',
			'Northeastern University',
			'China Criminal Police College',
			'Shenyang Aerospace University',
			'Shenyang Conservatory of Music',
			'Lu Xun Academy of Fine Arts',
			'Shenyang Agricultural University',
			'Liaoning University',
			'Shenyang Institute of Chemical Technology',
			'Shenyang Jianzhu University',
			'Shenyang Ligong University',
			'Shenyang Medical College',
			'Shenyang Normal University',
			'Shenyang Pharmaceutical University',
			'Shenyang University',
			'Shenyang University of Technology',
			);
			
			$china_liaoning_anshan_schools=array(
			'Anshan University of Science and Technology',
			);
			
			$china_liaoning_dandong_schools=array(
			'Eastern Liaoning University',
			);
			
			$china_liaoning_fushun_schools=array(
			'Liaoning University of Petroleum and Chemical Technology',
			);
			
			$china_liaoning_fuxin_schools=array(
			'Liaoning Technical University',
			);
			
			$china_liaoning_huludao_schools=array(
			'Liaoning Finance and Trade College',
			);
			
			$china_liaoning_jinzhou_schools=array(
			'Liaoning University of Technology',
			'Bohai University',
			'Liaoning Medical University',
			);
			
			$china_liaoning_schools=array();
			$china_liaoning_schools['Dalian']=$china_liaoning_dalian_schools;
			$china_liaoning_schools['Shenyang']=$china_liaoning_shenyang_schools;
			$china_liaoning_schools['Anshan']=$china_liaoning_anshan_schools;
			$china_liaoning_schools['Dandong']=$china_liaoning_dandong_schools;
			$china_liaoning_schools['Huludao']=$china_liaoning_huludao_schools;
			$china_liaoning_schools['Jinzhou']=$china_liaoning_jinzhou_schools;
			$this->china_schools['Liaoning']=$china_liaoning_schools;
			
			//China, (Changchun, Jilin) 
			$china_jilin_changchun_schools=array(
			'Jilin University',
			'Jilin Normal University',
			'Jilin Agriculture University',
			'Northeast Normal University',
			'Changchun Taxation College',
			'Changchun University of Technology',
			'Changchun University of Science and Technology',
			);
			
			$china_jilin_jilin_schools=array(
			'Beihua University',
			'Northeast Electrical University',
			'Jilin Institute of Chemical Technology',
			'Jilin Agriculture University',
			);
			
			$china_jilin_yanji_schools=array(
			'Yanbian University',
			);
			
			$china_jilin_schools=array();
			$china_jilin_schools['Changchun']=$china_jilin_changchun_schools;
			$china_jilin_schools['Jilin']=$china_jilin_jilin_schools;
			$china_jilin_schools['Yanji']=$china_jilin_yanji_schools;
			$this->china_schools['Jilin']=$china_jilin_schools;
			
			//China, Guizhou
			$china_guizhou_guiyang_schools=array(
			'Guizhou University',
			'Guizhou Normal University',
			'Guizhou University of Finance and Economics',
			'Guizhou Nationalities University',
			'Guiyang Medical University',
			'Guiyang College of Traditional Chinese Medicine',
			);
			
			$china_guizhou_zunyi_schools=array(
			'Zunyi Medical Institute',
			'Zunyi Medical College',
			'Zunyi Normal Institute',
			);
			
			$china_guizhou_schools=array();
			$china_guizhou_schools['Guiyang']=$china_guizhou_guiyang_schools;
			$china_guizhou_schools['Zunyi']=$china_guizhou_zunyi_schools;
			$this->china_schools['Guizhou']=$china_guizhou_schools;
			
			//China, Hainan
			$china_hainan_haikou_schools=array(
			'Hainan University',
			'Chinese Academy of Tropical Agricultural Sciences',
			'Haikou College of Economics',
			'Hainan Medical College',
			'Hainan Normal University',
			);
			
			$china_hainan_sanya_schools=array(
			'Qiongzhou University',
			);
			
			$china_hainan_schools=array();
			$china_hainan_schools['Haikou']=$china_hainan_haikou_schools;
			$china_hainan_schools['Sanya']=$china_hainan_sanya_schools;
			$this->china_schools['Hainan']=$china_hainan_schools;
			
			//China, Hebei
			$china_hebei_baoding_schools=array(
			'North China Electric Power University',
			'Central Institute for Correctional Police',
			'Agricultural University of Hebei',
			'Hebei University',
			);
			
			$china_hebei_tangshan_schools=array(
			'North China Coal Medical University',
			'Hebei Polytechnic University',
			'Tangshan College',
			'Tangshan Teachers College',
			);
			
			$china_hebei_langfang_schools=array(
			'Chinese People\'s Armed Police Force Academy',
			'North China Institute of Science and Technology',
			'Hebei University of Technology',
			'Langfang Teachers College',
			);
			
			$china_hebei_chengde_schools=array(
			'Chengde Medical College',
			);
			
			$china_hebei_handan_schools=array(
			'Handan College',
			'Hebei University of Engineering',
			);
			
			$china_hebei_zhangjiakou_schools=array(
			'Hebei Institute of Architecture and Civil Engineering',
			'Hebei North University',
			'Hebei Institute of Physical Education',
			);
			
			$china_hebei_shijiazhuang_schools=array(
			'Hebei Medical University',
			'Hebei Normal University',
			'Hebei University of Economics and Business',
			'Hebei University of Science and Technology',
			'Shijiazhuang University',
			'Shijiazhuang Railway Institute',
			'Shijiazhuang University of Economics',
			);
			
			$china_hebei_qinhuangdao_schools=array(
			'Hebei Normal University of Science and Technology',
			'Yanshan University',
			);
			
			$china_hebei_hengshui_schools=array(
			'Hengshui University',
			);
			
			$china_hebei_xingtai_schools=array(
			'Xingtai University',
			);
			
			$china_hebei_schools=array();
			$china_hebei_schools['Baoding']=$china_hebei_baoding_schools;
			$china_hebei_schools['Tangshan']=$china_hebei_tangshan_schools;
			$china_hebei_schools['Langfang']=$china_hebei_langfang_schools;
			$china_hebei_schools['Chengde']=$china_hebei_chengde_schools;
			$china_hebei_schools['Handan']=$china_hebei_handan_schools;
			$china_hebei_schools['Zhangjiakou']=$china_hebei_zhangjiakou_schools;
			$china_hebei_schools['Shijiazhuang']=$china_hebei_shijiazhuang_schools;
			$china_hebei_schools['Qinhuangdao']=$china_hebei_qinhuangdao_schools;
			$china_hebei_schools['Hengshui']=$china_hebei_hengshui_schools;
			$china_hebei_schools['Xingtai']=$china_hebei_xingtai_schools;
			$this->china_schools['Hebei']=$china_hebei_schools;
			
			//China, Henan
			$china_henan_zhengzhou_schools=array(
			'Zhengzhou University',
			'Henan Agricultural University',
			'Henan University of Technology',
			'North China University of Water Conservancy and Electric Power',
			'Zhengzhou University of Light Industry',
			'Zhongyuan University of Technology',
			'Henan College of Traditional Chinese Medicine',
			'Henan University of Finance and Economics',
			'Huanghe Science and Technology College',
			'Shengda Economics, Trade and Management College of Zhengzhou',
			'Henan Institute of Engineering',
			);
			
			$china_henan_kaifeng_schools=array(
			'Henan University',
			);
			
			$china_henan_xinxiang_schools=array(
			'Henan Normal University',
			'Xinxiang Medical College',
			'Henan Institute of Science and Technology',
			);
			
			$china_henan_jiaozuo_schools=array(
			'Henan Polytechnic University',
			);
			
			$china_henan_luoyang_schools=array(
			'Henan University of Science and Technology',
			'Luoyang Normal University',
			'Luoyang Institute of Science and Technology',
			);
			
			$china_henan_shangqiu_schools=array(
			'Shangqiu Normal University',
			);
			
			$china_henan_schools=array();
			$china_henan_schools['Zhengzhou']=$china_henan_zhengzhou_schools;
			$china_henan_schools['Kaifeng']=$china_henan_kaifeng_schools;
			$china_henan_schools['Xinxiang']=$china_henan_xinxiang_schools;
			$china_henan_schools['Jiaozuo']=$china_henan_jiaozuo_schools;
			$china_henan_schools['Luoyang']=$china_henan_luoyang_schools;
			$china_henan_schools['Shangqiu']=$china_henan_shangqiu_schools;
			$this->china_schools['Henan']=$china_henan_schools;
			
			//China, Jiangxi
			$china_jiangxi_nanchang_schools=array(
			'Nanchang University',
			'Nanchang Hangkong University',
			'Medical College of Nanchang University',
			'Jiangxi Normal University',
			'Jiangxi University of Finance and Economics',
			'Jiangxi Agricultural University',
			'East China Jiaotong University',
			'East China Institute of Technology',
			'Jiangxi University of Traditional Chinese Medicine',
			'Nanchang Institute of Engineering',
			'Nanchang College of Economics',
			'Nanchang Institute of Technology',
			);
			
			$china_jiangxi_jingdezhen_schools=array(
			'Jingdezhen Ceramic Institute',
			);
			
			$china_jiangxi_jian_schools=array(
			'Jinggangshan University',
			);
			
			$china_jiangxi_ganzhou_schools=array(
			'Jiangxi University of Science and Technology',
			);
			
			$china_jiangxi_yichun_schools=array(
			'Yichun University',
			);
			
			$china_jiangxi_jiujiang_schools=array(
			'Jiujiang University',
			);
			
			$china_jiangxi_schools=array();
			$china_jiangxi_schools['Nanchang']=$china_jiangxi_nanchang_schools;
			$china_jiangxi_schools['Jingdezhen']=$china_jiangxi_jingdezhen_schools;
			$china_jiangxi_schools['Ji\'an']=$china_jiangxi_jian_schools;
			$china_jiangxi_schools['Ganzhou']=$china_jiangxi_ganzhou_schools;
			$china_jiangxi_schools['Yichun']=$china_jiangxi_yichun_schools;
			$china_jiangxi_schools['Jiujiang']=$china_jiangxi_jiujiang_schools;
			$this->china_schools['Jiangxi']=$china_jiangxi_schools;
			
			//China, Qianghai
			$china_qinghai_xining_schools=array(
			'Qinghai University',
			'Qinghai Normal University',
			'Qinghai University for Nationalities',
			'Qinghai Medical College',
			);
			
			$china_qinghai_schools=array();
			$china_qinghai_schools['Xining']=$china_qinghai_xining_schools;
			$this->china_schools['Qinghai']=$china_qinghai_schools;
			
			//China, Shanxi
			$china_shanxi_taiyuan_schools=array(
			'Shanxi University',
			'Taiyuan University',
			'North University of China',
			'Shanxi Medical University',
			'Shanxi Traditional Chinese Medicine University',
			'Shanxi University of Finance and Economics',
			'Taiyuan University of Science and Technology',
			'Taiyuan Normal University ',
			'Taiyuan University of Technology',
			);
			
			$china_shanxi_datong_schools=array(
			'Shanxi Datong University',
			);
			
			$china_shanxi_linfen_schools=array(
			'Shanxi Normal University',
			);
			
			$china_shanxi_changzhi_schools=array(
			'Changzhi College',
			'Changzhi Medical College',
			);
			
			$china_shanxi_taigu_schools=array(
			'Shanxi Agricultural University',
			);
			
			$china_shanxi_yuncheng_schools=array(
			'Yuncheng University',
			);
			
			$china_shanxi_schools=array();
			$china_shanxi_schools['Taiyuan']=$china_shanxi_taiyuan_schools;
			$china_shanxi_schools['Changzhi']=$china_shanxi_changzhi_schools;
			$china_shanxi_schools['Datong']=$china_shanxi_datong_schools;
			$china_shanxi_schools['Linfen']=$china_shanxi_linfen_schools;
			$china_shanxi_schools['Taigu']=$china_shanxi_taigu_schools;
			$china_shanxi_schools['Yuncheng']=$china_shanxi_yuncheng_schools;
			$this->china_schools['Shanxi']=$china_shanxi_schools;
			
			//China, Yunnan
			$china_yunnan_baoshan_schools=array(
			'Baoshan College of Chinese Medicine',
			'Baoshan Teachers College',
			);
			
			$china_yunnan_chuxiong_schools=array(
			'Chuxiong Normal University',
			);
			
			$china_yunnan_dali_schools=array(
			'Dali University',
			);
			
			$china_yunnan_dehong_schools=array(
			'Dehong Teachers College',
			);
			
			$china_yunnan_honghe_schools=array(
			'Honghe University',
			);
			
			$china_yunnan_lijiang_schools=array(
			'Lijiang Teachers Training College',
			'Lincang Teachers College',
			);
			
			$china_yunnan_qujing_schools=array(
			'Qujing Normal University',
			);
			
			$china_yunnan_simao_schools=array(
			'Simao Teachers College',
			);
			
			$china_yunnan_yuxi_schools=array(
			'Yuxi Normal University',
			);
			
			$china_yunnan_wenshan_schools=array(
			'Wenshan Teachers College',
			);
			
			$china_yunnan_zhaotong_schools=array(
			'Zhaotong Teachers College',
			);
			
			$china_yunnan_kunming_schools=array(
			'Kunming Medical College',
			'Kunming Teachers College',
			'Kunming Metallurgy College',
			'Kunming Vocational and Technical College of Industry',
			'Kunming Medical University',
			'Kunming Sailing University',
			'Kunming University',
			'Kunming University of Science and Technology',
			'Southwest Forestry University',
			'Yunnan Arts University',
			'Yunnan Agricultural University',
			'Yunnan Nationalities University',
			'Yunnan Normal University',
			'Yunnan University',
			'Yunnan University of Finance and Economics',
			'Yunnan University of Traditional Chinese Medicine',
			);
			
			$china_yunnan_schools=array();
			$china_yunnan_schools['Baoshan']=$china_yunnan_baoshan_schools;
			$china_yunnan_schools['Chuxiong']=$china_yunnan_chuxiong_schools;
			$china_yunnan_schools['Dali']=$china_yunnan_dali_schools;
			$china_yunnan_schools['Dehong']=$china_yunnan_dehong_schools;
			$china_yunnan_schools['Honghe']=$china_yunnan_honghe_schools;
			$china_yunnan_schools['Lijiang']=$china_yunnan_lijiang_schools;
			$china_yunnan_schools['Qujing']=$china_yunnan_qujing_schools;
			$china_yunnan_schools['Simao']=$china_yunnan_simao_schools;
			$china_yunnan_schools['Wenshan']=$china_yunnan_wenshan_schools;
			$china_yunnan_schools['Yuxi']=$china_yunnan_yuxi_schools;
			$china_yunnan_schools['Zhaotong']=$china_yunnan_zhaotong_schools;
			$china_yunnan_schools['Kunming']=$china_yunnan_kunming_schools;
			$this->china_schools['Yunnan']=$china_yunnan_schools;
			
			//China, Guangxi
			$china_guangxi_guilin_schools=array(
			'Guilin University of Technology',
			'Guangxi Normal University',
			'Guilin University of Electronic Technology',
			);
			
			$china_guangxi_nanning_schools=array(
			'Guangxi University',
			'Guangxi Medical University',
			'Guangxi University for Nationalities',
			'Guangxi Teacher Education University',
			);
			
			$china_guangxi_liuzhou_schools=array(
			'Guangxi University of Technology',
			);
			
			$china_guangxi_yulin_schools=array(
			'Yulin Normal University',
			);
			
			$china_guangxi_schools=array();
			$china_guangxi_schools['guilin']=$china_guangxi_guilin_schools;
			$china_guangxi_schools['Nanning']=$china_guangxi_nanning_schools;
			$china_guangxi_schools['Liuzhou']=$china_guangxi_liuzhou_schools;
			$china_guangxi_schools['Yulin']=$china_guangxi_yulin_schools;
			$this->china_schools['Guangxi']=$china_guangxi_schools;
			
			//China, Ningxia
			$china_ningxia_yinchuan_schools=array(
			'Ningxia University',
			'Ningxia Medical College',
			'Yinchuan University',
			'Northern Nationalities University',
			);
			
			$china_ningxia_schools=array();
			$china_ningxia_schools['Yinchuan']=$china_ningxia_yinchuan_schools;
			$this->china_schools['Ningxia']=$china_ningxia_schools;
			
			//China, Tibet
			$china_tibet_lhasa_schools=array(
			'Tibet University',
			'Tibet University of Traditional Tibetan Medicine',
			);
			
			$china_tibet_schools=array();
			$china_tibet_schools['Lhasa']=$china_tibet_lhasa_schools;
			$this->china_schools['Tibet']=$china_tibet_schools;
			
			//China, Xinjiang
			$china_xinjiang_urumqi_schools=array(
			'Xinjiang Agricultural University',
			'Xinjiang Arts Institute',
			'Xinjiang Normal University',
			'Xinjiang University',
			'Xinjiang Medical University',
			'Xinjiang University of Finance & Economics',
			);
			
			$china_xinjiang_kashgar_schools=array(
			'Kashgar Teachers College',
			);
			
			$china_xinjiang_changji_schools=array(
			'Changji College',
			);
			
			$china_xinjiang_shihezi_schools=array(
			'Shihezi University',
			);
			
			$china_xinjiang_aqsu_schools=array(
			'Tarim University',
			);
			
			$china_xinjiang_yining_schools=array(
			'Ili Normal College',
			);
			
			$china_xinjiang_schools=array();
			$china_xinjiang_schools['Urumqi']=$china_xinjiang_urumqi_schools;
			$china_xinjiang_schools['Changji']=$china_xinjiang_changji_schools;
			$china_xinjiang_schools['Kashgar']=$china_xinjiang_kashgar_schools;
			$china_xinjiang_schools['Shihezi']=$china_xinjiang_shihezi_schools;
			$china_xinjiang_schools['Aqsu']=$china_xinjiang_aqsu_schools;
			$china_xinjiang_schools['Yining']=$china_xinjiang_yining_schools;
			$this->china_schools['Xinjiang']=$china_xinjiang_schools;
			
			
			//China, Inner Mongolia
			$china_innermongolia_chifeng_schools=array(
			'Chifeng University',
			);
			
			$china_innermongolia_hohhot_schools=array(
			'Inner Mongolia Agricultural University',
			'Inner Mongolia Finance and Economics College',
			'Inner Mongolia Finance and Economics College',
			'Inner Mongolia Medical College',
			'Inner Mongolia Normal University',
			'Inner Mongolia University',
			'Inner Mongolia University of Technology',
			);
			
			$china_innermongolia_tongliao_schools=array(
			'Inner Mongolia University for Nationalities',
			'Inner Mongolia College of Farming and Animal Husbandry',
			);
			
			$china_innermongolia_baotou_schools=array(
			'Inner Mongolia University of Science and Technology',
			);
			
			$china_innermongolia_schools=array();
			$china_innermongolia_schools['Chifeng']=$china_innermongolia_chifeng_schools;
			$china_innermongolia_schools['hohhot']=$china_innermongolia_hohhot_schools;
			$china_innermongolia_schools['Tongliao']=$china_innermongolia_tongliao_schools;
			$china_innermongolia_schools['Baotou']=$china_innermongolia_baotou_schools;
			$this->china_schools['Inner Mongolia']=$china_innermongolia_schools;
			
			//China, Hongkong
			$china_hongkong_hongkong_schools=array(
			'The University of Hong Kong', 
			'The Chinese University of Hong Kong', 
			'The Hong Kong University of Science and Technology', 
			'The Hong Kong Polytechnic University', 
			'City University of Hong Kong', 
			'Hong Kong Baptist University',
			'Lingnan University',
			'The Hong Kong Institute of Education',
			);
			
			$china_hongkong_schools=array();
			$china_hongkong_schools['Hongkong']=$china_hongkong_hongkong_schools;
			$this->china_schools['Hongkong']=$china_hongkong_schools;
			
			//China, Macau
			$china_macau_macau_schools=array(
			'University of Macau',
			'City University of Macau',
			'Institute for Tourism Studies',
			'University of Saint Joseph',
			'Kiang Wu Nursing College of Macau',
			'Macau University of Science and Technology',
			'Macau Polytechnic Institute',
			'Macau Security Forces Training College',
			'United Nations University International Institute for Software Technology',
			);
			
			$china_macau_schools=array();
			$china_macau_schools['Macau']=$china_macau_macau_schools;
			$this->china_schools['Macau']=$china_macau_schools;
			
			//China, Taiwan, Taipei
			$china_taiwan_taipei_schools=array(
			'National Taiwan University', 
			'National Yang Ming University', 
			'National Taiwan University of Science and Technology',
			'National Chengchi University',
			'National Taipei University',
			'National Taiwan Normal University',
			'National Taipei University of Education',
			'Taipei Municapital University of Education',
			'Taipei National University of the Arts',
			'National Taipei University of Technology',
			'National Taipei College of Business',
			'Taipei Physical Education College',
			'National Taiwan College of Performing Arts',
			'Chinese Culture University',
			'Ming Chuan University',
			'Tatung University',
			'China University of Science and Technology',
			'China University of Technology',
			'Taipei Chengshih University of Science and Technology',
			'Taipei College of Maritime Technology',
			'National Defense Medical Center',
			'Taiwan Police College',
			);
			
			//China, Taiwan, New Taipei
			$china_taiwan_newtaipei_schools=array(
			'National Taipei University',
		  'National Taiwan University of Arts',
		  'National Open University',
		  'Aletheia University',
		  'Fu Jen Catholic University',
		  'Huafan University',
		  'Mackay Medical College',
		  'Tamkang University',
		  'Jinwen University of Science and Technology',
		  'Ming Chi University of Technology',
		  'St. John\'s University',
		  'Tungnan University',
		  'Chihlee Institute of Technology',
		  'De Lin Institute of Technology',
		  'Hsing Wu Institute of Technology',
		  'Hwa Hsia Institute of Technology',
		  'Lee-Ming Institute of Technology',
		  'Oriental Institute of Technology',
		  'Cardinal Tien College of Healthcare and Management',
			);
			
			//China, Taiwan, Tainan
			$china_taiwan_tainan_schools=array(
			'National Cheng Kung University',
			'National University of Tainan',
			'Tainan National University of the Arts',
			'National Tainan Institute of Nursing',
			'Chang Jung Christian University',
			'Hsing-Kuo University',
			'Taiwan Shoufu University',
			'University of Kang Ning',
			'Chia Nan University of Pharmacy & Science',
			'Chung Hwa University of Medical Technology',
			'Far East University',
			'Kun Shan University',
			'Southern Taiwan University of Science and Technology',
			'Tainan University of Technology',
			'Nan Jeon Institute of Technology',
			'Min-Hwei College of Health Care Management',
			);
			
			//China, Taiwan, Hsinchu
			$china_taiwan_hsinchu_schools=array(
			'National Tsing Hua University', 
			'National Chiao Tung University',
			'National Hsinchu University of Education',
			'Chung Hua University',
			'Hsuan Chuang University',
			'Minghsin University of Science and Technology',
			'Yuanpei University',
			'Ta Hwa Institute of Technology',
			);
			
			//China, Taiwan, Taoyuan
			$china_taiwan_taoyuang_schools=array(
			'National Central University',
			'National Taiwan Sport University',
			'Chang Gung University',
			'Chung Yuan Christian University',
			'Kainan University',
			'Yuan Ze University',
			'Chang Gung University of Science and Technology',
			'Ching Yun University',
			'Lunghwa University of Science and Technology',
			'Vanung University',
			'Taoyuan Innovation Institute of Technology',
			'Hsin Sheng College of Medical Care and Management',
			'Army Academy R.O.C.',
			'Central Police University',
			'National Defense University',
			);
			
			//China, Taiwan, Kaohsiung	
			$china_taiwan_kaohsiung_schools=array(
			'National Sun Yat-sen University',
			'National University of Kaohsiung',
			'National Kaohsiung Normal University',
			'National Kaohsiung First University of Science and Technology',
			'National Kaohsiung Marine University',
			'National Kaohsiung University of Applied Sciences',
			'National Kaohsiung University of Hospitality and Tourism',
			'Open University of Kaohsiung',
			'Kaohsiung Medical University',
			'Cheng Shiu University',
			'Fooyin University',
			'Kao Yuan University',
			'Shu-Te University',
			'Fortune Institute of Technology',
			'Tung Fang Design University',
			'Wenzao Ursuline College of Languages',
			'Kaomei College of Health Care and Management',
			'Shu Zen College of Medicine and Management',
			'Yuh-Ing Junior College of Health Care and Management',
			'Air Force Institute of Technology',
			'Republic of China Air Force Academy',
			'Republic of China Military Academy',
			'Republic of China Naval Academy',
			);
			
			//China, Taiwan, Chiayi
			$china_taiwan_chiayi_schools=array(
			'National Chiayi University',
			'National Chung Cheng University',
			'Nanhua University',
			'Toko University',
			'WuFeng University',
			'Tatung Institute of Commerce and Technology',
			'Chung Jen College of Nursing, Health Science and Management',
			);
			
			
			//China, Taiwan, Taichung
			$china_taiwan_taichung_schools=array(
			'National Chung Hsing University',
			'National Taichung University of Education',
			'National Taiwan University of Physical Education and Sport',
			'National Chin-Yi University of Technology',
			'National Taichung University of Science and Technology',
			'Asia University',
			'China Medical University',
			'Chung Shan Medical University',
			'Feng Chia University',
			'Providence University',
			'Tunghai University',
			'Chaoyang University of Technology',
			'Central Taiwan University of Science and Technology',
			'Hsiuping University of Science and Technology',
			'Hungkuang University',
			'Ling Tung University',
			'Overseas Chinese University',
			);
			
			
			//China, Taiwan, Keelung
			$china_taiwan_keelung_schools=array(
			'National Taiwan Ocean University',
			'Ching Kuo Institute of Management and Health',
			'Chungyu Institue of Technology',
			);
			
			//China, Taiwan, Kinmen
			$china_taiwan_kinmen_schools=array(
			'National Quemoy University',
			);
			
			//China, Taiwan, Yilan
			$china_taiwan_yilan_schools=array(
			'National Ilan University',
			'Fo Guang University',
			'Lan Yang Institute of Technology',
			'St. Mary\'s Medicine Nursing and Management College',
			);
			
			//China, Taiwan, Miaoli
			$china_taiwan_miaoli_schools=array(
			'National United University',
			'Yu Da University',
			'Asia-Pacific Institute of Creativity',
			'Jen-Teh Junior College of Medicine, Nursing and Management',
			);
			
			//China, Taiwan, Changhua
			$china_taiwan_changhua_schools=array(
			'National Changhua University of Education',
			'Da-Yeh University',
			'Mingdao University',
			'Chienkuo Technology University',
			'Chung Chou University of Science and Technology',
			);
			
			//China, Taiwan, Pingtung
			$china_taiwan_pingtung_schools=array(
			'National Pingtung University of Education',
			'National Pingtung University of Science and Technology',
			'National Pingtung Institute of Commerce',
			'Meiho University',
			'Tajen University',
			'Kao Fong College of Digital Contents',
			'Yung Ta Institute of Technology and Commerce',
			'Tzu Hui Institute of Technology',
			);
			
			$china_taiwan_schools=array();
			$china_taiwan_schools['Taipei']=$china_taiwan_taipei_schools;
			$china_taiwan_schools['New Taipei']=$china_taiwan_newtaipei_schools;
			$china_taiwan_schools['Tainan']=$china_taiwan_tainan_schools;
			$china_taiwan_schools['Hsinchu']=$china_taiwan_hsinchu_schools;
			$china_taiwan_schools['Taoyuan']=$china_taiwan_taoyuang_schools;
			$china_taiwan_schools['Kaohsiung']=$china_taiwan_kaohsiung_schools;
			$china_taiwan_schools['Chiayi']=$china_taiwan_chiayi_schools;
			$china_taiwan_schools['Taichung']=$china_taiwan_taichung_schools;
			$china_taiwan_schools['Keelung']=$china_taiwan_keelung_schools;
			$china_taiwan_schools['Kinmen']=$china_taiwan_kinmen_schools;
			$china_taiwan_schools['Yilan']=$china_taiwan_yilan_schools;
			$china_taiwan_schools['Miaoli']=$china_taiwan_miaoli_schools;
			$china_taiwan_schools['Changhua']=$china_taiwan_changhua_schools;
			$china_taiwan_schools['pingtung']=$china_taiwan_pingtung_schools;
			$this->china_schools['Taiwan']=$china_taiwan_schools;

			return $this->china_schools;
		}
		
		if($country==='Singapore')
		{
			if(isset($this->singapore_schools))
			{
				return $this->singapore_schools;
			}  // in each country do this
			
			$this->singapore_schools=array();
			
			//Singapore
			$singapore_singapore_singapore_schools=array(
			'Nanyang Technological University',
			'National University of Singapore',
			'Singapore Management University',
			'Singapore Institute of Technology',
			'Singapore University of Technology and Design',
			'SIM University',
			);
			
			$singapore_singapore_schools=array();
			$singapore_singapore_schools['Singapore']=$singapore_singapore_singapore_schools;
			$this->singapore_schools['Singapore']=$singapore_singapore_schools;
			
			return $this->singapore_schools;  // each country has this return
		}
		
		return array();
	}
	
	public function getCountries()
	{
		return array('China', 'Singapore', 'Australia', 'USA', 'UK');
	}
	
	public function getProvinces($country)
	{
		$provinces=array();
		$schools=$this->getSchoolsByCountry($country);
		foreach($schools as $key => $val)
		{
			$provinces[]=$key;
		}
	
		return $provinces;
	}
	
	public function getCities($country, $province)
	{
		$cities=array();
		$schools=$this->getSchoolsByCountry($country);
		if(isset($schools[$province]))
		{
			$province_schools=$schools[$province];
			if(isset($province_schools))
			{
				foreach($province_schools as $key => $val)
				{
					$cities[]=$key;
				}
			}
		}
		return $cities;
	}
	
	public function getSchoolsByLocation($country, $province, $city)
	{
		$country_schools=$this->getSchoolsByCountry($country);
		return $country_schools[$province][$city];
		/*
		if(isset($country_schools[$province]))
		{
			$province_schools=$country_schools[$province];
			if(isset($province_schools))
			{
				if(isset($province_schools[$city]))
				{
					$city_schools=$province_schools[$city];
					if(isset($city_schools[$city]))
					{
						return $city_schools[$city];
					}
				}
			}
		}
		return array();*/
	}
	
	public function getSchools()
	{
		$schools=array();
		$countries=$this->getCountries();
		foreach($countries as $country)
		{
			$country_schools=$this->getSchoolsByCountry($country);
			foreach($country_schools as $province => $val1)
			{
				$country_province_schools=$val1;
				foreach($country_province_schools as $city => $val2)
				{
					$country_province_city_schools=$val2;
					foreach($country_province_city_schools as $val3)
					{
						$schools[]=($val3.', '.$city.', '.$province.', '.$country);
					}
				}
			}
		}
		/*
		//Singapore
		$schools=array('Nanyang Technological University',
		'National University of Singapore',
		'Singapore Management University',
		'Singapore Institute of Technology',
		'Singapore University of Technology and Design',
		'SIM University',
		
		//China, Beijing
		'Peking University',
		'Tsinghua University',
		'Renmin University of China',
		'Beijing Normal University',
		'Beihang University', 
		'Beijing Institute of Technology', 
		'China Agricultural University',
		
		//China, Tianjin
		'Nankai University', 
		'Tianjin University',
		
		//China, Jiangsu, Nanjing
		'Nanjing University', 
		'Southeast University',
		
		//China, Anhui, Hefei
		'University of Science and Technology of China', 
		
		//China, Zhejiang, Hangzhou
		'Zhejiang University', 
		
		//China,  Shandong, Jinan
		'Shandong University', 
		
		//China, Shandong, Qingdao
		'Ocean University of China',
		
		//China, Shanghai
		'Fudan University', 
		'Shanghai Jiao Tong University', 
		'Tongji University', 
		'East China Normal University',
		
		//China, Shaanxi, Xi'an
		'Xi\'an Jiao Tong University', 
		'Northwestern Polytechnical University',
		
		//China, Sichuan, Chengdu
		'Sichuan University', 
		'University of Electronic Science and Technology of China',
		
		//China, Gansu, Lanzhou
		'Lanzhou University', 
		
		//China, Chongqing
		'Chongqing University',
		
		//China, (Wuhan, Hubei), 
		'Wuhan University',
		'Huazhong University of Science and Technology',
		
		//China, (Changsha, Hunan), 
		'National University of Defense Technology', 
		'Central South University',
		
		//China, (Guangzhou, Guangdong), 
		'Sun Yat-sen University',
		'South China University of Technology',
		
		//China, (Xiamen, Fujian), 
		'Xiamen University', 
		
		//China, (Harbin, Heilongjiang), 
		'Harbin Institute of Technology',
		
		//China, (Dalian, Liaoning), 
		'Dalian University of Technology',
		
		//China, (Changchun, Jilin) 
		'Jilin University',
		
		//China, Hongkong
		'The University of Hong Kong', 
		'The Chinese University of Hong Kong', 
		'The Hong Kong University of Science and Technology', 
		'The Hong Kong Polytechnic University', 
		'City University of Hong Kong', 
		'Hong Kong Baptist University',
		
		//China, Macau
		'University of Macau',
		
		//China, Taiwan, Taibei
		'National Taiwan University', 
		'National Yang Ming University', 
		'National Taiwan University of Science and Technology',
		
		//China, Taiwan, Tainan
		'National Cheng Kung University',
		
		//China, Taiwan, Hsinchu
		'National Tsing Hua University', 
		'National Chiao Tung University',
		
		//China, Taiwan, Taoyuan
		'National Central University',
		
		//China, Taiwan, Kaohsiung	
		'National Sun Yat-sen University',
		);*/
		
		
		return $schools;
	}
}

?>