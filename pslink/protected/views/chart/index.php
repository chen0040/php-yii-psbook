<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>
<div class="search-form" style="position: absolute; left: 10px; top: 75px; width: 680px; height: 285px; z-index: 4;">

<div style="position: absolute; left: 10px; top: 10px; z-index: 5; width: 670px;">
<div class="black" style="font-weight:bold;width:100%"><?php echo Yii::t('translation', 'Charts'); ?></div>
<br />
You can view the statistics of scores here:
<br />
<ul>
<li>GPA</li>
<li>GRE</li>
<li>TOFLE</li>
<li>No. of Students applying University</li>
<li>No. of Students From University</li>
</ul>
</div>

<div style="position: absolute; left: 720px; top: 10px; width:220px;  z-index: 5;">
<?php echo $this->renderPartial('../site/_formSearchMenubar', array('alink'=>'chart/index')); ?>
</div>

</div>



<div style="position: absolute; left: 10px; top: 450px; width: 960px; z-index: 4;">


<?php
$students=Student::model()->findAll('gpa_score != -1');
$gpa_scores=array();
$gpa_count=0;
foreach($students as $student)
{
	$gpa_score=$student->gpa_score;
	if(isset($gpa_scores[$gpa_score]))
	{
		$gpa_scores[$gpa_score]=$gpa_scores[$gpa_score]+1;
	}
	else
	{
		$gpa_scores[$gpa_score]=1;
	}
	$gpa_count++;
}

$students=Student::model()->findAll('gre_score != -1');
$gre_scores=array();
$gre_count=0;
foreach($students as $student)
{
	$gre_score=$student->gre_score;
	if(isset($gre_scores[$gre_score]))
	{
		$gre_scores[$gre_score]=$gre_scores[$gre_score]+1;
	}
	else
	{
		$gre_scores[$gre_score]=1;
	}
	$gre_count++;
}

$students=Student::model()->findAll('tofle_score != -1');
$tofle_scores=array();
$tofle_count=0;
foreach($students as $student)
{
	$tofle_score=$student->tofle_score;
	if(isset($tofle_scores[$tofle_score]))
	{
		$tofle_scores[$tofle_score]=$tofle_scores[$tofle_score]+1;
	}
	else
	{
		$tofle_scores[$tofle_score]=1;
	}
	$tofle_count++;
}

$students=Student::model()->findAll('universities_applied != \'\'');
$unv_scores=array();
$unv_count=0;
$unv_short_names=array();
foreach($students as $student)
{
	$universities_applied=$student->universities_applied;
	$arr_universities_applied=explode(",", $universities_applied);
	foreach($arr_universities_applied as $universities_applied_entry)
	{
		$unversity=trim($universities_applied_entry);
		
		if(isset($unv_scores[$unversity]))
		{
			$unv_scores[$unversity]=$unv_scores[$unversity]+1;
		}
		else
		{
			$unv_scores[$unversity]=1;
			$unv_short_names[$unversity]= preg_replace('/[^A-Z ]/', '', $universities_applied_entry);
		}
		$unv_count++;
	}
}

$students=Student::model()->findAll('highest_education_school != \'\'');
$school_from_scores=array();
$school_from_count=0;
$school_from_short_names=array();
foreach($students as $student)
{
	$school=$student->getSchool();
	$highest_education_school=$school->getInstituteDesc();
	$school_name=$school->getInstituteName();
	
	if(isset($school_from_scores[$highest_education_school]))
	{
		$school_from_scores[$highest_education_school]=$school_from_scores[$highest_education_school]+1;
	}
	else
	{
		$school_from_scores[$highest_education_school]=1;
		$school_from_short_names[$highest_education_school]= preg_replace('/[^A-Z ]/', '', $school_name);
	}
	$school_from_count++;
	
}



?>


<table style="width:100%">
<tr>
<td colspan="2" id="header_gpa_bar" style="text-align:left;width:100%;" class="black">
<div style="font-weight:bold;margin-left:10px;" ><?php echo Yii::t('translation', 'GPA Score'); ?>: </div>
</td>
</tr>
<tr>
<td style="background-color:#e3e8ee;">
<div style="margin-top:10px;margin-bottom:10px;margin-left:20px;margin-right:20px;">
<table>
<tr>
<td>
<div id="gpa_pie" style="width:300px;height:300px;" ></div>
</td>
<td>
<div id="gpa_bar" style="width:400px;height:300px;" ></div>
</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td colspan="2" id="footer_gpa_bar" style="text-align:left;width:100%;" class="black">
<div id="gpa_info" style="font-weight:bold;margin-left:10px;">&nbsp;</div>
</td>
</tr>
</table>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript('style-header-gpa-bar', '$("#header_gpa_bar").corner("top");', CClientScript::POS_READY);
$cs->registerScript('style-footer-gpa-bar', '$("#footer_gpa_bar").corner("bottom");', CClientScript::POS_READY);
?>

