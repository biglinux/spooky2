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


  $freqs_exploded = explode(",", $freqs);



  ?>

  <form class="dh" action="dh_clean.php" method="post">

    <?php
    echo 'Enter original DH to clean, but i dont really like this modification<br><textarea name="freqs" rows="8" cols="80">'.$freqs.'</textarea> <br><br>';
    ?>

    <input type="submit" value="Send">
  </form>


  <?php

  if (!empty($freqs)) {

    echo 'Result<br><textarea name="freqs" rows="8" cols="80">';

    foreach ($freqs_exploded as $key => $value){
        if ($value == '7.83=60') {
            unset($freqs_exploded[$key]);
        }
    }

    foreach ($freqs_exploded as $key => $value){
        if ($value == '0=60') {
            unset($freqs_exploded[$key]);
        }
    }

    foreach ($freqs_exploded as $key => $value){
        if ($value == '528=60') {
            unset($freqs_exploded[$key]);
        }
    }

    foreach ($freqs_exploded as $key => $value){
        if ($value == '7.83=3') {
            unset($freqs_exploded[$key]);
        }
    }

    foreach ($freqs_exploded as $key => $value){
        if ($value == '0=3') {
            unset($freqs_exploded[$key]);
        }
    }

    foreach ($freqs_exploded as $key => $value){
        if ($value == '528=3') {
            unset($freqs_exploded[$key]);
        }
    }


    foreach (array_unique($freqs_exploded) as $freq) {

        echo $freq.',';

    }
  }

  echo '</textarea> <br><br>'

  ?>

</body>
