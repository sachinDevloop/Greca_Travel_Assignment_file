<h2>Steps to Getting Started With Project:</h2>

Step 1 : Download the ZIP file and extract into root folder <br>
Step 2 : Create an database by name 'test'<br>
Step 3 : Rename the .env.example to .env and Change or Create database credentials according to your database, in .env file<br>
Step 4 : Open Cmd or Terminal "cd to project path"<br>
Step 5 : composer install<br>
Step 6 : php artisan migrate --seed<br>
Step 7 : php artisan serve<br>



<strong>Methods:</strong>
	
	POST 		: api/addbooking  //Add Booking  Post Fields: client_id,product_id,booked_on
	GET  		: api/bookingstatus  //Check Booking Status
	GET  		: api/client  //Get Client List
	GET  		: api/product  //Get Product List
	GET  		: api/booking  //Get Booking List
	


![image](https://user-images.githubusercontent.com/12134789/182804113-10ef27b1-1187-4a92-88f9-d48a8a622fe3.png)
