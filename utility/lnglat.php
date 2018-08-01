<?php 
define("EARTH_RADIUS", 6371); // 地球半径，平均半径为6371km
 /**
 *计算某个经纬度的周围某段距离的正方形的四个点
 *
 *@param lng float 经度
 *@param lat float 维度
 *@param distance float 该点所在圆的半径，该圆与此正方形内切，默认值为0.5千米
 *@return array 正方形的四个点的经纬度坐标
 */ 
function returnSquarePoint($lng,$lat,$distance = 0.5){
	$dlng = 2 * asin(sin($distance /(2*EARTH_RADIUS)) / cos(deg2rad($lat)));
	$dlng = rad2deg($dlng);

	$dlat = $distance/EARTH_RADIUS;
	$dlat = rad2deg($dlat);
	return array(
		'left_top' => array('lat'=>$lat+$dlat,'lng'=>$lng-$dlng),
		'right_top' => array('lat'=>$lat+$dlat,'lng'=>$lng+$dlng),
		'left_bottom' => array('lat'=>$lat-$dlat,'lng'=>$lng-$dlng),
		'right_bottom' => array('lat'=>$lat-$dlat,'lng'=>$lng+$dlng)
		);
 }

 function returnSquarePoint2($lng,$lat,$distance = 0.5){
 	$earth_radius = 6371;
	$dlng = 2 * asin(sin($distance / (2*$earth_radius)) / cos(deg2rad($lat)));
	$dlng = rad2deg($dlng);

	$dlat = $distance/$earth_radius;
	$dlat = rad2deg($dlat);
	return array(
		'left_top' => array('lat'=>$lat+$dlat,'lng'=>$lng-$dlng),
		'right_top' => array('lat'=>$lat+$dlat,'lng'=>$lng+$dlng),
		'left_bottom' => array('lat'=>$lat-$dlat,'lng'=>$lng-$dlng),
		'right_bottom' => array('lat'=>$lat-$dlat,'lng'=>$lng+$dlng)
		);
 }
