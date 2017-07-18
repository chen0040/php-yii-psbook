<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>
<?php
 $style_header='color: #3366ff;';
 ?>
 
 <?php
 $user=null;
 $username=null;
 $userId=null;
 $loginType=null;
if(isset(Yii::app()->user))
{
	$username=Yii::app()->user->id; 
	$userId=$username;
	if(Yii::app()->user->hasState('cLoginType'))
	{
		$loginType=Yii::app()->user->cLoginType;
	}
}
 
if(strcmp($loginType, Professor::CLASS_NAME)==0)
{
	$user=Professor::model()->find('id=?', array(Yii::app()->user->cId));
}
else if(strcmp($loginType, Student::CLASS_NAME)==0)
{
	$user=Student::model()->find('id=?', array(Yii::app()->user->cId));
}
?>

<div style="position: absolute; left: 10px; top: 90px; width: 700px; height: 300px; z-index: 3;">
<h1 style="color:white;font-weight:bold"><?php echo $model->getInstituteDesc(); ?></h1>
<br />
<br />
<p style="position:absolute; left:0px; top:30px; width:700px; height:250px; z-index:4;color:white;">
<?php
$def=$model->getInstituteName();
$url = 'http://en.wikipedia.org/w/api.php?action=opensearch&search='.urlencode($def).'&format=xml&limit=1';
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPGET, TRUE);

curl_setopt($ch, CURLOPT_POST, FALSE);

curl_setopt($ch, CURLOPT_HEADER, false);

curl_setopt($ch, CURLOPT_NOBODY, FALSE);

curl_setopt($ch, CURLOPT_VERBOSE, FALSE);

curl_setopt($ch, CURLOPT_REFERER, "");

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

curl_setopt($ch, CURLOPT_MAXREDIRS, 4);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; he; rv:1.9.2.8) Gecko/20100722 Firefox/5.0.0');

$page = curl_exec($ch);

$xml = simplexml_load_string($page);

$term='';
$desc='';
$url='';

if((string)$xml->Section->Item->Description) 
{
	$term=((string)$xml->Section->Item->Text);
	$desc=((string)$xml->Section->Item->Description);
	$url=((string)$xml->Section->Item->Url);
	//echo (string)$xml->Section->Item->Description;
} 
?>

<b><?php echo Yii::t('translation', 'Link'); ?></b>: <a href="<?php echo $url; ?>" style="color:white"><?php echo $url; ?></a><br /><br />
<b><?php echo Yii::t('translation', 'Wiki'); ?></b>: <?php echo $desc; ?><br /><br />

<?php 
$latlng = $model->getLatLng(); 
?>

<div style="position: absolute; left: 0px; top: 110px; z-index: 5;border-style:solid;border-width:1px;" id="school-map">
<?php
$map_detail=$model->getInstituteDesc().'<br />('.$latlng[0].', '.$latlng[1].')';
if(isset($model->note) && $model->note !=='')
{
	$map_detail=$model->note;
}
$this->renderPartial('../site/_formSearchMap', array('lat'=>$latlng[0], 'lng'=>$latlng[1], 'map_width'=>680, 'map_height'=>180, 'map_title'=>$model->getInstituteName(), 'map_detail'=>$map_detail));
?>
</div>

</p>

</div>