<table style="width:100%">
<tr>
<td colspan="2" id="header_gre_bar" style="text-align:left;width:100%;" class="black">
<div style="font-weight:bold;margin-left:10px;" ><?php echo Yii::t('translation', 'GRE Score'); ?>: </div>
</td>
</tr>
<tr>
<td style="background-color:#e3e8ee;">
<div style="margin-top:10px;margin-bottom:10px;margin-left:20px;margin-right:20px;">
<table>
<tr>
<td>
<div id="gre_pie" style="width:300px;height:300px;" ></div>
</td>
<td>
<div id="gre_bar" style="width:400px;height:300px;" ></div>
</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td colspan="2" id="footer_gre_bar" style="text-align:left;width:100%;" class="black">
<div id="gre_info" style="font-weight:bold;margin-left:10px;">&nbsp;</div>
</td>
</tr>
</table>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript('style-header-gre-bar', '$("#header_gre_bar").corner("top");', CClientScript::POS_READY);
$cs->registerScript('style-footer-gre-bar', '$("#footer_gre_bar").corner("bottom");', CClientScript::POS_READY);
?>

<table style="width:100%">
<tr>
<td colspan="2" id="header_tofle_bar" style="text-align:left;width:100%;" class="black">
<div style="font-weight:bold;margin-left:10px;" ><?php echo Yii::t('translation', 'TOFEL Score'); ?>: </div>
</td>
</tr>
<tr>
<td style="background-color:#e3e8ee;">
<div style="margin-top:10px;margin-bottom:10px;margin-left:20px;margin-right:20px;">
<table>
<tr>
<td>
<div id="tofle_pie" style="width:300px;height:300px;" ></div>
</td>
<td>
<div id="tofle_bar" style="width:400px;height:300px;" ></div>
</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td colspan="2" id="footer_tofle_bar" style="text-align:left;width:100%;" class="black">
<div id="tofle_info" style="font-weight:bold;margin-left:10px;">&nbsp;</div>
</td>
</tr>
</table>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript('style-header-tofle-bar', '$("#header_tofle_bar").corner("top");', CClientScript::POS_READY);
$cs->registerScript('style-footer-tofle-bar', '$("#footer_tofle_bar").corner("bottom");', CClientScript::POS_READY);
?>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript('style-header-gre-bar', '$("#header_gre_bar").corner("top");', CClientScript::POS_READY);
$cs->registerScript('style-footer-gre-bar', '$("#footer_gre_bar").corner("bottom");', CClientScript::POS_READY);
?>

<table style="width:100%">
<tr>
<td colspan="2" id="header_unv_bar" style="text-align:left;width:100%;" class="black">
<div style="font-weight:bold;margin-left:10px;" ><?php echo Yii::t('translation', 'Students Applying University'); ?>: </div>
</td>
</tr>
<tr>
<td style="background-color:#e3e8ee;">
<div style="margin-top:10px;margin-bottom:10px;margin-left:20px;margin-right:20px;">
<table>
<tr>
<td>
<div id="unv_pie" style="width:300px;height:300px;" ></div>
</td>
<td>
<div id="unv_bar" style="width:400px;height:300px;" ></div>
</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td colspan="2" id="footer_unv_bar" style="text-align:left;width:100%;" class="black">
<div id="unv_info" style="font-weight:bold;margin-left:10px;">&nbsp;</div>
</td>
</tr>
</table>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript('style-header-unv-bar', '$("#header_unv_bar").corner("top");', CClientScript::POS_READY);
$cs->registerScript('style-footer-unv-bar', '$("#footer_unv_bar").corner("bottom");', CClientScript::POS_READY);
?>

