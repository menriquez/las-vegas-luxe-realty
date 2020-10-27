#!/bin/bash

# Security vulnerability scanner for Ubuntu
# Written by John L. Scott

# TODO
# Add PAM restrictions
# Change all users’ passwords

export UNIXMESSAGE1="The following UNIX program could not be found:"
export UNIXMESSAGE2="Please confirm that your standard Unix utilities are installed."

clear

echo "Starting Ubuntu security script..."
echo ""

# Check if script is running as root
if [ "$UID" != 0 ]
then
  echo $UID
    echo "This script must be run as root."
    exit 1
fi

# Start dependency check

if [ "$(which nc)" = "" ]
then
    echo "Netcat is not installed. Install Netcat and try again."
    exit 1
fi

# Temporarily decrease swappiness for this session to make the system faster
if [ "$(which sysctl)" != "" ]
then
    sysctl vm.swappiness=0 > /dev/null
fi

if [ "$(which passwd)" = "" ]
then
    echo "$UNIXMESSAGE1 passwd"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which env)" = "" ]
then
    echo "$UNIXMESSAGE1 env"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which chown)" = "" ]
then
    echo "$UNIXMESSAGE1 chown"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which chmod)" = "" ]
then
    echo "$UNIXMESSAGE1 chmod"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which mkdir)" = "" ]
then
    echo "$UNIXMESSAGE1 mkdir"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which rm)" = "" ]
then
    echo "$UNIXMESSSAGE1 rm"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which touch)" = "" ]
then
    echo "$UNIXMESSAGE1 touch"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which pwd)" = "" ]
then
    echo "$UNIXMESSAGE1 pwd"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which sleep)" = "" ]
then
    echo "$UNIXMESSAGE1 sleep"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which cat)" = "" ]
then
    echo "$UNIXMESSAGE1 cat"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which ls)" = "" ]
then
    echo "$UNIXMESSAGE1 ls"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which mv)" = "" ]
then
    echo "$UNIXMESSAGE1 mv"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which cp)" = "" ]
then
    echo "$UNIXMESSAGE1 mv"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which grep)" = "" ]
then
    echo "$UNIXMESSAGE1 grep"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which deluser)" = "" ]
then
    echo "$UNIXMESSAGE1 deluser"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which sha512sum)" = "" ]
then
    echo "$UNIXMESSAGE1 sha512sum"
    echo "$UNIXMESSAGE2"
    exit 1
fi

if [ "$(which nano)" = "" ]
then
    echo "nano is not installed. Please install nano and try again."
    exit 1
fi

if [ "$(which awk)" = "" ]
then
    echo "No AWK interpreter was found."
    echo "Please install an AWK interpreter and try again."
    exit 1
fi

if [ "$(which uname)" = "" ]
then
    echo "$UNIXMESSAGE1 uname"
    echo "$UNIXMESSAGE2"
    exit 1
fi

# Now that we know uname is installed, we can run a quick kernel/OS check

if [ "$(uname -s)" != "Linux" ]
then
    if [ "$(uname -s)" = "Darwin" ]
    then
        echo "This script is running on an OS with the Darwin kernel, most likely OS X."
        echo "This script should be run on Ubuntu with the Linux kernel instead."
        echo ""
    else
        echo "The kernel currently running is not Linux."
        echo "This script should be run on Ubuntu with the Linux kernel instead."
    fi
    exit 1
fi

if [ "$(which apt-get)" = "" ]
then
    echo "APT is not installed."
    echo "Are you sure you're running this on Ubuntu?"
    echo "Make sure that APT is installed and try again."
    exit 1
fi

if [ "$(which python2)" = "" ]
then
    echo "Python 2 is not installed."
    echo "Please install Python 2 and try again."
    exit 1
fi

# If lsb_release is available, check one last time to make sure this only runs on Ubuntu
# If lsb_release is not available, don't worry about it and move on
if [ "$(which lsb_release)" != "" ]
then
    if [ "$(lsb_release -s -i)" != "Ubuntu" ]
    then
        echo "This script is meant to be run on Ubuntu. Try running this script again on Ubuntu."
        exit 1
    fi
    if [ "$(lsb_release -s -r)" != "12.04" ]
    then
        if [ "$(lsb_release -s -r)" != "14.04" ]
        then
            echo "This script has not yet been tested on Ubuntu $(lsb_release -s -r), but it will probably still work."
        fi
    fi
fi

# Let's test if the Internet connection works using Netcat
nc -z 8.8.8.8 53
if [ "$?" != "0" ]
then
    echo "You do not seem to have a working Internet connection."
    echo "Connect to the Internet and try again."
fi

# Warn about any installed server software that we should be concerned about

if [ -d /etc/apache2 ]
then
    echo "The Apache configuration file directory (/etc/apache2) has been found."
    echo "Apache may be installed."
    echo ""
fi

