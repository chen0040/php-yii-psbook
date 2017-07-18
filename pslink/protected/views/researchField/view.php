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

<?php
$def=$model->research_field_name;
if(isset($model->research_field_category) && $model->research_field_category !== '')
{
$def=$model->research_field_category;
}
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
<h1 style="color:white"><a href="<?php echo $url; ?>" style="color:white;font-weight:bold"><?php echo $model->research_field_name; ?></a></h1>
<br />
<br />
<p style="position:absolute; left:0px; top:30px; width:700px; height:250px; z-index:4;color:white;">

<b><?php echo Yii::t('translation', 'Link'); ?></b>: <a href="<?php echo $url; ?>" style="color:white"><?php echo $url; ?></a>


<br />
<br />

<b><?php echo Yii::t('translation', 'Wiki'); ?></b>: <?php echo $desc; ?>
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
echo CHtml::link('&nbsp; Update &nbsp;', array('update', 'research_field_name'=>$model->research_field_name), array(
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
echo CHtml::link('&nbsp; Delete &nbsp;', array('delete', 'research_field_name'=>$model->research_field_name), array(
'style'=>'text-decoration:none;border-style:solid;border-color:white;border-width:1px;cursor:hand;color:white;width:120px;display:block;text-align:center',
'class'=>'black',
'id'=>'btn-delete',
));
?>
</td></tr>
</table>
</div>

<?php 
	$file='qrcode/research_'.$model->id.'.png';
	$url=Yii::app()->createAbsoluteUrl('mobile/viewResearch', array('research_field_name'=>$model->research_field_name));
	Yii::app()->QRGen->createQRCode($url, $file);
	echo CHtml::image($file, '#', array('style'=>'position:absolute;left:808px;top:240px;width:120px;height:120px;'));
?>

<div style="position: absolute; left: 10px; top: 460px; width: 960px; z-index: 4;">
<p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Students interested in'); ?> <?php echo $model->research_field_name; ?> </span></p><br />
<div>
<?php
	$student_group=new CActiveDataProvider('Student', 
				array(
					'criteria'=>array( 
						'condition'=>'proposed_research_topic LIKE :researchFieldName',
						'params'=>array(':researchFieldName'=>'%'.$model->research_field_name.'%'),
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

<p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Professors working in'); ?> <?php echo $model->research_field_name; ?> </span></p><br />
<div>
<?php
	$professor_group=new CActiveDataProvider('Professor', 
				array(
					'criteria'=>array( 
						'condition'=>'research LIKE :researchFieldName',
						'params'=>array(':researchFieldName'=>'%'.$model->research_field_name.'%'),
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

<p class="heading1"><span style="<?php echo $style_header; ?>">Social Graph from <?php echo $model->research_field_name; ?> </span></p><br />

<canvas id="viewport" width="960" height="600" style="border-style:solid;border-width:1px;border-color:#bbbbbb;background-repeat:repeat;background-image:url('<?php echo Yii::app()->theme->baseUrl?>/images/grid.png');"></canvas><br />
&nbsp;<br />
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
	$ri_array=Student::model()->findAll(array('condition'=>'proposed_research_topic LIKE :match', 'params'=>array(':match'=>'%'.$model->research_field_name.'%')));
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
	$re_array=Professor::model()->findAll(array('condition'=>'research LIKE :match', 'params'=>array(':match'=>'%'.$model->research_field_name.'%')));
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
		//$.post("index.php?r=researchField/wiki", {def:"'.$model->research_field_name.'"}, function(data) {alert(data.desc);}, "json");
		var sys = arbor.ParticleSystem(1000, 400,1);
        sys.parameters({gravity:true});
        sys.renderer = Renderer("#viewport") ;
        var data = {
               nodes:{
                 model:{"color":"red","shape":"box","label":"'.$model->research_field_name.'"},
                 students:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'Students').'"},
                 professors:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'Professors').'"}
              }, 
               edges:{
                 model:{ students:{}, professors:{} }
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

<p class="heading1"><span style="<?php echo $style_header; ?>">Research works related to <?php echo $model->research_field_name; ?> </span></p><br />

<?php
$cs=Yii::app()->getClientScript();
//http://nicolasgallagher.com/pure-css-speech-bubbles/demo/
if(!$cs->isCssRegistered('css-pview-style'))
{
$cs->registerCss(
'css-article-style',
'
/* ============================================================================================================================
== BUBBLE WITH A BORDER AND TRIANGLE
** ============================================================================================================================ */

/* THE SPEECH BUBBLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle2-border {
	position:relative;
	padding:15px;
	margin:1em 0 3em;
	border:5px solid #27659C;
	color:#333;
	background:#fff;
	/* css3 */
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
}

/* Variant : for left positioned triangle
------------------------------------------ */

.triangle2-border.left {
	margin-left:30px;
}

/* Variant : for right positioned triangle
------------------------------------------ */

.triangle2-border.right {
	margin-right:30px;
}
');
}

$articles=$model->getCitations(1, 20);
$article_count=count($articles);
for($article_index=0; $article_index < $article_count; ++$article_index)
{
	$article=$articles[$article_index];
	echo '<div class="triangle2-border">';
	echo '<a href="'.$article['href'].'" style="text-decoration:none;font-weight:bold;" target="_blank">'.$article['title'].'</a><br />';
	echo '<b>Authors: </b>: ';
	foreach($article['authors'] as $author)
	{
		echo $author.', ';
	}
	echo '<br />';
	if(isset($article['journal']))
	{
		echo '<b>Journal: </b>: <a href="'.$article['href'].'" style="text-decoration:none;font-weight:bold;">'.$article['journal'].'</a><br />';
	}
	echo '<b>Pages: </b>: '.$article['start_page'].'-'.$article['end_page'].'<br />';
	echo '<b>Year: </b>: '.$article['year'].'<br />';
	if(isset($article['publisher']))
	{
		echo '<b>Publisher: </b>: <a href="'.$article['href'].'" style="text-decoration:none;font-weight:bold;">'.$article['publisher'].'</a><br />';
	}
	echo '</div>';
}
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
        Yii::t('translation', 'Research') => array('researchField/index'),
        $model->research_field_name,
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
