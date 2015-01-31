Title: Bangladesh Savar building collapse - hopefully the last clothing factory disaster but certainly not the first
Date: 2013-06-12 12:02
Author: mattbirgit
Slug: bangladesh-savar-building-collapse-hopefully-the-last-clothing-factory-disaster-but-certainly-not-the-first

<div class="field field-name-taxonomy-vocabulary-2 field-type-taxonomy-term-reference field-label-above">
<div class="field-label">
Post Topics: 

</div>
<div class="field-items">
<div class="field-item even">
[Blog/Technical (@mattbirgit.de)](http://mattbirgit.de/techblog)

</div>
<div class="field-item odd">
[Blog/Photos, Music, Videos & Stories
(@mattbirgit.de)](http://mattbirgit.de/creativeblog)

</div>
</div>
</div>
<div class="field field-name-body field-type-text-with-summary field-label-hidden">
<div class="field-items">
<div class="field-item even">
<table align="center" border="0" rules="none">
<tbody>
<tr>
<td style="text-align: center;">
</p>
<p>
![Savar Building Collapse. Source:
Flickr/Rijans](http://farm8.staticflickr.com/7294/8731789941_193d2b53aa_z.jpg "Savar Building Collapse. Source: Flickr/Rijans")

</td>
</p>
<p>
<td>
</p>

![](http://mattbirgit.de/sites/default/files/visualization.png)

</p>
<p>
</td>
</p>
<p>
</tr>
<tr>
<td style="text-align: center;">
Savar Building Collapse. Source: Flickr/Rijans

</td>
</p>
<p>
<td style="text-align: center;">
A tool for exploring the data on disasters from 1990 to present.
Clicking on a dot will show more data on each incident.

</td>
</p>
<p>
</tr>
</tbody>
</table>
I'm ashamed to say that I had precious little knowledge of clothing
factory disasters in Bangladesh (particularly Dhaka, the capital) before
the recent [Savar Building
Collapse](http://en.wikipedia.org/wiki/2013_Savar_building_collapse)
that made a big impact in the headlines. Years ago I tried to
demonstrate some concern about sweatshops by not buying stuff from GAP
(not that I could really afford it anyway) but over the years I've
suppressed the worries with the vague notion that after so much public
concern, things must be better by now. I still can't tell you much about
Sweatshop conditions, but Birgit and I did look into the history of
disasters within the clothing industry in Bangladesh. We didn't have to
look too far to find shocking catalogues of death tolls due essentially
to poor building standards and inspection. A few reports that deal with
the history of incidents and their causes are:

</p>

[Hazardous workplaces: Making the Bangladesh Garment industry
safe](http://www.cleanclothes.org/resources/publications/2012-11-hazardousworkplaces.pdf/at_download/file)

</p>

[Fair Wear Foundation Background Study BANGLADESH, Fair Wear Foundation,
2006](http://www.fairwear.org/ul/cms/fck-uploaded/archive/2010-01/bangladesh_fwf_country_study.pdf)

</p>

Wanting to do something, and, we freely admit, wanting to try out some
web stuff for something useful and of interest to people, we put
together a year-by-year visualization of the disasters. Most of them are
in the area of Dhaka, but zooming out will reveal a couple in the port
city of Chittagong aswell. We come to a total of 1801 deaths from 1990
to 2013. Many death totals are disputed, and this number is probably
quite conservative. The source(s) of the information and, where
available, details on each incident can be viewed by clicking on the
dots. You can take a look at the draft version here:
[clothing.norainnosun.de](http://clothing.norainnosun.de/). This was a
learning experience for us in multiple ways, concerning the technical
difficulties there are a few comments below, if you're not interested in
that sort of thing you probably can stop reading now!

</p>

We used this project as a way to try out
[CartoDB](http://www.cartodb.com/), a system for quickly creating
visualizations of geographical data. Although the visualization does
still grab its data from a CartoDB database using their API, we quickly
ran into the limits of what their visualization system can cope with.
The main problem was that the creation of the layers displaying data is
done automatically based on a query, which meant a new database query
for different data sets (in our cases, each year). It is also done using
rendered tiles, making everything slow (although I am new to this and
can't be 100% certain that there isn't a way to do it with vector
graphics). By doing the layer generation ourselves (using
[Leaflet](http://leafletjs.com/), which CartoDB can also use),
separately from the database query, we could easily generate vector
graphics layers based on whatever data we wanted and have it displayed
or not more or less instantly, which was necessary for the slider to
work. What is however still very cool about CartoDB is that you can
essentially do database queries directly with Javascript. Their
georeferencing facilties were also good for getting the points on the
right place on the map based on addresses. As for the stacked bar chart,
that is done using [d3.js](http://d3js.org/), a great library for data
plotting. It is (for me) horribly low level, but I'm gradually coming to
understand it. Not enough however, to make my own dynamic stacked bar
chart in a few minutes, for that we adapted [code kindly placed online
by Ben Christensen](http://bl.ocks.org/benjchristensen/1488375).

</div>
</div>
</div>
</p>

