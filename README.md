INSTRUCTIONS FOR BBVB

Download xampp and composer, and Visual Studio Code if you don't have it. That was all I needed for this. 

Do xampp first, then install composer in the xampp directory for ease.

Then, move the project folder into /xampp/htdocs. 

Open VS code and open the BBVB project folder in a workspace. Then open the project folder in a terminal in vs code, and run npm install. This will bring all the node packages across. 

Then open cmd outside of vscode, and navigate to the BBVB folder again. Run composer install here.

This is what I had to do as I experienced issues using composer via visual studio code. if you don't have those issues, you'll be fine. 

Then open xampp control panel and start all of the things it allows you to start. you should then be able to navigate to 

http://localhost/BBvb-main/public/ and access the site. 

To check the database, go to 
http://localhost/phpmyadmin.