<table style="width:100%">
<tr>
<td colspan="2" id="header_school_from_bar" style="text-align:left;width:100%;" class="black">
<div style="font-weight:bold;margin-left:10px;" ><?php echo Yii::t('translation', 'Students From University'); ?>: </div>
</td>
</tr>
<tr>
<td style="background-color:#e3e8ee;">
<div style="margin-top:10px;margin-bottom:10px;margin-left:20px;margin-right:20px;">
<table>
<tr>
<td>
<div id="school_from_pie" style="width:300px;height:300px;" ></div>
</td>
<td>
<div id="school_from_bar" style="width:400px;height:300px;" ></div>
</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td colspan="2" id="footer_school_from_bar" style="text-align:left;width:100%;" class="black">
<div id="school_from_info" style="font-weight:bold;margin-left:10px;">&nbsp;</div>
</td>
</tr>
</table>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript('style-header-school_from-bar', '$("#header_school_from_bar").corner("top");', CClientScript::POS_READY);
$cs->registerScript('style-footer-school_from-bar', '$("#footer_school_from_bar").corner("bottom");', CClientScript::POS_READY);
?>

<div style="height:38px;">&nbsp;</div>

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
        Yii::t('translation', 'Chart'),
    ),
));
?>

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
</div>


  





	<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/scripts/jqplot/'; ?>excanvas.js"></script><![endif]-->

<?php
$gpa_pie_data='';
$gpa_bar_vals='';
$gpa_bar_ticks='';
$sindex=0;
$scount=count($gpa_scores);
foreach($gpa_scores as $skey => $sval)
{
	if($sindex==$scount-1)
	{
		$gpa_pie_data .= ('[\''.$skey.'\','.$sval.']');
	}
	else
	{
		$gpa_pie_data .= ('[\''.$skey.'\','.$sval.'],');
	}
	
	if($sindex==$scount-1)
	{
		$gpa_bar_vals .= ($sval);
		$gpa_bar_ticks .= ('\''.$skey.'\'');
		
	}
	else
	{
		$gpa_bar_vals .= ($sval.',');
		$gpa_bar_ticks .= ('\''.$skey.'\',');
	}
	
	$sindex+=1;
}

$gre_pie_data='';
$gre_bar_vals='';
$gre_bar_ticks='';
$sindex=0;
$scount=count($gre_scores);
foreach($gre_scores as $skey => $sval)
{
	if($sindex==$scount-1)
	{
		$gre_pie_data .= ('[\''.$skey.'\','.$sval.']');
	}
	else
	{
		$gre_pie_data .= ('[\''.$skey.'\','.$sval.'],');
	}
	
	if($sindex==$scount-1)
	{
		$gre_bar_vals .= ($sval);
		$gre_bar_ticks .= ('\''.$skey.'\'');
		
	}
	else
	{
		$gre_bar_vals .= ($sval.',');
		$gre_bar_ticks .= ('\''.$skey.'\',');
	}
	
	$sindex+=1;
}

$tofle_pie_data='';
$tofle_bar_vals='';
$tofle_bar_ticks='';
$sindex=0;
$scount=count($tofle_scores);
foreach($tofle_scores as $skey => $sval)
{
	if($sindex==$scount-1)
	{
		$tofle_pie_data .= ('[\''.$skey.'\','.$sval.']');
	}
	else
	{
		$tofle_pie_data .= ('[\''.$skey.'\','.$sval.'],');
	}
	
	if($sindex==$scount-1)
	{
		$tofle_bar_vals .= ($sval);
		$tofle_bar_ticks .= ('\''.$skey.'\'');
		
	}
	else
	{
		$tofle_bar_vals .= ($sval.',');
		$tofle_bar_ticks .= ('\''.$skey.'\',');
	}
	
	$sindex+=1;
}

$unv_pie_data='';
$unv_bar_vals='';
$unv_bar_ticks='';
$unv_bar_labels='';
$sindex=0;
$scount=count($unv_scores);
foreach($unv_scores as $skey => $sval)
{
	if($sindex==$scount-1)
	{
		$unv_pie_data .= ('[\''.$unv_short_names[$skey].'\','.$sval.']');
	}
	else
	{
		$unv_pie_data .= ('[\''.$unv_short_names[$skey].'\','.$sval.'],');
	}
	
	if($sindex==$scount-1)
	{
		$unv_bar_vals .= ($sval);
		$unv_bar_ticks .= ('\''.$unv_short_names[$skey].'\'');
		$unv_bar_labels .= ('\''.$skey.'\'');
		
	}
	else
	{
		$unv_bar_vals .= ($sval.',');
		$unv_bar_ticks .= ('\''.$unv_short_names[$skey].'\',');
		$unv_bar_labels .= ('\''.$skey.'\',');
	}
	
	$sindex+=1;
}

