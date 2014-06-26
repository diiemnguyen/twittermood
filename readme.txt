Twitter mood - find mood on Google map
Using MongoDB and PHP client


/* How to get twitter data set */
- Create a Twitter account: https://twitter.com/login

- Link https://apps.twitter.com/ to create an application by clicking on the button “Create New App”  

- With Test OAuth button 
  *  We stream twitter data with this command 
curl --request 'POST' 'https://stream.twitter.com/1.1/statuses/filter.json' --data 'track=twitter' --header 'Authorization:xxxxxxxxxxxxxxxxxxxxxxxxxxxxx' --verbose 
  
  * We get twitter data to twitter.json
curl --get 'https://stream.twitter.com/1.1/statuses/filter.json' --data 'track=twitter' --header 'Authorization: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' --verbose >twitter.json



/* How to run application */
Step 1: install mongodb C:\mongodb

Step 2: import dataset into MongoDB

        C:\mongodb\bin>mongoimport -host localhost:27017 -db mytwitter -collection mytweets < twitter.json 
	Schema: mytwitter
	Collection: mytweets
	Documents: 10000 tweets

	Data set json file can be found on twittermood/twitter.json

Step 3: Check if dataset is imported sucessfully

	Start mongo C:>mongodb\bin>mongo.exe
	SQL> show dbs;
	SQL> use mytwitter;
	SQL> show collections;
	SQL> db.mytweets.findOne();
	

Step 4: start mongod

Step 5: run on browser localhost/twittermood/mood.php