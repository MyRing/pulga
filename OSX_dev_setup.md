####Instructions to setup a dev environment in OSX

1. Download and install MAMP in your computer:

https://www.mamp.info/en/downloads/

2. Install it
3. Go to the folder where you have your other coding projects. We usually use ~/Code


4. Clone this repository in your computer. 
 ```
 git clone https://github.com/MyRing/pulga.git pulga
 ```
 This will create a folder called 'pulga' . Inside you'll have the source code.
 
 
5. Go to your "Applications" folder and open MAMP
6. Click on Preferences, then on the tab "Web Server"
7. Change the Document Root to where you just cloned the repository
8. Now click on the PHP tab and click choose the latest version of PHP
9. Click "ok" and then "Start Servers"
10. Now open your browser and go to http://127.0.0.1:8888 
    -If it shows you an error about some other application using port 8888, in the MAMP window go to the Ports tab again and change it to 80 or other port.
11. It should show you the index page of pulga
12. Open your terminal and enter the following
```
tail -f /Applications/MAMP/logs/php_error.log
```
Keep that terminal tab open during development to see the Errors, Warnings and Notices from PHP while you execute your code.
 



