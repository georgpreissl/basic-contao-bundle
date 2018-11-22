# Lokales Contao Basis-Bundle



Dieses Bundle ist eine Erweiterung, die nicht auf Github veröffentlicht wird, sondern nur im eigenen Projekt verwendet wird.

Anleitung zur Installation:


1) Du legst (falls er noch nicht existiert) einen Ordner namens "src" im Contao-Root-Verzeichnis an. 
Die Struktur sieht dann so aus: mein-contao/src/


2) Du kopierst den Ordner "DeinName" in den src-Ordner.
Die Struktur sieht dann so aus: mein-contao/src/DeinName


3) Du kopierst den Ordner "ContaoManager" in den src-Ordner.
Die Struktur sieht dann so aus: mein-contao/src/ContaoManager


4) Du erweiterst die "composer.json" im Contao-Root-Verzeichnis mit folgendem Code:

```json
"autoload": {
	"classmap": [
		"src/ContaoManager/ContaoManagerPlugin.php",
		"src/DeinName/Test/Resources/contao"
	],
	"psr-4" : { 
		"": "src/"
	},
	"exclude-from-classmap": [
		"src/DeinName/Test/Resources/contao/config/",
		"src/DeinName/Test/Resources/contao/dca/",
		"src/DeinName/Test/Resources/contao/languages/",
		"src/DeinName/Test/Resources/contao/templates/"
	]
 },
```

5) Du führst im Contao-Root-Verzeichnis mit dem Terminal folgenden Befehl aus:
composer dump-autoload

Was passiert hier: Dieser Befehl durchsucht Deine Ordner, registriert Deine Klassen und speichert sie in ein paar Dateien, damit nicht bei jedem Aufruf alle Verzeichnisse durchsucht werden müssen.



6) Du führst im Contao-Root-Verzeichnis mit dem Terminal folgenden Befehl aus:
composer install

Was passiert hier: Contao klinkt sich in diesen Composer Befehl rein und führt ein paar Scripte aus, z.B. werden ein paar Symlinks generiert. Alle deine öffentlichen Dateien zum Modul landen ja in /web. In Deinem Fall in
/web/bundles/test



Wenn alles geklappt hat müsste dich nun im Backend ein (funktionsloses) Modul namens "mybundle" begrüßen :)



Um bei Änderungen am Bundle nicht jedes mal den Cache löschen zu müssen, kannst du folgendes machen:
Verwende den Zusatz "app_dev.php" in deiner URL beim Aufruf des Backends.
Diesen Zusatz musst du händisch in die URL eintippen.
Platziert wird er sofort nach der Domain.
Die URL im Backend sieht dann beispielsweise so aus:
https://www.mycontaodemo/app_dev.php/contao/


