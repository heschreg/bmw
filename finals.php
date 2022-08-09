<html>
<title>TSV Wolfstein - Badminton</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<head>
        <link rel="stylesheet" type="text/css" href="css/badminton.css"></link>
        <script language="JavaScript" type="text/JavaScript" src="js/badminton.js"> </script>
</head>

<body onLoad="Init_FR()">

        <?php include 'db_interface.php'; ?>

        <?php
                $get_mode = 0;
                  if (isset($_GET['mode'])) $get_mode = $_GET['mode'];

                   $post_mode = 0;
                   if (isset($_POST['mode'])) $post_mode = $_POST['mode'];

                   $mode = 0;
                   if ($get_mode > 0)  $mode = $get_mode;
                   if ($post_mode > 0) $mode = $post_mode;

                   // echo $mode . ',' . $get_mode . ',' . $post_mode;

        ?>

        <?php
                // Normaler Einfügemodeus; wird 1 sobald man einen Datensatz über Radiobutton anwählt
                // wird wieder 0 nach "Felder leeren"
                   $post_variante = '0';
                   if (isset($_POST['variante'])) $post_variante = $_POST['variante'];

                   //echo 'Variante = ' . $post_variante;

                   if (isset($_POST['lk'])) {
                           $post_lk = $_POST['lk'];
                   } else {
                           // also die Vorbelegung
                           $post_lk = 'LK1';
                   }

                   if (isset($_POST['kk'])) {
                           $post_kk = $_POST['kk'];
                   } else {
                           // also die Vorbelegung
                           $post_kk = 'HE';
                   }

                // Gruppennr. gilt für H- und A-Mannschaft
                   $post_gruppe = '';
                   if (isset($_POST['gruppe'])) $post_gruppe = $_POST['gruppe'];

                // Daten der Heimmannschaft
                   $post_nr_in_gruppeH = '';
                   if (isset($_POST['nr_in_gruppeH'])) $post_nr_in_gruppeH = $_POST['nr_in_gruppeH'];

            $post_vereinH = '';
                   if (isset($_POST['vereinH'])) $post_vereinH = $_POST['vereinH'];

                   $post_nameH = '';
                   if (isset($_POST['nameH'])) $post_nameH = $_POST['nameH'];

                   $post_satz1H = '';
                   if (isset($_POST['satz1H'])) $post_satz1H = $_POST['satz1H'];

                   $post_satz2H = '';
                   if (isset($_POST['satz2H'])) $post_satz2H = $_POST['satz2H'];

                   $post_satz3H = '';
                   if (isset($_POST['satz3H'])) $post_satz3H = $_POST['satz3H'];


                // Daten der Auswärtsmannschaft

                   $post_nr_in_gruppeA = '';
                   if (isset($_POST['nr_in_gruppeA'])) $post_nr_in_gruppeA = $_POST['nr_in_gruppeA'];

            $post_vereinA = '';
                   if (isset($_POST['vereinA'])) $post_vereinA = $_POST['vereinA'];

                   $post_nameA = '';
                   if (isset($_POST['nameA'])) $post_nameA = $_POST['nameA'];


                   $post_satz1A = '';
                   if (isset($_POST['satz1A'])) $post_satz1A = $_POST['satz1A'];

                   $post_satz2A = '';
                   if (isset($_POST['satz2A'])) $post_satz2A = $_POST['satz2A'];

                   $post_satz3A = '';
                   if (isset($_POST['satz3A'])) $post_satz3A = $_POST['satz3A'];


                   if ($post_variante == '3') {

                        // print_r($_POST);

                           // Spielplan und Ergebnisse der Finalrunde in Tabelle <finalspiele> ablegen
                           db_update_finalspiele ($_POST);
                 }
        ?>

        <?php
                if ($get_mode == 0 AND $post_mode == 0) {
                        include 'navigation.php';
                        echo "<div id=\"navpos\">Aktuelle Position: Aktuelle Position: Im Turnierverlauf -> Finalrunde</div>";
                }
        ?>

        <div>

        <form name   = "do_finals"
              action = "<?php echo $_SERVER['PHP_SELF'] ?>?klasse=<?php echo $_GET['klasse']?>"
                  method = "post">

                <div id = "mitte">
                        <div id = "oben">
                                <div class = "formular">

                                        <input name = "variante"  type = "hidden" value = "1">
                                        <input id = "mode" name = "mode"     type = "hidden" value = "0">

                                        <p><p>
                                        <table><tr>
                                        <td>
                                        Leistungsklasse:
                                         <select id="lb_lk" onclick="submitForm_FR(1, <?php echo $mode ?>);return false;" name="lk" size="6">

                                      <?php
                                              $post_lk == 'LK1' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>LK1</option>';

                                              $post_lk == 'LK2' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>LK2</option>';

                                              $post_lk == 'U17' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>U17</option>';

                                              $post_lk == 'U15' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>U15</option>';

                                             $post_lk == 'U13' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>U13</option>';

                                             $post_lk == 'U11' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>U11</option>';


                                      ?>
                                    </select>
                                        </td>

                                        <td>
                            Konkurrenz:
                                         <select id="lb_kk" onclick="submitForm_FR(1,<?php echo $mode ?>);return false;" name="kk" size="5">

                                      <?php
                                              $post_kk == 'HE' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>HE</option>';

                                              $post_kk == 'HD' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>HD</option>';

                                             $post_kk == 'DE' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>DE</option>';

                                              $post_kk == 'DD' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>DD</option>';

                                              $post_kk == 'MX' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>MX</option>';
                                      ?>

                            </select>
                                </td>

                    </tr></table>

                    <hr/>

                        </div>

                </div>

           <?php
                           // echo $post_lk;
                        $anz_gr = get_anz_gruppen($post_lk, $post_kk);
                           show_tabelle($post_lk, $post_kk, $anz_gr);
           ?>

           <?php
                           if ($get_mode == 0 AND $post_mode == 0) {
                                   echo "<table><tr>
                                  <td><input type=\"button\" name=\"change\" value=\"Speichern\"   onclick=\"submitForm_FR(3);return false;\"></td>
                                    </tr></table>";
                           }

                           $final_mode = get_finalmodus($post_lk, $post_kk);
                           show_finals($post_lk, $post_kk, $final_mode);
           ?>

              <?php
                            // Aufruf der Java-Script-Funktionen zum Eintrag aller Namen
                      if ($final_mode == "VF") {
              ?>
                <script>
                           fillNameVerein('H_VF1');
                           fillNameVerein('A_VF1');
                           fillNameVerein('H_VF2');
                           fillNameVerein('A_VF2');
                           fillNameVerein('H_VF3');
                           fillNameVerein('A_VF3');
                           fillNameVerein('H_VF4');
                           fillNameVerein('A_VF4');
                           fillNameVerein('H_HF1');
                           fillNameVerein('A_HF1');
                           fillNameVerein('H_HF2');
                           fillNameVerein('A_HF2');
                           fillNameVerein('H_F1');
                           fillNameVerein('A_F1');
                           fillNameVerein('H_F2');
                           fillNameVerein('A_F2');
                      </script>
      <?php  } ?>

      <?php  if ($final_mode == "HF" ) { ?>
                <script>
                           fillNameVerein('H_HF1');
                           fillNameVerein('A_HF1');
                           fillNameVerein('H_HF2');
                           fillNameVerein('A_HF2');
                           fillNameVerein('H_F1');
                           fillNameVerein('A_F1');
                           fillNameVerein('H_F2');
                           fillNameVerein('A_F2');
                   </script>
      <?php  } ?>

      <?php  if ($final_mode == "F" ) { ?>
                <script>
                           fillNameVerein('H_F1');
                           fillNameVerein('A_F1');
                           fillNameVerein('H_F2');
                           fillNameVerein('A_F2');
                   </script>
      <?php  } ?>

        </form>

</body>
</html>