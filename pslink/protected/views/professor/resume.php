<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=resume.doc");
 
echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";

echo '<hr />';

echo '<table>';
echo "<tr>";
echo "<td><b>Name:</b></td>";
echo '<td>'.$model->first_name.' '.$model->last_name.'</td>';
echo '</tr>';

echo "<tr>";
echo "<td><b>School:</b></td>";
echo '<td>'.$model->getSchoolName().'</td>';
echo '</tr>';

echo "<tr>";
echo "<td><b>Email:</b></td>";
echo '<td>'.$model->getEmail().'</td>';
echo '</tr>';

echo "<tr>";
echo "<td><b>Tel:</b></td>";
echo '<td>'.$model->getContactFullNumber().'</td>';
echo '</tr>';

echo '<tr>';
echo '<td><b>Research: </b></td>';
echo '<td>'.$model->getResearchInterest().'</td>';
echo '</tr>';

echo "<tr>";
echo "<td><b>Objective:</b></td>";
echo '<td>'.$model->getAds().'</td>';
echo '</tr>';

echo '</table>';

echo '<hr />';

echo '<table>';

echo '<tr>';
echo '<td colspan="2"><b>Research Experiences:</b></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="2">';
$articles=$model->getArticles();
$article_count=count($articles);
if($article_count > 0)
{
	foreach($articles as $article_key => $article)
	{
		if(isset($article))
		{
			echo $article->toString().'<br />';
		}
	}
}
echo '</td>';
echo '</tr>';

echo '</table>';

echo '<hr />';

echo "</body>";
echo "</html>";
?>