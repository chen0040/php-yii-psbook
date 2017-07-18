<canvas id="viewport" width="940" height="600" style="border-style:solid;border-width:1px;border-color:#000000;background-repeat:repeat;background-image:url('<?php echo Yii::app()->theme->baseUrl?>/images/grid.png');"></canvas><br />
&nbsp;<br />
 <?php 
	$articles=$model->getArticles();
	$username=$model->first_name.' '.$model->last_name;
	$school=$model->getSchool()->getInstituteDesc();
	
	$cs=Yii::app()->getClientScript();
	$baseUrl=Yii::app()->baseUrl;
	$cs->registerScriptFile($baseUrl.'/scripts/arbor.js');
	$cs->registerScriptFile($baseUrl.'/scripts/graphics.js');
	$cs->registerScriptFile($baseUrl.'/scripts/renderer.js');
	// $cs->registerScriptFile('https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js');
	// $cs->registerScriptFile($baseUrl.'/scripts/tmp/jquery.address-1.4.min.js');
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
                 education:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'Education').'"},
                 ri:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'Research Interest').'"},
				 english:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'English').'"},
				 contact:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'Contact').'"},
				 re:{"color":"green","shape":"box","label":"'.Yii::t('translation', 'Research Experiences').'"}
              }, 
               edges:{
                 model:{ education:{}, ri:{}, english:{}, contact:{}, re:{} }
               }
             };
            sys.graft(data);
            setTimeout(function(){
                        var postLoadData = {
                           nodes:{
                             school:{"color":"orange","shape":"box","label":"'.Yii::t('translation', 'School').':'.Yii::t('translation', $school).'"},
                             degree:{"color":"orange","shape":"box","label":"'.$model->getDegree().'"},
							 gpa:{"color":"orange","shape":"box","label":"GPA:'.$model->getGPA().'"},
							 '.$ri_nodes_desc.',
							 '.$re_nodes_desc.',
                             tofle:{"color":"orange","shape":"box","label":"'.Yii::t('translation', 'TOEFL').':'.$model->getTOEFL().'"},
							 gre:{"color":"orange","shape":"box","label":"'.Yii::t('translation', 'GRE').':'.$model->getGRE().'"},
							 phone:{"color":"orange","shape":"box","label":"'.Yii::t('translation', 'Tel').':'.$model->getContactFullNumber().'"},
							 email:{"color":"orange","shape":"box","label":"'.Yii::t('translation', 'Email').':'.$model->getEmail().'"}
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