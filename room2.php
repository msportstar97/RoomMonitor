<html>
  <head>
    <title> Room 2 Temperature and Humidity Log </title>
    <style>
      table, th, td {
        border: 1px solid black;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <th> Temperature </th>
        <th> Humidity </th>
      </tr>
      <?php
        $str = fopen("Arduinodata2.txt", 'r');

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
