# 19 East "Backend Site" and Scraper

This code serves as both as a front-page and a back-end scraper for the app [19 East Gig Guide](https://play.google.com/store/apps/details?id=com.jeremecausing.gigs19east&hl=en_US). The app is currently hosted here 
[http://jeremecausing.eu.org/apps/19east/](http://jeremecausing.eu.org/apps/19east/)


| Route                    | Description                                                                                                                                                                           |
|--------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| /                        | Just the homepage                                                                                                                                                                     |
| /process/fetchData       | Triggered by a cron job (I forgot the service). This does a daily scrape on the website.                                                                                              |
| /api/schedules/data/json | fetches the list of schedules containing id, event_date, event_gig, and date_updated for the current month [Example](http://jeremecausing.eu.org/apps/19east/api/schedules/data/json)