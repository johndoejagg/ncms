<?php
function defineLang(){
  $lang=array();
  $lang["logout"]="ausloggen";
  $lang["save"]="speichern";
  $lang["cancel"]="abbrechen";
  $lang["description"]="Beschreibung";
  $lang["saveDraft"]="Entwurf speichern";
  $lang["categorys"]="Kategorien";

  $lang["menu"]=array(
    array("Blog", "blog"),
    array("Seiten", "pages"),
    array("Medien", "media"),
    array("Einstellungen", "settings", array(
                                        array("Themes","themes"),
                                        array("User","user"),
                                        array("Bildformat","imageformat"),
                                        array("E-mail","mail")
                                      )
        )
  );

  //Settings User
  $lang["newUser"]="neuer Benutzer";
  define("LANG",$lang);
}

defineLang();

?>
