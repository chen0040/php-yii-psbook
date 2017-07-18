<?php
$linkWidth2=$linkWidth-20;
$linkHeight2=$linkHeight-40;
?>

<div style="width:<?php echo $linkWidth2; ?>;height:<?php echo $linkHeight2; ?>">
<?php


$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Contact'=>$this->renderPartial('_linkDataContact', array('data'=>$model), true, true),
		'Qualification'=>$this->renderPartial('_linkDataQualification', array('data'=>$model), true, true),
        'Social Graph'=>$this->renderPartial('_linkDataGraph', array('data'=>$model, 'linkWidth'=>$linkWidth2, 'linkHeight'=>$linkHeight2), true, true),
        // panel 3 contains the content rendered by a partial view
        
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>false
    ),
));
?>


<?php 
	$data=$model;
	$articles=$data->getArticles();
	$p=$data;
	$username=$p->first_name.' '.$p->last_name;
	$school=$p->getSchoolFullName();
	$email=$p->getEmail();
	$phone=$p->getContactFullNumber();
	$ads=$p->getAds();

	$cs=Yii::app()->getClientScript();
	$baseUrl=Yii::app()->baseUrl;
	$cs->registerScriptFile($baseUrl.'/scripts/arbor.js');
	$cs->registerScriptFile($baseUrl.'/scripts/graphics.js');
	$cs->registerScriptFile($baseUrl.'/scripts/renderer.js');
	//$cs->registerScriptFile('https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js');
	
	//$cs->registerScriptFile($baseUrl.'/scripts/tmp/jquery.address-1.4.min.js');
	// $cs->registerScriptFile($baseUrl.'/scripts/tmp/arbor-tween.js');
	// $cs->registerScriptFile($baseUrl.'/scripts/tmp/site.js');
	// $cs->registerScriptFile('http://use.typekit.com/mxh7kqd.js');
	
	$cs->registerScript(
		'handle-init-arbor',
		'
		function initArbor()
		{
			
		}
		',
		CClientScript::POS_END
	);
	
	$ri=$data->getResearchInterest();
	$ri_array=explode(",", $ri);
	$ri_nodes=array();
	$ri_items=array();
	$ri_items_count=count($ri_array);
	for($ri_index=0; $ri_index < $ri_items_count; ++$ri_index)
	{
		$ri_items[]=('ri_node'.$ri_index);
		$ri_val=trim($ri_array[$ri_index]);
		$ri_nodes[$ri_items[$ri_index]]=trim($ri_val);
	}
	
	$ri_edges_desc='';
	$ri_nodes_desc='';
	foreach($ri_nodes as $ri_key => $ri_val)
	{
		$ri_nodes_desc.=($ri_key.':{"color":"orange","shape":"box","label":"'.$ri_val.'"},');
		$ri_edges_desc.=($ri_key.':{}, ');
	}
	$ri_nodes_desc.=('ri_node_:{"color":"orange","shape":"dot","label":"..."}');
	$ri_edges_desc.=('ri_node_:{}');
	
	$re_edges_desc='';
	$re_nodes_desc='';
	$re_nodes=$articles;
	foreach($re_nodes as $re_key => $re_val)
	{
		if(isset($re_val))
		{
			$re_nodes_desc.=('re_'.$re_key.':{"color":"orange","shape":"box","label":"'.$re_val->title.'"},');
			$re_edges_desc.=('re_'.$re_key.':{}, ');
		}
	}
	$re_nodes_desc.=('re_:{"color":"orange","shape":"dot","label":"..."}');
	$re_edges_desc.=('re_:{}');
	
	$cs->registerScript(
		'register-init-arbor',
		'
		var sys = arbor.ParticleSystem(1000, 400,1);
        sys.parameters({gravity:true});
        sys.renderer = Renderer("#viewport") ;
        var data = {
               nodes:{
                 model:{"color":"red","shape":"box","label":"'.$username.'"},
                 education:{"color":"green","shape":"box","label":"Education"},
                 ri:{"color":"green","shape":"box","label":"Research Interest"},
				 english:{"color":"green","shape":"box","label":"English"},
				 contact:{"color":"green","shape":"box","label":"Contact"},
				 re:{"color":"green","shape":"box","label":"Research Experiences"}
              }, 
               edges:{
                 model:{ education:{}, ri:{}, english:{}, contact:{}, re:{} }
               }
             };
            sys.graft(data);
            setTimeout(function(){
                        var postLoadData = {
                           nodes:{
                             school:{"color":"orange","shape":"box","label":"School:'.$school.'"},
                             degree:{"color":"orange","shape":"box","label":"'.$data->getDegree().'"},
							 gpa:{"color":"orange","shape":"box","label":"GPA:'.$data->getGPA().'"},
							 '.$ri_nodes_desc.',
							 '.$re_nodes_desc.',
                             tofle:{"color":"orange","shape":"box","label":"TOFLE:'.$data->getTOEFL().'"},
							 gre:{"color":"orange","shape":"box","label":"GRE:'.$data->getGRE().'"},
							 phone:{"color":"orange","shape":"box","label":"Tel:'.$data->getContactFullNumber().'"},
							 email:{"color":"orange","shape":"box","label":"Email:'.$data->getEmail().'"}
                           }, 
                           edges:{
                                education:{ school:{}, degree:{}, gpa:{} },
                                ri:{ '.$ri_edges_desc.' },
								re:{ '.$re_edges_desc.' },
                                english:{ tofle:{},gre:{} },
								contact: { phone:{}, email:{} }
                           }
                         };
                         sys.graft(postLoadData);
                    },10000);
		',
		CClientScript::POS_LOAD  
	);
?>

</div>


