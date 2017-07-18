<div class="form">	
	<table style="width:800px">
	<tr>
	<td><b>Now you can embed your or any member's social graph and contact details into your own web page with extreme ease, simply copy the following link and embed within your web page</b></td>
	</tr>
	<tr><td>
	<span style="color:green">
	&lt;iframe src="http://www.ps-book.com/psb/index.php?r=student/linkData&amp;id=<?php echo $model->id; ?>&amp;width=960&amp;height=400" width="960" height="400" frameborder="0" &gt;&lt;/iframe&gt;
	</span>
	</td></tr>
	
	<tr><td>&nbsp;</td></tr>
	<tr><td><b>An example is shown below:</b></td></tr>
	<tr><td>
	<tr><td>
	<span style="color:green">
	&lt;html&gt;<br />
	&lt;body&gt;<br />
	&lt;iframe src="http://www.ps-book.com/psb/index.php?r=student/linkData&amp;id=<?php echo $model->id; ?>&amp;width=960&amp;height=400" width="960" height="400" frameborder="0" &gt;&lt;/iframe&gt;
	<br />
	&lt;/body&gt;<br />
	&lt;/html&gt;<br />
	</span>
	</td></tr>
	
	<tr><td><b>To see a preview, click the link below</b>
	</td></tr>
	
	<tr><td>
	<?php
	echo CHtml::link('Preview Link', array('student/linkData', 'id'=>$model->id, 'width'=>960, 'height'=>400), array('target'=>'_blank'));
	?>
	</td></tr>

	
	</table>

</div><!-- form -->