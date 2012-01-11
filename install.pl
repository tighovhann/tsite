#!/usr/bin/perl

## TODO
## 1. Check and if xampp already exists do not download 
## 2. Download, install and run
## 3. Check if subversion does not exists download and install
## 4. Check out tsite and install, make link in the httdocs
## 5. Install database
## 6. Open browser with the site 

system('
        cd /opt; 
        rm -f index.html;
        wget http://sourceforge.net/projects/xampp/files/BETAS/;
      ');

open(HTML, "/opt/index.html");

my $version_number = 0;
my $version_name;
while(<HTML>) {
    if (/xampp-linux-(.*).tar.gz\/download/g) {
        my $curr_version_name = $1;
        if ($curr_version_name =~ /^\d.\d.\d$/) {
            $curr_version_number = $curr_version_name;
            $curr_version_number =~ s/\.//g;
            if ($curr_version_number > $version_number) {
                $version_number = $curr_version_number;
                $version_name = $curr_version_name;
            }
        }
    }
}

system("
        cd /opt; 
        rm -f index.html;
        wget http://sourceforge.net/projects/xampp/files/BETAS/xampp-linux-$version_name.tar.gz/download
      ");

close HTML;
