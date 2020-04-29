Forensic Timeline Generation Tool:

This tool compiles a timeline of user activity generated from various
sources. Specific pieces of information extracted are added to an array which
is later sorted by time and output for further processing.

Command line options:

'--root-path' is the top level path we want to analyze in the filesystem.
All files under this root will be examined for modification and access times.
In addition, each file will be searched for strings which indicate
modification or access times. A set of regular expressions were developed to
extract these times. Finally, the 'file' utility is run on each file in an
attempt to classify it by type (text, executable, data) and format (magic
signature).

'--browser-history' is the firefox history file. Unfortunately, the native
format for this file is not easy to parse. Fortunately, a tool exists to
convert the history file to XML format, which can be parsed more easily. The
tool is called demork.py and is available on the internet at:
http://exple.tive.org/blarg/?p=99. An example usage for this script is
provided below:

  python demork.py user_files/.mozilla/firefox/n5q6tfua.default/history.dat > firefox-history.rdf

'--pcap-file' is a packet capture file.

'--memory-dump' is a linux memory dump file.


Using the Timeline Tool:

Running the timeline tool with the '-h' or '--help' option prints all
available command-line options. An example use of the timeline script is
given below. In this example, we provide the converted firefox history file
from the user home directory, the memory dump and the packet capture. We
enable the pcap filtering with the timing filter set to 1.0 seconds.

  timeline.py -b firefox-history.rdf -m challenge.mem -p suspect.pcap \
    -r user_files/ -f -t 1.0 > timeline.txt



Browser Player Tool:

This tool compiles a timeline of web requests from a pcap file and firefox
history file. An attempt is made at filtering requests not directly made by
the user (e.g. secondary html, images, js, etc.).  Filtering is based on a
timing analysis that eliminates rapid sequential requests that follow an
initial request.  A filter is also provided in the script to allow filtering
known advertisement sites. This was neccessary because many ads are triggered
by javascript timers, making the timing look like user activity.  This issue
also occurs with rollover images using javascript, and is mitigated in the
script as much as possible.  A robust timing analysis is not possible with
the firefox history, since the smallest unit in its timestamps is second;
although we do apply the advertisement filter to the firefox history.

HTML using the contructed timeline is generated.  A dropdown list is provided
for each user agent string found in the pcap or firefox history.  These
dropdown lists give the time-ordered web requests as well as the html title
for each page.  Selecting a request will play the page in the IFrame below
the list.  Playing a page simply sends a request out, it does not rebuild the
page from the pcap or firefox history. Note that some pages will 'break out'
of the IFrame box (e.g. gmail). 

Command line options:

'--browser-history <FILE>' is the firefox history file. Unfortunately, the native
format for this file is not easy to parse. Fortunately, a tool exists to
convert the history file to XML format, which can be parsed more easily. The
tool is called demork.py and is available on the internet at:
http://exple.tive.org/blarg/?p=99. An example usage for this script is
provided below:

  python demork.py user_files/.mozilla/firefox/n5q6tfua.default/history.dat > firefox-history.rdf

'--pcap-file <FILE>' is a packet capture file
'--pcap-filter' enables the packet filter
'--pcap-nofilter' disables the packet filter

Using the Browser Player Tool:

Running the browser player tool with the '-h' or '--help' option prints all
available command-line options. An example use of the browser player script is
given below. In this example, we provide the converted firefox history file
from the user home directory and the packet capture. We
enable the pcap filtering with the timing filter.

  BrowserPlayer.py -b firefox-history.rdf -p suspect.pcap \
    --pcap-filter > browserplayer.html
