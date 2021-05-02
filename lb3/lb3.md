> *M300 / Albin Vejseli*

# **LB3- Docker-Umbegung mit PHP, Apache & MySQL**

## Inhaltsverzeichnis



- *Service Beschreibung*
- *Service Anwendung*
- *Grafische Übersicht*
- *Code Beschreibung*
    - *PHP-File*
    - *Docker-Compose File*
    - *Dockerfile*
- *Sicherheitsaspekte*
- *Testfälle*
- *Quellen*

---------------------


### Service Beschreibung                
In der nachfolgenden Dokumentation wird eine Docker-Umgebung aufgezeigt, welche die Services PHP, MySQL & Apache automatisiert.

---------------------------



### Service Anwendung
Es können auf dem MySQL-Server (localhost:8080) Datenbanken erstellt werden. Die entsprechenden Infos der Datenbank, werden auf dem Apache-WebServer (localhost:80) dargestellt. Die Seite welche diese Infos anzeigt kann mithilfe des PHP-Files bearbeitet werden.

---------------------------


### Code Beschreibung

#### PHP-File

     <?php
  >*Die Scriptsprache wird definiert*

     echo "Sie befinden sich nun auf meinem Docker lb3 container";
  >*Es wird eine Ausgabe definiert, welche auf der Seite angezeigt wird*

     $sql = "INSERT INTO Checkliste (Handlung, Status) VALUES('PHP-Container', 'Erledigt')";
     $result = $mysqli->query($sql);
  >*Es werden die gewünschten Werte in die entsprechenden Spalten der entsprechenden Tabelle eingefügt*

     foreach ($users as $user) {
     echo "<br>";
     echo $user->Handlung . " " . $user->Status;
     echo "<br>";
  >*Es werden die Ausgaben definiert sowie nach jeder Ausgabe ein Absatz eingefügt*

#### Docker-Compse File

     version: '3.1'
  >*Die docker-compose Version wird definiert*

    services:
  >*Die zu erstellenden Container (Services) werden definiert*

    php:
        build:
            context: .
            dockerfile: Dockerfile
        ports:
            - 80:80
        volumes:
            - ./src:/var/www/html/
  >*Der PHP-Container mithilfe des Dockerfiles erstellt (siehe Dockerfile). Die Portweiterleitung das Kopieren des lokalen Verzeichnisses in das des Containers ist auch definiert.*

    db:
        image: mysql
        command: --default-authentication-plugin=mysql_native_password
        restart: always
        environment:
            MYSQL_ROOT_PASSWORD: example
        volumes:
            - mysql-data:/var/lib/mysql
    adminer:
        image: adminer
        restart: always
        ports:
            - 8080:8080

  volumes:
    mysql-data:
  >*Es wird ein Datenbankdienst (MySQL) hinzugefügt. Es werden Befehle für die Passwortabfrage, sowie für eine Neustartrichtlinie definiert. Das Root Passwort für die Anmeldung ist auf Example gesetzt. Die Portweiterleitung wurde auch hinzugefügt (localhost:8080) sowie die volumes damit die Datenbank bestehen bleibt.*  

#### Dockerfile

    FROM php:7.4-apache
>*Es wird definiert, dass das Image 7.4 von PHP-Apache für den Container verwendet werden soll.*

    RUN docker-php-ext-install mysqli
>*Es wird definiert, dass MySQL Extensions im Container heruntergeladen und ausgeführt werden sollen.*

---------------------------

### Sicherheitsaspekte
|Sicherheitsmerkmal |Begründung                                                             |
|---------------------------|---------------------------------------------------------------|
|Benutzer & Passwort        |Zugriff auf Datenbank nur über Benutzer mit PW möglich         |

---------------------------

### Test

#### Container welche runnen sind
Beweis: ![Container](/lb3/images/Container.png "Container")

#### Datenbanken auf localhost:8080
Beweis: ![Container](/lb3/images/Datenbanken_erstellt.png "Container")

#### Webseite auf localhost:80
Beweis: ![Container](/lb3/images/PHP-Webseite.png "Container")


---------------------------

### Quellen
- <https://hub.docker.com/_/mysql> "MySQL"  
- <https://hub.docker.com/_/php> "PHP"  
- <https://stackoverflow.com/questions/4567688/problems-with-a-php-shell-script-could-not-open-input-file> "Troubleshooting"  
- <https://askubuntu.com/questions/949401/how-to-fix-could-not-open-input-file-in-php-cli-7-0> "Troubleshooting"