 <?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<table>
<tr>
<td colspan="2">
<iframe src="" width="500" height="400" id="vplayer" frameborder="0" ></iframe>
</td>
</tr>
<tr>
<td colspan="2">
<div id="currentVideo"></div>
</td>
</tr>
<tr>
<td colspan="2">
<textarea id="txt_desc" rows="3" cols="60" disabled="disabled">
</textarea>
</td>
</tr>
</table>