$school_from_pie_data='';
$school_from_bar_vals='';
$school_from_bar_ticks='';
$school_from_bar_labels='';
$sindex=0;
$scount=count($school_from_scores);
foreach($school_from_scores as $skey => $sval)
{
	if($sindex==$scount-1)
	{
		$school_from_pie_data .= ('[\''.$school_from_short_names[$skey].'\','.$sval.']');
	}
	else
	{
		$school_from_pie_data .= ('[\''.$school_from_short_names[$skey].'\','.$sval.'],');
	}
	
	if($sindex==$scount-1)
	{
		$school_from_bar_vals .= ($sval);
		$school_from_bar_ticks .= ('\''.$school_from_short_names[$skey].'\'');
		$school_from_bar_labels .= ('\''.$skey.'\'');
	}
	else
	{
		$school_from_bar_vals .= ($sval.',');
		$school_from_bar_ticks .= ('\''.$school_from_short_names[$skey].'\',');
		$school_from_bar_labels .= ('\''.$skey.'\',');
	}
	
	$sindex+=1;
}
?>


<?php
$cs=Yii::app()->getClientScript();
//$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/chart/jquery.sparkline.min.js');


$cs->registerCssFile(Yii::app()->baseUrl.'/scripts/jqplot/jquery.jqplot.min.css');
$cs->registerCssFile(Yii::app()->baseUrl.'/scripts/jqplot/examples/syntaxhighlighter/styles/shCoreDefault.min.css');
$cs->registerCssFile(Yii::app()->baseUrl.'/scripts/jqplot/examples/syntaxhighlighter/styles/shThemejqPlot.min.css');
 
$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jqplot/jquery.jqplot.min.js');

$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jqplot/plugins/jqplot.pieRenderer.min.js');
$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jqplot/plugins/jqplot.barRenderer.min.js');
$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jqplot/plugins/jqplot.categoryAxisRenderer.min.js');
$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jqplot/plugins/jqplot.pointLabels.min.js');

?>


<script  type="text/javascript">
jQuery(document).ready(function(){
	
	var ticks = [<?php echo $gpa_bar_ticks; ?>];
	
    var gpa_pie = jQuery.jqplot('gpa_pie', [[<?php echo $gpa_pie_data; ?>]], {
        gridPadding: {top:0, bottom:38, left:0, right:0},
        seriesDefaults:{
            renderer:jQuery.jqplot.PieRenderer, 
            trendline:{ show:false }, 
            rendererOptions: { padding: 8, showDataLabels: true }
        },
        legend:{
            show:true, 
            placement: 'outside', 
            rendererOptions: {
                numberRows: 1
            }, 
            location:'s',
            marginTop: '15px'
        }       
    });
	
	 jQuery('#gpa_pie').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#gpa_info').html('Total Count: <?php echo $gpa_count; ?>, GPA: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#gpa_pie').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#gpa_info').html('&nbsp;');
		}
	);
});
</script>

<script  type="text/javascript">
jQuery(document).ready(function(){
	jQuery.jqplot.config.enablePlugins = true;
	
	var s1 = [<?php echo $gpa_bar_vals; ?>];
	var ticks = [<?php echo $gpa_bar_ticks; ?>];
	
	var gpa_bar = jQuery.jqplot('gpa_bar', [s1], {
		// Only animate if we're not using excanvas (not in IE 7 or IE 8)..
		animate: !jQuery.jqplot.use_excanvas,
		seriesDefaults:{
			renderer:jQuery.jqplot.BarRenderer,
			pointLabels: { show: true }
		},
		axes: {
			xaxis: {
				renderer: jQuery.jqplot.CategoryAxisRenderer,
				ticks: ticks
			}
		},
		highlighter: { show: false }
	});

	jQuery('#gpa_bar').bind('jqplotDataClick', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#gpa_info').html('Total Count: <?php echo $gpa_count; ?>, GPA: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
	
	 jQuery('#gpa_bar').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#gpa_info').html('Total Count: <?php echo $gpa_count; ?>, GPA: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#gpa_bar').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#gpa_info').html('&nbsp;');
		}
	);
});
</script>

