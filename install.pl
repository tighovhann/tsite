#!/usr/bin/perl

sub get_version($$);

## TODO
## 1. Download, install and run
## 2. Check and if xampp already exists do not download 
## 3. Check if subversion does not exists download and install
## 4. Check out tsite and install, make link in the httdocs
## 5. Install database
## 6. Open browser with the site 

#########################################################################################################

my $TSITE_PATH = '/home/tigran/sites/'; 

system('
        cd /opt; 
        rm -f index.html;
        wget http://sourceforge.net/projects/xampp/files/BETAS/;
      ');

my $version = get_version('xampp-linux-(.*).tar.gz\/download', '</opt/index.html');

if (-e '/opt/lampp/RELEASENOTES') {
    my $installed_version = get_version('XAMPP for Linux (.*)','/opt/lampp/RELEASENOTES');
    if ($installed_version == $version) {
        print "INFO: /opt/lampp already exists. no download is performed.\n";
        system("
                rm -f /opt/index.html; 
                /opt/lampp/lampp restart;
              ");
    } else {
        ## TODO  save database and httdocs
        system("
                rm -f /opt/index.html;
                rm -f /opt/download;
                rm -fr /opt/lampp;
                wget http://sourceforge.net/projects/xampp/files/BETAS/xampp-linux-$version.tar.gz/download;
                tar xzfv download;
                /opt/lampp/lampp start;
              ");
    }
} else {
    system("
            rm -f /opt/index.html;
            rm -f /opt/download;
            wget http://sourceforge.net/projects/xampp/files/BETAS/xampp-linux-$version.tar.gz/download;
            tar xzfv download;
            /opt/lampp/lampp start;
          ");
}

if (-d "$TSITE_PATH/tsite") {
    system("
            cd $TSITE_PATH/tsite; svn up;
        ");
} else {
    system("
            mkdir -p $TSITE_PATH;
            cd $TSITE_PATH; 
            svn checkout https://tsite.googlecode.com/svn/trunk/ tsite --username tigran.job@gmail.com;
            cd /opt/lampp/htdocs/;
            ln -s $TSITE_PATH/tsite;
        ");
}


system("
        firefox localhost/tsite/install;
    ");

#########################################################################################################

sub get_version($$) 
{
    my $regexp = shift;
    my $file = shift;
    open(HTML, $file);
    my $version_number = 0;
    my $version_name;
    while(<HTML>) {
        if (/$regexp/g) {
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
    close HTML;
    return $version_name;
}
