<?php
// Establecer la conexión con la base de datos
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
// Seleccionar la base de datos
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Movie database</title>
  <!-- Estilo CSS para la tabla -->
  <style type="text/css">
   th { background-color: #999; }
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 <table style="width:100%;">
  <!-- Encabezado de la tabla de películas -->
  <tr>
   <th colspan="2">Movies <a href="N6P104movie.php?action=add">[ADD]</a></th>
  </tr>
<?php
// Consultar todas las películas
$query = 'SELECT * FROM movie';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

$odd = true; // Variable para alternar entre filas impares y pares
while ($row = mysqli_fetch_assoc($result)) {
    // Alternar entre filas impares y pares
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    // Mostrar el nombre de la película
    echo '<td style="width:75%;">'; 
    echo $row['movie_name'];
    echo '</td><td>';
    // Enlaces para editar y eliminar la película
    echo ' <a href="N6P104movie.php?action=edit&id=' . $row['movie_id'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=movie&id=' . $row['movie_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  <!-- Encabezado de la tabla de personas -->
  <tr>
    <th colspan="2">People <a href="people.php?action=add"> [ADD]</a></th>
  </tr>
<?php
// Consultar todas las personas
$query = 'SELECT * FROM people';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

$odd = true; // Variable para alternar entre filas impares y pares
while ($row = mysqli_fetch_assoc($result)) {
    // Alternar entre filas impares y pares
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    // Mostrar el nombre de la persona
    echo '<td style="width: 25%;">'; 
    echo $row['people_fullname'];
    echo '</td><td>';
    // Enlaces para editar y eliminar la persona
    echo ' <a href="people.php?action=edit&id=' . $row['people_id'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=people&id=' . $row['people_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
 </body>
</html>
