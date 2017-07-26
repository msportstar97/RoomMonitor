<html>
  <head>
    <title> Room 1 Temperature and Humidity Log </title>
    <style>
      table, th, td {
        border: 1px solid black;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <table>
      <caption> Room 1 Temperature and Humidity Log </caption>
      <tr>
        <th> Temperature </th>
        <th> Humidity </th>
      </tr>
      <?php
        $str = fopen("Arduinodata.txt", 'r');

        while(($line = fgetcsv($str, 1000, ",")) !== false) {
          echo "<tr>";
          foreach($line as $cell) {
            echo "<td>" .htmlspecialchars($cell). "</td>";
          }
          echo "</tr>";
        }
        fclose($str);
      ?>
    </table>
  </body>
</html>
