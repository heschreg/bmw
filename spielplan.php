<html>
<title>TSV Wolfstein - Badminton</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<head>
        <link rel="stylesheet" type="text/css" href="css/badminton.css"></link>
        <script language="JavaScript" type="text/JavaScript" src="js/badminton.js"> </script>
</head>

<body onLoad="Init_SP()">


        <?php include 'db_interface.php'; ?>

        <?php
                $get_mode = 0;
                  if (isset($_GET['mode'])) $get_mode = $_GET['mode'];

                   $post_mode = 0;
                   if (isset($_POST['mode'])) $post_mode = $_POST['mode'];

                   $mode = 0;
                   if ($get_mode  > 0) $mode = $get_mode;
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
                           // Ergebnisse in der Tabelle <spielplan> ablegen
                           db_update_spielplan ($post_variante, $post_lk, $post_kk, $post_gruppe, $post_nr_in_gruppeH, $post_nr_in_gruppeA,
                                                                    $post_satz1H, $post_satz1A,
                                                                    $post_satz2H, $post_satz2A,
                                                                    $post_satz3H, $post_satz3A);
            }
        ?>

    <?php
            // Man mu� wegen dem Druckbutton an dieser Stelle bereits wissen, wieviele Gruppen aktuell vorliegen
                $anz_gr = get_anz_gruppen($post_lk, $post_kk);
        ?>

        <?php
                if ($get_mode == 0 AND $post_mode == 0) {
                        include 'navigation.php';
                        echo "<div id=\"navpos\">Aktuelle Position: Im Turnierverlauf -> Spielplan/Tabelle</div>";
                }
        ?>


        <div>

        <form name   = "do_spielplan"
              action = "<?php echo $_SERVER['PHP_SELF'] ?>?klasse=<?php echo $_GET['klasse']?>"
                  method = "post">

                <div id = "mitte">

                        <div id = "oben">

                                <?php /* echo $_SERVER['PHP_SELF']  */ ?>
                                <?php /* echo $post_kk;  */ ?>

                                <div class = "formular">

                                        <input id = "variante" name = "variante" type = "hidden" value = "1">
                                        <input id = "mode" name = "mode"     type = "hidden" value = "0">

                                        <p><p>
                                        <table><tr>
                                        <td>
                                        Leistungsklasse:
                                         <select id="lb_lk" onclick="submitForm_SP(1,<?php echo $mode ?>);return false;" name="lk" size="6" tabindex="7" >

                                      <?php
                                              $post_lk == 'LK1' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>LK1</option>';

                                              $post_lk == 'LK2' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>LK2</option>';

                                              $post_lk == 'U17' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>U17</option>';

                                             $post_lk == 'U11' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>U11</option>';

                                             $post_lk == 'U13' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>U13</option>';

                                              $post_lk == 'U15' ? $selected = 'selected' : $selected = "";
                                             echo '<option ' . $selected . '>U15</option>';


                                      ?>
                                    </select>
                                        </td>

                                        <td>
                            Konkurrenz:
                                         <select id="lb_kk" onclick="submitForm_SP(1, <?php echo $mode ?>);return false;" name="kk" size="5" tabindex="8">

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

                                <?php if ($get_mode == 0 AND $post_mode == 0) { ?>

                                <!-- Keine Formularanzeige im readonly-Modus -->

                      <hr/>

                            <table class = "formular">
                                <tr>
                                        <td>Gruppe </td>
                                        <td><input type="text" readonly tabindex="10" name="gruppe"        id="gruppe"        value="<?php echo $post_gruppe; ?>"        size="1"></td>
                                        <td></td><td></td><td></td>
                                        <td>Satz 1</td><td>Satz 2</td><td>Satz 3</td>
                                </tr>

                                <tr>
                                        <td></td>
                                        <td><input type="text" tabindex="11" readonly name="nr_in_gruppeH" id="nr_in_gruppeH" value="<?php echo $post_nr_in_gruppeH; ?>" size="1"></td>
                                        <td><input type="text" tabindex="12" readonly name="vereinH"       id="vereinH"       value="<?php echo $post_vereinH; ?>"       size="45"></td>
                                        <td><input type="text" tabindex="13" readonly name="nameH"         id="nameH"         value="<?php echo $post_nameH; ?>"         size="45"></td>
                                        <td>/</td>
                                        <td><input type="text"  tabindex="1"  name="satz1H"      id="satz1H"     value="<?php echo $post_satz1H; ?>"     size="2"></td>
                                        <td><input type="text"  tabindex="3"  name="satz2H"      id="satz2H"     value="<?php echo $post_satz2H; ?>"     size="2"></td>
                                        <td><input type="text"  tabindex="5"  name="satz3H"      id="satz3H"     value="<?php echo $post_satz3H; ?>"     size="2"></td>

                                        <td>/</td>
                                        <td><input type="button" tabindex="14" name="drucken" value="Spielplan drucken"   onclick="call_druck_spielplan(' <?php echo $post_lk?>', '<?php echo $post_kk?>',  '<?php echo $anz_gr?>');return false;"></td>
                                </tr>

                                <tr>
                                        <td></td>
                                        <td><input type="text" tabindex="16" readonly name="nr_in_gruppeA"  id="nr_in_gruppeA" value="<?php echo $post_nr_in_gruppeA; ?>" size="1"></td>
                                        <td><input type="text" tabindex="17" readonly name="vereinA"        id="vereinA"       value="<?php echo $post_vereinA; ?>"       size="45"></td>
                                        <td><input type="text" tabindex="18" readonly name="name1A"         id="nameA"         value="<?php echo $post_nameA; ?>"         size="45"></td>
                                        <td>/</td>
                                         <td><input type="text"    tabindex="2" name="satz1A"      id="satz1A"     value="<?php echo $post_satz1A; ?>"     size="2"></td>
                                         <td><input type="text"    tabindex="4" name="satz2A"      id="satz2A"     value="<?php echo $post_satz2A; ?>"     size="2"></td>
                                         <td><input type="text"    tabindex="6" name="satz3A"      id="satz3A"     value="<?php echo $post_satz3A; ?>"     size="2"></td>

                                        <td><input type="button" tabindex="19" name="change"  value="Speichern"       onclick="submitForm_SP(3, <?php echo $mode ?>);return false;"></td>
                                        <td><input type="button" tabindex="15" name="druckz"  value="Zettel drucken"      onclick="call_druck_spielzettel(' <?php echo $post_lk?>', '<?php echo $post_kk?>',  '<?php echo $anz_gr?>');return false;"></td>

                                </tr>

                                 </table>

                                <?php } ?>

                        </div>

                </div>

           <?php
                           // Anzeige aller Gruppen mit den dazugeh�rigen Spielpl�nen
                           show_spielplan_und_tabelle($post_lk, $post_kk, $anz_gr, 1);
           ?>

        </form>

</div>

</body>
</html>