# GPP
Ceci est le gestionnaire de planning et de projet pour mobile (GPPM), bienvenue !


# Vagrant config
This is the configuration for the virtual machine used in the development of my cake3 projects.

The box was generated by [Puphpet](https://puphpet.com/)

## Requirements

This virtual machine requires

  - [VirtualBox](https://www.virtualbox.org/wiki/Downloads) version >=5.1.6
  - [Vagrant](https://www.vagrantup.com/downloads.html) version >= 1.8.6

Vagrant should be available in your `PATH`.

## Installation

  - Download and unzip this in your working directory (i.e : `~/dev/my_project/`)
  - If you use this box for another project, open `config/puphpet.yml` and change the last number of the ip adress on line 26. You may change the box name too, so replace every occurences of `my-cake3-project` by something else.

### First launch
**You'll need an active internet connection for this step**

  1. Go to your working directory and unzip the vm config file
  2. Create a `data/html` folder. This folder will be the `DocumentDir` of Apache on the vm. It is excluded from the VM's git.
  3. Run `vagrant up` in the working directory. That will run the provisionner (setup of desired packages, server configuration, etc...).
  3. **Optionnal but good to do:** Have some coffee during the launch and edit your `hosts` file to add this line at the end: `192.168.56.200 my-cake3-project.dev`
    - Linux: `/etc/hosts`
    - Mac: need feedback, but it should be the same.
    - Windows: need feedback
  4. When done, test the virtual machine:
    - try `vagrant ssh` from console. You should land _in_ the VM. Type `exit` to quit it.
    - Open your browser and test the following adresses [http://192.168.56.200](http://192.168.56.200), [http://my-cake3-project.dev](http://my-cake3-project.dev). You should land on a dummy file.
  5. When the first launch is done, delete the `data/html/index.html` file and go to the next step.

### Install Cake

The easiest way to install Cake is to use Composer. It is already installed in the VM.

  1. Log in the virtual machine with `vagrant up`
  2. Go to the server root directory: `cd /var/www/html`
  3. Create your new app: `composer create-project --prefer-dist cakephp/app .`
  4. Edit the file `config/app.php` and use these credentials for DB:
    - host: localhost
    - user: vagrant
    - password: 123
    - database: vagrant
    Use the same for the test db, but set `database` to `vagrant_test`
  5. Open your browser and go to [http://192.168.56.200](http://192.168.56.200) (or [http://my-cake3-project.dev](http://my-cake3-project.dev) if you updated your `hosts` file).
  6. Check the page and check if everything is ok.
  7. You can now start working. The cake directory is in `<path_to_your_vm>/data/html`.

### Start/stop the vm:

  - To start the vm: `vagrant up`
  - To suspend it: `vagrant suspend`
  - To stop it: `vagrant halt`
  - To force stop: `vagrant halt -f`
  - To destroy the VM: `vagrant destroy`. Note that this command will preserve the development files, but you'll lose all the database.
  -
## Access the machine via SSH:

If you need to access the virtualbox via SSH, the simple way is to use `vagrant ssh`

If you need to access it ie, for Mysql Workbench, the public key is `puphpet/files/dot/ssh/id_rsa.pub`

## Configure Mysql Workbench:

If you want to use Mysql Workbench, create a new connection with these settings:
  - Connection method: Standard TCP/IP over SSH
  - SSH hostname: 192.168.56.200
  - SSH Key file: select `<path_to the vm>/puphpet/files/dot/ssh/id_rsa`
  - Mysql Hostname: localhost
  - Username: vagrant
  - Password: 123
  - Default schema: vagrant

## Machine specifications:

  - Ram: 512Mo
  - Host: training-fight
  - Ip adress: 192.168.56.200
  - Shared folders:
    - `./data/` in the vm folder leads to `/var/www/` on the vm
    - `./` leads to `/vagrant`
  - User:
    - name: vagrant
    - password: 123
  - Apache:
    - Version: 2.4
    - Server name: my-cake3-project.dev _alias_ www.my-cake3-project.dev
    - Webroot: `/var/www/html`
  - PHP:
    - Version: 7.0
    - Modules: cli, intl, xml
    - Logs: `/var/log/php-fpm.log`
  - xdebug: port 9000
  - Mysql:
    - Version: 5.7
    - user: vagrant
    - pass: 123
  - Sqlite
  - Paquets supplémentaires:
    - vim

## Notes
You can edit `puphpet/config.yml` to change and tweak your box.
