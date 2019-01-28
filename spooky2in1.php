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

a:link, a:visited {
  color: white;
  text-decoration: none;
}

</style>

<body>

  <?php

  $freqs = $_POST['freqs'];
  $freqs = str_replace(array("\r\n", "\r", "\n"), " ", $freqs);
  $freqs = str_replace(',', ' ', $freqs);
  $freqs = str_replace(', ', ' ', $freqs);
  $freqs = str_replace(' ,', ' ', $freqs);
  $freqs = str_replace('  ', ' ', $freqs);
  $freqs = str_replace('  ', ' ', $freqs);


  $freqs2 = $_POST['freqs2'];
  $freqs2 = str_replace(array("\r\n", "\r", "\n"), " ", $freqs2);
  $freqs2 = str_replace(',', ' ', $freqs2);
  $freqs2 = str_replace(', ', ' ', $freqs2);
  $freqs2 = str_replace(' ,', ' ', $freqs2);
  $freqs2 = str_replace('  ', ' ', $freqs2);
  $freqs2 = str_replace('  ', ' ', $freqs2);



  $freq_complete = $_POST['freq_complete'];
  $space_number = $_POST['space_number'];
  $space_time = $_POST['space_time'];
  $freqs_time = $_POST['freqs_time'];
  $repeat = $_POST['repeat'];
  $space_type = $_POST['space_type'];
  $double = yes;
  $second_space_number = $_POST['second_space_number'];

  if(!isset($_POST['space_type']) && empty($_POST['space_type']))
  {
    $space_type_number_checked = "checked";
  }

  if ($space_type == number) {
    $space_type_number_checked = "checked";
  }

  if ($space_type == sort) {
    $space_type_sort_checked = "checked";
  }

  if ($space_type == sort_rev) {
    $space_type_sort_rev_checked = "checked";
  }

  if ($double == yes) {
    $double_checked = "checked";
  }


