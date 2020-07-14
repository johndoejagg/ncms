<?php
function defineLang(){
  $lang=array();
  $lang["logout"]="ausloggen";
  $lang["save"]="speichern";
  $lang["publish"]="veröffentlichen";
  $lang["delete"]="löschen";
  $lang["cancel"]="abbrechen";
  $lang["confirm"]="bestätigen";
  $lang["description"]="Beschreibung";
  $lang["saveDraft"]="Entwurf speichern";
  $lang["categorys"]="Kategorien";
  $lang["errorNotAllowed"]="Aktion abgerbrochen, Ihnen fehlen die Rechte";


  $lang["menu"]=array(
    array("Blog", "blog",0,4),
    array("Seiten", "pages",0,4),
    array("Medien", "media",0,3),
    array("Einstellungen", "settings",0,1, array(
                                        array("Themes","settings/themes",0,1),
                                        array("User","settings/user",0,1),
                                        array("Bildformat","settings/imageformat",0,1),
                                        array("E-mail","settings/mail",0,1)
                                      )
        ),
    array("User","settings/user",1,5)
  );

  //blog
  $lang["blogEntryHeadline"]="Blog Beiträge";
  $lang["newBlogEntry"]="neuer Beitrag";
  $lang["enterTitle"]="Titel hier eintragen";

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

  //Settings ImageFormat
  $lang["width"]="Breite";
  $lang["height"]="Höhe";
  $lang["cropMode"]="Bildausschnitt";
  $lang["cropModes"]=array(array("einpassen",0),array("ausschneiden",1));


  define("LANG",$lang);
}

defineLang();

?>
