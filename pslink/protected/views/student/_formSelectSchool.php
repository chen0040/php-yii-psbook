<div class="form">
	
	<table style="width:760px;">
	<tr>
	<td colspan="2" style="color:white;" class="black"><b><?php echo Yii::t('translation', 'Country'); ?></b></td>
	</tr>
	<tr>
	<td colspan="2">
	<div id="country_fields" style="width:760px;">
	<?php
	$countries=Yii::app()->schoolService->getCountries();
	foreach($countries as $country)
	{
		echo '<a href="#" onclick="handleProvinceUpdate(&quot;'.$country.'&quot;); return false;">'.Yii::t('translation', $country).'</a>&nbsp;| ';
	}
	?>
	</div>
	</td>
	</tr>
	<tr>
	<td colspan="2" style="color:white;" class="black"><b><?php echo Yii::t('translation', 'Province'); ?></b></td>
	</td>
	</tr>
	<tr>
	<td colspan="2">
	<div id="province_fields" style="width:760px;max-width:760px;display:block;">
	<?php
	$country=$countries[0];
	$provinces=Yii::app()->schoolService->getProvinces($country);
	echo '<p>';
	foreach($provinces as $province)
	{
		echo '<a href="#" onclick="handleCityUpdate(&quot;'.$country.'&quot;, &quot;'.$province.'&quot;); return false;">'.Yii::t('translation', $province).'</a>&nbsp;| ';
	}
	echo '</p>';
	?>
	
	</div>
	</td>
	</tr>
	<tr>
	<td colspan="2" style="color:white;" class="black"><b><?php echo Yii::t('translation', 'City'); ?></b></td>
	</tr>
	<tr>
	<td>
	<div id="city_fields" style="width:760px;max-width:760px;display:block">
	<?php
	$province=$provinces[0];
	$cities=Yii::app()->schoolService->getCities($country, $province);
	foreach($cities as $city)
	{
		echo '<a href="#" onclick="handleSchoolUpdate(&quot;'.$country.'&quot;, &quot;'.$province.'&quot;, &quot;'.$city.'&quot;); return false;">'.Yii::t('translation', $city).'</a>&nbsp;| ';
	}
	?>
	</div>
	</td>
	</tr>
	<tr>
	<td colspan="2" style="color:white;" class="black"><b><?php echo Yii::t('translation', 'School'); ?></b></td>
	</tr>
	<tr>
	<td colspan="2">
	<div id="school_fields" style="width:760px;max-width:760px;display:block">
	<?php
	$city=$cities[0];
	$schools=Yii::app()->schoolService->getSchoolsByLocation($country, $province, $city);
	foreach($schools as $school)
	{
		echo '<a href="#" onclick="handleSelectSchoolUpdate(&quot;'.$country.'&quot;, &quot;'.$province.'&quot;, &quot;'.$city.'&quot;, &quot;'.$school.'&quot;); return false;">'.Yii::t('translation', $school).'</a>&nbsp;| ';
	}
	?>
	</div>
	</td>
	</tr>
	
	 <tr>
	 <td colspan="2">
		
        <?php 
			
			$cs=Yii::app()->getClientScript();
			
			$cs->registerScript(
				'handle-select-school-complete',
				'
				function handleProvinceUpdate(country_val)
				{
					
					$.post("index.php?r='.$model->tag_lcase().'/getProvinces&id='.$model->id.'", 
					{ 
						country:country_val
					},
					function(data) 
					{
						var pcount=data.provinces.length;
						var new_text="";
						for(var pindex=0; pindex < pcount; ++pindex)
						{
							
							new_text+=\'<a href="#" onclick="handleCityUpdate(&quot;\'+country_val+\'&quot;, &quot;\'+data.provinces[pindex].name+\'&quot;); return false;">\'+data.provinces[pindex].name+\'</a>&nbsp;| \';
						}
						$("#province_fields").html(new_text);
						handleCityUpdate(country_val, data.provinces[0].name);
					},
				   "json");
				}
				
				function handleCityUpdate(country_val, province_val)
				{
					$.post("index.php?r='.$model->tag_lcase().'/getCities&id='.$model->id.'", 
					{ 
						country:country_val,
						province:province_val
					},
					function(data) 
					{
						var pcount=data.cities.length;
						var new_text="";
						for(var pindex=0; pindex < pcount; ++pindex)
						{
							
							new_text+=\'<a href="#" onclick="handleSchoolUpdate(&quot;\'+country_val+\'&quot;, &quot;\'+province_val+\'&quot;, &quot;\'+data.cities[pindex].name+\'&quot;); return false;">\'+data.cities[pindex].name+\'</a>&nbsp;| \';
						}
						$("#city_fields").html(new_text);
						handleSchoolUpdate(country_val, province_val, data.cities[0].name);
					},
				   "json");
				}
				
				function handleSchoolUpdate(country_val, province_val, city_val)
				{
					$.post("index.php?r='.$model->tag_lcase().'/getSchoolsByLocation&id='.$model->id.'", 
					{ 
						country:country_val,
						province:province_val,
						city:city_val
					},
					function(data) 
					{
						var pcount=data.schools.length;
						var new_text="";
						for(var pindex=0; pindex < pcount; ++pindex)
						{
							
							new_text+=\'<a href="#" onclick="handleSelectSchoolUpdate(&quot;\'+country_val+\'&quot;, &quot;\'+province_val+\'&quot;, &quot;\'+city_val+\'&quot;, &quot;\'+data.schools[pindex].name+\'&quot;); return false;">\'+data.schools[pindex].name+\'</a>&nbsp;| \';
						}
						$("#school_fields").html(new_text);
					},
				   "json");
				}
				
				function handleSelectSchoolUpdate(country_val, province_val, city_val, school_val)
				{
					var new_text=school_val+", "+city_val+", "+province_val+", "+country_val;
					$("#Student_highest_education_school").val(new_text);
					$("#highest_education_school_autocomplete").val(new_text);
					$("#select-student-school-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-select-school-complete',
				'
				
				',
				CClientScript::POS_READY
			);
			
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->