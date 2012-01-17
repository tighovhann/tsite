#!/usr/bin/perl

#####################################################################################################
## TODO
## +1. Check and if xampp already exists do not download 
## +2. Download, install and run
## 3. Check if subversion does not exists download and install
## 4. Check out tsite and install, make link in the httdocs
## 5. Install database
## 6. Open browser with the site 

#####################################################################################################

sub shell_command($);
sub get_version($$);

#####################################################################################################

my $TSITE_PATH = "/home/tigran/sites/";
my $TSITE_NAME = "tsite";

unlink "/opt/index.html";
shell_command('cd /opt; wget http://sourceforge.net/projects/xampp/files/BETAS/;');

## retrieving version information
my $internet_version = get_version("/opt/index.html", "xampp-linux-(.*).tar.gz\/download");
unlink "/opt/index.html";
my $local_version = 0;
if (-e "/opt/lampp/RELEASENOTES") {

    $local_version = get_version("/opt/lampp/RELEASENOTES", "XAMPP for Linux (.*)\$");
    print "XAMPP internet version: $internet_version\n";
    print "XAMPP local version: $local_version\n";

    my $local_version_number = $local_version;
    $local_version_number =~ s/\.//;
    my $internet_version_number = $internet_version;
    $internet_version_number =~ s/\.//;

    ## comparing versions
    if ($internet_version_number > $local_version_number) {
        print "Downloading new version";
        unlink "download";
        shell_command("cd /opt; wget http://sourceforge.net/projects/xampp/files/BETAS/xampp-linux-$internet_version.tar.gz/download");
        if (-d "/opt/lampp") {
            rename "/opt/lampp","/opt/lampp.old";
        }
        shell_command("cd /opt; tar xzf download");
    }
}

shell_command("apt-get install subversion");
if (-d "$TSITE_PATH/$TSITE_NAME") {
    shell_command("cd $TSITE_PATH/$TSITE_NAME;svn up");
} else {
    ## checking out tsite
    shell_command("mkdir -p $TSITE_PATH/$TSITE_NAME;cd $TSITE_PATH; svn checkout https://tsite.googlecode.com/svn/trunk/ $TSITE_NAME --username tigran.job\@gmail.com");
    shell_command("chmod a+rw $TSITE_PATH/$TSITE_NAME -R");
}
## creating symbolic link in the htdocs
shell_command("cd /opt/lampp/htdocs/; rm -f $TSITE_NAME; ln -s $TSITE_PATH/$TSITE_NAME");

#####################################################################################################

sub shell_command($)
{
    my $cmd = shift;
    print "$cmd\n";
    system($cmd);
}

sub get_version($$)
{
    my $filename = shift; 
    print $filename
    my $regexp = shift; 
    open(FILE, $filename);
    my $version_number = 0;
    my $version_name;
    while(<FILE>) {
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
    close FILE;
    return $version_name;
}

#####################################################################################################
