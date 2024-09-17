# Web and mobile application security training platform

## OWASP Security Shepherd [![OWASP Flagship](https://img.shields.io/badge/owasp-flagship%20project-48A646.svg)](https://www.owasp.org/index.php/OWASP_Project_Inventory#tab=Flagship_Projects)

The [OWASP Security Shepherd Project](http://bit.ly/owaspSecurityShepherd) is a web and mobile application security training platform. Security Shepherd has been designed to foster and improve security awareness among various skill-set demographics. This project aims to take AppSec novices or experienced engineers and sharpen their penetration testing skill set to security expert status.


### Virtual Machine or Manual Setup

You can download Security Shepherd VMs or Manual Installation Packs from [GitHub](https://github.com/OWASP/SecurityShepherd/releases)

### Docker (Ubuntu Linux Host)

#### Initial Setup

[Docker-Environment-Setup](https://github.com/OWASP/SecurityShepherd/wiki/Docker-Environment-Setup)

```console
# Install prereqs
sudo apt install git maven docker docker-compose openjdk-8-jdk

# Clone the GitHub repository
git clone https://github.com/OWASP/SecurityShepherd.git

# Change the directory into the local copy of the repository
cd SecurityShepherd

# Adds current user to the docker group (don't have to run docker with sudo)
sudo gpasswd -a $USER docker

# Run maven to generate the WAR and HTTPS Cert.
mvn -Pdocker clean install -DskipTests

# Build the docker images, docker network, and bring up the environment
docker-compose up
```

Open up an Internet Browser & type in the address bar;

* [localhost](http://localhost)

To log in use the following credentials (you will be asked to update after login);

* username: ```admin```
* password: ```password```

Note: Environment variables can be configured in the dotenv ```.env``` file in the root dir.
  
