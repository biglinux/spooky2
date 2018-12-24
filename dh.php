<title>Spooky2 frequencies</title>

<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

<style>
body {
  background: #00B4DB;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to bottom, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to bottom, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  font-style: sans,arial;
  margin-left: 20%;
  color: #ffffff;
  font-family: 'Inconsolata', monospace;
  font-size: 19px;
  margin-top: 50px;
}
</style>

<body>

  <?php

  $freqs = $_POST['freqs'];
  $space_number = $_POST['space_number'];
  $space_time = $_POST['space_time'];
  $freqs_time = $_POST['freqs_time'];
  $repeat = $_POST['repeat'];

  if(!isset($_POST['space_number']) && empty($_POST['space_number']))
  {
    $space_number = "528";
  }

  if(!isset($_POST['space_time']) && empty($_POST['space_time']))
  {
    $space_time = "3";
  }

  if(!isset($_POST['freqs_time']) && empty($_POST['freqs_time']))
  {
    $freqs_time = "9";
  }

  if(!isset($_POST['repeat']) && empty($_POST['repeat']))
  {
    $repeat = "23";
  }

  $freqs_exploded = explode(" ", $freqs);


  ?>

  <form class="dh" action="dh.php" method="post">

    <?php
    echo 'Enter the values in hz separated by space<br><textarea name="freqs" rows="8" cols="80">'.$freqs.'</textarea> <br><br>';
    echo 'Freq Seconds<br><input type="text" name="freqs_time" value="'.$freqs_time.'"> <br><br>';
    echo 'Space<br><input type="text" name="space_number" value="'.$space_number.'"> <br><br>';
    echo 'Space Seconds<br><input type="text" name="space_time" value="'.$space_time.'"> <br><br>';
    echo 'Repeat<br><input type="text" name="repeat" value="'.$repeat.'"> <br><br>';
    ?>

    <input type="submit" value="Send">
  </form>


  <?php

  if (!empty($freqs)) {

    echo 'Result<br><textarea name="freqs" rows="8" cols="80">';

    foreach ($freqs_exploded as $freq) {
      for ($i=0; $i < $repeat; $i++) {
        echo $freq.'='.$freqs_time.','.$space_number.'='.$space_time.',';
      }
    }
  }

  echo '</textarea> <br><br>'

  ?>

</body>