<div style="position: absolute; left: 800px; top: 90px; width: 100px; height: 295px; z-index: 3;">
<table>
<tr>
<td>
<?php
echo CHtml::link('&nbsp; View All &nbsp;', array('index'), array(
'style'=>'text-decoration:none;border-style:solid;border-color:white;border-width:1px;cursor:hand;color:white;width:120px;display:block;text-align:center',
'class'=>'black',
'id'=>'btn-view-all',
));
?>
</td></tr>
<tr>
<td>
<?php
echo CHtml::link('&nbsp; Update &nbsp;', array('update', 'institute_name'=>$model->institute_name), array(
'style'=>'text-decoration:none;border-style:solid;border-color:white;border-width:1px;cursor:hand;color:white;width:120px;display:block;text-align:center',
'class'=>'black',
'id'=>'btn-update',
));
?>
</td></tr>
<tr><td>
<?php
echo CHtml::link('&nbsp; Create &nbsp;', array('create'), array(
'style'=>'text-decoration:none;border-style:solid;border-color:white;border-width:1px;cursor:hand;color:white;width:120px;display:block;text-align:center',
'class'=>'black',
'id'=>'btn-create',
));
?>
</td></tr>
<tr>
<td>
<?php
echo CHtml::link('&nbsp; Delete &nbsp;', array('delete', 'institute_name'=>$model->institute_name), array(
'style'=>'text-decoration:none;border-style:solid;border-color:white;border-width:1px;cursor:hand;color:white;width:120px;display:block;text-align:center',
'class'=>'black',
'id'=>'btn-delete',
));
?>
</td></tr>
</table>
</div>

<?php 
	$file='qrcode/school_view_'.$model->id.'.png';
	$url=Yii::app()->createAbsoluteUrl('mobile/viewSchool', array('institute_name'=>$model->institute_name));
	Yii::app()->QRGen->createQRCode($url, $file);
	echo CHtml::image($file, '#', array('style'=>'position:absolute;left:808px;top:240px;width:120px;height:120px;'));
?>

<div style="position: absolute; left: 10px; top: 460px; width: 960px; z-index: 4;">
<p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Students').' '.Yii::t('translation', 'from'); ?> <?php echo $model->getInstituteDesc(); ?> </span></p><br />
<div>
<?php
	$student_group=new CActiveDataProvider('Student', 
				array(
					'criteria'=>array( 
						'condition'=>'highest_education_school=:schoolName',
						'params'=>array(':schoolName'=>$model->institute_name),
						'order'=>'update_time DESC',
					),
				),
				array( 
					'pagination'=>array( 
						'pageSize'=>20,
					), 
				)
			);
	$this->widget('zii.widgets.CListView', 
		array( 
			'dataProvider'=>$student_group, 
			'viewData'=>array('user'=>$user),
			'itemView'=>'/student/_looking_for',
		)
	); 
?>
</div>
<br /><br />

<p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Professors').' '.Yii::t('translation', 'from'); ?> <?php echo $model->getInstituteDesc(); ?> </span></p><br />
<div>
<?php
	$professor_group=new CActiveDataProvider('Professor', 
				array(
					'criteria'=>array( 
						'condition'=>'university=:schoolName',
						'params'=>array(':schoolName'=>$model->institute_name),
						'order'=>'update_time DESC',
					),
				),
				array( 
					'pagination'=>array( 
						'pageSize'=>20,
					), 
				)
			);
	$this->widget('zii.widgets.CListView', 
		array( 
			'dataProvider'=>$professor_group, 
			'viewData'=>array('user'=>$user),
			'itemView'=>'/professor/_looking_for',
		)
	); 
?>
</div>
<br /><br />

<p class="heading1"><span style="<?php echo $style_header; ?>">Social Graph from <?php echo $model->institute_name; ?> </span></p><br />

