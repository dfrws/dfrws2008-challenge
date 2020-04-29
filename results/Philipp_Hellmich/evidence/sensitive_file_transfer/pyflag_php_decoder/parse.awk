#!/usr/bin/env awk -f
BEGIN {
	print "load dfrws"

}
{

#mtime : 2007-12-17 05:18:48
#inode_id : 664
#path : /network/streams/2007-12-17/192.168.151.130-219.93.175.67/42136:80/

if ($1 == "filename")  {
	printf("cp %s ", $3)
}

if ($1 == "mtime")  {
#	printf("%s %s;", $3, $4)
}

if ($1 == "inode_id")  {
	printf("/tmp/net/data/%s\n",$3)
}

}
