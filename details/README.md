# DFRWS 2008 Challenge

## Overview

THE DFRWS 2008 CHALLENGE focused on the development of Linux memory analysis techniques and the fusion of evidence from memory, hard disk, and network. Since the DFRWS 2005 Challenge, there has been significant progress in Windows memory analysis. Now, we are focusing on Linux and on integrating evidence from multiple sources.

[Challenge Overview](../)

[Challenge Results](../results/)

## Details

### The Scenario
Your organization has become aware of external attempts to gain access to sensitive proprietary information on its computer systems and has stepped up its monitoring in response. Data from this monitoring, in addition to interviews with employees, has focused attention on a single user, who is suspected of collaborating with an outside party.

When escalated monitoring of the user identified suspicious network and system activity, your organization's security team responded. They copied the contents of the user's home directory (this was a Linux desktop system), made a full dump of system memory and preserved a packet capture of network traffic from the system. It's your task to analyze this data and determine what can be established about the activity of the user.

Your organization wants to answer the following questions:

1. What relevant user activity can be reconstructed from the data and what does it show?
1. Is there evidence of inappropriate or suspicious activity on the system related to the user?
1. Is there evidence of collaboration with an outside party? If so, what can be determined about the identity of the outside party? How was any collaboration conducted?
1. Is there evidence that sensitive data was copied? If so, what can be determined about that data and the manner of transfer?

### Challenge Data
The data set for this challenge contains files copied from the user's home directory, a dump of physical memory and a network packet capture in pcap format.

File Image (90 Mb Zip): [dfrws2008-challenge.zip](dfrws2008-challenge.zip)

SHA-1 of raw file: 52014e22c843ece2736bce59f652f43e96035825

System map (236KB Zip): [System.map-2.6.18-8.1.15.el5.zip](System.map-2.6.18-8.1.15.el5.zip)

### Submission Requirements
Submissions should include an analysis report that answers the four questions listed in the challenge scenario and outlines how those answers were determined. The report should also include any other conclusions that appear germane to the case and must outline novel techniques employed in sufficient detail that the results can be reproduced. Reports must be submitted in PDF, ASCII or HTML format.

The submission should also include data that supports the findings and the source code for any analysis tools that were developed for the challenge. The source code can be released under any restrictions and licenses that you choose. The report and supporting files should be bundled into a single compressed archive. All submitted data, with the exception of compiled executables, will be published on the DFRWS website.

Submissions are due by **July 10, 2008**.

### Submission Method
Please submit your Challenge report together with any accompanying files in a single compressed archive (zip or gzip, for example) via anonymous FTP to DFRWS-submit.dfrws.org. Use "ftp" (without quotes) as a username and supply your e-mail address as the password.

Upload your submission to the "upload/" directory. A confirmation e-mail of your upload will be sent to the address given as a password.

PLEASE READ THE FOLLOWING: The FTP server accepts anonymous uploads only and will not provide a directory listing or honor download requests, even for the file you just uploaded. The lack of a directory listing may trigger error messages in some FTP clients (those that automatically request directory listings, for example). You should be able to send your file regardless (be sure you "cd" to the "upload/" directory first). If you experience problems:

When you try to resend, please use a different file name
* Try a different FTP client (command line FTP shells may work best)
* Questions can be sent to dfrws2008-challenge <at> dfrws <dot> org.

### Criteria
Submissions will be judged primarily for the completeness and accuracy of findings, as well as the soundness of the supporting analysis.

The goal of this and past challenges is to spur advances in the state of the art in research and tools. Therefore, we expect that you document your techniques as much as possible. Extra weight will be given for the creation of novel analysis tools that are applicable to broader forensic challenges.