<script  type="text/javascript">
jQuery(document).ready(function(){
	
	var ticks = [<?php echo $gre_bar_ticks; ?>];
	
    var gre_pie = jQuery.jqplot('gre_pie', [[<?php echo $gre_pie_data; ?>]], {
        gridPadding: {top:0, bottom:38, left:0, right:0},
        seriesDefaults:{
            renderer:jQuery.jqplot.PieRenderer, 
            trendline:{ show:false }, 
            rendererOptions: { padding: 8, showDataLabels: true }
        },
        legend:{
            show:true, 
            placement: 'outside', 
            rendererOptions: {
                numberRows: 1
            }, 
            location:'s',
            marginTop: '15px'
        }       
    });
	
	 jQuery('#gre_pie').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#gre_info').html('Total Count: <?php echo $gre_count; ?>, GRE: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#gre_pie').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#gre_info').html('&nbsp;');
		}
	);
});
</script>

<script  type="text/javascript">
jQuery(document).ready(function(){
	jQuery.jqplot.config.enablePlugins = true;
	
	var s1 = [<?php echo $gre_bar_vals; ?>];
	var ticks = [<?php echo $gre_bar_ticks; ?>];
	
	var gre_bar = jQuery.jqplot('gre_bar', [s1], {
		// Only animate if we're not using excanvas (not in IE 7 or IE 8)..
		animate: !jQuery.jqplot.use_excanvas,
		seriesDefaults:{
			renderer:jQuery.jqplot.BarRenderer,
			pointLabels: { show: true }
		},
		axes: {
			xaxis: {
				renderer: jQuery.jqplot.CategoryAxisRenderer,
				ticks: ticks
			}
		},
		highlighter: { show: false }
	});

	jQuery('#gre_bar').bind('jqplotDataClick', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#gre_info').html('Total Count: <?php echo $gre_count; ?>, GRE: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
	
	 jQuery('#gre_bar').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#gre_info').html('Total Count: <?php echo $gre_count; ?>, GRE: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#gre_bar').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#gre_info').html('&nbsp;');
		}
	);
});
</script>


<script  type="text/javascript">
jQuery(document).ready(function(){
	
	var ticks = [<?php echo $tofle_bar_ticks; ?>];
	
    var tofle_pie = jQuery.jqplot('tofle_pie', [[<?php echo $tofle_pie_data; ?>]], {
        gridPadding: {top:0, bottom:38, left:0, right:0},
        seriesDefaults:{
            renderer:jQuery.jqplot.PieRenderer, 
            trendline:{ show:false }, 
            rendererOptions: { padding: 8, showDataLabels: true }
        },
        legend:{
            show:true, 
            placement: 'outside', 
            rendererOptions: {
                numberRows: 1
            }, 
            location:'s',
            marginTop: '15px'
        }       
    });
	
	 jQuery('#tofle_pie').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#tofle_info').html('Total Count: <?php echo $tofle_count; ?>, TOFLE: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#tofle_pie').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#tofle_info').html('&nbsp;');
		}
	);
});
</script>

<script  type="text/javascript">
jQuery(document).ready(function(){
	jQuery.jqplot.config.enablePlugins = true;
	
	var s1 = [<?php echo $tofle_bar_vals; ?>];
	var ticks = [<?php echo $tofle_bar_ticks; ?>];
	
	var tofle_bar = jQuery.jqplot('tofle_bar', [s1], {
		// Only animate if we're not using excanvas (not in IE 7 or IE 8)..
		animate: !jQuery.jqplot.use_excanvas,
		seriesDefaults:{
			renderer:jQuery.jqplot.BarRenderer,
			pointLabels: { show: true }
		},
		axes: {
			xaxis: {
				renderer: jQuery.jqplot.CategoryAxisRenderer,
				ticks: ticks
			}
		},
		highlighter: { show: false }
	});

	jQuery('#tofle_bar').bind('jqplotDataClick', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#tofle_info').html('Total Count: <?php echo $tofle_count; ?>, TOFLE: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
	
	 jQuery('#tofle_bar').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#tofle_info').html('Total Count: <?php echo $tofle_count; ?>, TOFLE: '+ticks[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#tofle_bar').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#tofle_info').html('&nbsp;');
		}
	);
});
</script>

<script  type="text/javascript">
jQuery(document).ready(function(){
	
	var ticks = [<?php echo $unv_bar_ticks; ?>];
	var labels = [<?php echo $unv_bar_labels; ?>];
	
    var unv_pie = jQuery.jqplot('unv_pie', [[<?php echo $unv_pie_data; ?>]], {
        gridPadding: {top:0, bottom:38, left:0, right:0},
        seriesDefaults:{
            renderer:jQuery.jqplot.PieRenderer, 
            trendline:{ show:false }, 
            rendererOptions: { padding: 8, showDataLabels: true }
        },
        legend:{
            show:true, 
            placement: 'outside', 
            rendererOptions: {
                numberRows: 1
            }, 
            location:'s',
            marginTop: '15px'
        }       
    });
	
	 jQuery('#unv_pie').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#unv_info').html('Total Count: <?php echo $unv_count; ?>, GPA: '+labels[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#unv_pie').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#unv_info').html('&nbsp;');
		}
	);
});
</script>

