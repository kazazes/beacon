# beacon

![beacon](http://oyster.ignimgs.com/wordpress/stg.ign.com/2012/10/ET_topart21.jpg)

## Overview

Inspired by Tony Stark's "phone home" system in *Iron Man 3*, **beacon** is a php-based twilio application which sends distress messages to a list of contacts. Call your beacon, enter your pin, and record your message. Contacts receive a call with your emergency recording as well as a download link via SMS.

Natural disasters, terrorist attacks, smaller emergencies could all be made more bearable with the help of something like beacon. Hell, it's an easily configureable way to get a message out to any large group of people.

## Set-up

Setting up **beacon** is dead simple. Upload the scripts, rename `beacon.ini.default` to `beacon.ini` and fill out your config. Point your Twilio voice request URL to the `intro.php` file and you're all set.

beacon is entirely configureable via the `beacon.ini` file. It uses the Twilio and bit.ly API for link shortening. Set your API keys, messages and authcode and you're set to go.  

#### Config file

	[application]
	dial_in_auth_code = "1111" 
	application_root = "http://www.peterk.co/phone-home/"
	call_text = "Peter left you a message. It will loop continuously until you hang up."
	sms_text = "Listen to Peter's message. &url"

	[twilio]
	api_sid = "twilioSid"
	api_token = "twilioToken"
	authd_phone = "XXXXXXXXXX"

	[emergency_contacts]
	contacts[] = "XXXXXXXXXX"
	contacts[] = "YYYYYYYYYY"
	contacts[] = "ZZZZZZZZZZ"

	[bitly]
	; https://bitly.com/a/your_api_key
	bitly_login = "bitlyLogin"
	bitly_token = "bitlyToken"
	
#### Twilio Notes

This all of course depends on having a well-stocked Twilio account. AFAIK you can use a trial account which starts you with some credit anyway.

##Disclaimer

I put this together in ~~a day~~ an hour. Syntax ain't pretty but she works. Do whatever you want with this.