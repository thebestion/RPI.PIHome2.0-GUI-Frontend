

 ____  _ _   _                      
|  _ \(_) | | | ___  _ __ ___   ___ 
| |_) | | |_| |/ _ \| '_ ` _ \ / _ \
|  __/| |  _  | (_) | | | | | |  __/
|_|   |_|_| |_|\___/|_| |_| |_|\___|


More Infos at: http://pihome.harkemedia.de


#### PiHome 2.0 ####
User: admin
Pass: pihome


#### PiHome CronJobs #### ( sudo crontab -e )
*/10 * * * * php /home/www/cron/weather.php 
* * * * * php /home/www/cron/sunrise_sunset.php
* * * * * php /home/www/cron/gcal.php
* * * * * php /home/www/cron/caldav.php
