<?php
Yii::import('ext.EGMap.*');
 
$gMap = new EGMap();
$gMap->zoom = 10;
$mapTypeControlOptions = array(
  'position'=> EGMapControlPosition::LEFT_BOTTOM,
  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
);
 
$gMap->mapTypeControlOptions= $mapTypeControlOptions;

if(!isset($lat))
{
	$lat = 39.721089311812094;
}
if(!isset($lng))
{
	$lng = 2.91165944519042;
}

if(!isset($map_width))
{
	$map_width=680;
}

if(!isset($map_height))
{
	$map_height=280;
}

if(!isset($map_title))
{
	$map_title='';
}

if(!isset($map_detail))
{
	$map_detail='...!';
}
 
$gMap->setCenter($lat, $lng); 
$gMap->setWidth($map_width);
$gMap->setHeight($map_height);
 
// Create GMapInfoWindows
$info_window_a = new EGMapInfoWindow('<div>...</div>');
$info_window_b = new EGMapInfoWindow($map_detail);
 
$icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/gazstation.png");
 
$icon->setSize(32, 37);
$icon->setAnchor(16, 16.5);
$icon->setOrigin(0, 0);
 
 
// Create marker with label
$marker = new EGMapMarkerWithLabel($lat, $lng, array('title' => $map_title)); //'icon'=>$icon
 
$label_options = array(
  'backgroundColor'=>'white',
  'opacity'=>'0.75',
  'width'=>($map_width/2.5).'px',
  'color'=>'blue'
);
 
// SECOND WAY:
$marker->labelContent= $map_title;
$marker->labelStyle=$label_options;
$marker->draggable=true;
$marker->labelClass='labels';
$marker->raiseOnDrag= true;
 
$marker->setLabelAnchor(new EGMapPoint(22,0));
 
$marker->addHtmlInfoWindow($info_window_b);
 
$gMap->addMarker($marker);
 
// enabling marker clusterer just for fun
// to view it zoom-out the map
$gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
 
$gMap->renderMap();
?>