<canvas id="viewport" width="960" height="600" style="border-style:solid;border-width:1px;border-color:#999999;background-repeat:repeat;background-image:url('<?php echo Yii::app()->theme->baseUrl?>/images/grid.png');"></canvas><br />
&nbsp;<br />
<div id="footnote" style="width:960px; height:50px;border-style:solid;border-width:1px;border-color:#000000"></div>
 <?php 
	$cs=Yii::app()->getClientScript();
	$baseUrl=Yii::app()->baseUrl;
	$cs->registerScriptFile($baseUrl.'/scripts/arbor.js');
	$cs->registerScriptFile($baseUrl.'/scripts/graphics.js');
	$cs->registerScriptFile($baseUrl.'/scripts/renderer.js');
	
	$cs->registerScript(
		'handle-init-arbor',
		'
		function initArbor()
		{
			
		}
		',
		CClientScript::POS_END
	);
	
	$ri_edges_desc='';
	$ri_nodes_desc='';
	$ri_array=Student::model()->findAll('highest_education_school=?', array($model->institute_name));
	$ri_count=count($ri_array);
	for($ri_index=0; $ri_index < $ri_count; $ri_index+=1)
	{
		$ri_val=$ri_array[$ri_index];
		$ri_nodes_desc.=('ri_node'.$ri_index.':{"color":"orange","shape":"box","label":"'.$ri_val->first_name.' '.$ri_val->last_name.'"},');
		$ri_edges_desc.=('ri_node'.$ri_index.':{}, ');
		if($ri_index > 100)
		{
			break;
		}
	}
	$ri_nodes_desc.=('ri_node_:{"color":"orange","shape":"dot","label":"..."}');
	$ri_edges_desc.=('ri_node_:{}');
	
	$re_edges_desc='';
	$re_nodes_desc='';
	$re_array=Professor::model()->findAll('university=?', array($model->institute_name));
	$re_count=count($re_array);
	for($re_index=0; $re_index < $re_count; $re_index+=1)
	{
		$re_val=$re_array[$re_index];
		$re_nodes_desc.=('re_node'.$re_index.':{"color":"orange","shape":"box","label":"'.$re_val->first_name.' '.$re_val->last_name.'"},');
		$re_edges_desc.=('re_node'.$re_index.':{}, ');
		if($re_index > 100)
		{
			break;
		}
	}
	$re_nodes_desc.=('re_node_:{"color":"orange","shape":"dot","label":"..."}');
	$re_edges_desc.=('re_node_:{}');
	
	
	$cs->registerScript(
		'register-init-arbor',
		'
		var sys = arbor.ParticleSystem(1000, 400,1);
        sys.parameters({gravity:true});
        sys.renderer = Renderer("#viewport") ;
        var data = {
               nodes:{
                 model:{"color":"red","shape":"box","label":"'.Yii::t('translation', $model->getInstituteName()).'"},
                 students:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'Students').'"},
                 professors:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'Professors').'"},
				 country:{"color":"orange","shape":"box","label":"Country: '.Yii::t('translation', $model->getCountryName()).'"},
				 province:{"color":"orange","shape":"box","label":"Province: '.Yii::t('translation', $model->getProvinceName()).'"},
				 city:{"color":"orange","shape":"box","label":"City: '.Yii::t('translation', $model->getCityName()).'"}
              }, 
               edges:{
                 model:{ students:{}, professors:{}, country:{}, province:{}, city:{} }
               }
             };
            sys.graft(data);
            setTimeout(function(){
                        var postLoadData = {
                           nodes:{
							 '.$ri_nodes_desc.',
							 '.$re_nodes_desc.'
                           }, 
                           edges:{
                                students:{ '.$ri_edges_desc.' },
								professors:{ '.$re_edges_desc.' }
                           }
                         };
                         sys.graft(postLoadData);
                    },10000);
		',
		CClientScript::POS_LOAD  
	);
?>

<div style="height:38px;">
</div>

</div>

<div id="floatbar">
<?php
$pparent='student';
if(isset($user))
{
	$pparent=$user->tag_lcase();
}
$this->widget('application.extensions.exbreadcrumbs.EXBreadcrumbs', array(
	'htmlOptions'=>array('style'=>'border-top:1px solid #000000', 'class'=>'xbreadcrumbs xbreadcrumbs_style'),
    'links'=>array(
		Yii::t('translation', 'Search') => array($pparent.'/search'),
        Yii::t('translation', 'School') => array('educationSchool/index'),
        $model->getInstituteDesc().' ('.$latlng[0].', '.$latlng[1].')',
    ),
));
?>
</div>

<?php
$cs = Yii::app()->getClientScript();
$cs->registerCss(
'css-floating-bar',
'
#floatbar {
 width:100%;
 position: fixed;
 bottom: 0px;
 left:0px;
 z-index: 9999;
 filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=\'#88000000\', endColorstr=\'#88000000\');
 color: #FFFFFF;
 font-size: 12px;
 padding:0px;
}		
');
?>

