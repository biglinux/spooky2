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
  $space_number = $_POST['space_number'];
  $space_time = $_POST['space_time'];
  $freqs_time = $_POST['freqs_time'];
  $repeat = $_POST['repeat'];
  $space_type = $_POST['space_type'];
  $double = $_POST['double'];
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


  ?>

  <form class="dh" action="dh.php" method="post">

    To see more info <a href="https://www.spooky2.com/forums/viewtopic.php?f=12&t=8357">see this link to DH Experimental Frequencies</a> and this link to <a href="https://www.spooky2.com/forums/viewtopic.php?f=6&t=4470">Turn your XM generator into 2 generators</a> <br><br><br><br>

    <?php
    echo 'Enter the values in hz separated by space<br><textarea name="freqs" rows="8" cols="80">'.$freqs.'</textarea> <br><br>';
    echo 'Freq Seconds<br><input type="text" name="freqs_time" value="'.$freqs_time.'"> <br><br>';
    echo 'Space<br><input type="text" name="space_number" value="'.$space_number.'"> <br><br>';
    echo '<input type="radio" name="space_type" id="number" value="number" '.$space_type_number_checked.'><label for="number">Use space number especified</label><br><br>';
    echo '<input type="radio" name="space_type" id="sort" value="sort" '.$space_type_sort_checked.'><label for="sort">Replace space by original frequencies ordered</label><br><br>';
    echo '<input type="radio" name="space_type" id="sort_rev" value="sort_rev" '.$space_type_sort_rev_checked.'><label for="sort_rev">Replace space by original frequencies reverse order</label><br><br>';
    echo 'Space Seconds<br><input type="text" name="space_time" value="'.$space_time.'"> <br><br>';
    echo 'Repeat<br><input type="text" name="repeat" value="'.$repeat.'"> <br><br>';
    echo '<input type="checkbox" name="double" id="double" value="yes" '.$double_checked.'><label for="double">Check this to simulate two spookies in one, need remote using spooky boost</label><br><br>';
    echo 'Second space<br><input type="text" name="second_space_number" value="'.$second_space_number.'"> (Only work to simulate two spookies in one)<br><br>';
    ?>

    <input type="submit" value="Send">
  </form>


  <?php

  if (!empty($freqs)) {

    echo 'Result for '.$number_freqs.' frequencies:<br><textarea name="freqs" rows="8" cols="80">';


    if ($space_type == number) {
      for ($i = 0; $i < $number_freqs; $i++) {
        for ($x=0; $x < $repeat; $x++) {

          if ($double == yes) {
            echo $freqs_exploded[$i].'='.$freqs_time.' C'.$freqs_exploded[$i + 1].','.$space_number.'='.$space_time.' C'.$second_space_number.',';
          } else {
            echo $freqs_exploded[$i].'='.$freqs_time.','.$space_number.'='.$space_time.',';
          }
        }
        // To work with double
        if ($double == yes) { $i++;}
      }
    }
    //30=9 C240,  8=3 C123,

    if ($space_type == sort) {
      $freqs_exploded_order = explode(" ", $freqs);
      sort($freqs_exploded_order);

      for ($i = 0; $i < $number_freqs; $i++) {
        for ($x=0; $x < $repeat; $x++) {

          if ($double == yes) {
            echo $freqs_exploded[$i].'='.$freqs_time.' C'.$freqs_exploded[$i + 1].','.$freqs_exploded_order[$i].'='.$space_time.' C'.$freqs_exploded_order[$i + 1].',';
          } else {
            echo $freqs_exploded[$i].'='.$freqs_time.','.$freqs_exploded_order[$i].'='.$space_time.',';
          }
        }
        // To work with double
        if ($double == yes) { $i++;}
      }
    }


    if ($space_type == sort_rev) {
      $freqs_exploded_order = explode(" ", $freqs);
      rsort($freqs_exploded_order);

      for ($i = 0; $i < $number_freqs; $i++) {
        for ($x=0; $x < $repeat; $x++) {

          if ($double == yes) {
            echo $freqs_exploded[$i].'='.$freqs_time.' C'.$freqs_exploded[$i + 1].','.$freqs_exploded_order[$i].'='.$space_time.' C'.$freqs_exploded_order[$i + 1].',';
          } else {
            echo $freqs_exploded[$i].'='.$freqs_time.','.$freqs_exploded_order[$i].'='.$space_time.',';
          }
        }
        // To work with double
        if ($double == yes) { $i++;}
      }
    }

  }

  echo '</textarea> <br><br>'

  ?>

</body>
