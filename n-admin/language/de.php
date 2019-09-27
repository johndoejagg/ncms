<?php
function defineLang(){
  $lang=array();
  $lang["logout"]="ausloggen";
  $lang["save"]="speichern";
  $lang["delete"]="löschen";
  $lang["cancel"]="abbrechen";
  $lang["confirm"]="bestätigen";
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

  $lang["errorNotAllowed"]="Aktion abgerbrochen, Ihnen fehlen die Rechte";

  //Settings User
  $lang["newUser"]="neuer Benutzer";
  $lang["userName"]="Benutzername";
  $lang["eMail"]="E-Mail";
  $lang["newPassword"]="neues Passwort";
  $lang["repeatPassword"]="Passwort wiederholen";
  $lang["userRole"]="Benutzerrolle";
  $lang["headline_deleteUser"]="Lösche Benutzer:";
  $lang["userRoles"]=array(array("Admin",0),array("Redakteur",1),array("Autor",2),array("Mitarbeiter",3),array("Follower",4));
  $lang["errorPasswordsNotMatching"]="Passwörter stimmen nicht überein.";
  $lang["errorUserNameAlreadyInUse"]="Benutzername existiert bereits, Benutzernamen müssen eindeutig sein";
  $lang["errorUserNameCantBeEmpty"]="Benutzername darf nicht leer sein";
  $lang["errorPasswordMissing"]="Bitte Passwort wählen";
  $lang["errorNotAllowedToCreateUser"]="Sie dürfen keinen Benutzer erstellen.";
  $lang["errorCantDeleteLastAdmin"]="Sie können nicht den letzten Admin löschen.";
  define("LANG",$lang);
}

defineLang();

?>