if(!isset($_POST['freq_complete']) && empty($_POST['freq_complete']))
{
  $freq_complete = "7.83";
}


  if(!isset($_POST['space_number']) && empty($_POST['space_number']))
  {
    $space_number = "528";
  }

  if(!isset($_POST['second_space_number']) && empty($_POST['second_space_number']))
  {
    $second_space_number = "432";
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
  $number_freqs = count($freqs_exploded);


  $freqs_exploded2 = explode(" ", $freqs2);
  $number_freqs2 = count($freqs_exploded2);


  if ($number_freqs > $number_freqs2) {
    $number_freqs_major = $number_freqs;
  } else {
    $number_freqs_major = $number_freqs2;
  }



  $number_total_freqs = $number_freqs + $number_freqs2;

  if ($number_freqs > $number_freqs2) {
    $number_freqs_exceded = $number_freqs - $number_freqs2;

    for ($i=0; $i < $number_freqs_exceded; $i++) {
      array_push($freqs_exploded2, "$freq_complete");
    }

  }

  if ($number_freqs2 > $number_freqs) {
    $number_freqs_exceded = $number_freqs2 - $number_freqs;

    for ($i=0; $i < $number_freqs_exceded; $i++) {
      array_push($freqs_exploded, "$freq_complete");
    }

  }

  ?>

  <form class="dh" action="spooky2in1.php" method="post">
    This page is just to use freqs separated in out1 and out2 on Spooky2.<br><br>
    To see more info <a href="https://www.spooky2.com/forums/viewtopic.php?f=12&t=8357">see this link to DH Experimental Frequencies</a> and this link to <a href="https://www.spooky2.com/forums/viewtopic.php?f=6&t=4470">Turn your XM generator into 2 generators</a> <br><br><br><br>

    <?php
    echo 'Enter the values in hz separated by space or comma, to OUT1<br>Number of freqs added:'.$number_freqs.'<br><textarea name="freqs" rows="8" cols="80">'.$freqs.'</textarea> <br><br>';
    echo 'Enter the values in hz separated by space or comma, to OUT2<br>Number of freqs added:'.$number_freqs2.'<br><textarea name="freqs2" rows="8" cols="80">'.$freqs2.'</textarea> <br><br>';
    echo 'If one OUT have more freqs, complete another OUT with this freq<br><input type="text" name="freq_complete" value="'.$freq_complete.'"> <br><br>';
    echo 'Freq Seconds<br><input type="text" name="freqs_time" value="'.$freqs_time.'"> <br><br>';
    echo 'Space<br><input type="text" name="space_number" value="'.$space_number.'"> <br><br>';
    echo '<input type="radio" name="space_type" id="number" value="number" '.$space_type_number_checked.'><label for="number">Use space number especified</label><br><br>';
    echo '<input type="radio" name="space_type" id="sort" value="sort" '.$space_type_sort_checked.'><label for="sort">Replace space by original frequencies ordered</label><br><br>';
    echo '<input type="radio" name="space_type" id="sort_rev" value="sort_rev" '.$space_type_sort_rev_checked.'><label for="sort_rev">Replace space by original frequencies reverse order</label><br><br>';
    echo 'Space Seconds<br><input type="text" name="space_time" value="'.$space_time.'"> <br><br>';
    echo 'Repeat<br><input type="text" name="repeat" value="'.$repeat.'"> <br><br>';
    echo 'Second space<br><input type="text" name="second_space_number" value="'.$second_space_number.'"><br><br>';
    ?>

    <input type="submit" value="Send">
  </form>


  <?php

  if (!empty($freqs)) {

    echo 'Result for '.$number_total_freqs.' frequencies:<br><textarea name="freqs" rows="8" cols="80">';


    if ($space_type == number) {
      for ($i = 0; $i < $number_freqs_major; $i++) {
        for ($x=0; $x < $repeat; $x++) {

          if ($double == yes) {
            echo $freqs_exploded[$i].'='.$freqs_time.' C'.$freqs_exploded2[$i].','.$space_number.'='.$space_time.' C'.$second_space_number.',';
          } else {
            echo $freqs_exploded[$i].'='.$freqs_time.','.$space_number.'='.$space_time.',';
          }
        }

      }
    }
    //30=9 C240,  8=3 C123,

    if ($space_type == sort) {
      $freqs_exploded_order = $freqs_exploded;
      sort($freqs_exploded_order);

      $freqs_exploded_order2 = $freqs_exploded2;
      sort($freqs_exploded_order2);


      for ($i = 0; $i < $number_freqs_major; $i++) {
        for ($x=0; $x < $repeat; $x++) {

          if ($double == yes) {
            echo $freqs_exploded[$i].'='.$freqs_time.' C'.$freqs_exploded2[$i].','.$freqs_exploded_order[$i].'='.$space_time.' C'.$freqs_exploded_order2[$i].',';
          } else {
            echo $freqs_exploded[$i].'='.$freqs_time.','.$freqs_exploded_order[$i].'='.$space_time.',';
          }
        }

      }
    }


    if ($space_type == sort_rev) {
      $freqs_exploded_order = $freqs_exploded;
      rsort($freqs_exploded_order);

      $freqs_exploded_order2 = $freqs_exploded2;
      rsort($freqs_exploded_order2);

      for ($i = 0; $i < $number_freqs_major; $i++) {
        for ($x=0; $x < $repeat; $x++) {

          if ($double == yes) {
            echo $freqs_exploded[$i].'='.$freqs_time.' C'.$freqs_exploded[$i + 1].','.$freqs_exploded_order[$i].'='.$space_time.' C'.$freqs_exploded_order2[$i].',';
          } else {
            echo $freqs_exploded[$i].'='.$freqs_time.','.$freqs_exploded_order[$i].'='.$space_time.',';
          }
        }

      }
    }

  }

  echo '</textarea> <br><br>'

  ?>

</body>
