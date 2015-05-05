# fruitdb_mmc
A web application using MySQL, MongoDB, and CouchDB

########## MYSQL DB STUFF ##########
SCHEMA:
####################################

########## COUCH DB STUFF ##########
SCHEMA:
####################################

########## MONGO DB STUFF ##########
Set up for MongoDB:
1. Make sure that you have MongoDB running as Windows Service
2. Download the latest PHP Driver compatible for your machine
3. Unzip the archive and put php_mongo.dll in your PHP extension directory ("ext" by default) and add the following line to your php.ini file: extension=php_mongo.dll
4. Restart your XAMP/WAMPSERVER

DB Set up:
1. create a db named 'fruit'
2. create a collection named 'fruit'
3. insert a document of your liking to collection 'fruit'
4. create a collection named 'fruit_price'
3. insert a document of your liking to collection 'fruit'

fruit.fruit.find() 			##to view all fruits in the fruit collection
fruit.fruit_price.find() 	##to view all fruits in the fruit collection

SCHEMA EXAMPLE:
#collection: fruit
{
	_id : "553a599c3dddc0350584a994",
	name: "mango",
	quantity: "35",
	distributor: "SM"
}

#collection: fruit_price
{
	_id : "443a678c3dddc0350584a545",
	fruit_id: "553a599c3dddc0350584a994",
	price: "350.00",
	date: "04-25-2015"
}

#fruit_price collection is referenced to fruit
collection using fruit_id

####################################

