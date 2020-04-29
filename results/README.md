# DFRWS 2008 Challenge

## Overview

THE DFRWS 2008 CHALLENGE focused on the development of Linux memory analysis techniques and the fusion of evidence from memory, hard disk, and network. Since the DFRWS 2005 Challenge, there has been significant progress in Windows memory analysis. Now, we are focusing on Linux and on integrating evidence from multiple sources.

[Challenge Details](../details/)

[Challenge Overview](../)

## Results

There were five submissions to the DFRWS 2008 Forensics Challenge. This challenge was designed to be accessible to a wider audience because in previous years we received feedback that many did not even attempt the challenge because it seemed too daunting. So, we were pleased that the submissions this year came from not just researchers and developers, but also practitioners in the community.

Some aspects of the challenge could not be completed using existing tools and new techniques had to be developed. However, many of the questions could be answered without developing new approaches.

We thank everyone for the time they spent on this challenge and their willingness to share their results and techniques with the community.

### The Results
Place | Participant
----- | -----------
First Place | Michael I. Cohen, David J. Collett, AAron Walters
Second Place | Rodney M. Jokerst, Yanni A. Kouskoulas, Donna C. Paulhamus, Karla J. Saur, Kevin Z. Snow, Brian M. Whipple (JHU APL)
Third Place | Devin Paden (SpectreWorks)
Fourth Place | Philipp Hellmich
Fifth Place | Ricci S. C. Ieong, Lunar Au, HC. Leung, Luky Siu, Kenneth Tse (eWalker)

### Summary of Submissions
#### Cohen, Collett and Walters

[Browse Submission Files](./Cohen_Collet_Walters/)

[Single tar.gz file](./Cohen_Collet_Walters.tar.gz)

Cohen, Collett and Walters used PyFlag to automate tasks such as carving, string extraction, network stream reassembly, browser history parsing, and provide organization and aggregation for the data. PyFlag is an interactive data exploration tool written in Python. This tool understands a wide range of data formats (including pcap and webmail apps). In addition, the team extended the Linux crashdump analysis tool so it can read "flat memory" dumps as provided by the challenge, and extended the Volatility tool so that it can parse Linux kernel data structures, report key system and user state data, and provide context to the memory dump. Volatity is a memory forensics tool written in Python, originally for Windows memory dumps (though it runs on both Windows and *n*x). Volatility was integrated with PyFlag January 2008 and it has plugin extension hooks as well. Some discussion of time zone corrections and clock offsets shed additional light on the challenge. Cohen, Collett and Walters also developed a brute-force SSL decryptor that works in a lab setting, but fails with the challenge data. This submission went well beyond what is needed to solve the mystery. In addition to breaking the ZIP file password, they finger Matthew Geiger as the creator of one of the XLS files, find traces of evidence doctoring in the gedit history file, and follow Matthew's evidence preparation in the mc command history. PyFlag is extensible with a scripting language (pyflash = pyflag shell) and with raw python for more complex jobs. It takes only a few lines of custom code to recover the exfiltrated ZIP file from HTTP cookies in a network packet trace. Bravo!

#### Jokerst et al.

[Browse Submission Files](./JHU_APL/)

[Single tar.gz file](./JHU_APL.tar.gz)

Jokerst et al. used a combination of existing utilities and newly developed tools to extract data and reconstruct activity records. One tool they developed locates memory pages with a certain threshold of ASCII content. They also develop a timeline tool to extract events (time stamps, browser URLs) from network captures, user files and other data sources. Jokerst et al. developed a browser player tool to facilitate review of Web sites visited but the proof-of-concept tool accesses the URLs directly on the Internet and does not use web pages/images from the browser cache or network capture. Therefore, the analyst sees the current Web site, using the analyst's own cookies, login information, etc. They performed some data carving used to retrieve spreadsheet fragments and packet capture file. They also attempted to recover SSL keys from memory.

#### Devin Paden

[Browse Submission Files](./Devin_Paden/)

[Single tar.gz file](./Devin_Paden.tar.gz)

Devin Paden used existing tools such as strings, grep and scalpel to extract findings. Analyzed the Gnome desktop and gedit history files; breaks the ZIP file password in two ways (plaintext and dictionary); fingers Matthew Geiger as author of one of the XLS files; and finds external IP address in Ekiga (VoIP app) file. Effective search terms included the shell user prompt text and log timestamps. Transplanted Firefox profile files into his own install in order to examine cache, etc. Created a Ruby script to extract base64 encoded archive from cookies HTTP fields. Also analyzed the time stamp format in terminal session artifacts and used with other techniques to aid in event correlation.

#### Philipp Hellmich

[Browse Submission Files](./Philipp_Hellmich/)

[Single tar.gz file](./Philipp_Hellmich.tar.gz)

Philipp Hellmich used PyFlag for file and network analysis and to aggregate and report on findings. Used strings to extract information from memory. Searched browser history file, memory strings and web traffic in pcap to determine user activity. Created a PHP script to recover the ZIP file from pcap file, broke the ZIP password file, and recovered evidence preservation from mc history.

#### leong et. al

[Browse Submission Files](./eWalker/)

[Single tar.gz file](./eWalker.tar.gz)

Ieong et al. used existing tools to perform largely manual examination of files, memory and network traffic for relevant data. They did not correct for time zone differences when correlating data. They used Google's password recovery feature to obtain credentials to Google account, and after "breaking into" the account they reviewed information from Google docs and e-mail.

#### Remote Examination of Gmail Account

Although the evaluation of the eWalker team submission was not influenced by their "breaking into" the Google account, this action raises a number of issues. Having direct access to the Google account allowed Ieong et al. to obtain additional information that was not otherwise accessible, like what changes were made to Google docs by specific user accounts at different times. However, the decision to collect evidence from a remote location is generally complicated, depending on the law and circumstances of the investigation. Furthermore, reseting the password and logging into a user account may destroy valuable information such as the last IP address used to connect to the account. Therefore, before collecting evidence from a remote system, it is crucial to seek legal advice and carefully consider the impact that such actions will have on the evidence.

#### Judging Process

Submissions were evaluated based on the completeness and accuracy of the findings, and on effort developing new techniques and tools. The highest scores were awarded to the submissions that produced the most complete and accurate results, and that contributed significant new tools and techniques.



