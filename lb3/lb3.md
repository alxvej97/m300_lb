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




### Grafische Übersicht
 
    sudo apt install ufw 
  >*Mit dieser Zeile wird die ufw installiert, falls sie es nicht bereits ist.*

    sudo ufw default deny incoming
  >*Mit dieser Zeile  wird eingestellt, dass alles was hereinkommt, geblockt werden soll*

    sudo ufw default allow outgoing
  >*Mit dieser Zeile wird eingestellt, dass alles was rausgeht, erlaubt werden soll*

    sudo ufw allow ssh
  >*Mit dieser Zeile werden eingehende ssh verbindungen zugelassen*

    sudo ufw allow 80
  >*Mit dieser Zeile wird der Port 80 zugelassen*

    sudo ufw allow 8080
  >*Mit dieser Zeile wird der Port 8080 zugelassen*
   
    sudo ufw allow 'Apache'
  >*Mit dieser Zeile wird Apache zugelassen*

    sudo ufw --force enable
  >*Mit diesem befehl wird die Firewall aktiviert*

    sudo ufw --force status verbose
  >*Mit dieser Zeile werden die geänderten Einstellungen angezeigt*

---------------------------

### Code Beschreibung

#### PHP-File

     sudo apt-get update
     sudo apt-get install libcap2-bin wireshark
  >*Mit dieser Zeile werden Paketlisten neu eingelesen und aktualisiert. Zusätzlich wird Wireshark installiert*
  
#### Docker-Compse File

     sudo apt-get update
     sudo apt install software-properties-common
     sudo add-apt-repository ppa:deadsnakes/ppa
     sudo apt-get update
     sudo apt install python3.8
  >*Mit dieser Zeile werden Paketlisten neu eingelesen und aktualisiert. Zusätzlich wird python installiert*

#### Dockerfile


---------------------------

### Sicherheitsaspekte

    Wenn es funktoniert wie es sollte, kann nach dem Befehl "vagrant up" im Browser "localhost:8080" oder "127.0.0.1:8080" eingegeben werden und es sollte folgende Seite erscheinen:
> [Test](/Users/Albin/Desktop/Apache_Website.PNG "Apache")
---------------------------

### Test

    Wenn es funktoniert wie es sollte, kann nach dem Befehl "vagrant up" im Browser "localhost:8080" oder "127.0.0.1:8080" eingegeben werden und es sollte folgende Seite erscheinen:
> [Test](/Users/Albin/Desktop/Apache_Website.PNG "Apache")
---------------------------

### Quellen
- <https://hub.docker.com/_/mysql> "MySQL"  
- <https://hub.docker.com/_/php> "PHP"  
- <https://stackoverflow.com/questions/4567688/problems-with-a-php-shell-script-could-not-open-input-file> "Troubleshooting"  
- <https://askubuntu.com/questions/949401/how-to-fix-could-not-open-input-file-in-php-cli-7-0> "Troubleshooting"