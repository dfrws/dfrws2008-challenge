# DFRWS 2008 Challenge

## Overview

THE DFRWS 2008 CHALLENGE focused on the development of Linux memory analysis techniques and the fusion of evidence from memory, hard disk, and network. Since the DFRWS 2005 Challenge, there has been significant progress in Windows memory analysis. Now, we are focusing on Linux and on integrating evidence from multiple sources.

[Challenge Details](details/)

[Challenge Results](results/)

## The Winners

Michael Cohen, David Collett, and AAron Walters

[Browse Submission Files](results/Cohen_Collet_Walters)

[Single tar.gz file](results/Cohen_Collet_Walters.tar.gz)

Cohen, Collett and Walters used PyFlag to automate tasks such as carving, string extraction, network stream reassembly, browser history parsing, and provide organization and aggregation for the data. PyFlag is an interactive data exploration tool written in Python. This tool understands a wide range of data formats (including pcap and webmail apps). In addition, the team extended the Linux crashdump analysis tool so it can read "flat memory" dumps as provided by the challenge, and extended the Volatility tool so that it can parse Linux kernel data structures, report key system and user state data, and provide context to the memory dump. Volatity is a memory forensics tool written in Python, originally for Windows memory dumps (though it runs on both Windows and nx). Volatility was integrated with PyFlag January 2008 and it has plugin extension hooks as well. Some discussion of time zone corrections and clock offsets shed additional light on the challenge. Cohen, Collett and Walters also developed a brute-force SSL decryptor that works in a lab setting, but fails with the challenge data. This submission went well beyond what is needed to solve the mystery. In addition to breaking the ZIP file password, they finger Matthew Geiger as the creator of one of the XLS files, find traces of evidence doctoring in the gedit history file, and follow Matthew's evidence preparation in the mc command history. PyFlag is extensible with a scripting language (pyflash = pyflag shell) and with raw python for more complex jobs. It takes only a few lines of custom code to recover the exfiltrated ZIP file from HTTP cookies in a network packet trace. Bravo!

## Challenge Organizers

* Matthew Geiger
* Wietse Venema
* Eoghan Casey


