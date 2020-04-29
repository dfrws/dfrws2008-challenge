#!/usr/bin/ruby
require 'rexml/document'
require "base64"

#preprocess pdml file from challenge:  tshark-r suspect.pcap -R "ip.dst ==
#219.93.175.67 && http" -T 'pdml' > packets.xml

#pass packets.xml to this ruby script
#ruby parsecookies.rb packets.xml > archive.zip


include REXML
file = File.new(ARGV[0])
doc = Document.new(file)
ret = String.new
tstring = String.new
a = Array.new
doc.elements.each("*/packet/proto/field") { |element|
	s=element.attributes["show"]
	
	if s=~ /Sessid=|RMID=|CVal=/
		#tstring used to remove google sorry response duplicates
		print s.gsub(/CVal=|Sessid=|RMID=/,'').unpack('m') unless s == tstring
		tstring = s
	end
}
