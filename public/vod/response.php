<?php

$xml = new SimpleXMLElement('<xml/>');

for ($i = 1; $i <= 8; ++$i) {
    $track = $xml->addChild('track');
    $track->addChild('path', "song$i.mp3");
    $track->addChild('title', "Track $i - Track Title");
}

Header('Content-type: text/xml');
print($xml->asXML());
?>

<VideoAdServingTemplate xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceSchemaLocation="vast.xsd">
	<Ad id="pre-roll-0">
		<InLine>
			<AdSystem>2.0</AdSystem>
			<AdTitle>Sample</AdTitle>
			<Impression></Impression>
			<Creatives>
				<Creative sequence="1" id="2">
					<Linear>
						<Duration>00:02:00</Duration>
						<AdParameters>
						</AdParameters>
						<MediaFiles>
							<MediaFile delivery="progressive" bitrate="400" type="video/mp4">
								<URL>http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/nhacdance.mp4
								</URL>
							</MediaFile>
						</MediaFiles>
						<VideoClicks>
							<ClickThrough>
			         <![CDATA[http://clipmediagroup.eu/]]>
							</ClickThrough>
							<ClickTracking>
				<![CDATA[http://clipmediagroup.eu]]>
							</ClickTracking>
						</VideoClicks>
					</Linear>
				</Creative>
			</Creatives>
		</InLine>
	</Ad>
	<Ad id="mid-roll-0">
		<InLine>
			<AdSystem>OpenX</AdSystem>
			<AdTitle>
<![CDATA[ Lipton ]]>
			</AdTitle>
			<Description>
<![CDATA[ Inline Video Ad ]]>
			</Description>
			<Impression>
				<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/
]]>
				</URL>
			</Impression>
			<Video>
				<Duration>00:00:05</Duration>
				<AdID>
<![CDATA[ 3 ]]>
				</AdID>
				<VideoClicks>
					<ClickThrough>
						<URL id="destination">
<![CDATA[
http://clipmediagroup.eu/
]]>
						</URL>
					</ClickThrough>
				</VideoClicks>
				<MediaFiles>
					<MediaFile delivery="progressive" bitrate="400" width="640"
						height="480" type="video/mp4">
						<URL><![CDATA[ http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/lipton_5sec.mp4 ]]>
						</URL>
					</MediaFile>
				</MediaFiles>
			</Video>
			<TrackingEvents>
				<Tracking event="start">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/
]]>
					</URL>
				</Tracking>
				<Tracking event="midpoint">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/midpoint
]]>
					</URL>
				</Tracking>
				<Tracking event="firstQuartile">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/firstquartile
]]>
					</URL>
				</Tracking>
				<Tracking event="thirdQuartile">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/thirdquartile
]]>
					</URL>
				</Tracking>
				<Tracking event="complete">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/complete
]]>
					</URL>
				</Tracking>
				<Tracking event="mute">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/mute
]]>
					</URL>
				</Tracking>
				<Tracking event="pause">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/pause
]]>
					</URL>
				</Tracking>
				<Tracking event="replay">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/replay
]]>
					</URL>
				</Tracking>
				<Tracking event="fullscreen">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/fullscreen
]]>
					</URL>
				</Tracking>
				<Tracking event="stop">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/stop
]]>
					</URL>
				</Tracking>
				<Tracking event="unmute">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/unmute
]]>
					</URL>
				</Tracking>
				<Tracking event="resume">
					<URL id="primaryAdServer">
<![CDATA[
http://clipmediagroup.eu/resume
]]>
					</URL>
				</Tracking>
			</TrackingEvents>
		</InLine>
	</Ad>
	<Ad id="mid-roll-1">
		<InLine>
			<AdSystem>2.0</AdSystem>
			<AdTitle>Sample</AdTitle>
			<Impression></Impression>
			<Creatives>
				<Creative sequence="1" id="2">
					<Linear>
						<Duration>00:14:00</Duration>
						<AdParameters>
						</AdParameters>
						<MediaFiles>
							<MediaFile delivery="progressive" bitrate="400" type="video/mp4">
								<URL>http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/lipton_5sec.mp4
								</URL>
							</MediaFile>
						</MediaFiles>
					</Linear>
				</Creative>
			</Creatives>
		</InLine>
	</Ad>
	<Ad id="post-roll-0">
		<InLine>
			<AdSystem>2.0</AdSystem>
			<AdTitle>Sample</AdTitle>
			<Impression></Impression>
			<Creatives>
				<Creative sequence="1" id="2">
					<Linear>
						<Duration>00:14:00</Duration>
						<AdParameters>
						</AdParameters>
						<MediaFiles>
							<MediaFile delivery="progressive" bitrate="400" type="video/mp4">
								<URL>http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/lipton_5sec.mp4
								</URL>
							</MediaFile>
						</MediaFiles>
					</Linear>
				</Creative>
			</Creatives>
		</InLine>
	</Ad>
</VideoAdServingTemplate>