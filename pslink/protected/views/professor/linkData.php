<?php
$linkWidth2=$linkWidth-20;
$linkHeight2=$linkHeight-40;
?>

<div style="width:<?php echo $linkWidth2; ?>;height:<?php echo $linkHeight2; ?>">
<?php


$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Contact'=>$this->renderPartial('_linkDataContact', array('data'=>$model), true, true),
		'Requirements'=>$this->renderPartial('_linkDataRequirements', array('data'=>$model), true, true),
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
	$p=$model;
	$articles=$p->getArticles();
	$username=$p->first_name.' '.$p->last_name;
	$email2=$p->email2;
	
	$cs=Yii::app()->getClientScript();
	$baseUrl=Yii::app()->baseUrl;
	$cs->registerScriptFile($baseUrl.'/scripts/arbor.js');
	$cs->registerScriptFile($baseUrl.'/scripts/graphics.js');
	$cs->registerScriptFile($baseUrl.'/scripts/renderer.js');
	//$cs->registerScriptFile('https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js');
	// $cs->registerScriptFile($baseUrl.DIRECTORY_SEPARATOR.'arbor-graphics.js');
	// $cs->registerScriptFile($baseUrl.DIRECTORY_SEPARATOR.'arbor-tween.js');
	// $cs->registerScriptFile($baseUrl.DIRECTORY_SEPARATOR.'site.js');
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
	
	$ri=$model->getResearchInterest();
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
	
	$requirements=$p->requirements;
	$rq_array=explode("\n", $requirements);
	$rq_nodes=array();
	$rq_items=array();
	$rq_items_count=count($rq_array);
	for($rq_index=0; $rq_index < $rq_items_count; ++$rq_index)
	{
		$rq_items[]=('rq_node'.$rq_index);
		$rq_val=trim($rq_array[$rq_index]);
		$rq_nodes[$rq_items[$rq_index]]=trim($rq_val);
	}
	
	$rq_edges_desc='';
	$ri_edges_desc='';
	$rq_nodes_desc='';
	$ri_nodes_desc='';
	foreach($ri_nodes as $ri_key => $ri_val)
	{
		$ri_nodes_desc.=($ri_key.':{"color":"orange","shape":"box","label":"'.$ri_val.'"},');
		$ri_edges_desc.=($ri_key.':{}, ');
	}
	foreach($rq_nodes as $rq_key => $rq_val)
	{
		$rq_nodes_desc.=($rq_key.':{"color":"orange","shape":"box","label":"'.$rq_val.'"},');
		$rq_edges_desc.=($rq_key.':{}, ');
	}
	$ri_nodes_desc.=('ri_node_:{"color":"orange","shape":"dot","label":"..."}');
	$ri_edges_desc.=('ri_node_:{}');
	$rq_nodes_desc.=('rq_node_:{"color":"orange","shape":"dot","label":"..."}');
	$rq_edges_desc.=('rq_node_:{}');
	
	$re_edges_desc='';
	$re_nodes_desc='';
	$re_nodes=$articles;
	foreach($re_nodes as $re_key => $re_val)
	{
		$re_nodes_desc.=('re_'.$re_key.':{"color":"orange","shape":"box","label":"'.$re_val->title.'"},');
		$re_edges_desc.=('re_'.$re_key.':{}, ');
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
                 requirements:{"color":"green","shape":"box","label":"Requirements"},
                 ri:{"color":"green","shape":"box","label":"Research Interest"},
				 contact:{"color":"green","shape":"box","label":"Contact"},
				 re:{"color":"green","shape":"box","label":"Research Experiences"}
              }, 
               edges:{
                 model:{ ri:{}, contact:{}, requirements:{}, re:{} }
               }
             };
            sys.graft(data);
            setTimeout(function(){
                        var postLoadData = {
                           nodes:{
                             '.$rq_nodes_desc.',
							 '.$ri_nodes_desc.',
							 '.$re_nodes_desc.',
							 phone:{"color":"orange","shape":"box","label":"Tel:'.$model->getContactFullNumber().'"},
							 email:{"color":"orange","shape":"box","label":"Email:'.$model->getEmail().'"},
							 website:{"color":"orange","shape":"box","label":"Site:'.$email2.'"}
                           }, 
                           edges:{
                                requirements:{ '.$rq_edges_desc.' },
                                ri:{ '.$ri_edges_desc.' },
								re:{ '.$re_edges_desc.' },
								contact: { phone:{}, email:{}, website:{} }
                           }
                         };
                         sys.graft(postLoadData);
                    },10000);
		',
		CClientScript::POS_LOAD  
	);
?>

</div>


