> *M300 / Albin Vejseli*

# **LB2- Apache mit einer PHP-Webseite**

## Inhaltsverzeichnis



- *Einleitungswort*
- *Vagrant*
    - *Codedokumantation VM*
    - *Codedokumantation Apache / php*
    - *Codedokumantation Firewall*
- *Erweiterungen*
     - *Installation Wireshark*
     - *Installation Python*
- *Test*
- *Reflektion*
- *Quellen*

---------------------



### Einleitungswort
Diese Dokumentation beinhaltet das Automatisieren eines Webservers mit dem Tool Vagrant. 

--------------------


### Vagrant                

#### Codedokumantation VM

     config.vm.box = "ubuntu/xenial64"
  >*Mit dieser Zeile wird definiert, welches Image verwendet werden soll.*

     config.vm.network "forwarded_port", guest: 80, host: 8080
  >*Mit dieser Zeile werden die geöffneten Ports konfiguriert.*

     config.vm.synced_folder ".", "/var/www/html"
  >*Mit dieser Zeile wird die eventuelle Synchronisation des Ordners definiert.*


     config.vm.provider "virtualbox" do |vb|
  >*Mit dieser Zeile wird der Provider definiert.*

     
     vb.memory = "4096"
  >*Mit dieser Zeile wird RAM der VM zugewiesen.*

     config.vm.provision "file", source: "../Website/index.php", destination: "/var/www/html/index.php"
  >*Mit dieser Zeile definieren wir den Destination folder von der lokal erstellten Datei index.php*

     config.vm.provision "shell", inline: <<-SHELL
  >*Das ist die Endzeile. Alles nachfolgende wird automatisch in der VM ausgeführt.*
---------------------------



#### Codedokumantation Apache / php

     apt-get update
  >*Mit dieser Zeile werden Paketlisten neu eingelesen und aktualisiert.*

     apt-get install -y apache2
  >*Mit dieser Zeile wird apache2 installiert.*

     sudo apt -y install apache2 php libapache2-mod-php
  >*Mit dieser Zeile wird php installiert.*

---------------------------




#### Codedokumantation Firewall
 
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

### Erweiterungen

#### Installation Wireshark

     sudo apt-get update
     sudo apt-get install libcap2-bin wireshark
  >*Mit dieser Zeile werden Paketlisten neu eingelesen und aktualisiert. Zusätzlich wird Wireshark installiert*
  
#### Installation Python

     sudo apt-get update
     sudo apt install software-properties-common
     sudo add-apt-repository ppa:deadsnakes/ppa
     sudo apt-get update
     sudo apt install python3.8
  >*Mit dieser Zeile werden Paketlisten neu eingelesen und aktualisiert. Zusätzlich wird python installiert*


---------------------------

### Test

    Wenn es funktoniert wie es sollte, kann nach dem Befehl "vagrant up" im Browser "localhost:8080" oder "127.0.0.1:8080" eingegeben werden und es sollte folgende Seite erscheinen:
> [Apache Website](/Users/Albin/Desktop/Apache_Website.PNG "Website")
---------------------------

### Reflektion
    Ich habe keinerlei Kentnisse gehabt in Sachen Vagrant und Markdown. Ich verstehe die Idee dahinter und konnte mein Wissen, durch Informieren verschiedener Quellen und natürlich den Unterrichtsmaterialien, in diesen Bereichen erweitern. Das Projekt verlief mit Problemen, worauf aber im Internet sehr viele Antworten stehen. Da die Zeit sehr knapp wurde konnte ich nichts grösseres machen. 
---------------------------

### Quellen
- <https://phoenixnap.com/kb/how-to-install-python-3-ubuntu>
- <https://github.com/alxvej97/m300_lb> "Mein Repository"
- <https://app.vagrantup.com/boxes/search?utf8=%E2%9C%93&sort=downloads&provider=&q=ubuntu%2Ftrusty64> "UbuntuBox"
- <https://stackoverflow.com/questions/4181861/message-src-refspec-master-does-not-match-any-when-pushing-commits-in-git> "Stackflow Lösungsvorschläge"