<script  type="text/javascript">
jQuery(document).ready(function(){
	jQuery.jqplot.config.enablePlugins = true;
	
	var s1 = [<?php echo $unv_bar_vals; ?>];
	var ticks = [<?php echo $unv_bar_ticks; ?>];
	var labels = [<?php echo $unv_bar_labels; ?>];
	
	var unv_bar = jQuery.jqplot('unv_bar', [s1], {
		// Only animate if we're not using excanvas (not in IE 7 or IE 8)..
		animate: !jQuery.jqplot.use_excanvas,
		seriesDefaults:{
			renderer:jQuery.jqplot.BarRenderer,
			pointLabels: { show: true }
		},
		axes: {
			xaxis: {
				renderer: jQuery.jqplot.CategoryAxisRenderer,
				ticks: ticks
			}
		},
		highlighter: { show: false }
	});

	jQuery('#unv_bar').bind('jqplotDataClick', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#unv_info').html('Total Count: <?php echo $unv_count; ?>, GPA: '+labels[pointIndex]+', Frequency: '+data[1]);
		}
	);
	
	 jQuery('#unv_bar').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#unv_info').html('Total Count: <?php echo $unv_count; ?>, GPA: '+labels[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#unv_bar').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#unv_info').html('&nbsp;');
		}
	);
});
</script>

<script  type="text/javascript">
jQuery(document).ready(function(){
	
	var ticks = [<?php echo $school_from_bar_ticks; ?>];
	var labels = [<?php echo $school_from_bar_labels; ?>];
	
    var school_from_pie = jQuery.jqplot('school_from_pie', [[<?php echo $school_from_pie_data; ?>]], {
        gridPadding: {top:0, bottom:38, left:0, right:0},
        seriesDefaults:{
            renderer:jQuery.jqplot.PieRenderer, 
            trendline:{ show:false }, 
            rendererOptions: { padding: 8, showDataLabels: true }
        },
        legend:{
            show:true, 
            placement: 'outside', 
            rendererOptions: {
                numberRows: 1
            }, 
            location:'s',
            marginTop: '15px'
        }       
    });
	
	 jQuery('#school_from_pie').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#school_from_info').html('Total Count: <?php echo $school_from_count; ?>, School From: '+labels[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#school_from_pie').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#school_from_info').html('&nbsp;');
		}
	);
});
</script>

<script  type="text/javascript">
jQuery(document).ready(function(){
	jQuery.jqplot.config.enablePlugins = true;
	
	var s1 = [<?php echo $school_from_bar_vals; ?>];
	var ticks = [<?php echo $school_from_bar_ticks; ?>];
	var labels = [<?php echo $school_from_bar_labels; ?>];
	
	var school_from_bar = jQuery.jqplot('school_from_bar', [s1], {
		// Only animate if we're not using excanvas (not in IE 7 or IE 8)..
		animate: !jQuery.jqplot.use_excanvas,
		seriesDefaults:{
			renderer:jQuery.jqplot.BarRenderer,
			pointLabels: { show: true }
		},
		axes: {
			xaxis: {
				renderer: jQuery.jqplot.CategoryAxisRenderer,
				ticks: ticks
			}
		},
		highlighter: { show: false }
	});

	jQuery('#school_from_bar').bind('jqplotDataClick', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#school_from_info').html('Total Count: <?php echo $school_from_count; ?>, School From: '+labels[pointIndex]+', Frequency: '+data[1]);
		}
	);
	
	 jQuery('#school_from_bar').bind('jqplotDataHighlight', 
		function (ev, seriesIndex, pointIndex, data) {
			jQuery('#school_from_info').html('Total Count: <?php echo $school_from_count; ?>, School From: '+labels[pointIndex]+', Frequency: '+data[1]);
		}
	);
		
	jQuery('#school_from_bar').bind('jqplotDataUnhighlight', 
		function (ev) {
			jQuery('#school_from_info').html('&nbsp;');
		}
	);
});
</script>