if [ -d /etc/mysql ]
then
    echo "The MySQL configuration file directory (/etc/mysql) has been found."
    echo "MySQL or MariaDB may be installed."
    echo ""
fi

if [ -d /etc/nginx ]
then
    echo "The Nginx configuration file directory (/etc/nginx) has been found."
    echo "Nginx may be installed."
    echo ""
fi

if [ -e /etc/ssh/sshd_config ]
then
    echo "The OpenSSH server configuration file has been found."
    echo “The OpenSSH server may be installed."
    echo "Remember to disable root login with \`PermitRootLogin no\`."
    echo ""
fi

echo "All systems tests have been run successfully. Press any key to start."
read -n 1 -s

# Install updates with APT

echo "Updating APT package cache..."
apt-get -qq update # -qq makes APT as silent as possible while still printing errors
echo "Checking for package upgrades..."
apt-get -qq dist-upgrade && echo "Done."
echo ""

# Warn about any suspicious software

if [ "$(which nmap)" != "" ]
then
    echo "Nmap is installed!"
    echo "Nmap is a program that can be used to scan devices on a network, search for open ports, and do other networking tasks."
    echo "Nmap can be used to perform malicious tasks."
    echo "This will be removed, assuming it has been installed with the package management system."
    apt-get purge nmap
fi

if [ "$(which wireshark)" != "" ]
then
    echo "Wireshark is installed!"
    echo "Wireshark is a packet analyzer that can inspect network traffic."
    echo "Wireshark can be used to perform malicious tasks."
    echo "This will be removed, assuming it has been installed with the package management system."
    apt-get purge wireshark
fi

if [ "$(which john)" != "" ]
then
    echo "John the Ripper is installed!"
    echo "John the Ripper is a password cracking tool that can be used to perform many different kinds of attacks to access users’ passwords."
    echo "John the Ripper can be used to perform malicious tasks."
    echo "This will be removed, assuming it has been installed with the package management system."
    apt-get purge john
fi

if [ "$(which tor)" != "" ]
then
    echo "Tor is installed!"
    echo "Tor is network anonymity software that can be used to get around network restrictions and secretly do activities over the Internet."
    echo "Tor is often associated with the Deep Web and the Dark Web."
    echo "This will be removed, assuming it has been installed with the package management system."
    apt-get purge tor
fi

echo "Here is a list of all users in the \"sudo\" group:"
python2 -c "import grp; print grp.getgrnam('sudo')[3]"
echo ""
echo "If you see anyone in that list that should not have administrator permissions, enter their username now or type \"done\"."

while true
do
    read DELSUDO
    if [ "$DELSUDO" = "done" ]
    then
        break
    fi
    deluser $DELSUDO sudo
    echo "If you must restrict another user from having administrator permisssions, enter their username now or type \"done\"."
done
echo ""

# Apache hardening
if [ -e /etc/apache2/apache2.conf ]
then
    echo "Here is a list of all users in the \"www-data\" group:"
    python2 -c "import grp; print grp.getgrnam('www-data')[3]"
    echo ""
    echo "If you see anyone in that list that should not have access to the Apache web server, enter their username now or type \"done\"."

    while true
    do
        read DELAPACHE
        if [ "$DELAPACHE" = "done" ]
        then
            break
        fi
        deluser $DELAPACHE www-data
        echo "If you must restrict another user from having access to Apache, enter their username now or type \"done\"."
    done
    echo ""
fi

# Let’s delete the root password if there is one
# Ubuntu uses sudo for all administrative tasks, so having a root account is a bad thing
passwd -l root

echo "Here is a list of (almost) all users on the system (check in the GUI later to be sure):"
awk -F'[/:]' '{if ($3 >= 1000 && $3 != 65534) print $1}' /etc/passwd
echo ""
echo "If you see any users in that list that should not be on this system, enter their username now or type \"done\"."

while true
do
    read DELUSER
    if [ "$DELUSER" = "done" ]
    then
        break
    fi
    deluser --remove-home $DELUSER
    echo "If you must delete another user, enter their username now or type \"done\"."
done

echo ""

# Set the proper permissions for various files
chown root:root /etc/shadow
chmod 000 /etc/shadow
chown root:root /etc/passwd
chmod 644 /etc/passwd
chown root:root /etc/group
chmod 644 /etc/group
chown root:root /etc/fstab
sudo chmod 664 /etc/fstab

echo "Looking around for media files..."
echo "If any are found, take note and inspect these manually."
find /home -regex ".*\.\(wav\|aif\|mp4\|ogg\|avi\|mp3\|flac\|m4a|oga\|wma\|opus\|wma\|webm\|flv\|gif\|png\|jpg\|mov\|wmv\|mpg\|mpeg\|flv\)"

echo "Installing Gufw..."
echo "Use this to set up a firewall."
sudo apt-get -qq install gufw

echo "The security scan is complete."
exit 0
