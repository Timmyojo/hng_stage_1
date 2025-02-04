## Project Description
*This API is designed as the solution for the HNg12 Backend Stage 1 task. It returns below information in JSON format.*

### The API endpoint returns:
- Any given number
- A boolean value if number is a prime number or not
- A boolean value if number is a perfect number or not
- Properties of the given number either armstrong and/or odd
- The sum of the individual numbers that make up the given number
- PFun fact about the given number returned from NumbersAPI

### Tech Stack
- PHP 8

## To run locally
- Ensure you have the following installed: 
PHP,
Git

1. Clone the repo. 
git clone https://github.com/Timmyojo/hng_stage_1.git
cd hng_stage_1

2. Start the server, to run the api locally.
php -S localhost:8000 index.php

4. Test the API
Once the server is running, open your browser or use Postman/cURL to send a GET request to:
http://localhost:8000

5. Expected Response
```json
{
  "number": 11,
  "is_prime": true,
  "is_perfect": false,
  "properties": ["odd"],
  "digit_sum": 2,
  "fun_fact": "11 is the number of pounds one gallon of pure maple syrup weighs."
}
```



### LIVE URL
**GET** https://hng-stage-1-mauve.vercel.app/api/classify-number?number=11

### Response Format (`200 OK`)
```json
{
  "number": 11,
  "is_prime": true,
  "is_perfect": false,
  "properties": ["odd"],
  "digit_sum": 2,
  "fun_fact": "11 is the number of pounds one gallon of pure maple syrup weighs." 
}
``` 
**GET** https://hng-stage-1-mauve.vercel.app/api/classify-number?number="70eye"

### Response Format (`400 Bad Request`)
```json
{
  "number": "70eye",
  "error": true
}
``` 
 
