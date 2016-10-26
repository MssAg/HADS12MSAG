<?php
$xml = simplexml_load_file('preguntas.xml');
?>
<table border=1>
  <thead>
    <tr>
      <th>Pregunta</th>
      <th>Dificultad</th>
      <th>Subject</th>
    </tr>
  </thead>
  <tbody>

<?php foreach ($xml->assessmentItem as $assessmentItem) :?>
    <tr>
		<td><?php echo $assessmentItem->itemBody->p; ?></td>
		<td><?php echo $assessmentItem['complexity']; ?></td>
		<td><?php echo $assessmentItem['subject']; ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br>
<a href='layout.html'>Volver a Pagina Principal</a>