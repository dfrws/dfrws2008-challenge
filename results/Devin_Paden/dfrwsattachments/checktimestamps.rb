#!/usr/bin/env ruby
timehash = {}
while gets
  if $_ =~ /#\d{10,10}\D/
  	a= $_.gsub('#','')
  	puts "**Timestamp:#{a .chop}=#{Time.at(a.to_i).to_s}**"
  elsif
	puts "\t#{$_}"
  end
end
